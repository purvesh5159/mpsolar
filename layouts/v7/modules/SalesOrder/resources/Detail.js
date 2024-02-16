/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

Inventory_Detail_Js("SalesOrder_Detail_Js",{},{

    hideandshowinstallerblock: function() {
       var thisInstance = this;
       var status = jQuery('#SalesOrder_detailView_fieldValue_sostatus span span').text();
       status = jQuery.trim(status);
       console.log(status);

      if(status != 'Created') {
           jQuery('[data-block="Installer Details"]').show();
      }  
      else {
        jQuery('[data-block="Installer Details"]').hide();    
      }   
  },

  hideandshowinstallerfields: function() {
        var status = jQuery('#SalesOrder_detailView_fieldValue_installerinvoicestatus span span').text();
       status = jQuery.trim(status);
       console.log(status);
        if(status == 'Paid') {
               jQuery("#SalesOrder_detailView_fieldLabel_installerinvoiceno").removeClass('hide');
                jQuery("#SalesOrder_detailView_fieldLabel_installerinvoiceamount").removeClass('hide');
            }
            else
            {
                jQuery("#SalesOrder_detailView_fieldLabel_installerinvoiceno").addClass('hide');
                jQuery("#SalesOrder_detailView_fieldLabel_installerinvoiceamount").addClass('hide');   
            }
    },

  registerBasicEvents: function(container){
    this._super(container);
    this.hideandshowinstallerblock();
    this.hideandshowinstallerfields();
},

});