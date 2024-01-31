<?php
/* Smarty version 3.1.39, created on 2024-01-31 05:10:19
  from 'D:\wamp\www\mpsolar\layouts\v7\modules\ITS4YouProjectsChart\Footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65b9d63b13c2d4_52347778',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '956143af415d29aa132c635eebe94b234c31741d' => 
    array (
      0 => 'D:\\wamp\\www\\mpsolar\\layouts\\v7\\modules\\ITS4YouProjectsChart\\Footer.tpl',
      1 => 1692190918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65b9d63b13c2d4_52347778 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="small" style="color: rgb(153, 153, 153);text-align: center;"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo ITS4YouProjectsChart_Version_Helper::$version;?>
 <?php echo vtranslate("COPYRIGHT",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><?php $_smarty_tpl->_subTemplateRender(vtemplate_path("Footer.tpl",'Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
