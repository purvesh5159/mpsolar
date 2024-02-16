<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Inventory_RelationListView_Model extends Vtiger_RelationListView_Model {

	public function getCreateViewUrl(){
		$createViewUrl = parent::getCreateViewUrl();
		$currentUserModel				= Users_Record_Model::getCurrentUserModel();
		$parentRecordModel				= $this->getParentRecordModel();
		$parentModule                   = $parentRecordModel->getModule();
		$parentmodule                   = $parentModule->get('name');
		$relationModel                  = $this->getRelationModel();
		$relatedModel                   = $relationModel->getRelationModuleModel();
		$relatedmodule                  = $relatedModel->get('name');
		$currencyValue					= $parentRecordModel->get('hdnGrandTotal');
		$parentRecordModelCurrencyId	= $parentRecordModel->get('currency_id');

		if($parentRecordModelCurrencyId == $currentUserModel->get('currency_id')) {
			$amount = CurrencyField::convertToUserFormat($currencyValue, null, true);
		} else {
			$baseCurrencyId = CurrencyField::getDBCurrencyId();
			$allCurrencies = getAllCurrencies();

			foreach ($allCurrencies as $currencyInfo) {
				if ($parentRecordModelCurrencyId == $currencyInfo['currency_id']) {
					$currencyValue = CurrencyField::convertToDollar($currencyValue, $currencyInfo['conversionrate']);
				}
			}

			foreach ($allCurrencies as $currencyInfo) {
				if ($baseCurrencyId == $currencyInfo['currency_id']) {
					$currencyValue = CurrencyField::convertFromMasterCurrency($currencyValue, $currencyInfo['conversionrate']);
				}
			}

			$amount = CurrencyField::convertToUserFormat($currencyValue);
		}
		$accountId = ($parentRecordModel->getModuleName() == 'PurchaseOrder') ? $parentRecordModel->get('accountid') : $parentRecordModel->get('account_id');

		//auto fill payment fields from Invoice module
		
		if($parentmodule=='Invoice' && $relatedmodule=='Payment')
		{

			// print_r($parentRecordModel);
			// exit();
			$cid = $parentRecordModel->get('contact_id');
			$iid = $parentRecordModel->getId();
			$sid = $parentRecordModel->get('salesorder_id');
			//$date=date("d-m-Y");
			$bs = $parentRecordModel->get('bill_street');
			$bc = $parentRecordModel->get('bill_city');	
			$bss = $parentRecordModel->get('bill_state');
			$bcc = $parentRecordModel->get('bill_code');

			 $createViewUrl = $relatedModel->getCreateRecordUrl().'&sourceModule='.$parentModule->get('name').
			 '&sourceRecord='.$parentRecordModel->getId().'&relationOperation=true&contact_id='.$cid.'&invoice_id='.$iid.'&bill_street='.$bs.'&bill_city='.$bc.'&bill_state='.$bss.'&bill_code='.$bcc.'&salesorder_id='.$sid;
		}
		else{
			return $createViewUrl.'&relatedcontact='.$parentRecordModel->get('contact_id').'&relatedorganization='. $accountId.'&amount='.$amount;
		}
		return $createViewUrl;

		
	}

}
?>
