<?php
/* Smarty version 3.1.39, created on 2024-01-31 05:10:20
  from 'D:\wamp\www\mpsolar\layouts\v7\modules\ITS4YouProjectsChart\ProjectListButton.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65b9d63c044c19_93159796',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51a5ac2624acbb61cf6edf8fc258dcde191000ca' => 
    array (
      0 => 'D:\\wamp\\www\\mpsolar\\layouts\\v7\\modules\\ITS4YouProjectsChart\\ProjectListButton.tpl',
      1 => 1692190918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65b9d63c044c19_93159796 (Smarty_Internal_Template $_smarty_tpl) {
?><button id="Project_listView_basicAction_Projects_List" type="button" class="btn btn-default module-buttons" data-url="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getListViewUrl();?>
"><div class="fa fa-align-justify" aria-hidden="true"></div>&nbsp;&nbsp;<?php echo vtranslate('List View',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</button><?php }
}
