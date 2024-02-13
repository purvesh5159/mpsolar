<?php
require_once("modules/com_vtiger_workflow/include.inc");
require_once("modules/com_vtiger_workflow/tasks/VTEntityMethodTask.inc");
require_once("modules/com_vtiger_workflow/VTEntityMethodManager.inc");
require_once("include/database/PearDatabase.php");
$adb = PearDatabase::getInstance();
$emm = new VTEntityMethodManager($adb);
require_once 'vtlib/Vtiger/Module.php';
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Leads');
$blockInstance = Vtiger_Block::getInstance('LBL_LEAD_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('followupdate', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'followupdate';
        $fieldInstance->label = 'Next FollowUp Date';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'followupdate';
        $fieldInstance->uitype = 5;
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'D~O';
        $fieldInstance->columntype = 'DATE';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
    } else {
        echo "field is already Present --- followupdate in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_LEAD_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Leads');
$blockInstance = Vtiger_Block::getInstance('LBL_ADDRESS_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('location', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'location';
        $fieldInstance->label = 'Location';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'location';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array('Metro', 'Regional', 'Other'));
    } else {
        echo "field is already Present --- location in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Contacts');
$blockInstance = Vtiger_Block::getInstance('LBL_CONTACT_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('docstatus', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'docstatus';
        $field->column = 'docstatus';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Doc Status';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Contacts');
$blockInstance = Vtiger_Block::getInstance('LBL_ADDRESS_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('location', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'location';
        $fieldInstance->label = 'Location';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'location';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array('Metro', 'Regional', 'Other'));
    } else {
        echo "field is already Present --- location in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('saletype', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'saletype';
        $fieldInstance->label = 'Sale Type';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'saletype';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array('New', 'Add On', 'Replacement'));
    } else {
        echo "field is already Present --- location in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

//add blocks
 // $mymodule = vtiger_module::getinstance('Quotes');
 // $myblock = new vtiger_block();
 // $myblock->label = 'Full System Design';
 // $mymodule ->addblock($myblock);

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('existingsystemdetails', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'existingsystemdetails';
        $field->column = 'existingsystemdetails';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Existing System Details';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('housetype', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'housetype';
        $fieldInstance->label = 'House Type';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'housetype';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array('Single Storey', 'Double Storey', 'Ground', 'Multi Storey', 'Other'));
    } else {
        echo "field is already Present --- location in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('rooftype', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'rooftype';
        $fieldInstance->label = 'Roof Type';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'rooftype';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array("concrete roof","Tile Roof","Colourbond Tin Roof","Tin flat roof","Ground Mount","Tin Cliplock Roof","Tin + Tile"));
    } else {
        echo "field is already Present --- location in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('meterphase', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'meterphase';
        $fieldInstance->label = 'Meter Phase';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'meterphase';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array("1","2","3"));
    } else {
        echo "field is already Present --- location in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('roofangle', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'roofangle';
        $fieldInstance->label = 'Roof Angle';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'roofangle';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array("0-5","6-15","16-30","31-45","45+"));
    } else {
        echo "field is already Present --- location in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('dnsp', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'dnsp';
        $field->column = 'dnsp';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'DNSP';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('retailer', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'retailer';
        $field->column = 'retailer';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Retailer';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('nmi', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'nmi';
        $field->column = 'nmi';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'NMI#';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}
$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('isoffpick', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'isoffpick';
        $field->column = 'isoffpick';
        $field->table = $moduleInstance->basetable;
        $field->label = 'Is Off Pick';
        $field->uitype = 56;
        $field->columntype = 'INT(1) DEFAULT 0';
        $field->typeofdata = 'I~O';
        $field->displaytype = 1;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('offpeakmeterno', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'offpeakmeterno';
        $field->column = 'offpeakmeterno';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Off Peak Meter No#';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('modeofpayment', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'modeofpayment';
        $field->column = 'modeofpayment';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Mode Of Payment';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~M';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('peakmeterno', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'peakmeterno';
        $field->column = 'peakmeterno';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Peak Meter No#';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('docreceived', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'docreceived';
        $fieldInstance->label = 'Documents Received';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'docreceived';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array("Yes","No"));
    } else {
        echo "field is already Present --- location in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('imagename', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'imagename';
        $field->column = 'imagename';
        $field->uitype = 69;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Upload Image';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(150)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- imagename in ServiceReports --- <br>";
    }
} else {
    echo "Block Does not exits -- Equipment Details in ServiceReports -- <br>";
}


$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('LBL_CUSTOM_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('depositeduedate', $moduleInstance);
    if (!$fieldInstance) {
       $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'depositeduedate';
        $fieldInstance->label = 'Deposite Due Date';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'depositeduedate';
        $fieldInstance->uitype = 5;
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'D~O';
        $fieldInstance->columntype = 'DATE';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
    } else {
        echo "field is present -- imagename in ServiceReports --- <br>";
    }
} else {
    echo "Block Does not exits -- Equipment Details in ServiceReports -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('LBL_CUSTOM_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('deposite', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'deposite';
        $field->column = 'deposite';
        $field->uitype = 72;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Deposite (Inc. GST)';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('LBL_CUSTOM_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('balanceduedate', $moduleInstance);
    if (!$fieldInstance) {
       $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'balanceduedate';
        $fieldInstance->label = 'Balance Due Date';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'balanceduedate';
        $fieldInstance->uitype = 5;
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'D~O';
        $fieldInstance->columntype = 'DATE';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
    } else {
        echo "field is present -- imagename in ServiceReports --- <br>";
    }
} else {
    echo "Block Does not exits -- Equipment Details in ServiceReports -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('LBL_CUSTOM_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('balance', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'balance';
        $field->column = 'balance';
        $field->uitype = 72;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Balance (Inc. GST)';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('LBL_CUSTOM_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('targetduedate', $moduleInstance);
    if (!$fieldInstance) {
       $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'targetduedate';
        $fieldInstance->label = 'Target Due Date';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'targetduedate';
        $fieldInstance->uitype = 5;
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'D~O';
        $fieldInstance->columntype = 'DATE';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
    } else {
        echo "field is present -- imagename in ServiceReports --- <br>";
    }
} else {
    echo "Block Does not exits -- Equipment Details in ServiceReports -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('LBL_CUSTOM_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('stcincentive', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'stcincentive';
        $field->column = 'stcincentive';
        $field->uitype = 72;
        $field->table = $moduleInstance->basetable;
        $field->label = 'STC Incentive';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('housetype', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'housetype';
        $fieldInstance->label = 'House Type';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'housetype';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array('Single Storey', 'Double Storey', 'Ground', 'Multi Storey', 'Other'));
    } else {
        echo "field is already Present --- location in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('rooftype', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'rooftype';
        $fieldInstance->label = 'Roof Type';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'rooftype';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array("concrete roof","Tile Roof","Colourbond Tin Roof","Tin flat roof","Ground Mount","Tin Cliplock Roof","Tin + Tile"));
    } else {
        echo "field is already Present --- location in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('meterphase', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'meterphase';
        $fieldInstance->label = 'Meter Phase';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'meterphase';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array("1","2","3"));
    } else {
        echo "field is already Present --- location in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('roofangle', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'roofangle';
        $fieldInstance->label = 'Roof Angle';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'roofangle';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array("0-5","6-15","16-30","31-45","45+"));
    } else {
        echo "field is already Present --- location in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('dnsp', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'dnsp';
        $field->column = 'dnsp';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'DNSP';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('meterapproval', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'meterapproval';
        $field->column = 'meterapproval';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Meter Approval (DNSP)';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('retailer', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'retailer';
        $field->column = 'retailer';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Retailer';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('afterinstallapp', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'afterinstallapp';
        $field->column = 'afterinstallapp';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'After Installation Application';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('nmi', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'nmi';
        $field->column = 'nmi';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'NMI#';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('LBL_ADDRESS_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('meterorderno', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'meterorderno';
        $field->column = 'meterorderno';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Material Order no';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('LBL_ADDRESS_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('isoffpick', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'isoffpick';
        $field->column = 'isoffpick';
        $field->table = $moduleInstance->basetable;
        $field->label = 'Is Off Pick';
        $field->uitype = 56;
        $field->columntype = 'INT(1) DEFAULT 0';
        $field->typeofdata = 'I~O';
        $field->displaytype = 1;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('LBL_ADDRESS_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('noofstc', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'noofstc';
        $field->column = 'noofstc';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'No OF STC';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('LBL_ADDRESS_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('offpeakmeterno', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'offpeakmeterno';
        $field->column = 'offpeakmeterno';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Off Peak meter No';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}
$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('LBL_ADDRESS_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('peakmeterno', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'peakmeterno';
        $field->column = 'peakmeterno';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Peak Meter No';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}
$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('LBL_ADDRESS_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('meterapprovalno', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'meterapprovalno';
        $field->column = 'meterapprovalno';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Meter Approval No';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('LBL_CUSTOM_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('stcincentive', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'stcincentive';
        $field->column = 'stcincentive';
        $field->uitype = 72;
        $field->table = $moduleInstance->basetable;
        $field->label = 'STC Incentive';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Invoice');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('housetype', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'housetype';
        $fieldInstance->label = 'House Type';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'housetype';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array('Single Storey', 'Double Storey', 'Ground', 'Multi Storey', 'Other'));
    } else {
        echo "field is already Present --- location in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Invoice');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('rooftype', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'rooftype';
        $fieldInstance->label = 'Roof Type';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'rooftype';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array("concrete roof","Tile Roof","Colourbond Tin Roof","Tin flat roof","Ground Mount","Tin Cliplock Roof","Tin + Tile"));
    } else {
        echo "field is already Present --- location in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Invoice');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('meterphase', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'meterphase';
        $fieldInstance->label = 'Meter Phase';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'meterphase';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array("1","2","3"));
    } else {
        echo "field is already Present --- location in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Invoice');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('roofangle', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'roofangle';
        $fieldInstance->label = 'Roof Angle';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'roofangle';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array("0-5","6-15","16-30","31-45","45+"));
    } else {
        echo "field is already Present --- location in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Invoice');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('dnsp', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'dnsp';
        $field->column = 'dnsp';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'DNSP';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Invoice');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('meterinstallation', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'meterinstallation';
        $field->column = 'meterinstallation';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Meter Installation';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Invoice');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('retailer', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'retailer';
        $field->column = 'retailer';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Retailer';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Invoice');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('nmi', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'nmi';
        $field->column = 'nmi';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'NMI#';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Invoice');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('isoffpick', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'isoffpick';
        $field->column = 'isoffpick';
        $field->table = $moduleInstance->basetable;
        $field->label = 'Is Off Pick';
        $field->uitype = 56;
        $field->columntype = 'INT(1) DEFAULT 0';
        $field->typeofdata = 'I~O';
        $field->displaytype = 1;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Invoice');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('noofstc', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'noofstc';
        $field->column = 'noofstc';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'No OF STC';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Invoice');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('offpeakmeterno', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'offpeakmeterno';
        $field->column = 'offpeakmeterno';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Off Peak meter No';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}
$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Invoice');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('peakmeterno', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'peakmeterno';
        $field->column = 'peakmeterno';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Peak Meter No';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Invoice');
$blockInstance = Vtiger_Block::getInstance('LBL_CUSTOM_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('stcincentive', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'stcincentive';
        $field->column = 'stcincentive';
        $field->uitype = 72;
        $field->table = $moduleInstance->basetable;
        $field->label = 'STC Incentive';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Invoice');
$blockInstance = Vtiger_Block::getInstance('LBL_CUSTOM_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('stcreceived', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'stcreceived';
        $field->column = 'stcreceived';
        $field->uitype = 72;
        $field->table = $moduleInstance->basetable;
        $field->label = 'STC Received';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Products');
$blockInstance = Vtiger_Block::getInstance('LBL_PRODUCT_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('inventer', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'inventer';
        $fieldInstance->label = 'inventer';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'Inventer';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array("Solis","Solax","Fronius Primo","ABB","Fronius Symo","SMA","Growatt","Goodwee","Sungrow","Huawei","GE"));
    } else {
        echo "field is already Present --- location in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Products');
$blockInstance = Vtiger_Block::getInstance('LBL_STOCK_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('model', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'model';
        $field->column = 'model';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Model';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}
$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Products');
$blockInstance = Vtiger_Block::getInstance('LBL_STOCK_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('phase', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'phase';
        $field->column = 'phase';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Phase';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Products');
$blockInstance = Vtiger_Block::getInstance('LBL_STOCK_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('size', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'size';
        $field->column = 'size';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Series';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Products');
$blockInstance = Vtiger_Block::getInstance('LBL_STOCK_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('Series', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'Series';
        $field->column = 'Series';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Size';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}
$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Products');
$blockInstance = Vtiger_Block::getInstance('LBL_STOCK_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('mppt', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'mppt';
        $field->column = 'mppt';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'MPPT';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Products');
$blockInstance = Vtiger_Block::getInstance('LBL_CUSTOM_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('stccal', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'stccal';
        $field->column = 'stccal';
        $field->table = $moduleInstance->basetable;
        $field->label = 'Is Considered In STC Calculation';
        $field->uitype = 56;
        $field->columntype = 'INT(1) DEFAULT 0';
        $field->typeofdata = 'I~O';
        $field->displaytype = 1;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Products');
$blockInstance = Vtiger_Block::getInstance('LBL_CUSTOM_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('sizeinwatts', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'sizeinwatts';
        $field->column = 'sizeinwatts';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Size In Watts';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Vendors');
$blockInstance = Vtiger_Block::getInstance('LBL_VENDOR_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('category', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'category';
        $field->column = 'category';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Category';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Vendors');
$blockInstance = Vtiger_Block::getInstance('LBL_VENDOR_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('abn', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'abn';
        $field->column = 'abn';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'ABN';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('LBL_QUOTE_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('quotedate', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'quotedate';
        $fieldInstance->label = 'Quote Date';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'quotedate';
        $fieldInstance->uitype = 5;
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'D~O';
        $fieldInstance->columntype = 'DATE';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
    } else {
        echo "field is already Present --- followupdate in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_LEAD_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('LBL_SO_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('projectdate', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'projectdate';
        $fieldInstance->label = 'Project Date';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'projectdate';
        $fieldInstance->uitype = 5;
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'D~O';
        $fieldInstance->columntype = 'DATE';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
    } else {
        echo "field is already Present --- followupdate in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_LEAD_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Installteam');
$blockInstance = Vtiger_Block::getInstance('System Information', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('accno', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'accno';
        $field->column = 'accno';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Accreditation number';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Installteam');
$blockInstance = Vtiger_Block::getInstance('System Information', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('elelicno', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'elelicno';
        $field->column = 'elelicno';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Electrical license no';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Installteam');
$blockInstance = Vtiger_Block::getInstance('System Information', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('lbllicno', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'lbllicno';
        $field->column = 'lbllicno';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'liability certificate license no';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Installteam');
$blockInstance = Vtiger_Block::getInstance('System Information', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('accnodate', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'accnodate';
        $fieldInstance->label = 'Accreditation number DOE';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'accnodate';
        $fieldInstance->uitype = 5;
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'D~O';
        $fieldInstance->columntype = 'DATE';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
    } else {
        echo "field is already Present --- followupdate in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_LEAD_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Installteam');
$blockInstance = Vtiger_Block::getInstance('System Information', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('elelicdate', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'elelicdate';
        $fieldInstance->label = 'Electrical license no DOE';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'elelicdate';
        $fieldInstance->uitype = 5;
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'D~O';
        $fieldInstance->columntype = 'DATE';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
    } else {
        echo "field is already Present --- followupdate in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_LEAD_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Installteam');
$blockInstance = Vtiger_Block::getInstance('System Information', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('libcertnodate', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'libcertnodate';
        $fieldInstance->label = 'liability certificate number DOE';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'libcertnodate';
        $fieldInstance->uitype = 5;
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'D~O';
        $fieldInstance->columntype = 'DATE';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
    } else {
        echo "field is already Present --- followupdate in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_LEAD_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Installteam');
$blockInstance = Vtiger_Block::getInstance('System Information', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('workins', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'workins';
        $field->column = 'workins';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Workers Insurance';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is already Present --- followupdate in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_LEAD_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Installteam');
$blockInstance = Vtiger_Block::getInstance('System Information', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('workinsdate', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'workinsdate';
        $fieldInstance->label = 'Workers Insurance DOE';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'workinsdate';
        $fieldInstance->uitype = 5;
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'D~O';
        $fieldInstance->columntype = 'DATE';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
    } else {
        echo "field is already Present --- followupdate in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_LEAD_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Installteam');
$blockInstance = Vtiger_Block::getInstance('System Information', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('workheightcert', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'workheightcert';
        $field->column = 'workheightcert';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Work Height Certificate';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is already Present --- followupdate in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_LEAD_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Installteam');
$blockInstance = Vtiger_Block::getInstance('System Information', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('dlno', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'dlno';
        $field->column = 'dlno';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Driving Licence No';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is already Present --- followupdate in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_LEAD_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Installteam');
$blockInstance = Vtiger_Block::getInstance('General Information', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('incompanyname', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'incompanyname';
        $field->column = 'incompanyname';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Installer Company Name';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is already Present --- followupdate in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_LEAD_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('LBL_SO_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('mobileno', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'mobileno';
        $field->column = 'mobileno';
        $field->uitype = 11;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Mobile No';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('LBL_SO_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('email', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'email';
        $field->column = 'email';
        $field->uitype = 13;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Email';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('installer Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('installationdate', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'installationdate';
        $fieldInstance->label = 'Installation Date';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'installationdate';
        $fieldInstance->uitype = 5;
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'D~O';
        $fieldInstance->columntype = 'DATE';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
    } else {
        echo "field is already Present --- followupdate in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_LEAD_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('Installer Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('installername', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'installername';
        $field->column = 'installername';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Installer Name';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is already Present --- followupdate in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_LEAD_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('Installer Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('installationtime', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'installationtime';
        $fieldInstance->label = 'Installation Time';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'installationtime';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array("Morning","Afternoon"));
    } else {
        echo "field is already Present --- location in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

/*$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Payment');
$blockInstance = Vtiger_Block::getInstance('Payment Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('pduedate', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'pduedate';
        $fieldInstance->label = 'Payment Due Date';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'pduedate';
        $fieldInstance->uitype = 5;
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'D~O';
        $fieldInstance->columntype = 'DATE';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
    } else {
        echo "field is already Present --- followupdate in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_LEAD_INFORMATION -- <br>";
}*/
$invoiceModule = null;
$blockInstance = null;
$fieldInstance = null;
$invoiceModule = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('LBL_QUOTE_INFORMATION', $invoiceModule);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('stc', $invoiceModule);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'stc';
        $field->column = 'stc';
        $field->table = $invoiceModule->basetable;
        $field->label = 'STC Incentive';
        $field->uitype = 72;
        $field->columntype = 'DECIMAL(25, 8)';
        $field->typeofdata = 'I~O';
        $field->displaytype = 3;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- stc In Quotes Module --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_QUOTE_INFORMATION in Quotes -- <br>";
}
$invoiceModule = null;
$blockInstance = null;
$fieldInstance = null;

$invoiceModule = null;
$blockInstance = null;
$fieldInstance = null;
$invoiceModule = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('LBL_SO_INFORMATION', $invoiceModule);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('stc', $invoiceModule);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'stc';
        $field->column = 'stc';
        $field->table = $invoiceModule->basetable;
        $field->label = 'STC Incentive';
        $field->uitype = 72;
        $field->columntype = 'DECIMAL(25, 8)';
        $field->typeofdata = 'I~O';
        $field->displaytype = 1;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- stc In SalesOrder Module --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_SO_INFORMATION in SalesOrder -- <br>";
}
$invoiceModule = null;
$blockInstance = null;
$fieldInstance = null;

$invoiceModule = null;
$blockInstance = null;
$fieldInstance = null;
$invoiceModule = Vtiger_Module::getInstance('PurchaseOrder');
$blockInstance = Vtiger_Block::getInstance('LBL_PO_INFORMATION', $invoiceModule);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('stc', $invoiceModule);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'stc';
        $field->column = 'stc';
        $field->table = $invoiceModule->basetable;
        $field->label = 'STC Incentive';
        $field->uitype = 72;
        $field->columntype = 'DECIMAL(25, 8)';
        $field->typeofdata = 'I~O';
        $field->displaytype = 1;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- stc In PurchaseOrder Module --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_PO_INFORMATION in PurchaseOrder -- <br>";
}
$invoiceModule = null;
$blockInstance = null;
$fieldInstance = null;

$invoiceModule = null;
$blockInstance = null;
$fieldInstance = null;
$invoiceModule = Vtiger_Module::getInstance('Invoice');
$blockInstance = Vtiger_Block::getInstance('LBL_INVOICE_INFORMATION', $invoiceModule);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('stc', $invoiceModule);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'stc';
        $field->column = 'stc';
        $field->table = $invoiceModule->basetable;
        $field->label = 'STC Incentive';
        $field->uitype = 72;
        $field->columntype = 'DECIMAL(25, 8)';
        $field->typeofdata = 'I~O';
        $field->displaytype = 1;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- stc In Invoice Module --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_INVOICE_INFORMATION in Invoice -- <br>";
}
$invoiceModule = null;
$blockInstance = null;
$fieldInstance = null;

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('dnsptype', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'dnsptype';
        $fieldInstance->label = 'dnsptype';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'dnsptype';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array( 'Endeavour', 'Ausgrid', 'Essential', 'Energex', 'Ergon', 'SA Power', 'WA Power', 'Horizon'));
    } else {
        echo "field is already Present --- location in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('paymenttype', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'paymenttype';
        $fieldInstance->label = 'Mode of payment';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'paymenttype';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array( 'Cash', 'Finance by brighte', 'Finance by plenti', 'Finance by humm'));
    } else {
        echo "field is already Present --- location in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('retailertype', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'retailertype';
        $fieldInstance->label = 'Retailer';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'retailertype';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array( 'Origin', 'AGL', 'Energy Australia', 'Power shop', 'Dodo', 'Alinta', 'Red energy', 'Synergy', 'Mojo'));
    } else {
        echo "field is already Present --- location in Leads Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('STC Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('sizeinwatts', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'sizeinwatts';
        $field->column = 'sizeinwatts';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Size in Watts';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Quotes');
$blockInstance = Vtiger_Block::getInstance('STC Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('noofstc', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'noofstc';
        $field->column = 'noofstc';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'No of STC';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('modeofpayment', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'modeofpayment';
        $field->column = 'modeofpayment';
        $field->uitype = 16;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Mode of payment';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Invoice');
$blockInstance = Vtiger_Block::getInstance('Other Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('modeofpayment', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'modeofpayment';
        $field->column = 'modeofpayment';
        $field->uitype = 16;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Mode of payment';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- docstatus Contacts --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in Contacts -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('Installer Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('notifyinstaller', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'notifyinstaller';
        $field->column = 'notifyinstaller';
        $field->table = $moduleInstance->basetable;
        $field->label = 'Notify Installer to Collect Products';
        $field->uitype = 56;
        $field->columntype = 'INT(1) DEFAULT 0';
        $field->typeofdata = 'I~O';
        $field->displaytype = 1;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- notifyinstaller salerorder --- <br>";
    }
} else {
    echo "Block Does not exits -- installer Details in SalesOrder -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('Installer Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('installerinvoiceno', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'installerinvoiceno';
        $field->column = 'installerinvoiceno';
        $field->uitype = 2;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Installer Invoice No';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is already Present --- INVOICENO in SalesOrder Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_LEAD_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('Installer Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('installerinvoicestatus', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'installerinvoicestatus';
        $fieldInstance->label = 'Installer Invoice Status';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'installerinvoicestatus';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array("Received","Paid"));
    } else {
        echo "field is already Present --- status in SalesOrder Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_ADDRESS_INFORMATION -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('Gross Profit Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('inventoryamount', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'inventoryamount';
        $field->column = 'inventoryamount';
        $field->uitype = 72;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Inventory Amount';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- inventoryamount SalesOrder --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in SalesOrder -- <br>";
}


$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('Gross Profit Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('installerinvoiceamount', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'installerinvoiceamount';
        $field->column = 'installerinvoiceamount';
        $field->uitype = 72;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Installer Invoice Amount';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- installerinvoiceamount SalesOrder --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in SalesOrder -- <br>";
}


$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('SalesOrder');
$blockInstance = Vtiger_Block::getInstance('Gross Profit Details', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('netprofit', $moduleInstance);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'netprofit';
        $field->column = 'netprofit';
        $field->uitype = 72;
        $field->table = $moduleInstance->basetable;
        $field->label = 'Net Profit Amount';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'V~O';
        $field->columntype = 'VARCHAR(32)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $field->defaultvalue = 0;
        $blockInstance->addField($field);
    } else {
        echo "field is present -- netprofit SalesOrder --- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_CONTACT_INFORMATION in SalesOrder -- <br>";
}

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Documents');
$blockInstance = Vtiger_Block::getInstance('LBL_FILE_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('typeofdoc', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'typeofdoc';
        $fieldInstance->label = 'Type of docreceived';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'typeofdoc';
        $fieldInstance->uitype = '16';
        $fieldInstance->presence = '0';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $fieldInstance->defaultvalue = NULL;
        $blockInstance->addField($fieldInstance);
        $fieldInstance->setPicklistValues(array( 'Sign Contract', 'Panel Layout', 'Electricity Bill', 'Switch Board', 'Photograph' ,'Payment Receipt' , 'Front Of The House Image', 'Roof Photograph'));
    } else {
        echo "field is already Present --- typeofdoc in Documents Module --- <br>";
    }
} else {
    echo " block does not exits --- LBL_FILE_INFORMATION -- <br>";
}