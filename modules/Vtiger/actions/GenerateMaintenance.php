<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Vtiger_GenerateMaintenance_Action extends Vtiger_IndexAjax_View
{

	public function process(Vtiger_Request $request)
	{
		// ini_set('display_errors', 1);
		// ini_set('display_startup_errors', 1);
		// error_reporting(E_ALL);

		$salesorder_id = $request->get('record');
		$response = new Vtiger_Response();

		require_once('include/utils/utils.php');
		require_once('modules/Maintenance/Maintenance.php');
		require_once('modules/Users/Users.php');
		require_once('modules/SalesOrder/SalesOrder.php');

		global $current_user;

		if (!$current_user) {
			$current_user = Users::getActiveAdminUser();
		}
		$so_focus = new SalesOrder();
		$so_focus->id = $salesorder_id;
		$so_focus->retrieve_entity_info($salesorder_id, "SalesOrder");
		foreach ($so_focus->column_fields as $fieldname => $value) {
			$so_focus->column_fields[$fieldname] = decode_html($value);
		}

		$focus = new Maintenance();
		$focus = getConvertSalesOrderToMaintance($focus, $so_focus, $salesorder_id);
		$focus->id = '';
		$focus->mode = '';
		$focus->column_fields['maintenance_tks_subject'] = $salesorder_id;
		$focus->column_fields['maintenance_tks_status'] = 'Approved';
		//$focus->column_fields['duedate'] = date('Y-m-d');
		$invoice_so_fields = array(
			'txtAdjustment' => 'txtAdjustment',
			'hdnSubTotal' => 'hdnSubTotal',
			'hdnGrandTotal' => 'hdnGrandTotal',
			'hdnTaxType' => 'hdnTaxType',
			'hdnDiscountPercent' => 'hdnDiscountPercent',
			'hdnDiscountAmount' => 'hdnDiscountAmount',
			'hdnS_H_Amount' => 'hdnS_H_Amount',
			'assigned_user_id' => 'assigned_user_id',
			'currency_id' => 'currency_id',
			'conversion_rate' => 'conversion_rate',
		);
		foreach ($invoice_so_fields as $invoice_field => $so_field) {
			$focus->column_fields[$invoice_field] = $so_focus->column_fields[$so_field];
		}
		$focus->_salesorderid = $salesorder_id;
		$focus->_recurring_mode = 'recurringinvoice_from_so';
		
		$focus->save("Maintenance");
		$response->setResult(array('success'=>true, 'data'=> "Record is created sucessfully"));
		$response->emit();
	}
}
