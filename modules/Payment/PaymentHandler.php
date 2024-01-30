<?php
       global $log;
  $log->debug("*****handleBalanceOfTheInvoice**********handleBalanceOfTheInvoice********".$relatedmoduleName);
function PaymentHandler($entityData) {
           global $log;
  $log->debug("*****handleBalanceOfTheInvoice**********handleBalanceOfTheInvoice********".$relatedmoduleName);
    global $adb;
    $paymentRecordInfo = $entityData->{'data'};

    $current_user = Users_Record_Model::getCurrentUserModel();
    $currencyId = $current_user->column_fields["currency_id"];
    $currencyResult = $adb->pquery('SELECT currency_code, conversion_rate FROM '
            . 'vtiger_currency_info WHERE id=?', [$currencyId]);
    $dataaa = $adb->fetchByAssoc($currencyResult);
    $conversionRate = $dataaa['conversion_rate'];

    $recordIdWithwebserviceFormat = $paymentRecordInfo['id'];
    $recordId = explode('x', $recordIdWithwebserviceFormat);
    $recordId = $recordId[1];
    $invId = $paymentRecordInfo['invoice_id'];
    $soId = $paymentRecordInfo['salesorder_id'];
    if (!empty($invId)) {
        $invId = explode('x', $invId);
        $invId = $invId[1];
        $soId = explode('x', $soId);
        $soId = $invId[1];
        $relatedRecordInstance = Vtiger_Record_Model::getInstanceById($invId);
        $relatedmoduleName = $relatedRecordInstance->getModuleName();

        if ($relatedmoduleName == 'Invoice') {
            handleBalanceOfTheInvoice($invId, $currencyId, $conversionRate);
            handleBalanceOfTheSO($soId, $currencyId, $conversionRate);
        } 
    }
}

function handleBalanceOfTheInvoice($invoiceId, $currencyId, $conversionRate) {
    global $adb;
   global $log;
  $log->debug("*****handleBalanceOfTheInvoice**********handleBalanceOfTheInvoice********".$invoiceId);
    $totalInvoiceAmount = 0;
    if (!empty($invoiceId)) {
//        $log->debug("*****insideif handleBalanceOfTheInvoice**********handleBalanceOfTheInvoice********");
        $getTotalSql = 'SELECT SUM(paymentamount) as paid FROM `vtiger_payments` '
                . ' INNER JOIN vtiger_crmentity '
                . 'ON vtiger_crmentity.crmid = vtiger_payments.paymentid'
                . ' where invoiceid = ? and deleted = ?';
        $sql = $adb->pquery($getTotalSql, array($invoiceId, 0));
        $totalPaid = $adb->query_result($sql, 0, 'paid');

        $totalInvoiceAmount = getTotalAmountOfInvoice($invoiceId, $currencyId, $conversionRate);
        $invoiceBalance = $totalInvoiceAmount - $totalPaid;

        $log->debug("*****totalInvoiceAmount**********$totalInvoiceAmount********");
        $log->debug("*****invoiceBalance**********$invoiceBalance********");

        $updateQuery = "update `vtiger_invoice` set received=? ,balance=? where invoiceid= ?";
        $result = $adb->pquery($updateQuery, array($totalPaid, $invoiceBalance, $invoiceId));
    }
}

function getTotalAmountOfInvoice($invoiceId, $currencyId, $conversionRate) {
    global $adb;
    $result = $adb->pquery('SELECT total, conversion_rate, currency_id, '
            . ' createdtime FROM vtiger_invoice INNER JOIN vtiger_crmentity '
            . ' ON vtiger_crmentity.crmid = vtiger_invoice.invoiceid '
            . ' WHERE invoiceid = ? AND vtiger_crmentity.deleted=0', [$invoiceId]);
    $rowCount = $adb->num_rows($result);
    $totalValueSum = 0;
    for ($i = 0; $i < $rowCount; ++$i) {
        $dataRow = $adb->fetchByAssoc($result, $i);

        $total = $dataRow['total'];
        $invoiceConversionRate = $dataRow['conversion_rate'];
        $invoiceCurrencyId = $dataRow['currency_id'];

        if ($invoiceCurrencyId === $currencyId) {
            $totalValue = $total;
        } else {
            $totalValue = $total * $conversionRate / $invoiceConversionRate;
        }
        $totalValueSum = $totalValueSum + $totalValue;
    }
    return $totalValueSum;
}

function handleBalanceOfTheSO($soId, $currencyId, $conversionRate) {
    global $adb;
    $totalSOAmount = 0;
        if (!empty($soId)) {
            $getTotalSql = 'SELECT SUM(paymentamount) as paid FROM `vtiger_payments` '
                    . ' INNER JOIN vtiger_crmentity ON '
                    . 'vtiger_crmentity.crmid = vtiger_payments.paymentid'
                    . ' where salesorder_id = ? and deleted = ?';
            $sql = $adb->pquery($getTotalSql, array($soId, 0));
            $totalPaid = $adb->query_result($sql, 0, 'paid');
            $totalSOAmount = getTotalAmountOfSO($soId);
            $soBalance = $totalSOAmount - $totalPaid;
            $updateQuery = "update `vtiger_salesorder` set received=? ,balance=? where salesorderid=?";
            $result = $adb->pquery($updateQuery, array($totalPaid, $soBalance, $soId));
        }
}



function getTotalAmountOfSO($soId, $currencyId, $conversionRate) {
    global $adb;
    $result = $adb->pquery('SELECT total, conversion_rate, currency_id'
            . ' FROM vtiger_purchaseorder INNER JOIN vtiger_crmentity '
            . ' ON vtiger_crmentity.crmid = vtiger_purchaseorder.purchaseorderid '
            . ' WHERE purchaseorderid = ? AND vtiger_crmentity.deleted=0', [$soId]);
    $rowCount = $adb->num_rows($result);
    $totalValueSum = 0;
    for ($i = 0; $i < $rowCount; ++$i) {
        $dataRow = $adb->fetchByAssoc($result, $i);
        $total = $dataRow['total'];
        $invoiceConversionRate = $dataRow['conversion_rate'];
        $invoiceCurrencyId = $dataRow['currency_id'];
        if ($invoiceCurrencyId === $currencyId) {
            $totalValue = $total;
        } else {
            $totalValue = $total * $conversionRate / $invoiceConversionRate;
        }
        $totalValueSum = $totalValueSum + $totalValue;
    }
    return $totalValueSum;
}
