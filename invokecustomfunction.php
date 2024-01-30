<?php
require_once 'include/utils/utils.php';
require 'modules/com_vtiger_workflow/VTEntityMethodManager.inc';
$emm = new VTEntityMethodManager($adb); 

//$emm->addEntityMethod("Module Name","Label", "Path to file" , "Method Name" );
$emm->addEntityMethod("Payment", "PaymentHandler", "modules/Payment/PaymentHandler.php", "PaymentHandler");
exit();
