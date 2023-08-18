<?php
/* Smarty version 3.1.39, created on 2023-08-11 06:21:21
  from 'D:\wamp\www\mpsolar\layouts\v7\modules\ModuleBuilder\RelatedList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_64d5d361e53a84_73670836',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ddeff2815f6982201fc2559269d76d1ea11e9a8e' => 
    array (
      0 => 'D:\\wamp\\www\\mpsolar\\layouts\\v7\\modules\\ModuleBuilder\\RelatedList.tpl',
      1 => 1687423360,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64d5d361e53a84_73670836 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="relatedTabModulesList"><?php $_smarty_tpl->_assignInScope('MODULE', 'ModuleBuilder');?><table class="table table-bordered blockContainer showInlineTable relatedlists"><tr><th class="module-title">&nbsp;</th><th class="module-title"><?php echo vtranslate('MODULE_NAME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th><th class="module-title"><?php echo vtranslate('SELECT_ACTION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;&nbsp;<i class="icon-info-sign alignMiddle" data-container="body" data-toggle="popover" data-placement="bottom" data-content="<?php echo vtranslate('LBL_SELECT_INFO',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></i></th><th class="module-title"><?php echo vtranslate('ADD_ACTION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;&nbsp;<i class="icon-info-sign alignMiddle" data-container="body" data-toggle="popover" data-placement="bottom" data-content="<?php echo vtranslate('LBL_ADD_INFO',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></i></th></tr><input type="hidden" name="tks_related_mod_cnt" value="<?php echo $_smarty_tpl->tpl_vars['RELATED_LIST_COUNT']->value;?>
"  /><?php $_smarty_tpl->_assignInScope('i', 0);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RELATED_LIST']->value, 'v', false, 'k');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
$_smarty_tpl->_assignInScope('moduletks', getTranslatedString($_smarty_tpl->tpl_vars['k']->value,'$MODULE'));?><tr class="relblock"><td><input type="checkbox" tabindex="" value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" class="relcheck" name="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"/></td><td><?php echo $_smarty_tpl->tpl_vars['moduletks']->value;
if ($_smarty_tpl->tpl_vars['k']->value == 'Leads') {?>&nbsp;&nbsp;<i class="icon-info-sign alignMiddle" data-container="body" data-toggle="popover" data-placement="bottom" data-content="<?php echo vtranslate('LBL_LEAD_WARNING',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></i><?php }?></td><td><input type="checkbox" tabindex="" name="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_sel" disabled="disabled" class="small relsel"></td><td><input type="checkbox" tabindex="" name="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_add"  disabled="disabled" class="small reladd"></td></tr><?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></table><!--class="table table-bordered blockContainer showInlineTable relatedlists"--></div><!--class="relatedTabModulesList"--><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><?php }
}
