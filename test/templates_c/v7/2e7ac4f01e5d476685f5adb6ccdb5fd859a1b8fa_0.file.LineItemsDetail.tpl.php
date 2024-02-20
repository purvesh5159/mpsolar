<?php
/* Smarty version 3.1.39, created on 2024-02-20 04:54:58
  from 'D:\wamp\www\mpsolar\layouts\v7\modules\Inventory\LineItemsDetail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65d430a2d374b4_41171352',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2e7ac4f01e5d476685f5adb6ccdb5fd859a1b8fa' => 
    array (
      0 => 'D:\\wamp\\www\\mpsolar\\layouts\\v7\\modules\\Inventory\\LineItemsDetail.tpl',
      1 => 1707888755,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65d430a2d374b4_41171352 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('ITEM_DETAILS_BLOCK', $_smarty_tpl->tpl_vars['BLOCK_LIST']->value['LBL_ITEM_DETAILS']);
$_smarty_tpl->_assignInScope('LINEITEM_FIELDS', $_smarty_tpl->tpl_vars['ITEM_DETAILS_BLOCK']->value->getFields());?>

<?php $_smarty_tpl->_assignInScope('COL_SPAN1', 0);
$_smarty_tpl->_assignInScope('COL_SPAN2', 0);
$_smarty_tpl->_assignInScope('COL_SPAN3', 2);
$_smarty_tpl->_assignInScope('IMAGE_VIEWABLE', false);
$_smarty_tpl->_assignInScope('PRODUCT_VIEWABLE', false);
$_smarty_tpl->_assignInScope('QUANTITY_VIEWABLE', false);
$_smarty_tpl->_assignInScope('PURCHASE_COST_VIEWABLE', false);
$_smarty_tpl->_assignInScope('LIST_PRICE_VIEWABLE', false);
$_smarty_tpl->_assignInScope('MARGIN_VIEWABLE', false);
$_smarty_tpl->_assignInScope('COMMENT_VIEWABLE', false);
$_smarty_tpl->_assignInScope('ITEM_DISCOUNT_AMOUNT_VIEWABLE', false);
$_smarty_tpl->_assignInScope('ITEM_DISCOUNT_PERCENT_VIEWABLE', false);
$_smarty_tpl->_assignInScope('SH_PERCENT_VIEWABLE', false);
$_smarty_tpl->_assignInScope('DISCOUNT_AMOUNT_VIEWABLE', false);
$_smarty_tpl->_assignInScope('DISCOUNT_PERCENT_VIEWABLE', false);?>

<?php if ($_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['image']) {?>
    <?php $_smarty_tpl->_assignInScope('IMAGE_VIEWABLE', $_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['image']->isViewable());
if ($_smarty_tpl->tpl_vars['IMAGE_VIEWABLE']->value) {
$_smarty_tpl->_assignInScope('COL_SPAN1', ($_smarty_tpl->tpl_vars['COL_SPAN1']->value)+1);
}
}
if ($_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['productid']) {?>
    <?php $_smarty_tpl->_assignInScope('PRODUCT_VIEWABLE', $_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['productid']->isViewable());
if ($_smarty_tpl->tpl_vars['PRODUCT_VIEWABLE']->value) {
$_smarty_tpl->_assignInScope('COL_SPAN1', ($_smarty_tpl->tpl_vars['COL_SPAN1']->value)+1);
}
}
if ($_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['quantity']) {?>
    <?php $_smarty_tpl->_assignInScope('QUANTITY_VIEWABLE', $_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['quantity']->isViewable());
if ($_smarty_tpl->tpl_vars['QUANTITY_VIEWABLE']->value) {
$_smarty_tpl->_assignInScope('COL_SPAN1', ($_smarty_tpl->tpl_vars['COL_SPAN1']->value)+1);
}
}
if ($_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['purchase_cost']) {?>
    <?php $_smarty_tpl->_assignInScope('PURCHASE_COST_VIEWABLE', $_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['purchase_cost']->isViewable());
if ($_smarty_tpl->tpl_vars['PURCHASE_COST_VIEWABLE']->value) {
$_smarty_tpl->_assignInScope('COL_SPAN2', ($_smarty_tpl->tpl_vars['COL_SPAN2']->value)+1);
}
}
if ($_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['listprice']) {?>
    <?php $_smarty_tpl->_assignInScope('LIST_PRICE_VIEWABLE', $_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['listprice']->isViewable());
if ($_smarty_tpl->tpl_vars['LIST_PRICE_VIEWABLE']->value) {
$_smarty_tpl->_assignInScope('COL_SPAN2', ($_smarty_tpl->tpl_vars['COL_SPAN2']->value)+1);
}
}
if ($_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['margin']) {?>
    <?php $_smarty_tpl->_assignInScope('MARGIN_VIEWABLE', $_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['margin']->isViewable());
if ($_smarty_tpl->tpl_vars['MARGIN_VIEWABLE']->value) {
$_smarty_tpl->_assignInScope('COL_SPAN3', ($_smarty_tpl->tpl_vars['COL_SPAN3']->value)+1);
}
}
if ($_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['comment']) {?>
    <?php $_smarty_tpl->_assignInScope('COMMENT_VIEWABLE', $_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['comment']->isViewable());
}
if ($_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['discount_amount']) {?>
    <?php $_smarty_tpl->_assignInScope('ITEM_DISCOUNT_AMOUNT_VIEWABLE', $_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['discount_amount']->isViewable());
}
if ($_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['discount_percent']) {?>
    <?php $_smarty_tpl->_assignInScope('ITEM_DISCOUNT_PERCENT_VIEWABLE', $_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['discount_percent']->isViewable());
}
if ($_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['hdnS_H_Percent']) {?>
    <?php $_smarty_tpl->_assignInScope('SH_PERCENT_VIEWABLE', $_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['hdnS_H_Percent']->isViewable());
}
if ($_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['hdnDiscountAmount']) {?>
    <?php $_smarty_tpl->_assignInScope('DISCOUNT_AMOUNT_VIEWABLE', $_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['hdnDiscountAmount']->isViewable());
}
if ($_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['hdnDiscountPercent']) {?>
    <?php $_smarty_tpl->_assignInScope('DISCOUNT_PERCENT_VIEWABLE', $_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['hdnDiscountPercent']->isViewable());
}?>

<input type="hidden" class="isCustomFieldExists" value="false">

<?php $_smarty_tpl->_assignInScope('FINAL_DETAILS', $_smarty_tpl->tpl_vars['RELATED_PRODUCTS']->value[1]['final_details']);?>
<div class="details block">
    <div class="lineItemTableDiv <?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value == 'Payment') {?> hide <?php }?>">
        <table class="table table-bordered lineItemsTable <?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value == 'Payment') {?> hide <?php }?>" style = "margin-top:15px">
        <?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value == 'Payment') {?>
        <!--<thead>
        <th colspan="7" class="detailViewBlockHeader">
        Payment Details
        </th>
        </thead>-->
       <?php } else { ?>
            <thead>
            <th colspan="<?php echo $_smarty_tpl->tpl_vars['COL_SPAN1']->value;?>
" class="lineItemBlockHeader">
                <?php $_smarty_tpl->_assignInScope('REGION_LABEL', vtranslate('LBL_ITEM_DETAILS',$_smarty_tpl->tpl_vars['MODULE_NAME']->value));?>
                <?php if ($_smarty_tpl->tpl_vars['RECORD']->value->get('region_id') && $_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['region_id'] && $_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['region_id']->isViewable()) {?>
                    <?php $_smarty_tpl->_assignInScope('TAX_REGION_MODEL', Inventory_TaxRegion_Model::getRegionModel($_smarty_tpl->tpl_vars['RECORD']->value->get('region_id')));?>
                    <?php if ($_smarty_tpl->tpl_vars['TAX_REGION_MODEL']->value) {?>
                        <?php ob_start();
echo vtranslate($_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['region_id']->get('label'),$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
$_prefixVariable23=ob_get_clean();
$_smarty_tpl->_assignInScope('REGION_LABEL', $_prefixVariable23." : ".((string)$_smarty_tpl->tpl_vars['TAX_REGION_MODEL']->value->getName()));?>
                    <?php }?>
                <?php }?>
                <?php echo $_smarty_tpl->tpl_vars['REGION_LABEL']->value;?>

            </th>
            <th colspan="<?php echo $_smarty_tpl->tpl_vars['COL_SPAN2']->value;?>
" class="lineItemBlockHeader">
                <?php $_smarty_tpl->_assignInScope('CURRENCY_INFO', $_smarty_tpl->tpl_vars['RECORD']->value->getCurrencyInfo());?>
                <?php echo vtranslate('LBL_CURRENCY',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
 : <?php echo vtranslate($_smarty_tpl->tpl_vars['CURRENCY_INFO']->value['currency_name'],$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
(<?php echo $_smarty_tpl->tpl_vars['CURRENCY_INFO']->value['currency_symbol'];?>
)
            </th>
            <th colspan="<?php echo $_smarty_tpl->tpl_vars['COL_SPAN3']->value;?>
" class="lineItemBlockHeader">
                <?php echo vtranslate('LBL_TAX_MODE',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
 : <?php echo vtranslate($_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['taxtype'],$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>

            </th>
            </thead>
            <?php }?>
            <tbody>
            <?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value == 'Payment') {?>   
               <!--  <tr>
                    <td><span class="redColor">*</span><b>Payment Type</b></td>
                    <td><b>Payment no</b></td>
                    <td><b>Bank Name</b></td>
                    <td><b>Payment Date</b></td>
                    <td><b><?php echo vtranslate('LBL_TOTAL',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</b></td>
                </tr>-->
            <?php } else { ?>
                <tr>
                    <?php if ($_smarty_tpl->tpl_vars['IMAGE_VIEWABLE']->value) {?>
                        <td class="lineItemFieldName">
                            <strong><?php ob_start();
echo $_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['image']->get('label');
$_prefixVariable24 = ob_get_clean();
echo vtranslate($_prefixVariable24,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong>
                        </td>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['PRODUCT_VIEWABLE']->value) {?>
                        <td class="lineItemFieldName">
                            <span class="redColor">*</span><strong><?php ob_start();
echo $_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['productid']->get('label');
$_prefixVariable25 = ob_get_clean();
echo vtranslate($_prefixVariable25,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong>
                        </td>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['QUANTITY_VIEWABLE']->value) {?>
                        <td class="lineItemFieldName">
                            <strong><?php ob_start();
echo $_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['quantity']->get('label');
$_prefixVariable26 = ob_get_clean();
echo vtranslate($_prefixVariable26,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong>
                        </td>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value == 'SalesOrder') {?>
                    <td class="lineItemFieldName">
                            <strong><?php ob_start();
echo $_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['assignqty']->get('label');
$_prefixVariable27 = ob_get_clean();
echo vtranslate($_prefixVariable27,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong>
                        </td>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['PURCHASE_COST_VIEWABLE']->value) {?>
                        <td class="lineItemFieldName">
                            <strong><?php ob_start();
echo $_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['purchase_cost']->get('label');
$_prefixVariable28 = ob_get_clean();
echo vtranslate($_prefixVariable28,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong>
                        </td>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['LIST_PRICE_VIEWABLE']->value) {?>
                        <td style="white-space: nowrap;">
                            <strong><?php ob_start();
echo $_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['listprice']->get('label');
$_prefixVariable29 = ob_get_clean();
echo vtranslate($_prefixVariable29,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong>
                        </td>
                    <?php }?>
                    <td class="lineItemFieldName">
                        <strong class="pull-right"><?php echo vtranslate('LBL_TOTAL',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong>
                    </td>
                    <?php if ($_smarty_tpl->tpl_vars['MARGIN_VIEWABLE']->value) {?>
                        <td class="lineItemFieldName">
                            <strong class="pull-right"><?php ob_start();
echo $_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value['margin']->get('label');
$_prefixVariable30 = ob_get_clean();
echo vtranslate($_prefixVariable30,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong>
                        </td>
                    <?php }?>
                    <td class="lineItemFieldName">
                        <strong class="pull-right"><?php echo vtranslate('LBL_NET_PRICE',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong>
                    </td>
                </tr>
            <?php }?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RELATED_PRODUCTS']->value, 'LINE_ITEM_DETAIL', false, 'INDEX');
$_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['INDEX']->value => $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value) {
$_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->do_else = false;
?>
                    <tr>
                    <?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value == 'Payment') {?>
                       <!-- <td>
                        <?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["paymentmode".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>

                        </td>
                         <td>
                        <?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["paymentnumber".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>

                        </td>
                        <td>
                        <?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["bankdetails".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>

                        </td>
                        <td>
                        <?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["paymentdate".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>

                        </td>
                        <td style="white-space: nowrap;">
                                <div>
                                    <?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["listPrice".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>

                                </div>
                        </td>-->
                        <?php } else { ?>
                        <?php if ($_smarty_tpl->tpl_vars['IMAGE_VIEWABLE']->value) {?>
                            <td style="text-align:center;">
                                <img src='<?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["productImage".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>
' height="42" width="42">
                            </td>
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['PRODUCT_VIEWABLE']->value) {?>
                            <td>
                                <div>
                                    <?php if ($_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["productDeleted".((string)$_smarty_tpl->tpl_vars['INDEX']->value)]) {?>
                                        <?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["productName".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>

                                    <?php } else { ?>
                                        <h5><a class="fieldValue" href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["entityType".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>
&view=Detail&record=<?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["hdnProductId".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["productName".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>
</a></h5>
                                        <?php }?>
                                </div>
                                <?php if ($_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["productDeleted".((string)$_smarty_tpl->tpl_vars['INDEX']->value)]) {?>
                                    <div class="redColor deletedItem">
                                        <?php if (empty($_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["productName".((string)$_smarty_tpl->tpl_vars['INDEX']->value)])) {?>
                                            <?php echo vtranslate('LBL_THIS_LINE_ITEM_IS_DELETED_FROM_THE_SYSTEM_PLEASE_REMOVE_THIS_LINE_ITEM',$_smarty_tpl->tpl_vars['MODULE']->value);?>

                                        <?php } else { ?>
                                            <?php echo vtranslate('LBL_THIS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["entityType".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>
 <?php echo vtranslate('LBL_IS_DELETED_FROM_THE_SYSTEM_PLEASE_REMOVE_OR_REPLACE_THIS_ITEM',$_smarty_tpl->tpl_vars['MODULE']->value);?>

                                        <?php }?>
                                    </div>
                                <?php }?>
                                <div>
                                    <?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["subprod_names".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>

                                </div>
                                <?php if ($_smarty_tpl->tpl_vars['COMMENT_VIEWABLE']->value && !empty($_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["productName".((string)$_smarty_tpl->tpl_vars['INDEX']->value)])) {?>
                                    <div>
                                        <?php echo nl2br(decode_html($_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["comment".((string)$_smarty_tpl->tpl_vars['INDEX']->value)]));?>

                                    </div>
                                <?php }?>
                            </td>
                        <?php }?>

                         <?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value == 'Payment') {?>
                            <!--<td>
                            <?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["paymentmode".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>

                            </td>
                             <td>
                            <?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["paymentnumber".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>

                            </td>
                            <td>
                            <?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["bankdetails".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>

                            </td>
                            <td>
                            <?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["paymentdate".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>

                            </td>
                            <td>
                            <?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["listPrice".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>

                            </td> -->  
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['QUANTITY_VIEWABLE']->value) {?>
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["qty".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>

                            </td>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value == 'SalesOrder') {?>
                         <td>
                                <?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["assignqty".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>

                        </td>
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['PURCHASE_COST_VIEWABLE']->value) {?>
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["purchaseCost".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>

                            </td>
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['LIST_PRICE_VIEWABLE']->value) {?>
                            <td style="white-space: nowrap;">
                                <div>
                                    <?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["listPrice".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>

                                </div>
                                <?php if ($_smarty_tpl->tpl_vars['ITEM_DISCOUNT_AMOUNT_VIEWABLE']->value || $_smarty_tpl->tpl_vars['ITEM_DISCOUNT_PERCENT_VIEWABLE']->value) {?>
                                    <div>
                                        <?php ob_start();
if ($_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["discount_type".((string)$_smarty_tpl->tpl_vars['INDEX']->value)] == 'amount') {
echo " ";
echo vtranslate('LBL_DIRECT_AMOUNT_DISCOUNT',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
echo " = ";
echo (string)$_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["discountTotal".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];
echo "
									";
} elseif ($_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["discount_type".((string)$_smarty_tpl->tpl_vars['INDEX']->value)] == 'percentage') {
echo " ";
echo (string)$_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["discount_percent".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];
echo " % ";
echo vtranslate('LBL_OF',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
echo " ";
echo (string)$_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["productTotal".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];
echo " = ";
echo (string)$_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["discountTotal".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];
echo "
									";
}
$_prefixVariable31=ob_get_clean();
$_smarty_tpl->_assignInScope('DISCOUNT_INFO', $_prefixVariable31);?>
                                        (-)&nbsp; <strong><a href="javascript:void(0)" class="individualDiscount inventoryLineItemDetails" tabindex="0" role="tooltip" id ="example" data-toggle="popover" data-trigger="focus" title="<?php echo vtranslate('LBL_DISCOUNT',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
" data-content="<?php echo $_smarty_tpl->tpl_vars['DISCOUNT_INFO']->value;?>
"><?php echo vtranslate('LBL_DISCOUNT',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a> : </strong>
                                    </div>
                                <?php }?>
                                <div>
                                    <strong><?php echo vtranslate('LBL_TOTAL_AFTER_DISCOUNT',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
 :</strong>
                                </div>
                                <?php if ($_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['taxtype'] != 'group') {?>
                                    <div class="individualTaxContainer">
                                        <?php ob_start();
echo vtranslate('LBL_TOTAL_AFTER_DISCOUNT',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
$_prefixVariable32=ob_get_clean();
ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value['taxes'], 'tax_details');
$_smarty_tpl->tpl_vars['tax_details']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tax_details']->value) {
$_smarty_tpl->tpl_vars['tax_details']->do_else = false;
if ($_smarty_tpl->tpl_vars['LINEITEM_FIELDS']->value[((string)$_smarty_tpl->tpl_vars['tax_details']->value['taxname'])]) {
echo (string)$_smarty_tpl->tpl_vars['tax_details']->value['taxlabel'];
echo " : \t";
echo (string)$_smarty_tpl->tpl_vars['tax_details']->value['percentage'];
echo "%  ";
echo vtranslate('LBL_OF',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
echo "  ";
if ($_smarty_tpl->tpl_vars['tax_details']->value['method'] == 'Compound') {
echo "(";
}
echo (string)$_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["totalAfterDiscount".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];
if ($_smarty_tpl->tpl_vars['tax_details']->value['method'] == 'Compound') {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tax_details']->value['compoundon'], 'COMPOUND_TAX_ID');
$_smarty_tpl->tpl_vars['COMPOUND_TAX_ID']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['COMPOUND_TAX_ID']->value) {
$_smarty_tpl->tpl_vars['COMPOUND_TAX_ID']->do_else = false;
if ($_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['taxes'][$_smarty_tpl->tpl_vars['COMPOUND_TAX_ID']->value]['taxlabel']) {
echo " + ";
echo (string)$_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['taxes'][$_smarty_tpl->tpl_vars['COMPOUND_TAX_ID']->value]['taxlabel'];
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
echo ")";
}
echo " = ";
echo (string)$_smarty_tpl->tpl_vars['tax_details']->value['amount'];
echo "<br />";
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable33=ob_get_clean();
ob_start();
echo vtranslate('LBL_TOTAL_TAX_AMOUNT',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
$_prefixVariable34=ob_get_clean();
$_smarty_tpl->_assignInScope('INDIVIDUAL_TAX_INFO', $_prefixVariable32." = ".((string)$_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["totalAfterDiscount".((string)$_smarty_tpl->tpl_vars['INDEX']->value)])."<br /><br />".$_prefixVariable33."<br /><br />".$_prefixVariable34." = ".((string)$_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["taxTotal".((string)$_smarty_tpl->tpl_vars['INDEX']->value)]));?>
                                        (+)&nbsp;<strong><a href="javascript:void(0)" class="individualTax inventoryLineItemDetails" tabindex="0" role="tooltip" id="example" title ="<?php echo vtranslate('LBL_TAX',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
" data-trigger ="focus" data-toggle ="popover" data-content="<?php echo $_smarty_tpl->tpl_vars['INDIVIDUAL_TAX_INFO']->value;?>
"><?php echo vtranslate('LBL_TAX',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
 </a> : </strong>
                                    </div>
                                <?php }?>
                            </td>
                        <?php }?>

                        <td>
                            <div align = "right"><?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["productTotal".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>
</div>
                            <?php if ($_smarty_tpl->tpl_vars['ITEM_DISCOUNT_AMOUNT_VIEWABLE']->value || $_smarty_tpl->tpl_vars['ITEM_DISCOUNT_PERCENT_VIEWABLE']->value) {?>
                                <div align = "right"><?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["discountTotal".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>
</div>           
                            <?php }?>
                            <div align = "right"><?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["totalAfterDiscount".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>
</div>
                            <?php if ($_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['taxtype'] != 'group') {?>
                                <div align = "right"><?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["taxTotal".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>
</div>
                            <?php }?>
                        </td>
                        <?php if ($_smarty_tpl->tpl_vars['MARGIN_VIEWABLE']->value) {?>
                            <td><div align = "right"><?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["margin".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>
</div></td>
							<?php }?>
                        <td>
                            <div align = "right"><?php echo $_smarty_tpl->tpl_vars['LINE_ITEM_DETAIL']->value["netPrice".((string)$_smarty_tpl->tpl_vars['INDEX']->value)];?>
</div>
                        </td>
                        <?php }?>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>
    <table class="table table-bordered lineItemsTable">
    <?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value == 'Payment') {?>
   <!-- <tr>
            <td width="83%">
                <div align="right">
                    <strong><?php echo vtranslate('LBL_GRAND_TOTAL',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong>
                </div>
            </td>
            <td>
                <div align="right">
                    <?php echo $_smarty_tpl->tpl_vars['FINAL_DETAILS']->value["grandTotal"];?>

                </div>
            </td>
        </tr>-->
    <?php } else { ?>
        <tr>
            <td width="83%">
                <div class="pull-right">
                    <strong><?php echo vtranslate('LBL_ITEMS_TOTAL',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong>
                </div>
            </td>
            <td>
                <span class="pull-right">
                    <strong><?php echo $_smarty_tpl->tpl_vars['FINAL_DETAILS']->value["hdnSubTotal"];?>
</strong>
                </span>
            </td>
        </tr>
        <?php if ($_smarty_tpl->tpl_vars['DISCOUNT_AMOUNT_VIEWABLE']->value || $_smarty_tpl->tpl_vars['DISCOUNT_PERCENT_VIEWABLE']->value) {?>
            <tr>
                <td width="83%">
                    <div align="right">
                        <?php ob_start();
echo vtranslate('LBL_FINAL_DISCOUNT_AMOUNT',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
$_prefixVariable35=ob_get_clean();
ob_start();
if ($_smarty_tpl->tpl_vars['DISCOUNT_PERCENT_VIEWABLE']->value && $_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['discount_type_final'] == 'percentage') {
echo " ";
echo (string)$_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['discount_percentage_final'];
echo "	% ";
echo vtranslate('LBL_OF',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
echo " ";
echo (string)$_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['hdnSubTotal'];
echo " = ";
}
$_prefixVariable36=ob_get_clean();
$_smarty_tpl->_assignInScope('FINAL_DISCOUNT_INFO', $_prefixVariable35." = ".$_prefixVariable36.((string)$_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['discountTotal_final']));?>
                        (-)&nbsp;<strong><a class="inventoryLineItemDetails" href="javascript:void(0)" id="finalDiscount" tabindex="0" role="tooltip" data-trigger ="focus" data-placement="left" data-toggle = "popover" title= "<?php echo vtranslate('LBL_OVERALL_DISCOUNT',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
" data-content="<?php echo $_smarty_tpl->tpl_vars['FINAL_DISCOUNT_INFO']->value;?>
"><?php echo vtranslate('LBL_OVERALL_DISCOUNT',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a></strong>
                    </div>
                </td>
                <td>
                    <div align="right">
                        <?php echo $_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['discountTotal_final'];?>

                    </div>

                </td>
            </tr>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['SH_PERCENT_VIEWABLE']->value) {?>
            <tr>
                <td width="83%">
                    <div align="right">
                        <?php ob_start();
echo vtranslate('LBL_TOTAL_AFTER_DISCOUNT',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
$_prefixVariable37=ob_get_clean();
ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SELECTED_CHARGES_AND_ITS_TAXES']->value, 'CHARGE_INFO', false, 'CHARGE_ID');
$_smarty_tpl->tpl_vars['CHARGE_INFO']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['CHARGE_ID']->value => $_smarty_tpl->tpl_vars['CHARGE_INFO']->value) {
$_smarty_tpl->tpl_vars['CHARGE_INFO']->do_else = false;
echo " ";
if ($_smarty_tpl->tpl_vars['CHARGE_INFO']->value['deleted']) {
echo "(";
echo strtoupper(vtranslate('LBL_DELETED',$_smarty_tpl->tpl_vars['MODULE_NAME']->value));
echo ")";
}
echo " ";
echo (string)$_smarty_tpl->tpl_vars['CHARGE_INFO']->value['name'];
echo " ";
if ($_smarty_tpl->tpl_vars['CHARGE_INFO']->value['percent']) {
echo ": ";
echo (string)$_smarty_tpl->tpl_vars['CHARGE_INFO']->value['percent'];
echo "% ";
echo vtranslate('LBL_OF',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
echo " ";
echo (string)$_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['totalAfterDiscount'];
}
echo " = ";
echo (string)$_smarty_tpl->tpl_vars['CHARGE_INFO']->value['amount'];
echo "<br />";
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable38=ob_get_clean();
ob_start();
echo vtranslate('LBL_CHARGES_TOTAL',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
$_prefixVariable39=ob_get_clean();
$_smarty_tpl->_assignInScope('CHARGES_INFO', $_prefixVariable37." = ".((string)$_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['totalAfterDiscount'])."<br /><br />".$_prefixVariable38."<br /><h5>".$_prefixVariable39." = ".((string)$_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['shipping_handling_charge'])."</h5>");?>
                        (+)&nbsp;<strong><a class="inventoryLineItemDetails" tabindex="0" role="tooltip" href="javascript:void(0)" id="example" data-trigger="focus" data-placement ="left"  data-toggle="popover" title=<?php echo vtranslate('LBL_CHARGES',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
 data-content="<?php echo $_smarty_tpl->tpl_vars['CHARGES_INFO']->value;?>
"><?php echo vtranslate('LBL_CHARGES',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a></strong>
                    </div>
                </td>
                <td>
                    <div align="right">
                        <?php echo $_smarty_tpl->tpl_vars['FINAL_DETAILS']->value["shipping_handling_charge"];?>

                    </div>
                </td>
            </tr>
        <?php }?>
         <?php if ($_smarty_tpl->tpl_vars['MODULE']->value == 'Quotes' || $_smarty_tpl->tpl_vars['MODULE']->value == 'SalesOrder' || $_smarty_tpl->tpl_vars['MODULE']->value == 'Maintenance' || $_smarty_tpl->tpl_vars['MODULE']->value == 'Invoice') {?>
        <tr>
        <td width="83%">
            <span class="pull-right">
            <b><?php echo vtranslate('LBL_STC',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</b>
            </span>
        </td>
        <td>
            <span class="pull-right">
            <?php if ($_smarty_tpl->tpl_vars['FINAL_DETAILS']->value["stcincentive"]) {
echo $_smarty_tpl->tpl_vars['FINAL_DETAILS']->value["stcincentive"];
} elseif ($_smarty_tpl->tpl_vars['stc']->value) {
echo abs($_smarty_tpl->tpl_vars['stc']->value);
} else { ?>0<?php }?>
            </span>
        </td>
        </tr>
        <?php }?>
        <tr>
            <td width="83%">
                <div align="right">
                    <strong><?php echo vtranslate('LBL_PRE_TAX_TOTAL',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
 </strong>
                </div>
            </td>
            <td>
                <div align="right">
                    <?php echo $_smarty_tpl->tpl_vars['FINAL_DETAILS']->value["preTaxTotal"];?>

                </div>
            </td>
        </tr>
        <?php if ($_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['taxtype'] == 'group') {?>
            <tr>
                <td width="83%">
                    <div align="right">
                        <?php ob_start();
echo vtranslate('LBL_TOTAL_AFTER_DISCOUNT',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
$_prefixVariable40=ob_get_clean();
ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['taxes'], 'tax_details');
$_smarty_tpl->tpl_vars['tax_details']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tax_details']->value) {
$_smarty_tpl->tpl_vars['tax_details']->do_else = false;
echo (string)$_smarty_tpl->tpl_vars['tax_details']->value['taxlabel'];
echo " : \t";
echo (string)$_smarty_tpl->tpl_vars['tax_details']->value['percentage'];
echo "% ";
echo vtranslate('LBL_OF',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
echo " ";
if ($_smarty_tpl->tpl_vars['tax_details']->value['method'] == 'Compound') {
echo "(";
}
echo (string)$_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['totalAfterDiscount'];
if ($_smarty_tpl->tpl_vars['tax_details']->value['method'] == 'Compound') {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tax_details']->value['compoundon'], 'COMPOUND_TAX_ID');
$_smarty_tpl->tpl_vars['COMPOUND_TAX_ID']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['COMPOUND_TAX_ID']->value) {
$_smarty_tpl->tpl_vars['COMPOUND_TAX_ID']->do_else = false;
if ($_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['taxes'][$_smarty_tpl->tpl_vars['COMPOUND_TAX_ID']->value]['taxlabel']) {
echo " + ";
echo (string)$_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['taxes'][$_smarty_tpl->tpl_vars['COMPOUND_TAX_ID']->value]['taxlabel'];
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
echo ")";
}
echo " = ";
echo (string)$_smarty_tpl->tpl_vars['tax_details']->value['amount'];
echo "<br />";
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable41=ob_get_clean();
ob_start();
echo vtranslate('LBL_TOTAL_TAX_AMOUNT',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
$_prefixVariable42=ob_get_clean();
$_smarty_tpl->_assignInScope('GROUP_TAX_INFO', $_prefixVariable40." = ".((string)$_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['totalAfterDiscount'])."<br /><br />".$_prefixVariable41."<br />".$_prefixVariable42." = ".((string)$_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['tax_totalamount']));?>
                        (+)&nbsp;<strong><a class="inventoryLineItemDetails" tabindex="0" role="tooltip" href="javascript:void(0)" id="finalTax" data-trigger ="focus" data-placement ="left" title = "<?php echo vtranslate('LBL_TAX',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
" data-toggle ="popover" data-content="<?php echo $_smarty_tpl->tpl_vars['GROUP_TAX_INFO']->value;?>
"><?php echo vtranslate('LBL_TAX',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a></strong>
                    </div>
                </td>
                <td>
                    <div align="right">
                        <?php echo $_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['tax_totalamount'];?>

                    </div>
                </td>
            </tr>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['SH_PERCENT_VIEWABLE']->value) {?>
            <tr class="hide">
                <td width="83%">
                    <div align="right">
                        <?php ob_start();
echo vtranslate('LBL_CHARGES_TOTAL',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
$_prefixVariable43=ob_get_clean();
ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SELECTED_CHARGES_AND_ITS_TAXES']->value, 'CHARGE_INFO', false, 'CHARGE_ID');
$_smarty_tpl->tpl_vars['CHARGE_INFO']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['CHARGE_ID']->value => $_smarty_tpl->tpl_vars['CHARGE_INFO']->value) {
$_smarty_tpl->tpl_vars['CHARGE_INFO']->do_else = false;
if ($_smarty_tpl->tpl_vars['CHARGE_INFO']->value['taxes']) {
if ($_smarty_tpl->tpl_vars['CHARGE_INFO']->value['deleted']) {
echo "(";
echo strtoupper(vtranslate('LBL_DELETED',$_smarty_tpl->tpl_vars['MODULE_NAME']->value));
echo ")";
}
echo " ";
echo (string)$_smarty_tpl->tpl_vars['CHARGE_INFO']->value['name'];
echo "<br />";
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CHARGE_INFO']->value['taxes'], 'CHARGE_TAX_INFO');
$_smarty_tpl->tpl_vars['CHARGE_TAX_INFO']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['CHARGE_TAX_INFO']->value) {
$_smarty_tpl->tpl_vars['CHARGE_TAX_INFO']->do_else = false;
echo "&emsp;";
echo (string)$_smarty_tpl->tpl_vars['CHARGE_TAX_INFO']->value['name'];
echo ": &emsp;";
echo (string)$_smarty_tpl->tpl_vars['CHARGE_TAX_INFO']->value['percent'];
echo "% ";
echo vtranslate('LBL_OF',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
echo " ";
if ($_smarty_tpl->tpl_vars['CHARGE_TAX_INFO']->value['method'] == 'Compound') {
echo "(";
}
echo (string)$_smarty_tpl->tpl_vars['CHARGE_INFO']->value['amount'];
echo " ";
if ($_smarty_tpl->tpl_vars['CHARGE_TAX_INFO']->value['method'] == 'Compound') {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CHARGE_TAX_INFO']->value['compoundon'], 'COMPOUND_TAX_ID');
$_smarty_tpl->tpl_vars['COMPOUND_TAX_ID']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['COMPOUND_TAX_ID']->value) {
$_smarty_tpl->tpl_vars['COMPOUND_TAX_ID']->do_else = false;
if ($_smarty_tpl->tpl_vars['CHARGE_INFO']->value['taxes'][$_smarty_tpl->tpl_vars['COMPOUND_TAX_ID']->value]['name']) {
echo " + ";
echo (string)$_smarty_tpl->tpl_vars['CHARGE_INFO']->value['taxes'][$_smarty_tpl->tpl_vars['COMPOUND_TAX_ID']->value]['name'];
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
echo ")";
}
echo " = ";
echo (string)$_smarty_tpl->tpl_vars['CHARGE_TAX_INFO']->value['amount'];
echo "<br />";
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
echo "<br />";
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable44=ob_get_clean();
ob_start();
echo vtranslate('LBL_TOTAL_TAX_AMOUNT',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
$_prefixVariable45=ob_get_clean();
$_smarty_tpl->_assignInScope('CHARGES_TAX_INFO', $_prefixVariable43." = ".((string)$_smarty_tpl->tpl_vars['FINAL_DETAILS']->value["shipping_handling_charge"])."<br /><br />".$_prefixVariable44."\r\n".$_prefixVariable45." = ".((string)$_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['shtax_totalamount']));?>
                        (+)&nbsp;<strong><a class="inventoryLineItemDetails" tabindex="0" role="tooltip" title = "<?php echo vtranslate('LBL_TAXES_ON_CHARGES',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
" data-trigger ="focus" data-placement ="left" data-toggle="popover"  href="javascript:void(0)" id="taxesOnChargesList" data-content="<?php echo $_smarty_tpl->tpl_vars['CHARGES_TAX_INFO']->value;?>
">
                                <?php echo vtranslate('LBL_TAXES_ON_CHARGES',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
 </a></strong>
                    </div>
                </td>
                <td>
                    <div align="right">
                        <?php echo $_smarty_tpl->tpl_vars['FINAL_DETAILS']->value["shtax_totalamount"];?>

                    </div>
                </td>
            </tr>
        <?php }?>
        <tr class="hide">
            <td width="83%">
                <div align="right">
                    <?php ob_start();
echo vtranslate('LBL_TOTAL_AFTER_DISCOUNT',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
$_prefixVariable46=ob_get_clean();
ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['deductTaxes'], 'DEDUCTED_TAX_INFO', false, 'DEDUCTED_TAX_ID');
$_smarty_tpl->tpl_vars['DEDUCTED_TAX_INFO']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['DEDUCTED_TAX_ID']->value => $_smarty_tpl->tpl_vars['DEDUCTED_TAX_INFO']->value) {
$_smarty_tpl->tpl_vars['DEDUCTED_TAX_INFO']->do_else = false;
if ($_smarty_tpl->tpl_vars['DEDUCTED_TAX_INFO']->value['selected'] == true) {
echo (string)$_smarty_tpl->tpl_vars['DEDUCTED_TAX_INFO']->value['taxlabel'];
echo ": \t";
echo (string)$_smarty_tpl->tpl_vars['DEDUCTED_TAX_INFO']->value['percentage'];
echo "%  = ";
echo (string)$_smarty_tpl->tpl_vars['DEDUCTED_TAX_INFO']->value['amount'];
echo "\r\n";
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable47=ob_get_clean();
ob_start();
echo vtranslate('LBL_DEDUCTED_TAXES_TOTAL',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
$_prefixVariable48=ob_get_clean();
$_smarty_tpl->_assignInScope('DEDUCTED_TAXES_INFO', $_prefixVariable46." = ".((string)$_smarty_tpl->tpl_vars['FINAL_DETAILS']->value["totalAfterDiscount"])."<br /><br />".$_prefixVariable47."\r\n\r\n".$_prefixVariable48." = ".((string)$_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['deductTaxesTotalAmount']));?>
                    (-)&nbsp;<strong><a class="inventoryLineItemDetails" tabindex="0" role="tooltip" href="javascript:void(0)" id="deductedTaxesList" data-trigger="focus" data-toggle="popover" title = "<?php echo vtranslate('LBL_DEDUCTED_TAXES',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
" data-placement ="left" data-content="<?php echo $_smarty_tpl->tpl_vars['DEDUCTED_TAXES_INFO']->value;?>
">
                            <?php echo vtranslate('LBL_DEDUCTED_TAXES',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
 </a></strong>
                </div>
            </td>
            <td>
                <div align="right">
                    <?php echo $_smarty_tpl->tpl_vars['FINAL_DETAILS']->value['deductTaxesTotalAmount'];?>

                </div>
            </td>
        </tr>
        <tr>
            <td width="83%">
                <div align="right">
                    <strong><?php echo vtranslate('LBL_ADJUSTMENT',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong>
                </div>
            </td>
            <td>
                <div align="right">
                    <?php echo $_smarty_tpl->tpl_vars['FINAL_DETAILS']->value["adjustment"];?>

                </div>
            </td>
        </tr>
        <tr>
            <td width="83%">
                <div align="right">
                    <strong><?php echo vtranslate('LBL_GRAND_TOTAL',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong>
                </div>
            </td>
            <td>
                <div align="right">
                    <?php echo $_smarty_tpl->tpl_vars['FINAL_DETAILS']->value["grandTotal"];?>

                </div>
            </td>
        </tr>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value == 'Invoice' || $_smarty_tpl->tpl_vars['MODULE_NAME']->value == 'PurchaseOrder' || $_smarty_tpl->tpl_vars['MODULE_NAME']->value == 'SalesOrder') {?>
            <tr>
                <td width="83%">
                    <?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value == 'Invoice' || $_smarty_tpl->tpl_vars['MODULE_NAME']->value == 'SalesOrder') {?>
                        <div align="right">
                            <strong><?php echo vtranslate('LBL_RECEIVED',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong>
                        </div>
                    <?php } else { ?>
                        <div align="right">
                            <strong><?php echo vtranslate('LBL_PAID',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong>
                        </div>
                    <?php }?>
                </td>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value == 'Invoice' || $_smarty_tpl->tpl_vars['MODULE_NAME']->value == 'SalesOrder') {?>
                        <div align="right">
                            <?php if ($_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('received')) {?>
                                <?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('received');?>

                            <?php } else { ?>
                                0
                            <?php }?>
                        </div>
                    <?php } else { ?>
                        <div align="right">
                            <?php if ($_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('paid')) {?>
                                <?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('paid');?>

                            <?php } else { ?>
                                0
                            <?php }?>
                        </div>
                    <?php }?>
                </td>
            </tr>
            <tr>
                <td width="83%">
                    <div align="right">
                        <strong><?php echo vtranslate('LBL_BALANCE',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong>
                    </div>
                </td>
                <td>
                    <div align="right">
                        <?php if ($_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('balance')) {?>
                            <?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('balance');?>

                        <?php } else { ?>0
                        <?php }?>
                    </div>
                </td>
            </tr>
        <?php }?>
    </table>
</div><?php }
}
