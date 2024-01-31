<?php
/* Smarty version 3.1.39, created on 2024-01-31 05:10:18
  from 'D:\wamp\www\mpsolar\layouts\v7\modules\ITS4YouProjectsChart\QuickFilter.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65b9d63aac4747_81003781',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '134a241cfcacf27281722b1b046d64668a4339e6' => 
    array (
      0 => 'D:\\wamp\\www\\mpsolar\\layouts\\v7\\modules\\ITS4YouProjectsChart\\QuickFilter.tpl',
      1 => 1692190918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65b9d63aac4747_81003781 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="quickFilter"><span><?php echo vtranslate('LBL_QUICK_FILTERS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
:</span><select name="assignedUserFilter" multiple class="select2" id="assignedUserFilter" style="width: 70%; max-width: 400px; min-width: 300px"><optgroup label="<?php echo vtranslate('LBL_USERS');?>
"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SOURCE_ASSIGNED_USERS']->value['users'], 'VALUE');
$_smarty_tpl->tpl_vars['VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['VALUE']->value) {
$_smarty_tpl->tpl_vars['VALUE']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['VALUE']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['VALUE']->value;?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></optgroup><optgroup label="<?php echo vtranslate('LBL_GROUPS');?>
"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SOURCE_ASSIGNED_USERS']->value['groups'], 'VALUE');
$_smarty_tpl->tpl_vars['VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['VALUE']->value) {
$_smarty_tpl->tpl_vars['VALUE']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['VALUE']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['VALUE']->value;?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></optgroup></select>&nbsp;<select name="statusFilter" multiple class="select2" id="statusFilter" style="width: 70%; max-width: 400px; min-width: 300px"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SOURCE_STATUS']->value, 'VALUE');
$_smarty_tpl->tpl_vars['VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['VALUE']->value) {
$_smarty_tpl->tpl_vars['VALUE']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['VALUE']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['VALUE']->value,$_smarty_tpl->tpl_vars['PROJECT_MODULE']->value);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select><div class="pull-right" style="margin-right: 5px;"><span style="margin: 2px;"><button class="btn textual zoomOut" title="zoom out"><span class="teamworkIcon">)</span></button></span><span style="margin: 2px;"><button class="btn textual zoomIn" title="zoom in"><span class="teamworkIcon">(</span></button></span><span style="margin: 2px;"><a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
&view=ExportChart&record=<?php echo $_smarty_tpl->tpl_vars['PARENT_ID']->value;?>
" target="_blank" class="btn reportActions btn-default"><?php echo vtranslate('LBL_REPORT_PRINT','Reports');?>
</a></span></div></div><?php }
}
