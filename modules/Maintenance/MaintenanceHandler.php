<?php

/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */
include_once 'include/Webservices/Revise.php';
include_once 'include/Webservices/Retrieve.php';

class MaintenanceHandler extends VTEventHandler {

    function handleEvent($eventName, $entityData) {

        $moduleName = $entityData->getModuleName();


        // Validate the event target
        if ($moduleName != 'Maintenance') {
            return;
        }

        //Get Current User Information
        global $current_user, $currentModule;

        /**
         * Adjust the balance amount against total & paid amount
         * NOTE: beforesave the total amount will not be populated in event data.
         */
        if ($eventName == 'vtiger.entity.aftersave') {
            if ($currentModule != 'Maintenance')
                return;
            $entityDelta = new VTEntityDelta();
            $oldCurrency = $entityDelta->getOldValue($entityData->getModuleName(), $entityData->getId(), 'currency_id');
            $oldConversionRate = $entityDelta->getOldValue($entityData->getModuleName(), $entityData->getId(), 'conversion_rate');
            $newCurrency = $entityDelta->getCurrentValue($entityData->getModuleName(), $entityData->getId(), 'currency_id');
            $db = PearDatabase::getInstance();
            $wsid = vtws_getWebserviceEntityId('Maintenance', $entityData->getId());
            $wsrecord = vtws_retrieve($wsid,$current_user);
            if ($oldCurrency != $newCurrency && $oldCurrency != '') {
                if($oldConversionRate != ''){
                    $wsrecord['paid'] = floatval(((float)$wsrecord['paid']/$oldConversionRate) * (float)$wsrecord['conversion_rate']);
                } 
            }
            $wsrecord['balance'] = floatval((float)$wsrecord['hdnGrandTotal'] - (float)$wsrecord['paid']);
            if ($wsrecord['balance'] == 0)
                $wsrecord['postatus'] = 'Received Shipment';
            $query = "UPDATE vtiger_maintenance SET balance=?,paid=? WHERE maintenanceid=?";
            $db->pquery($query, array($wsrecord['balance'], $wsrecord['paid'], $entityData->getId()));
            // TODO Make it available for other event handlers
        }
    }

}

?>
