<?php
/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Public License Version 1.1.2
 * ("License"); You may not use this file except in compliance with the
 * License. You may obtain a copy of the License at http://www.sugarcrm.com/SPL
 * Software distributed under the License is distributed on an  "AS IS"  basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License for
 * the specific language governing rights and limitations under the License.
 * The Original Code is:  SugarCRM Open Source
 * The Initial Developer of the Original Code is SugarCRM, Inc.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.;
 * All Rights Reserved.
 * Contributor(s): ______________________________________.
 ********************************************************************************/
/*********************************************************************************
 * $Header$
 * Description:  Defines the Account SugarBean Account entity with the necessary
 * methods and variables.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/
class Maintenance extends CRMEntity {
	var $log;
	var $db;

	var $table_name = "vtiger_maintenance";
	var $table_index= 'maintenanceid';
	var $tab_name = Array('vtiger_crmentity','vtiger_maintenance','vtiger_mpobillads','vtiger_mposhipads','vtiger_maintenancecf','vtiger_inventoryproductrel');
	var $tab_name_index = Array('vtiger_crmentity'=>'crmid','vtiger_maintenance'=>'maintenanceid','vtiger_mpobillads'=>'mpobilladdressid','vtiger_mposhipads'=>'mposhipaddressid','vtiger_maintenancecf'=>'maintenanceid','vtiger_inventoryproductrel'=>'id');
	/**
	 * Mandatory table for supporting custom fields.
	 */
	var $customFieldTable = Array('vtiger_maintenancecf', 'maintenanceid');
	var $entity_table = "vtiger_crmentity";
	var $billadr_table = "vtiger_mpobillads";

	var $column_fields = Array();

	var $sortby_fields = Array('subject','quotename','smownerid','lastname');

	// This is used to retrieve related vtiger_fields from form posts.
	var $additional_column_fields = Array('assigned_user_name', 'smownerid', 'opportunity_id', 'case_id', 'contact_id', 'task_id', 'note_id', 'meeting_id', 'call_id', 'email_id', 'parent_name', 'member_id' );

	// This is the list of vtiger_fields that are in the lists.
	var $list_fields = Array(
				//  Module Sequence Numbering
				//'Order No'=>Array('crmentity'=>'crmid'),
		'Maintenance No'=>Array('maintenance'=>'maintenance_no'),
				// END
		'Project No'=>Array('maintenance'=>'subject'),
		'Quote Name'=>Array('maintenance'=>'quotename'),
		'Project Date'=>Array('maintenance'=> 'projectdate'),
		'Total'=>Array('maintenance'=>'total'),
		'Assigned To'=>Array('crmentity'=>'smownerid')
	);

	var $list_fields_name = Array(
		'Maintenance No'=>'maintenance_no',
		'Project No'=>'subject',
		'quotename Name'=>'quotename',
		'Project Date'=>'projectdate',
		'Total'=>'hdnGrandTotal',
		'Assigned To'=>'assigned_user_id'
	);

	var $list_link_field= 'subject';

	var $search_fields = Array(
		'Maintenance No'=>Array('maintenance'=>'maintenance_no'),
		'Project No'=>Array('maintenance'=>'subject'),
	);

	var $search_fields_name = Array(
		'Order No'=>'maintenance_no',
		'Project No'=>'subject',
	);
	// Used when enabling/disabling the mandatory fields for the module.
	// Refers to vtiger_field.fieldname values.
	var $mandatory_fields = Array('subject', 'quotename','createdtime' ,'modifiedtime', 'assigned_user_id', 'quantity', 'listprice', 'productid');

	// This is the list of vtiger_fields that are required.
	var $required_fields =  array("subject"=>1);

	//Added these variables which are used as default order by and sortorder in ListView
	var $default_order_by = 'subject';
	var $default_sort_order = 'ASC';

	// For Alphabetical search
	var $def_basicsearch_col = 'subject';

	// For workflows update field tasks is deleted all the lineitems.
	var $isLineItemUpdate = true;

	//var $groupTable = Array('vtiger_pogrouprelation','maintenanceid');
	/** Constructor Function for Order class
	 *  This function creates an instance of LoggerManager class using getLogger method
	 *  creates an instance for PearDatabase class and get values for column_fields array of Order class.
	 */
	function __construct() {
		$this->log =Logger::getLogger('Maintenance');
		$this->db = PearDatabase::getInstance();
		$this->column_fields = getColumnFields('Maintenance');
	}
	function Maintenance() {
		self::__construct();
	}

	function save_module($module)
	{
		global $adb, $updateInventoryProductRel_deduct_stock;
		$updateInventoryProductRel_deduct_stock = false;

		$requestProductIdsList = $requestQuantitiesList = array();
		$totalNoOfProducts = $_REQUEST['totalProductCount'];
		for($i=1; $i<=$totalNoOfProducts; $i++) {
			$productId = $_REQUEST['hdnProductId'.$i];
			$requestProductIdsList[$productId] = $productId;
			//Checking same item more than once
			if(array_key_exists($productId, $requestQuantitiesList)) {
				$requestQuantitiesList[$productId] = $requestQuantitiesList[$productId] + $_REQUEST['qty'.$i];
				continue;
			}
			$requestQuantitiesList[$productId] = $_REQUEST['qty'.$i];
		}

		global $itemQuantitiesList, $isItemsRequest;
		$itemQuantitiesList = array();
		$statusValue = $this->column_fields['postatus'];

		if ($totalNoOfProducts) {
			$isItemsRequest = true;
		}

		if ($this->mode == '' && $statusValue === 'Received Shipment') {
			$itemQuantitiesList['new'] = $requestQuantitiesList;

		} else if ($this->mode != '' && in_array($statusValue, array('Received Shipment', 'Cancelled'))) {

			$productIdsList = $quantitiesList = array();
			$recordId = $this->id;
			$result = $adb->pquery("SELECT productid, quantity FROM vtiger_inventoryproductrel WHERE id = ?", array($recordId));
			$numOfRows = $adb->num_rows($result);
			for ($i=0; $i<$numOfRows; $i++) {
				$productId = $adb->query_result($result, $i, 'productid');
				$productIdsList[$productId] = $productId;
				if(array_key_exists($productId, $quantitiesList)) {
					$quantitiesList[$productId] = $quantitiesList[$productId] + $adb->query_result($result, $i, 'quantity');
					continue;
				}
				$qty = $adb->query_result($result, $i, 'quantity');
				$quantitiesList[$productId] = $qty;
				$subProductQtys = $this->getSubProductsQty($productId);
				if ($statusValue === 'Cancelled' && !empty($subProductQtys)) {
					foreach ($subProductQtys as $subProdId => $subProdQty) {
						$subProdQty = $subProdQty * $qty;
						if (array_key_exists($subProdId, $quantitiesList)) {
							$quantitiesList[$subProdId] = $quantitiesList[$subProdId] + $subProdQty;
							continue;
						}
						$quantitiesList[$subProdId] = $subProdQty;
					}
				}
			}

			if ($statusValue === 'Cancelled') {
				$itemQuantitiesList = $quantitiesList;
			} else {
				//Constructing quantities array for newly added line items
				$newProductIds = array_diff($requestProductIdsList, $productIdsList);
				if ($newProductIds) {
					$newQuantitiesList = array();
					foreach ($newProductIds as $productId) {
						$newQuantitiesList[$productId] = $requestQuantitiesList[$productId];
					}
					if ($newQuantitiesList) {
						$itemQuantitiesList['new'] = $newQuantitiesList;
					}
				}

				//Constructing quantities array for deleted line items
				$deletedProductIds = array_diff($productIdsList, $requestProductIdsList);
				if ($deletedProductIds && $totalNoOfProducts) {//$totalNoOfProducts is exist means its not ajax save
					$deletedQuantitiesList = array();
					foreach ($deletedProductIds as $productId) {
						//Checking same item more than once
						if(array_key_exists($productId, $deletedQuantitiesList)) {
							$deletedQuantitiesList[$productId] = $deletedQuantitiesList[$productId] + $quantitiesList[$productId];
							continue;
						}
						$deletedQuantitiesList[$productId] = $quantitiesList[$productId];
					}

					if ($deletedQuantitiesList) {
						$itemQuantitiesList['deleted'] = $deletedQuantitiesList;
					}
				}

				//Constructing quantities array for updated line items
				$updatedProductIds = array_intersect($productIdsList, $requestProductIdsList);
				if (!$totalNoOfProducts) {//$totalNoOfProducts is null then its ajax save
					$updatedProductIds = $productIdsList;
				}
				if ($updatedProductIds) {
					$updatedQuantitiesList = array();
					foreach ($updatedProductIds as $productId) {
						//Checking same item more than once
						if(array_key_exists($productId, $updatedQuantitiesList)) {
							$updatedQuantitiesList[$productId] = $updatedQuantitiesList[$productId] + $quantitiesList[$productId];
							continue;
						}
						
						$quantity = $quantitiesList[$productId];
						if ($totalNoOfProducts) {
							$quantity = $requestQuantitiesList[$productId] - $quantitiesList[$productId];
						}

						if ($quantity) {
							$updatedQuantitiesList[$productId] = $quantity;
						}
						//Check for subproducts
						$subProductQtys = $this->getSubProductsQty($productId);
						if (!empty($subProductQtys) && $quantity) {
							foreach ($subProductQtys as $subProdId => $subProductQty) {
								$subProductQty = $subProductQty * $quantity;
								if (array_key_exists($subProdId, $updatedQuantitiesList)) {
									$updatedQuantitiesList[$subProdId] = $updatedQuantitiesList[$subProdId] + ($subProductQty);
									continue;
								}
								$updatedQuantitiesList[$subProdId] = $subProductQty;
							}
						}
					}
					if ($updatedQuantitiesList) {
						$itemQuantitiesList['updated'] = $updatedQuantitiesList;
					}
				}
			}
		}

		/* $_REQUEST['REQUEST_FROM_WS'] is set from webservices script.
		 * Depending on $_REQUEST['totalProductCount'] value inserting line items into DB.
		 * This should be done by webservices, not be normal save of Inventory record.
		 * So unsetting the value $_REQUEST['totalProductCount'] through check point
		 */
		if (isset($_REQUEST['REQUEST_FROM_WS']) && $_REQUEST['REQUEST_FROM_WS']) {
			unset($_REQUEST['totalProductCount']);
		}

		//in ajax save we should not call this function, because this will delete all the existing product values
		if(isset($this->_recurring_mode) && $this->_recurring_mode == 'recurringinvoice_from_so' && isset($this->_salesorderid) && $this->_salesorderid!='') {
			// We are getting called from the RecurringInvoice cron service!
			$this->createRecurringInvoiceFromSO();

		} else if(isset($_REQUEST)) {
		//in ajax save we should not call this function, because this will delete all the existing product values
			if($_REQUEST['action'] != 'MaintenanceAjax' && $_REQUEST['ajxaction'] != 'DETAILVIEW'
				&& $_REQUEST['action'] != 'MassEditSave' && $_REQUEST['action'] != 'ProcessDuplicates'
				&& $_REQUEST['action'] != 'SaveAjax' && $this->isLineItemUpdate != false && $_REQUEST['action'] != 'FROM_WS') {

			//Based on the total Number of rows we will save the product relationship with this entity
				saveInventoryProductDetails($this, 'Maintenance');
		}
	}

		// Update the currency id and the conversion rate for the purchase order
	$update_query = "update vtiger_maintenance set currency_id=?, conversion_rate=? where maintenanceid=?";
	$update_params = array($this->column_fields['currency_id'], $this->column_fields['conversion_rate'], $this->id);
	$adb->pquery($update_query, $update_params);
}

	/** Function to get subproducts quantity for given product
	 *  This function accepts the productId as arguments and returns array of subproduct qty for given productId
	 */
	function getSubProductsQty($productId) {
		$subProductQtys = array();
		$adb = PearDatabase::getInstance();
		$result = $adb->pquery("SELECT sequence_no FROM vtiger_inventoryproductrel WHERE id = ? and productid=?", array($this->id, $productId));
		$numOfRows = $adb->num_rows($result);
		if ($numOfRows > 0) {
			for ($i = 0; $i < $numOfRows; $i++) {
				$sequenceNo = $adb->query_result($result, $i, 'sequence_no');
				$subProdQuery = $adb->pquery("SELECT productid, quantity FROM vtiger_inventorysubproductrel WHERE id=? AND sequence_no=?", array($this->id, $sequenceNo));
				if ($adb->num_rows($subProdQuery) > 0) {
					for ($j = 0; $j < $adb->num_rows($subProdQuery); $j++) {
						$subProdId = $adb->query_result($subProdQuery, $j, 'productid');
						$subProdQty = $adb->query_result($subProdQuery, $j, 'quantity');
						$subProductQtys[$subProdId] = $subProdQty;
					}
				}
			}
		}
		return $subProductQtys;
	}

	/** Function to get activities associated with the Purchase Order
	 *  This function accepts the id as arguments and execute the MySQL query using the id
	 *  and sends the query and the id as arguments to renderRelatedActivities() method
	 */
	function get_activities($id, $cur_tab_id, $rel_tab_id, $actions=false) {
		global $log, $singlepane_view,$currentModule,$current_user;
		$log->debug("Entering get_activities(".$id.") method ...");
		$this_module = $currentModule;

		$related_module = vtlib_getModuleNameById($rel_tab_id);
		require_once("modules/$related_module/Activity.php");
		$other = new Activity();
		vtlib_setup_modulevars($related_module, $other);
		$singular_modname = vtlib_toSingular($related_module);

		$parenttab = getParentTab();

		if($singlepane_view == 'true')
			$returnset = '&return_module='.$this_module.'&return_action=DetailView&return_id='.$id;
		else
			$returnset = '&return_module='.$this_module.'&return_action=CallRelatedList&return_id='.$id;

		$button = '';

		$button .= '<input type="hidden" name="activity_mode">';

		if($actions) {
			if(is_string($actions)) $actions = explode(',', strtoupper($actions));
			if(in_array('ADD', $actions) && isPermitted($related_module,1, '') == 'yes') {
				if(getFieldVisibilityPermission('Calendar',$current_user->id,'parent_id', 'readwrite') == '0') {
					$button .= "<input title='".getTranslatedString('LBL_NEW'). " ". getTranslatedString('LBL_TODO', $related_module) ."' class='crmbutton small create'" .
					" onclick='this.form.action.value=\"EditView\";this.form.module.value=\"$related_module\";this.form.return_module.value=\"$this_module\";this.form.activity_mode.value=\"Task\";' type='submit' name='button'" .
					" value='". getTranslatedString('LBL_ADD_NEW'). " " . getTranslatedString('LBL_TODO', $related_module) ."'>&nbsp;";
				}
			}
		}

		$userNameSql = getSqlForNameInDisplayFormat(array('first_name'=>
			'vtiger_users.first_name', 'last_name' => 'vtiger_users.last_name'), 'Users');
		$query = "SELECT case when (vtiger_users.user_name not like '') then $userNameSql else vtiger_groups.groupname end as user_name,vtiger_contactdetails.lastname, vtiger_contactdetails.firstname, vtiger_contactdetails.contactid,vtiger_activity.*,vtiger_seactivityrel.crmid as parent_id,vtiger_crmentity.crmid, vtiger_crmentity.smownerid, vtiger_crmentity.modifiedtime from vtiger_activity inner join vtiger_seactivityrel on vtiger_seactivityrel.activityid=vtiger_activity.activityid inner join vtiger_crmentity on vtiger_crmentity.crmid=vtiger_activity.activityid left join vtiger_cntactivityrel on vtiger_cntactivityrel.activityid= vtiger_activity.activityid left join vtiger_contactdetails on vtiger_contactdetails.contactid = vtiger_cntactivityrel.contactid left join vtiger_users on vtiger_users.id=vtiger_crmentity.smownerid left join vtiger_groups on vtiger_groups.groupid=vtiger_crmentity.smownerid where vtiger_seactivityrel.crmid=".$id." and activitytype='Task' and vtiger_crmentity.deleted=0 and (vtiger_activity.status is not NULL && vtiger_activity.status != 'Completed') and (vtiger_activity.status is not NULL and vtiger_activity.status != 'Deferred') ";

		$return_value = GetRelatedList($this_module, $related_module, $other, $query, $button, $returnset);

		if($return_value == null) $return_value = Array();
		$return_value['CUSTOM_BUTTON'] = $button;

		$log->debug("Exiting get_activities method ...");
		return $return_value;
	}

	/** Function to get the activities history associated with the Purchase Order
	 *  This function accepts the id as arguments and execute the MySQL query using the id
	 *  and sends the query and the id as arguments to renderRelatedHistory() method
	 */
	function get_history($id)
	{
		global $log;
		$log->debug("Entering get_history(".$id.") method ...");
		$userNameSql = getSqlForNameInDisplayFormat(array('first_name'=>
			'vtiger_users.first_name', 'last_name' => 'vtiger_users.last_name'), 'Users');
		$query = "SELECT vtiger_contactdetails.lastname, vtiger_contactdetails.firstname,
		vtiger_contactdetails.contactid,vtiger_activity.* ,vtiger_seactivityrel.*,
		vtiger_crmentity.crmid, vtiger_crmentity.smownerid, vtiger_crmentity.modifiedtime,
		vtiger_crmentity.createdtime, vtiger_crmentity.description,case when
		(vtiger_users.user_name not like '') then $userNameSql else vtiger_groups.groupname end
		as user_name from vtiger_activity
		inner join vtiger_seactivityrel on vtiger_seactivityrel.activityid=vtiger_activity.activityid
		inner join vtiger_crmentity on vtiger_crmentity.crmid=vtiger_activity.activityid
		left join vtiger_cntactivityrel on vtiger_cntactivityrel.activityid= vtiger_activity.activityid
		left join vtiger_contactdetails on vtiger_contactdetails.contactid = vtiger_cntactivityrel.contactid
		left join vtiger_groups on vtiger_groups.groupid=vtiger_crmentity.smownerid
		left join vtiger_users on vtiger_users.id=vtiger_crmentity.smownerid
		where vtiger_activity.activitytype='Task'
		and (vtiger_activity.status = 'Completed' or vtiger_activity.status = 'Deferred')
		and vtiger_seactivityrel.crmid=".$id."
		and vtiger_crmentity.deleted = 0";
		//Don't add order by, because, for security, one more condition will be added with this query in include/RelatedListView.php

		$returnValue = getHistory('Maintenance',$query,$id);
		$log->debug("Exiting get_history method ...");
		return $returnValue;
	}


	/**	Function used to get the Status history of the Purchase Order
	 *	@param $id - maintenance id
	 *	@return $return_data - array with header and the entries in format Array('header'=>$header,'entries'=>$entries_list) where as $header and $entries_list are arrays which contains header values and all column values of all entries
	 */
	function get_postatushistory($id)
	{
		global $log;
		$log->debug("Entering get_postatushistory(".$id.") method ...");

		global $adb;
		global $mod_strings;
		global $app_strings;

		$query = 'select vtiger_maintenance.maintenance_no from vtiger_maintenance inner join vtiger_crmentity on vtiger_crmentity.crmid = vtiger_maintenance.maintenanceid where vtiger_crmentity.deleted = 0 and vtiger_maintenance.maintenanceid = ?';
		$result=$adb->pquery($query, array($id));
		$noofrows = $adb->num_rows($result);

		$header[] = $app_strings['Order No'];
		$header[] = $app_strings['Vendor Name'];
		$header[] = $app_strings['LBL_AMOUNT'];
		$header[] = $app_strings['LBL_PO_STATUS'];
		$header[] = $app_strings['LBL_LAST_MODIFIED'];

		//Getting the field permission for the current user. 1 - Not Accessible, 0 - Accessible
		//Vendor, Total are mandatory fields. So no need to do security check to these fields.
		global $current_user;

		//If field is accessible then getFieldVisibilityPermission function will return 0 else return 1
		$postatus_access = (getFieldVisibilityPermission('Maintenance', $current_user->id, 'status') != '0')? 1 : 0;
		$picklistarray = getAccessPickListValues('Maintenance');

		$postatus_array = ($postatus_access != 1)? $picklistarray['status']: array();
		//- ==> picklist field is not permitted in profile
		//Not Accessible - picklist is permitted in profile but picklist value is not permitted
		$error_msg = ($postatus_access != 1)? 'Not Accessible': '-';

		while($row = $adb->fetch_array($result))
		{
			$entries = Array();

			//Module Sequence Numbering
			//$entries[] = $row['maintenanceid'];
			$entries[] = $row['maintenance_no'];
			// END
			$entries[] = $row['subject'];
			$entries[] = $row['total'];
			$entries[] = (in_array($row['status'], $postatus_array))? $row['status']: $error_msg;
			$date = new DateTimeField($row['lastmodified']);
			$entries[] = $date->getDisplayDateTimeValue();

			$entries_list[] = $entries;
		}

		$return_data = Array('header'=>$header,'entries'=>$entries_list);

		$log->debug("Exiting get_postatushistory method ...");

		return $return_data;
	}
	/*
	 * Function to get the secondary query part of a report
	 * @param - $module primary module name
	 * @param - $secmodule secondary module name
	 * returns the query string formed on fetching the related data for report for secondary module
	 */
	function generateReportsSecQuery($module,$secmodule,$queryPlanner){

		$matrix = $queryPlanner->newDependencyMatrix();
		$matrix->setDependency('vtiger_crmentityMaintenance', array('vtiger_usersMaintenance', 'vtiger_groupsMaintenance', 'vtiger_lastModifiedByMaintenance'));
		$matrix->setDependency('vtiger_inventoryproductrelMaintenance', array('vtiger_productsMaintenance', 'vtiger_serviceMaintenance'));
		
		if (!$queryPlanner->requireTable('vtiger_maintenance', $matrix)) {
			return '';
		}
		$matrix->setDependency('vtiger_maintenance',array('vtiger_crmentityMaintenance', "vtiger_currency_info$secmodule",
			'vtiger_maintenancecf', 'vtiger_vendorRelMaintenance', 'vtiger_mpobillads',
			'vtiger_mposhipads', 'vtiger_inventoryproductrelMaintenance', 'vtiger_contactdetailsMaintenance'));

		$query = $this->getRelationQuery($module,$secmodule,"vtiger_maintenance","maintenanceid",$queryPlanner);
		if ($queryPlanner->requireTable("vtiger_crmentityMaintenance", $matrix)){
			$query .= " left join vtiger_crmentity as vtiger_crmentityMaintenance on vtiger_crmentityMaintenance.crmid=vtiger_maintenance.maintenanceid and vtiger_crmentityMaintenance.deleted=0";
		}
		if ($queryPlanner->requireTable("vtiger_maintenancecf")){
			$query .= " left join vtiger_maintenancecf on vtiger_maintenance.maintenanceid = vtiger_maintenancecf.maintenanceid";
		}
		if ($queryPlanner->requireTable("vtiger_mpobillads")){
			$query .= " left join vtiger_mpobillads on vtiger_maintenance.maintenance=vtiger_mpobillads.mpobilladdressid";
		}
		if ($queryPlanner->requireTable("vtiger_mposhipads")){
			$query .= " left join vtiger_mposhipads on vtiger_maintenance.maintenanceid=vtiger_mposhipads.mposhipaddressid";
		}
		if ($queryPlanner->requireTable("vtiger_currency_info$secmodule")){
			$query .= " left join vtiger_currency_info as vtiger_currency_info$secmodule on vtiger_currency_info$secmodule.id = vtiger_maintenance.currency_id";
		}
		if ($queryPlanner->requireTable("vtiger_inventoryproductrelMaintenance", $matrix)){
		}
		if ($queryPlanner->requireTable("vtiger_productsMaintenance")){
			$query .= " left join vtiger_products as vtiger_productsMaintenance on vtiger_productsMaintenance.productid = vtiger_inventoryproductreltmpMaintenance.productid";
		}
		if ($queryPlanner->requireTable("vtiger_serviceMaintenance")){
			$query .= " left join vtiger_service as vtiger_serviceMaintenance on vtiger_serviceMaintenance.serviceid = vtiger_inventoryproductreltmpMaintenance.productid";
		}
		if ($queryPlanner->requireTable("vtiger_usersMaintenance")){
			$query .= " left join vtiger_users as vtiger_usersMaintenance on vtiger_usersMaintenance.id = vtiger_crmentityMaintenance.smownerid";
		}
		if ($queryPlanner->requireTable("vtiger_groupsMaintenance")){
			$query .= " left join vtiger_groups as vtiger_groupsMaintenance on vtiger_groupsMaintenance.groupid = vtiger_crmentityMaintenance.smownerid";
		}
		if ($queryPlanner->requireTable("vtiger_vendorRelMaintenance")){
			$query .= " left join vtiger_vendor as vtiger_vendorRelMaintenance on vtiger_vendorRelMaintenance.vendorid = vtiger_maintenance.vendorid";
		}
		if ($queryPlanner->requireTable("vtiger_contactdetailsMaintenance")){
			$query .= " left join vtiger_contactdetails as vtiger_contactdetailsMaintenance on vtiger_contactdetailsMaintenance.contactid = vtiger_maintenance.contactid";
		}
		if ($queryPlanner->requireTable("vtiger_lastModifiedByMaintenance")){
			$query .= " left join vtiger_users as vtiger_lastModifiedByMaintenance on vtiger_lastModifiedByMaintenance.id = vtiger_crmentityMaintenance.modifiedby ";
		}
		if ($queryPlanner->requireTable("vtiger_createdbyMaintenance")){
			$query .= " left join vtiger_users as vtiger_createdbyMaintenance on vtiger_createdbyMaintenance.id = vtiger_crmentityMaintenance.smcreatorid ";
		}

		//if secondary modules custom reference field is selected
		$query .= parent::getReportsUiType10Query($secmodule, $queryPlanner);

		return $query;
	}

	/*
	 * Function to get the relation tables for related modules
	 * @param - $secmodule secondary module name
	 * returns the array with table names and fieldnames storing relations between module and this module
	 */
	function setRelationTables($secmodule){
		$rel_tables = array (
			"SalesOrder" =>array("vtiger_salesorder"=>array("maintenaceid","salesorderid"),"vtiger_maintenance"=>"maintenaceid"),
			"Calendar" =>array("vtiger_seactivityrel"=>array("crmid","activityid"),"vtiger_maintenance"=>"maintenanceid"),
			"Documents" => array("vtiger_senotesrel"=>array("crmid","notesid"),"vtiger_maintenance"=>"maintenanceid"),
			"Contacts" => array("vtiger_maintenance"=>array("maintenanceid","contactid")),
			
		);
		return $rel_tables[$secmodule];
	}

	// Function to unlink an entity with given Id from another entity
	function unlinkRelationship($id, $return_module, $return_id) {
		global $log;
		if(empty($return_module) || empty($return_id)) return;

		if($return_module == 'Vendors') {
			$sql_req ='UPDATE vtiger_crmentity SET deleted = 1 WHERE crmid= ?';
			$this->db->pquery($sql_req, array($id));
		} elseif($return_module == 'Contacts') {
			$sql_req ='UPDATE vtiger_maintenance SET contactid=? WHERE maintenanceid = ?';
			$this->db->pquery($sql_req, array(null, $id));
		} elseif($return_module == 'Documents') {
			$sql = 'DELETE FROM vtiger_senotesrel WHERE crmid=? AND notesid=?';
			$this->db->pquery($sql, array($id, $return_id));
		} elseif($return_module == 'Accounts') {
			$sql ='UPDATE vtiger_maintenance SET accountid=? WHERE maintenanceid=?';
			$this->db->pquery($sql, array(null, $id));
		} else {
			parent::unlinkRelationship($id, $return_module, $return_id);
		}
	}

	/*
	 * Function to get the relations of salesorder to invoice for recurring invoice procedure
	 * @param - $salesorder_id Salesorder ID
	 */
	function createRecurringInvoiceFromSO(){
		global $adb;
		$salesorder_id = $this->_salesorderid;
		$query1 = "SELECT * FROM vtiger_inventoryproductrel WHERE id=?";
		$res = $adb->pquery($query1, array($salesorder_id));
		$no_of_products = $adb->num_rows($res);
		$fieldsList = $adb->getFieldsArray($res);
		$update_stock = array();
		for($j=0; $j<$no_of_products; $j++) {
			$row = $adb->query_result_rowdata($res, $j);
			$col_value = array();
			for($k=0; $k<php7_count($fieldsList); $k++) {
				if($fieldsList[$k]!='lineitem_id'){
					$col_value[$fieldsList[$k]] = $row[$fieldsList[$k]];
				}
			}
			if(php7_count($col_value) > 0) {
				$col_value['id'] = $this->id;
				$columns = array_keys($col_value);
				$values = array_values($col_value);
				$query2 = "INSERT INTO vtiger_inventoryproductrel(". implode(",",$columns) .") VALUES (". generateQuestionMarks($values) .")";
				$adb->pquery($query2, array($values));
				$prod_id = $col_value['productid'];
				$qty = $col_value['quantity'];
				$update_stock[$col_value['sequence_no']] = $qty;
				updateStk($prod_id,$qty,'',array(),'Invoice');
			}
		}

		$query1 = "SELECT * FROM vtiger_inventorysubproductrel WHERE id=?";
		$res = $adb->pquery($query1, array($salesorder_id));
		$no_of_products = $adb->num_rows($res);
		$fieldsList = $adb->getFieldsArray($res);
		for($j=0; $j<$no_of_products; $j++) {
			$row = $adb->query_result_rowdata($res, $j);
			$col_value = array();
			for($k=0; $k<php7_count($fieldsList); $k++) {
				$col_value[$fieldsList[$k]] = $row[$fieldsList[$k]];
			}
			if(php7_count($col_value) > 0) {
				$col_value['id'] = $this->id;
				$columns = array_keys($col_value);
				$values = array_values($col_value);
				$query2 = "INSERT INTO vtiger_inventorysubproductrel(". implode(",",$columns) .") VALUES (". generateQuestionMarks($values) .")";
				$adb->pquery($query2, array($values));
				$prod_id = $col_value['productid'];
				$qty = $update_stock[$col_value['sequence_no']];
				updateStk($prod_id,$qty,'',array(),'Invoice');
			}
		}

		//Adding charge values
		$adb->pquery('DELETE FROM vtiger_inventorychargesrel WHERE recordid = ?', array($this->id));
		$adb->pquery('INSERT INTO vtiger_inventorychargesrel SELECT ?, charges FROM vtiger_inventorychargesrel WHERE recordid = ?', array($this->id, $salesorder_id));

		//Update the netprice (subtotal), taxtype, discount, S&H charge, adjustment and total for the Invoice
		$updatequery  = " UPDATE vtiger_invoice SET ";
		$updateparams = array();
		// Remaining column values to be updated -> column name to field name mapping
		$invoice_column_field = Array (
			'adjustment' => 'txtAdjustment',
			'subtotal' => 'hdnSubTotal',
			'total' => 'hdnGrandTotal',
			'taxtype' => 'hdnTaxType',
			'discount_percent' => 'hdnDiscountPercent',
			'discount_amount' => 'hdnDiscountAmount',
			's_h_amount' => 'hdnS_H_Amount',
			'region_id' => 'region_id',
			's_h_percent' => 'hdnS_H_Percent',
			'balance' => 'hdnGrandTotal'
		);
		$updatecols = array();
		foreach($invoice_column_field as $col => $field) {
			$updatecols[] = "$col=?";
			$updateparams[] = $this->column_fields[$field];
		}
		if (php7_count($updatecols) > 0) {
			$updatequery .= implode(",", $updatecols);
			$updatequery .= " WHERE invoiceid=?";
			array_push($updateparams, $this->id);
			$adb->pquery($updatequery, $updateparams);
		}
	}

	function insertIntoEntityTable($table_name, $module, $fileid = '')  {
		//Ignore relation table insertions while saving of the record
		if($table_name == 'vtiger_inventoryproductrel') {
			return;
		}
		parent::insertIntoEntityTable($table_name, $module, $fileid);
	}

	/*Function to create records in current module.
	**This function called while importing records to this module*/
	function createRecords($obj) {
		$createRecords = createRecords($obj);
		return $createRecords;
	}

	/*Function returns the record information which means whether the record is imported or not
	**This function called while importing records to this module*/
	function importRecord($obj, $inventoryFieldData, $lineItemDetails) {
		$entityInfo = importRecord($obj, $inventoryFieldData, $lineItemDetails);
		return $entityInfo;
	}

	/*Function to return the status count of imported records in current module.
	**This function called while importing records to this module*/
	function getImportStatusCount($obj) {
		$statusCount = getImportStatusCount($obj);
		return $statusCount;
	}

	function undoLastImport($obj, $user) {
		$undoLastImport = undoLastImport($obj, $user);
	}

	/** Function to export the lead records in CSV Format
	* @param reference variable - where condition is passed when the query is executed
	* Returns Export Maintenance Query.
	*/
	function create_export_query($where)
	{
		global $log;
		global $current_user;
		$log->debug("Entering create_export_query(".$where.") method ...");

		include("include/utils/ExportUtils.php");

		//To get the Permitted fields query and the permitted fields list
		$sql = getPermittedFieldsQuery("Maintenance", "detail_view");
		$fields_list = getFieldsListFromQuery($sql);
		$fields_list .= getInventoryFieldsForExport($this->table_name);
		$userNameSql = getSqlForNameInDisplayFormat(array('first_name'=>'vtiger_users.first_name', 'last_name' => 'vtiger_users.last_name'), 'Users');

		$query = "SELECT $fields_list FROM ".$this->entity_table."
		INNER JOIN vtiger_maintenance ON vtiger_maintenance.maintenanceid = vtiger_crmentity.crmid
		LEFT JOIN vtiger_maintenancecf ON vtiger_maintenancecf.maintenanceid = vtiger_maintenance.maintenanceid
		LEFT JOIN vtiger_mpobillads ON vtiger_mpobillads.mpobilladdressid = vtiger_maintenance.maintenanceid
		LEFT JOIN vtiger_mposhipads ON vtiger_mposhipads.mposhipaddressid = vtiger_maintenance.maintenanceid
		LEFT JOIN vtiger_inventoryproductrel ON vtiger_inventoryproductrel.id = vtiger_maintenance.maintenanceid
		LEFT JOIN vtiger_products ON vtiger_products.productid = vtiger_inventoryproductrel.productid
		LEFT JOIN vtiger_service ON vtiger_service.serviceid = vtiger_inventoryproductrel.productid
		LEFT JOIN vtiger_contactdetails ON vtiger_contactdetails.contactid = vtiger_maintenance.contactid
		LEFT JOIN vtiger_vendor ON vtiger_vendor.vendorid = vtiger_maintenance.vendorid
		LEFT JOIN vtiger_currency_info ON vtiger_currency_info.id = vtiger_maintenance.currency_id
		LEFT JOIN vtiger_groups ON vtiger_groups.groupid = vtiger_crmentity.smownerid
		LEFT JOIN vtiger_users ON vtiger_users.id = vtiger_crmentity.smownerid";

		$query .= $this->getNonAdminAccessControlQuery('Maintenance',$current_user);
		$where_auto = " vtiger_crmentity.deleted=0";

		if($where != "") {
			$query .= " where ($where) AND ".$where_auto;
		} else {
			$query .= " where ".$where_auto;
		}

		$log->debug("Exiting create_export_query method ...");
		return $query;
	}

	/**
	 * Function to get importable mandatory fields
	 * By default some fields like Quantity, List Price is not mandaroty for Invertory modules but
	 * import fails if those fields are not mapped during import.
	 */
	function getMandatoryImportableFields() {
		return getInventoryImportableMandatoryFeilds($this->moduleName);
	}
}

?>