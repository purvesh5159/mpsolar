<?php
/* Smarty version 3.1.39, created on 2024-02-20 05:33:06
  from 'D:\wamp\www\mpsolar\layouts\v7\modules\Vtiger\DetailViewFullContents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65d439920f6331_19285421',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c63b7aca2408ae3380d616c9cd01285c32892e2c' => 
    array (
      0 => 'D:\\wamp\\www\\mpsolar\\layouts\\v7\\modules\\Vtiger\\DetailViewFullContents.tpl',
      1 => 1706510637,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65d439920f6331_19285421 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form id="detailView" method="POST"><?php $_smarty_tpl->_subTemplateRender(vtemplate_path('DetailViewBlockView.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value,'MODULE_NAME'=>$_smarty_tpl->tpl_vars['MODULE_NAME']->value), 0, true);
?></form>
<?php }
}
