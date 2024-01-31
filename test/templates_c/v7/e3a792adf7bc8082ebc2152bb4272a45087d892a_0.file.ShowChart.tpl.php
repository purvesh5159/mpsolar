<?php
/* Smarty version 3.1.39, created on 2024-01-31 05:10:18
  from 'D:\wamp\www\mpsolar\layouts\v7\modules\ITS4YouProjectsChart\ShowChart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65b9d63af3fe77_55736326',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3a792adf7bc8082ebc2152bb4272a45087d892a' => 
    array (
      0 => 'D:\\wamp\\www\\mpsolar\\layouts\\v7\\modules\\ITS4YouProjectsChart\\ShowChart.tpl',
      1 => 1692190918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65b9d63af3fe77_55736326 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="col-sm-12 col-xs-12 "><?php $_smarty_tpl->_assignInScope('LEFTPANELHIDE', $_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('leftpanelhide'));?><div class="essentials-toggle" title="<?php echo vtranslate('LBL_LEFT_PANEL_SHOW_HIDE','Vtiger');?>
"><span class="essentials-toggle-marker fa <?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value == '1') {?>fa-chevron-right<?php } else { ?>fa-chevron-left<?php }?> cursorPointer"></span></div><style><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PROJECTS']->value['tasks'], 'PROJECT', false, 'INTKEY');
$_smarty_tpl->tpl_vars['PROJECT']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['INTKEY']->value => $_smarty_tpl->tpl_vars['PROJECT']->value) {
$_smarty_tpl->tpl_vars['PROJECT']->do_else = false;
echo ITS4YouProjectsChart_Record_Model::getGanttNumberCss($_smarty_tpl->tpl_vars['PROJECT']->value['project_no'],$_smarty_tpl->tpl_vars['PROJECT']->value['color']);
echo ITS4YouProjectsChart_Record_Model::getGanttSvgNumberCss($_smarty_tpl->tpl_vars['PROJECT']->value['project_no'],$_smarty_tpl->tpl_vars['PROJECT']->value['color']);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></style><div class="datacontent"><?php $_smarty_tpl->_subTemplateRender(vtemplate_path("Datacontent.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></div></div><?php }
}
