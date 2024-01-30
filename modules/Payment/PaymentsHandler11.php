<?php

require_once('include/utils/AccountingUtils.php');

function PaymentsHandler($entityData) {
    global $adb;
    $paymentRecordInfo = $entityData->{'data'};

    print_r($paymentRecordInfo);
    exit();

    $current_user = Users_Record_Model::getCurrentUserModel();
    $currencyId = $current_user->column_fields["currency_id"];
    $currencyResult = $adb->pquery('SELECT currency_code, conversion_rate FROM '
            . 'vtiger_currency_info WHERE id=?', [$currencyId]);
    $dataaa = $adb->fetchByAssoc($currencyResult);
    $conversionRate = $dataaa['conversion_rate'];

    $recordIdWithwebserviceFormat = $paymentRecordInfo['id'];
    $recordId = explode('x', $recordIdWithwebserviceFormat);
    $recordId = $recordId[1];

    $invOrPoId = $paymentRecordInfo['invoice_id'];
    if (!empty($invOrPoId)) {
        $invOrPoId = explode('x', $invOrPoId);
        $invOrPoId = $invOrPoId[1];
        $relatedRecordInstance = Vtiger_Record_Model::getInstanceById($invOrPoId);
        $relatedmoduleName = $relatedRecordInstance->getModuleName();
        if ($relatedmoduleName == 'Invoice') {
            handleBalanceOfTheInvoice($invOrPoId, $currencyId, $conversionRate);
        } else {
            HandlePurchaseOrderPaymentsAfterPay($invOrPoId, $currencyId, $conversionRate);
        }
    }

    $accOrVenId = $paymentRecordInfo['related_to'];
    if (!empty($accOrVenId)) {
        $accOrVenId = explode('x', $accOrVenId);
        $accOrVenId = $accOrVenId[1];
        $balance = getBalance($accOrVenId, $currencyId, $conversionRate);
        updateFieldOFTheVendor($accOrVenId, $balance);

        $payType = $paymentRecordInfo['pay_type'];
        $desc = 'Payment Ref No: ' . $paymentRecordInfo['pay_ref'];
        if ($payType == 'Payment Recieved') {
            generalisedInsertIntoAccountingState($recordId, $accOrVenId, 0, (float) $paymentRecordInfo['payment_paid'], $balance, $payType, $desc);
        } else {
            generalisedInsertIntoAccountingState($recordId, $accOrVenId, (float) $paymentRecordInfo['payment_paid'], 0, $balance, $payType, $desc);
        }
    }
}

function handleBalanceOfTheInvoice($invoiceId, $currencyId, $conversionRate) {
    global $adb;
//    global $log;
//    $log->debug("*****handleBalanceOfTheInvoice**********handleBalanceOfTheInvoice********");
    $totalInvoiceAmount = 0;
    if (!empty($invoiceId)) {
//        $log->debug("*****insideif handleBalanceOfTheInvoice**********handleBalanceOfTheInvoice********");
        $getTotalSql = 'SELECT SUM(payment_paid) as paid FROM `vtiger_payments` '
                . ' INNER JOIN vtiger_crmentity '
                . 'ON vtiger_crmentity.crmid = vtiger_payments.paymentsid'
                . ' where reference_number = ? and pay_type = ? and deleted = ?';
        $sql = $adb->pquery($getTotalSql, array($invoiceId, 'Payment Recieved', 0));
        $totalPaid = $adb->query_result($sql, 0, 'paid');

        $totalInvoiceAmount = getInvoiceAmountForAccount($invoiceId, $currencyId, $conversionRate);
        $invoiceBalance = $totalInvoiceAmount - $totalPaid;
//        global $log;
//        $log->debug("*****totalInvoiceAmount**********$totalInvoiceAmount********");
//        $log->debug("*****invoiceBalance**********$invoiceBalance********");
        $updateQuery = "update `vtiger_invoice` set received=? ,balance=? where invoiceid= ?";
        $result = $adb->pquery($updateQuery, array($totalPaid, $invoiceBalance, $invoiceId));
    }
}

function HandlePurchaseOrderPaymentsAfterPay($poId, $currencyId, $conversionRate) {
    global $adb, $doAccountingInBill;
    $totalPOAmount = 0;
    if ($doAccountingInBill == true) {
        if (!empty($poId)) {
            $getTotalSql = 'SELECT SUM(payment_paid) as paid FROM `vtiger_payments` '
                    . ' INNER JOIN vtiger_crmentity ON '
                    . 'vtiger_crmentity.crmid = vtiger_payments.paymentsid'
                    . ' where reference_number = ? and pay_type = ? and deleted = ?';
            $sql = $adb->pquery($getTotalSql, array($poId, 'Payment Paid', 0));
            $totalPaid = $adb->query_result($sql, 0, 'paid');
            $totalPOAmount = getTotalAmountOfBill($poId, $currencyId, $conversionRate);
            $poBalance = $totalPOAmount - $totalPaid;
            $updateQuery = "update `vtiger_bills` set paid=? ,balance=? where billsid=?";
            $result = $adb->pquery($updateQuery, array($totalPaid, $poBalance, $poId));
        }
    } else {
        if (!empty($soId)) {
            $getTotalSql = 'SELECT SUM(payment_paid) as paid FROM `vtiger_payments` '
                    . ' INNER JOIN vtiger_crmentity ON '
                    . 'vtiger_crmentity.crmid = vtiger_payments.paymentsid'
                    . ' where reference_number = ? and pay_type = ? and deleted = ?';
            $sql = $adb->pquery($getTotalSql, array($poId, 'Payment Paid', 0));
            $totalPaid = $adb->query_result($sql, 0, 'paid');
            $totalPOAmount = getTotalAmountOfSO($soId);
            $soBalance = $totalPOAmount - $totalPaid;
            $updateQuery = "update `vtiger_salesorder` set received=? ,balance=? where salesorderid=?";
            $result = $adb->pquery($updateQuery, array($totalPaid, $soBalance, $soId));
        }
    }
}

function getTotalAmountOfInvoice($invoiceId) {
    global $adb;
    $result = $adb->pquery('SELECT total FROM vtiger_invoice INNER JOIN vtiger_crmentity '
            . ' ON vtiger_crmentity.crmid = vtiger_invoice.invoiceid '
            . ' WHERE invoiceid = ? AND vtiger_crmentity.deleted=0', [$invoiceId]);
    $rowCount = $adb->num_rows($result);
    $totalValueSum = 0;
    for ($i = 0; $i < $rowCount; ++$i) {
        $dataRow = $adb->fetchByAssoc($result, $i);
        $total = $dataRow['total'];
        $totalValue = $total;
        $totalValueSum = $totalValueSum + $totalValue;
    }
    return $totalValueSum;
}

function getTotalAmountOfSO($soId) {
    global $adb;
    $result = $adb->pquery('SELECT total FROM vtiger_salesorder INNER JOIN vtiger_crmentity '
            . ' ON vtiger_crmentity.crmid = vtiger_salesorder.salesorderid '
            . ' WHERE salesorderid = ? AND vtiger_crmentity.deleted=0', [$soId]);
    $rowCount = $adb->num_rows($result);
    $totalValueSum = 0;
    for ($i = 0; $i < $rowCount; ++$i) {
        $dataRow = $adb->fetchByAssoc($result, $i);
        $total = $dataRow['total'];
        $totalValue = $total;
        $totalValueSum = $totalValueSum + $totalValue;
    }
    return $totalValueSum;
}

