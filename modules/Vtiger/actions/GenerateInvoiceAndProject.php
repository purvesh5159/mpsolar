<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Vtiger_GenerateInvoiceAndProject_Action extends Vtiger_IndexAjax_View
{

	public function process(Vtiger_Request $request)
	{
		$salesorder_id = $request->get('record');
		$response = new Vtiger_Response();

		require_once('include/utils/utils.php');
		require_once('modules/Quotes/Quotes.php');
		require_once('modules/Invoice/Invoice.php');
		require_once('modules/SalesOrder/SalesOrder.php');
		require_once('modules/Users/Users.php');
	
		global $current_user;

		if (!$current_user) {
			$current_user = Users::getActiveAdminUser();
		}
		$so_focus = new Quotes();
		$so_focus->id = $salesorder_id;
		$so_focus->retrieve_entity_info($salesorder_id, "Quotes");
		foreach ($so_focus->column_fields as $fieldname => $value) {
			$so_focus->column_fields[$fieldname] = decode_html($value);
		}

		$focus = new SalesOrder();
		$focus = getConvertQuotesToProjectInvoice($focus, $so_focus, $salesorder_id);
		$focus->id = '';
		$focus->mode = '';
		$focus->column_fields['quote_id'] = $salesorder_id;
		$focus->column_fields['subject'] = $so_focus->column_fields['quote_no'];
		$focus->column_fields['sostatus'] = 'Created';
		$focus->column_fields['projectdate'] = date('Y-m-d');
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

		if(!empty($so_focus->column_fields['contact_id'])){
			$contactid = $so_focus->column_fields['contact_id'];
			$conMeta = Vtiger_Record_Model::getInstanceById($contactid,'Contacts');
			$email = $conMeta->get('email');
			$phone = $conMeta->get('mobile');
			$focus->column_fields['mobileno'] = $phone;
			$focus->column_fields['email'] = $email;
		}
		$focus->save("SalesOrder");
		$savedProjectId  = $focus->id;
//-------------------------------------------------------------- invoice creation -----------
		$focus = new Invoice();
		$focus = getConvertQuotesToProjectInvoice($focus, $so_focus, $salesorder_id);
		$focus->id = '';
		$focus->mode = '';
		$focus->column_fields['salesorder_id'] = $savedProjectId;
		$focus->column_fields['invoicestatus'] = 'Created';
		$focus->column_fields['quote_id'] = $salesorder_id; 
		$focus->column_fields['invoicedate'] = date('Y-m-d');
		// $focus->column_fields['duedate'] = date('Y-m-d', $durationinsec);

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

		$focus->save("Invoice");
		include_once 'modules/Invoice/InvoiceHandler.php';
		$ad  =  new InvoiceHandler();
		$modMeta  =  Vtiger_Record_Model::getInstanceById($focus->id,'Invoice');
		$ad->handleEvent('vtiger.entity.aftersave' , $modMeta , "True");
		$response->setResult(array('success'=>true, 'data'=> "Record is created successfully"));
		$response->emit();
	}
}
