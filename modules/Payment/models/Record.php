<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

/**
 * Inventory Record Model Class
 */
class Payment_Record_Model extends Inventory_Record_Model {

	function getCreateInvoiceUrl() {
		$invoiceModuleModel = Vtiger_Module_Model::getInstance('Invoice');

		return "index.php?module=".$invoiceModuleModel->getName()."&view=".$invoiceModuleModel->getEditViewName()."&Payment_id=".$this->getId();
	}
        
        function getCreatePurchaseOrderUrl() {
	    $purchaseOrderModuleModel = Vtiger_Module_Model::getInstance('PurchaseOrder');
	    return "index.php?module=".$purchaseOrderModuleModel->getName()."&view=".$purchaseOrderModuleModel->getEditViewName()."&Payment_id=".$this->getId();
	}

}