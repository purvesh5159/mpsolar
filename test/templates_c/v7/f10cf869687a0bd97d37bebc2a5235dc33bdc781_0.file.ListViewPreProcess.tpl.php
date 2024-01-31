<?php
/* Smarty version 3.1.39, created on 2024-01-31 05:10:18
  from 'D:\wamp\www\mpsolar\layouts\v7\modules\ITS4YouProjectsChart\ListViewPreProcess.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65b9d63a070016_87175302',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f10cf869687a0bd97d37bebc2a5235dc33bdc781' => 
    array (
      0 => 'D:\\wamp\\www\\mpsolar\\layouts\\v7\\modules\\ITS4YouProjectsChart\\ListViewPreProcess.tpl',
      1 => 1692190918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:modules/Vtiger/partials/Topbar.tpl' => 1,
  ),
),false)) {
function content_65b9d63a070016_87175302 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:modules/Vtiger/partials/Topbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid app-nav">
    <div class="row">
        <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("partials/SidebarHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('SELECTED_MENU_CATEGORY'=>$_smarty_tpl->tpl_vars['SOURCE_MODULE_MENU_PARENT']->value), 0, true);
?>
        <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("ModuleHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    </div>
</div>
</nav>
<div id='overlayPageContent' class='fade modal overlayPageContent content-area overlay-container-60' tabindex='-1' role='dialog' aria-hidden='true'>
    <div class="data">
    </div>
    <div class="modal-dialog">
    </div>
</div>
<div class="main-container main-container-<?php echo $_smarty_tpl->tpl_vars['SOURCE_MODULE_NAME']->value;?>
">
    <?php $_smarty_tpl->_assignInScope('LEFTPANELHIDE', $_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('leftpanelhide'));?>
    <div id="modnavigator" class="module-nav">
        <div class="hidden-xs hidden-sm mod-switcher-container">
            <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("partials/Menubar.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        </div>
        <div id="sidebar-essentials" class="sidebar-essentials <?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value == '1') {?> hide <?php }?>">
            <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("partials/SidebarEssentials.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        </div>
    </div>
    <div class="listViewPageDiv content-area-chart" id="kanbanListViewContent">
        <div class="main-container detailViewContainer clearfix" id="taskManagementContainer" style="min-height: 768px">
            <input type="hidden" name="source_module_name" id="source_module_name" value="<?php echo $_smarty_tpl->tpl_vars['SOURCE_MODULE_NAME']->value;?>
">
            <input type="hidden" name="source_field_name" id="source_field_name" value="<?php echo $_smarty_tpl->tpl_vars['SOURCE_MODULE_NAME']->value;?>
">
            <input type="hidden" name="custom_view_id" id="custom_view_id" value="<?php echo $_smarty_tpl->tpl_vars['DEFAULT_CUSTOM_VIEW_ID']->value;?>
">
            <div class="listViewPageDiv content-area <?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value == '1') {?> full-width <?php }?>" id="listViewContent">
                <br>
                <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("QuickFilter.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
