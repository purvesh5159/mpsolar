<?php
/***********************************************************************************************
** The contents of this file are subject to the Vtiger Module-Builder License Version 1.3
 * ( "License" ); You may not use this file except in compliance with the License
 * The Original Code is:  Technokrafts Labs Pvt Ltd
 * The Initial Developer of the Original Code is Technokrafts Labs Pvt Ltd.
 * Portions created by Technokrafts Labs Pvt Ltd are Copyright ( C ) Technokrafts Labs Pvt Ltd.
 * All Rights Reserved.
**
*************************************************************************************************/

include_once 'modules/Vtiger/CRMEntity.php';

class Payment extends Vtiger_CRMEntity {


	var $table_name = 'vtiger_payments';
	var $table_index= 'paymentid';

	/**
	 * Mandatory table for supporting custom fields.
	 */
	var $customFieldTable = Array('vtiger_paymentcf', 'paymentid');

	/**
	 * Mandatory for Saving, Include tables related to this module.
	 */
	var $tab_name = Array('vtiger_crmentity','vtiger_payments','vtiger_paymentcf', 'vtiger_inventoryproductrel');
	
	/**
	 * Other Related Tables
	 */
	var $related_tables = Array( 
		'vtiger_paymentcf' => Array('paymentid')
	);

	/**
	 * Mandatory for Saving, Include tablename and tablekey columnname here.
	 */
	var $tab_name_index = Array(
		'vtiger_crmentity'=>'crmid',
		'vtiger_payments'=>'paymentid',
		'vtiger_paymentcf'=>'paymentid',
		'vtiger_inventoryproductrel'=>'id'
	);

	/**
	 * Mandatory for Listing (Related listview)
	 */
	var $list_fields = Array (
		/* Format: Field Label => Array(tablename, columnname) */
		// tablename should not have prefix 'vtiger_'
		'Payment No' => Array('payments', 'paymentno'),
		/*'Payment No'=> Array('payment', 'paymentno'),*/
		'Assigned To' => Array('crmentity','smownerid')
	);
	var $list_fields_name = Array (
		/* Format: Field Label => fieldname */
		'Payment No' => 'paymentno',
		/*'Payment No'=> 'paymentno',*/
		'Assigned To' => 'assigned_user_id'
	);

	// Make the field link to detail view
	var $list_link_field = 'paymentno';

	// For Popup listview and UI type support
	var $search_fields = Array(
		/* Format: Field Label => Array(tablename, columnname) */
		// tablename should not have prefix 'vtiger_'
		'Payment No' => Array('payments', 'paymentno'),
		/*'Payment No'=> Array('payment', 'paymentno'),*/
		'Assigned To' => Array('vtiger_crmentity','assigned_user_id'),
	);
	var $search_fields_name = Array (
		/* Format: Field Label => fieldname */
		'Payment No' => 'paymentno',
		/*'Payment No'=> 'paymentno',*/
		'Assigned To' => 'assigned_user_id',
	);

	// For Popup window record selection
	var $popup_fields = Array ('paymentno');

	// For Alphabetical search
	var $def_basicsearch_col = 'paymentno';

	// Column value to use on detail view record text display
	var $def_detailview_recname = 'paymentno';

	// Used when enabling/disabling the mandatory fields for the module.
	// Refers to vtiger_field.fieldname values.
	var $mandatory_fields = Array('paymentno','assigned_user_id');

	var $default_order_by = 'paymentno';
	var $default_sort_order='ASC';

	/**
	* Invoked when special actions are performed on the module.
	* @param String Module name
	* @param String Event Type
	*/
	function vtlib_handler($moduleName, $eventType) {
		global $adb;
		if($eventType == 'module.postinstall') {
			// TODO Handle actions after this module is installed.
			Payment::checkWebServiceEntry();
			Payment::createUserFieldTable($moduleName);
			Payment::addInTabMenu($moduleName);
		} else if($eventType == 'module.disabled') {
			// TODO Handle actions before this module is being uninstalled.
		} else if($eventType == 'module.preuninstall') {
			// TODO Handle actions when this module is about to be deleted.
		} else if($eventType == 'module.preupdate') {
			// TODO Handle actions before this module is updated.
		} else if($eventType == 'module.postupdate') {
			// TODO Handle actions after this module is updated.
			Payment::checkWebServiceEntry();
		}
	}

 	/**	Constructor which will set the column_fields in this object
	 */
 	function __construct() {
 		$this->log =Logger::getLogger('Payment');
 		$this->log->debug("Entering Payment() method ...");
 		$this->db = PearDatabase::getInstance();
 		$this->column_fields = getColumnFields('payment');
 		$this->log->debug("Exiting Payment method ...");
 	}   
 	function Payment() {
 		self::__construct();
 	}

	/*
	 * Function to handle module specific operations when saving a entity
	 */
	function save_module($module)
	{
		global $adb;
		$q = 'SELECT '.$this->def_detailview_recname.' FROM '.$this->table_name. ' WHERE ' . $this->table_index. ' = '.$this->id;
		
		$result =  $adb->pquery($q,array());
		$cnt = $adb->num_rows($result);
		if($cnt > 0) 
		{
			$label = $adb->query_result($result,0,$this->def_detailview_recname);
			$q1 = 'UPDATE vtiger_crmentity SET label = \''.$label.'\' WHERE crmid = '.$this->id;
			$adb->pquery($q1,array());
		}

		$current_user = Users_Record_Model::getCurrentUserModel();
		$currencyId = $current_user->column_fields["currency_id"];
		$currencyResult = $adb->pquery('SELECT currency_code, conversion_rate FROM '
			. 'vtiger_currency_info WHERE id=?', [$currencyId]);
		$dataaa = $adb->fetchByAssoc($currencyResult);
		$conversionRate = $dataaa['conversion_rate'];
		$invoiceId = $_REQUEST['invoice_id'];
		$soId = $_REQUEST['salesorder_id'];

		if(!empty($invoiceId)){
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
				$totalInvoiceAmount = $totalValueSum + $totalValue;
			}

			$getTotalSql = 'SELECT SUM(paymentamount) as paid FROM `vtiger_payments` '
			. ' INNER JOIN vtiger_crmentity '
			. 'ON vtiger_crmentity.crmid = vtiger_payments.paymentid'
			. ' where invoiceid = ? and deleted = ?';
			$sql = $adb->pquery($getTotalSql, array($invoiceId, 0));
			$totalPaid = $adb->query_result($sql, 0, 'paid');
			$invoiceBalance = $totalInvoiceAmount - $totalPaid;
			$updateQuery = "update `vtiger_invoice` set received=? ,balance=? where invoiceid= ?";
			$result = $adb->pquery($updateQuery, array($totalPaid, $invoiceBalance, $invoiceId));
		}

		if (!empty($soId)) {
				$result = $adb->pquery('SELECT total, conversion_rate, currency_id'
					. ' FROM vtiger_salesorder INNER JOIN vtiger_crmentity '
					. ' ON vtiger_crmentity.crmid = vtiger_salesorder.salesorderid '
					. ' WHERE salesorderid = ? AND vtiger_crmentity.deleted=0', [$soId]);
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
					$totalSOAmount = $totalValueSum + $totalValue;
				}

				$getTotalSql = 'SELECT SUM(paymentamount) as paid FROM `vtiger_payments` '
				. ' INNER JOIN vtiger_crmentity ON '
				. 'vtiger_crmentity.crmid = vtiger_payments.paymentid'
				. ' where salesorderid = ? and deleted = ?';
				$sql = $adb->pquery($getTotalSql, array($soId, 0));
				$totalPaid = $adb->query_result($sql, 0, 'paid');
				$soBalance = $totalSOAmount - $totalPaid;
				$updateQuery = "update `vtiger_salesorder` set received=? ,balance=? where salesorderid=?";
				$result = $adb->pquery($updateQuery, array($totalPaid, $soBalance, $soId));
			}

		}

	/**
	 * Function to check if entry exsist in webservices if not then enter the entry
	 */
	static function checkWebServiceEntry() {
		global $log;
		$log->debug("Entering checkWebServiceEntry() method....");
		global $adb;

		$sql       =  "SELECT count(id) AS cnt FROM vtiger_ws_entity WHERE name = 'Payment'";
		$result   	= $adb->query($sql);
		if($adb->num_rows($result) > 0)
		{
			$no = $adb->query_result($result, 0, 'cnt');
			if($no == 0)
			{
				$tabid = $adb->getUniqueID("vtiger_ws_entity");
				$ws_entitySql = "INSERT INTO vtiger_ws_entity ( id, name, handler_path, handler_class, ismodule ) VALUES".
				" (?, 'Payment','include/Webservices/VtigerModuleOperation.php', 'VtigerModuleOperation' , 1)";
				$res = $adb->pquery($ws_entitySql, array($tabid));
				$log->debug("Entered Record in vtiger WS entity ");	
			}
		}
		$log->debug("Exiting checkWebServiceEntry() method....");					
	}
	
	static function createUserFieldTable($module)
	{
		global $log;
		$log->debug("Entering createUserFieldTable() method....");
		global $adb;
		
		$sql	=	"CREATE TABLE IF NOT EXISTS `vtiger_".$module."_user_field` (
		`recordid` int(19) NOT NULL,
		`userid` int(19) NOT NULL,
		`starred` varchar(100) DEFAULT NULL,
		KEY `record_user_idx` (`recordid`,`userid`)
		) 			
		ENGINE=InnoDB DEFAULT CHARSET=utf8";
		$result	=	$adb->pquery($sql,array());					
	}
	
	static function addInTabMenu($module)
	{
		global $log;
		$log->debug("Entering addInTabMenu() method....");
		global $adb;
		$gettabid	=	$adb->pquery("SELECT tabid,parent FROM vtiger_tab WHERE name = ?",array($module));
		$tabid		=	$adb->query_result($gettabid,0,'tabid');
		$parent		=	$adb->query_result($gettabid,0,'parent');
		$parent		=	strtoupper($parent);
		
		$getmaxseq	=	$adb->pquery("SELECT max(sequence)+ 1 as maxseq FROM vtiger_app2tab WHERE appname = ?",array($parent));
		$sequence	=	$adb->query_result($getmaxseq,0,'maxseq');
		
		$sql		=	"INSERT INTO `vtiger_app2tab` (`tabid` ,`appname` ,`sequence` ,`visible`)VALUES (?, ?, ?, ?)";
		$result		=	$adb->pquery($sql,array($tabid,$parent,$sequence,1));		
	}
	
}