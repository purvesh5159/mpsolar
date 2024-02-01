<?php
require_once 'include/events/VTEventHandler.inc';
class PaymentHandler extends VTEventHandler {

	function handleEvent($eventName, $entityData) {
		
		global $adb,$log;
		if ($eventName == 'vtiger.entity.beforesave') {
			$moduleName = $entityData->getModuleName();
			$log->debug("modulename".$moduleName);

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
							$response->setError('Current Payment total more than invoice amount, Current invoice amount is ' . round($totalinvoice));
							$response->emit();
							die();
						}
						
					//}
				}
			} 
		}
	}
}
