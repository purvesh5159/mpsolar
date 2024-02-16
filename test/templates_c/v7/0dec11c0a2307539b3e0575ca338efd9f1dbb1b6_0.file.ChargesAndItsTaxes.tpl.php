<?php
/* Smarty version 3.1.39, created on 2024-02-16 06:50:23
  from 'D:\wamp\www\mpsolar\layouts\v7\modules\Settings\Vtiger\ChargesAndItsTaxes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65cf05af18c9c7_82729732',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0dec11c0a2307539b3e0575ca338efd9f1dbb1b6' => 
    array (
      0 => 'D:\\wamp\\www\\mpsolar\\layouts\\v7\\modules\\Settings\\Vtiger\\ChargesAndItsTaxes.tpl',
      1 => 1706510637,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65cf05af18c9c7_82729732 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="chargesContainer"><?php $_smarty_tpl->_assignInScope('WIDTHTYPE', $_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('rowheight'));
$_smarty_tpl->_assignInScope('CREATE_TAX_URL', $_smarty_tpl->tpl_vars['TAX_RECORD_MODEL']->value->getCreateTaxUrl());?><div class="col-lg-6"><div class="marginBottom10px"><button type="button" class="btn btn-default addCharge addButton module-buttons" data-url="<?php echo Inventory_Charges_Model::getCreateChargeUrl();?>
" data-type="1"><i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo vtranslate('LBL_ADD_NEW_CHARGE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></div><table class="table table-bordered inventoryChargesTable"><tr><th class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><strong><?php echo vtranslate('LBL_CHARGE_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></th><th class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><strong><?php echo vtranslate('LBL_VALUE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></th><th class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><strong><?php echo vtranslate('LBL_IS_TAXABLE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></th><th class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
" colspan="2"><strong><?php echo vtranslate('LBL_TAXES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></th></tr><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CHARGE_MODELS_LIST']->value, 'CHARGE_MODEL');
$_smarty_tpl->tpl_vars['CHARGE_MODEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['CHARGE_MODEL']->value) {
$_smarty_tpl->tpl_vars['CHARGE_MODEL']->do_else = false;
?><tr class="opacity" data-charge-id="<?php echo $_smarty_tpl->tpl_vars['CHARGE_MODEL']->value->getId();?>
"><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
" style="border-right:none;border-left:none"><span class="chargeName" style="width:100px;"><?php echo $_smarty_tpl->tpl_vars['CHARGE_MODEL']->value->getName();?>
</span></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
" style="border-right:none;border-left:none"><span class="chargeValue" style="width:105px;"><?php echo $_smarty_tpl->tpl_vars['CHARGE_MODEL']->value->getDisplayValue();?>
</span></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
" style="border-right:none;border-left:none"><span class="chargeIsTaxable"><?php if ($_smarty_tpl->tpl_vars['CHARGE_MODEL']->value->isTaxable()) {
echo vtranslate('LBL_YES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
} else {
echo vtranslate('LBL_NO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
}?></span></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
" style="border-right:none;border-left:none"><span class="chargeTaxes" style="width:100px;"><?php $_smarty_tpl->_assignInScope('TAXES', '');
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CHARGE_MODEL']->value->getSelectedTaxes(), 'TAX_MODEL');
$_smarty_tpl->tpl_vars['TAX_MODEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['TAX_MODEL']->value) {
$_smarty_tpl->tpl_vars['TAX_MODEL']->do_else = false;
$_smarty_tpl->_assignInScope('TAXES', ((string)$_smarty_tpl->tpl_vars['TAXES']->value).", ".((string)$_smarty_tpl->tpl_vars['TAX_MODEL']->value->getName()));
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
echo trim($_smarty_tpl->tpl_vars['TAXES']->value,', ');?>
</span></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
" style="border-right:none;border-left:none"><div class="pull-right actions"><a class="editCharge cursorPointer" data-url="<?php echo $_smarty_tpl->tpl_vars['CHARGE_MODEL']->value->getEditChargeUrl();?>
"><i title="<?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" class="fa fa-pencil alignMiddle"></i></a></div></td></tr><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></table></div><div class="col-lg-6"><div class="marginBottom10px"><button type="button" class="btn btn-default addChargeTax addButton module-buttons" data-url="<?php echo $_smarty_tpl->tpl_vars['CREATE_TAX_URL']->value;?>
" data-type="1"><i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo vtranslate('LBL_ADD_NEW_TAX_FOR_CHARGE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></div><table class="table table-bordered shippingTaxTable"><tr><th class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><strong><?php echo vtranslate('LBL_TAX_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></th><th class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><strong><?php echo vtranslate('LBL_TYPE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></th><th class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><strong><?php echo vtranslate('LBL_CALCULATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></th><th class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><strong><?php echo vtranslate('LBL_TAX_VALUE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></th><th class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
" colspan="2"><strong><?php echo vtranslate('LBL_STATUS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></th></tr><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CHARGE_TAXES']->value, 'CHARGE_TAX_MODEL');
$_smarty_tpl->tpl_vars['CHARGE_TAX_MODEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['CHARGE_TAX_MODEL']->value) {
$_smarty_tpl->tpl_vars['CHARGE_TAX_MODEL']->do_else = false;
?><tr class="opacity" data-taxid="<?php echo $_smarty_tpl->tpl_vars['CHARGE_TAX_MODEL']->value->get('taxid');?>
" data-taxtype="<?php echo $_smarty_tpl->tpl_vars['CHARGE_TAX_MODEL']->value->getType();?>
"><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
" style="border-right:none;border-left:none"><span class="taxLabel" style="width:150px"><?php echo $_smarty_tpl->tpl_vars['CHARGE_TAX_MODEL']->value->getName();?>
</span></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
" style="border-right:none;border-left:none"><span class="taxType"><?php echo $_smarty_tpl->tpl_vars['CHARGE_TAX_MODEL']->value->getTaxType();?>
</span></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
" style="border-right:none;border-left:none"><span class="taxMethod"><?php echo $_smarty_tpl->tpl_vars['CHARGE_TAX_MODEL']->value->getTaxMethod();?>
</span></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
" style="border-right:none;border-left:none"><span class="taxPercentage"><?php echo $_smarty_tpl->tpl_vars['CHARGE_TAX_MODEL']->value->getTax();?>
%</span></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
" style="border-right:none;border-left:none"><input type="checkbox" class="editTaxStatus" <?php if (!$_smarty_tpl->tpl_vars['CHARGE_TAX_MODEL']->value->isDeleted()) {?>checked<?php }?> /></td><td style="border-left:none;border-right:none;" class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><div class="pull-right actions"><a class="editChargeTax cursorPointer" data-url="<?php echo $_smarty_tpl->tpl_vars['CHARGE_TAX_MODEL']->value->getEditTaxUrl();?>
"><i title="<?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" class="fa fa-pencil alignMiddle"></i></a></div></td></tr><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></table></div></div>
<?php }
}
