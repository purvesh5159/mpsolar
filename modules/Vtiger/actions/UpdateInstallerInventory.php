<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Vtiger_UpdateInstallerInventory_Action extends Vtiger_IndexAjax_View
{

	public function process(Vtiger_Request $request)
	{
		// ini_set('display_errors', 1);
		// ini_set('display_startup_errors', 1);
		// error_reporting(E_ALL);

		$salesorder_id = $request->get('record');
		$response = new Vtiger_Response();

		require_once('include/utils/utils.php');
		require_once('modules/Installerinventory/Installerinventory.php');
		require_once('modules/Users/Users.php');
		require_once('modules/SalesOrder/SalesOrder.php');

		global $current_user,$adb;

		if (!$current_user) {
			$current_user = Users::getActiveAdminUser();
		}
		$so_focus = new SalesOrder();
		$so_focus->id = $salesorder_id;
		$so_focus->retrieve_entity_info($salesorder_id, "SalesOrder");
		foreach ($so_focus->column_fields as $fieldname => $value) {
			$so_focus->column_fields[$fieldname] = decode_html($value);
		}

		$focus = new Installerinventory();
		$installername =  $so_focus->column_fields['installername'];


		$result = $adb->pquery("select vtiger_inventoryproductrel.productid,vtiger_inventoryproductrel.sequence_no,vtiger_inventoryproductrel.quantity,vtiger_inventoryproductrel.assignqty,vtiger_inventoryproductrel.lineitem_id,vtiger_inventoryproductrel.description,vtiger_products.productcode,vtiger_products.productcategory,vtiger_products.manufacturer,vtiger_products.series,vtiger_products.model,vtiger_products.size from vtiger_inventoryproductrel INNER JOIN vtiger_products on vtiger_products.productid=vtiger_inventoryproductrel.productid where vtiger_inventoryproductrel.id = ? ", array($salesorder_id));

		while($row = $adb->fetch_array($result)) {
			$productid = $row['productid'];
			//$quantity = $row['quantity'];
			$assignqty = $row['assignqty'];
			$vres = $adb->pquery("select * from vtiger_installerinventory INNER JOIN
				vtiger_crmentity on vtiger_installerinventory.installerinventoryid=vtiger_crmentity.crmid where vtiger_installerinventory.installerid = ? and vtiger_installerinventory.projectno = ? and vtiger_installerinventory.productname = ? and vtiger_crmentity.deleted=? ", array($installername,$salesorder_id,$productid,0));

			if ($adb->num_rows($vres) > 0) {
				if(isset($assignqty) || $assignqty != '')
				{
					$usedqty = $adb->query_result($vres, 0, 'qty');
					$invid = $adb->query_result($vres, 0, 'installerinventoryid');
					$qty = $usedqty - $assignqty; 
					$update_query = "update vtiger_installerinventory set qty= ? where installerinventoryid = ? ";
					$update_params = array($qty, $invid);
					$adb->pquery($update_query, $update_params);
				}
			}
			

			$response->setResult(array('success'=>true, 'data'=> "Record is created successfully"));
			$response->emit();
		}
	}
}