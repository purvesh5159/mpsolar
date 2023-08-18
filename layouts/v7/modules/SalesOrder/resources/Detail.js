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

       if(status == 'Approved') {
          jQuery('.block_Installer').removeClass('hide');  
      }  
      else {
        jQuery('.block_Installer').addClass('hide');     
      }   
  },

  registerBasicEvents: function(container){
    this._super(container);
    this.hideandshowinstallerblock();
},

});