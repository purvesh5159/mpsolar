<?php
require_once 'include/events/VTEventHandler.inc';
class PaymentHandler extends VTEventHandler {

	function handleEvent($eventName, $entityData) {
		
		global $adb,$log;
		if ($eventName == 'vtiger.entity.beforesave') {
			$moduleName = $entityData->getModuleName();
			$log->debug("modulebeforesave".$moduleName);

			if ($moduleName == 'Payment') {
				$recordId = $entityData->get('invoice_id');
				$payment = $entityData->get('paymentamount');
				//if ($_REQUEST['action'] == 'Save' && $_REQUEST['action'] == 'SaveAjax') {
				if (!empty($recordId)) {
					$getTotalSql = 'SELECT total FROM `vtiger_invoice` '
					. ' INNER JOIN vtiger_crmentity '
					. 'ON vtiger_crmentity.crmid = vtiger_invoice.invoiceid'
					. ' where invoiceid = ? and deleted = ?';
					$sql = $adb->pquery($getTotalSql, array($recordId, 0));

					$totalinvoice = $adb->query_result($sql, 0, 'total');

					$getTotalSql = 'SELECT SUM(paymentamount) as paid FROM `vtiger_payments` '
					. ' INNER JOIN vtiger_crmentity '
					. 'ON vtiger_crmentity.crmid = vtiger_payments.paymentid'
					. ' where invoiceid = ? and deleted = ?';
					$sql = $adb->pquery($getTotalSql, array($recordId, 0));
					$totalPaid = $adb->query_result($sql, 0, 'paid');
					$invoiceBalance = $totalinvoice - $totalPaid;

					if (empty($payment)) {

						$response = new Vtiger_Response();
						$response->setEmitType(Vtiger_Response::$EMIT_JSON);
						$response->setError('Please fill payment amount ' . $payment);
						$response->emit();
						die();
					}
					
					if ($totalPaid  > $totalinvoice) {
						$response = new Vtiger_Response();
						$response->setEmitType(Vtiger_Response::$EMIT_JSON);
						$response->setError('Current Payment total more than invoice amount, Current invoice amount is ' . $totalinvoice);
						$response->emit();
						die();
					}
					
				}
			} 
		}

		if ($eventName == 'vtiger.entity.aftersave') {
			$moduleName = $entityData->getModuleName();
			$log->debug("modulename".$moduleName);
			$log->debug("moduleaftersave purvesh save".$moduleName);

			if ($moduleName == 'Payment') {
				$InvoiceId = $entityData->get('invoice_id');
				$SalesorderId = $entityData->get('salesorder_id');
				$payment = $entityData->get('paymentamount');
				//if ($_REQUEST['action'] == 'Save' && $_REQUEST['action'] == 'SaveAjax') {
					if (!empty($InvoiceId) && !empty($SalesorderId)) {
						$getTotalInvSql = 'SELECT total FROM `vtiger_invoice` '
						. ' INNER JOIN vtiger_crmentity '
						. 'ON vtiger_crmentity.crmid = vtiger_invoice.invoiceid'
						. ' where invoiceid = ? and deleted = ?';
						$sql = $adb->pquery($getTotalInvSql, array($InvoiceId, 0));
						$totalinvoice = $adb->query_result($sql, 0, 'total');

						$getTotalSoSql = 'SELECT total FROM `vtiger_invoice` '
						. ' INNER JOIN vtiger_crmentity '
						. 'ON vtiger_crmentity.crmid = vtiger_invoice.invoiceid'
						. ' where invoiceid = ? and deleted = ?';
						$sql = $adb->pquery($getTotalSoSql, array($SalesorderId, 0));
						$totalso = $adb->query_result($sql, 0, 'total');

						$getTotalSql = 'SELECT SUM(paymentamount) as paid FROM `vtiger_payments` '
						. ' INNER JOIN vtiger_crmentity '
						. 'ON vtiger_crmentity.crmid = vtiger_payments.paymentid'
						. ' where invoiceid = ? and salesorderid = ? and deleted = ?';
						$sql = $adb->pquery($getTotalSql, array( $InvoiceId, $SalesorderId, 0));
						$totalPaid = $adb->query_result($sql, 0, 'paid');
						$Balance = $totalinvoice - $totalPaid;

						$updateQuery = "update `vtiger_invoice` set received=? ,balance=? where invoiceid= ?";
						$adb->pquery($updateQuery, array($totalPaid, $Balance, $invoiceId));

						$updateQuery = "update `vtiger_salesorder` set received=? ,balance=? where salesorderid= ?";
						$adb->pquery($updateQuery, array($totalPaid, $Balance, $SalesorderId));

					}
				//}
			} 
		}
	}
}
