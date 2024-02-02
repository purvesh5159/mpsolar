<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Vtiger_GenerateStocknotifytoInstaller_Action extends Vtiger_IndexAjax_View
{

	public function process(Vtiger_Request $request)
	{
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

		$salesorder_id = $request->get('record');
		$response = new Vtiger_Response();

		require_once('include/utils/utils.php');
		require_once('modules/Users/Users.php');
		require_once('modules/SalesOrder/SalesOrder.php');
		require_once("modules/Emails/mail.php");
		require_once("modules/Emails/models/Mailer.php");

		global $current_user,$adb,$log;

		if (!$current_user) {
			$current_user = Users::getActiveAdminUser();
		}
		$so_focus = new SalesOrder();
		$so_focus->id = $salesorder_id;
		$so_focus->retrieve_entity_info($salesorder_id, "SalesOrder");
		$installerid =  $so_focus->column_fields['installername'];
		$contactid =  $so_focus->column_fields['contact_id'];
		$installationdate =  $so_focus->column_fields['installationdate'];
		$projectno =  $so_focus->column_fields['subject'];
		$notify =  $so_focus->column_fields['notifyinstaller'];

		$pgquery = $adb->pquery("SELECT * FROM vtiger_installteam WHERE installteamid=".$installerid);
		$fname = $adb->query_result($pgquery,0,'installteam_tks_firstname');
		$lname = $adb->query_result($pgquery,0,'installteam_tks_lastname');
		$email = $adb->query_result($pgquery,0,'installteam_tks_email');

		$pgcquery =  $adb->pquery("SELECT * FROM vtiger_contactdetails WHERE contactid=".$contactid);
		$cfname = $adb->query_result($pgcquery,0,'firstname');
		$clname = $adb->query_result($pgcquery,0,'lastname');
		$mobile = $adb->query_result($pgcquery,0,'mobile');
		$cemail = $adb->query_result($pgcquery,0,'email');

		$pgaquery =  $adb->pquery("SELECT * FROM vtiger_contactaddress WHERE contactaddressid=".$contactid);
		$street = $adb->query_result($pgaquery,0,'mailingstreet');
		$city = $adb->query_result($pgaquery,0,'mailingcity');
		$state = $adb->query_result($pgaquery,0,'mailingstate');
		$zipcode = $adb->query_result($pgaquery,0,'mailingzip');

		$result = $adb->pquery("select vtiger_inventoryproductrel.productid,vtiger_inventoryproductrel.sequence_no,vtiger_inventoryproductrel.quantity,vtiger_inventoryproductrel.assignqty,vtiger_inventoryproductrel.lineitem_id,vtiger_inventoryproductrel.description,vtiger_products.productcode,vtiger_products.productcategory,vtiger_products.manufacturer,vtiger_products.series,vtiger_products.model,vtiger_products.size from vtiger_inventoryproductrel INNER JOIN vtiger_products on vtiger_products.productid=vtiger_inventoryproductrel.productid where vtiger_inventoryproductrel.id = ? ", array($salesorder_id));
		$numOfRows = $adb->num_rows($result);
		
		if($numOfRows != 0){       
			$table ='Dear '.$fname.' '.$lname.','
			.'<p>You can collect the requested products. Kindly confirm receipt of this mail.</p>'
			.'<p>Project No : '.$projectno.'</p>'
			.'<p>Installation Date : '.date('d-m-Y',strtotime($installationdate)).'</p>'
			.'<p>Customer Name : '.$cfname.' '.$clname.'</p>'
			.'<p>Address : '.$street.' '.$state.' '.$city.' '.$zipcode.' </p>'
			. '<br/>'
			. '<table border="1" cellpadding="5" cellspacing="0"><tr><th>Sr No.</th><th>Product Name</th>'
			. '<th>Serial No.</th>'
			. '<th>Quantity</th></tr>'; 

			for($i=0; $i<$numOfRows; $i++) {
				$productid = $adb->query_result($result, $i, 'productid');
				$quantity = $adb->query_result($result, $i, 'quantity');
				$prdsql = "SELECT productname,productcode FROM vtiger_products WHERE productid=".$productid;
				$productquery = $adb->pquery($prdsql);
				$productname = $adb->query_result($productquery,0,'productname');
				$productcode = $adb->query_result($productquery,0,'productcode');
				$table .='<tr>';
				$srno = $i + 1;
				$table  .= '<td>'.$srno.'</td>'
				.'<td>'.$productname.'</td>'
				.'<td>'.$productcode.'</td>'
				.'<td>'.$quantity.'</td>';
				$table  .='</tr>';    
			}
			$table  .='</table>'
			. '<br/><br/>'
			. 'Thank You, <br/>'
			. 'Mpsolar Team';
			$log->debug("table".$table);
		}

		$subject = 'Collection Request #';
		if($notify != 1){
			$mail_status = send_mail('SalesOrder',$email,'Mpsolar Team', $HELPDESK_SUPPORT_EMAIL_ID, $subject, $table,'','','','','',true);
			if($mail_status != '' ) {
				$update_query = "update vtiger_salesorder set notifyinstaller = ? where salesorderid = ?";
				$update_params = array(1, $salesorder_id);
				$adb->pquery($update_query, $update_params);
			}
		}
	}
}