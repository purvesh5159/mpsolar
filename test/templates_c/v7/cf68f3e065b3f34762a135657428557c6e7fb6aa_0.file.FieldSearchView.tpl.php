<?php
/* Smarty version 3.1.39, created on 2024-01-30 06:10:27
  from 'D:\wamp\www\mpsolar\layouts\v7\modules\Vtiger\uitypes\FieldSearchView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65b892d36f43e5_51163073',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf68f3e065b3f34762a135657428557c6e7fb6aa' => 
    array (
      0 => 'D:\\wamp\\www\\mpsolar\\layouts\\v7\\modules\\Vtiger\\uitypes\\FieldSearchView.tpl',
      1 => 1669872319,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65b892d36f43e5_51163073 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('FIELD_INFO', Zend_Json::encode($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldInfo()));?><div class=""><input type="text" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('name');?>
" class="listSearchContributor inputElement" value="<?php echo $_smarty_tpl->tpl_vars['SEARCH_INFO']->value['searchValue'];?>
" data-field-type="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldDataType();?>
" data-fieldinfo='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['FIELD_INFO']->value, ENT_QUOTES, 'UTF-8', true);?>
'/></div><?php }
}
