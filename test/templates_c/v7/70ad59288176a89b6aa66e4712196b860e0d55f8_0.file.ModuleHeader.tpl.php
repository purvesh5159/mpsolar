<?php
/* Smarty version 3.1.39, created on 2024-01-31 05:10:18
  from 'D:\wamp\www\mpsolar\layouts\v7\modules\ITS4YouProjectsChart\ModuleHeader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65b9d63a5426c8_65158619',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70ad59288176a89b6aa66e4712196b860e0d55f8' => 
    array (
      0 => 'D:\\wamp\\www\\mpsolar\\layouts\\v7\\modules\\ITS4YouProjectsChart\\ModuleHeader.tpl',
      1 => 1692190918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65b9d63a5426c8_65158619 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-sm-12 col-xs-12 module-action-bar clearfix coloredBorderTop"><div class="module-action-content clearfix <?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
-module-action-content"><div class="col-lg-7 col-md-7 module-breadcrumb module-breadcrumb-<?php echo $_REQUEST['view'];?>
 transitionsAllHalfSecond"><a title="<?php echo vtranslate($_smarty_tpl->tpl_vars['SOURCE_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['SOURCE_MODULE_NAME']->value);?>
" href='<?php echo $_smarty_tpl->tpl_vars['SOURCE_MODULE_MODEL']->value->getDefaultUrl();?>
&app=<?php echo $_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value;?>
'><h4 class="module-title pull-left text-uppercase"> <?php echo vtranslate($_smarty_tpl->tpl_vars['SOURCE_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['SOURCE_MODULE_NAME']->value);?>
 </h4>&nbsp;&nbsp;</a><p class="current-filter-name filter-name pull-left cursorPointer" title="<?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><span class="fa fa-angle-right pull-left" aria-hidden="true"></span><a href='<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getViewUrl($_smarty_tpl->tpl_vars['SOURCE_MODULE_NAME']->value);?>
'>&nbsp;&nbsp;<?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;&nbsp;</a></p><p class="current-filter-name filter-name pull-left cursorPointer"><span class="fa fa-angle-right pull-left" aria-hidden="true"></span><a href='<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getViewUrl($_smarty_tpl->tpl_vars['SOURCE_MODULE_NAME']->value);?>
'>&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['DEFAULT_CUSTOM_VIEW']->value) {
echo vtranslate($_smarty_tpl->tpl_vars['DEFAULT_CUSTOM_VIEW']->value->get('viewname'),$_smarty_tpl->tpl_vars['SOURCE_MODULE_NAME']->value);
} else {
echo vtranslate('All',$_smarty_tpl->tpl_vars['SOURCE_MODULE_NAME']->value);
}?>&nbsp;&nbsp;</a></p></div><div class="col-lg-5 col-md-5 pull-right"><div id="appnav" class="navbar-right"><ul class="nav navbar-nav"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MODULE_BASIC_ACTIONS']->value, 'BASIC_ACTION');
$_smarty_tpl->tpl_vars['BASIC_ACTION']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['BASIC_ACTION']->value) {
$_smarty_tpl->tpl_vars['BASIC_ACTION']->do_else = false;
if ($_smarty_tpl->tpl_vars['BASIC_ACTION']->value->getLabel() == 'LBL_IMPORT') {?><li><button id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_basicAction_<?php echo Vtiger_Util_Helper::replaceSpaceWithUnderScores($_smarty_tpl->tpl_vars['BASIC_ACTION']->value->getLabel());?>
" type="button"class="btn addButton btn-default module-buttons"<?php if (stripos($_smarty_tpl->tpl_vars['BASIC_ACTION']->value->getUrl(),'javascript:') === 0) {?>onclick='<?php echo substr($_smarty_tpl->tpl_vars['BASIC_ACTION']->value->getUrl(),strlen("javascript:"));?>
'<?php } else { ?>onclick="Vtiger_Import_Js.triggerImportAction('<?php echo $_smarty_tpl->tpl_vars['BASIC_ACTION']->value->getUrl();?>
')"<?php }?>><div class="fa <?php echo $_smarty_tpl->tpl_vars['BASIC_ACTION']->value->getIcon();?>
" aria-hidden="true"></div>&nbsp;&nbsp;<?php echo vtranslate($_smarty_tpl->tpl_vars['BASIC_ACTION']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button></li><?php } else { ?><li><button id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_basicAction_<?php echo Vtiger_Util_Helper::replaceSpaceWithUnderScores($_smarty_tpl->tpl_vars['BASIC_ACTION']->value->getLabel());?>
" type="button"class="btn addButton btn-default module-buttons"<?php if (stripos($_smarty_tpl->tpl_vars['BASIC_ACTION']->value->getUrl(),'javascript:') === 0) {?>onclick='<?php echo substr($_smarty_tpl->tpl_vars['BASIC_ACTION']->value->getUrl(),strlen("javascript:"));?>
'<?php } else { ?>onclick='window.location.href = "<?php echo $_smarty_tpl->tpl_vars['BASIC_ACTION']->value->getUrl();?>
&app=<?php echo $_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value;?>
"'<?php }?>><div class="fa <?php echo $_smarty_tpl->tpl_vars['BASIC_ACTION']->value->getIcon();?>
" aria-hidden="true"></div>&nbsp;&nbsp;<?php echo vtranslate($_smarty_tpl->tpl_vars['BASIC_ACTION']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button></li><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if (count($_smarty_tpl->tpl_vars['MODULE_SETTING_ACTIONS']->value) > 0) {?><li><div class="settingsIcon"><button type="button" class="btn btn-default module-buttons dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="fa fa-wrench" aria-hidden="true" title="<?php echo vtranslate('LBL_SETTINGS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></span>&nbsp;<?php echo vtranslate('LBL_CUSTOMIZE','Reports');?>
&nbsp; <span class="caret"></span></button><ul class="detailViewSetting dropdown-menu"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MODULE_SETTING_ACTIONS']->value, 'SETTING');
$_smarty_tpl->tpl_vars['SETTING']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['SETTING']->value) {
$_smarty_tpl->tpl_vars['SETTING']->do_else = false;
?><li id="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
_listview_advancedAction_<?php echo $_smarty_tpl->tpl_vars['SETTING']->value->getLabel();?>
"><a href=<?php echo $_smarty_tpl->tpl_vars['SETTING']->value->getUrl();?>
><?php echo vtranslate($_smarty_tpl->tpl_vars['SETTING']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value,vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value));?>
</a></li><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul></div></li><?php }?></ul></div></div></div><?php if ($_smarty_tpl->tpl_vars['FIELDS_INFO']->value != null) {
echo '<script'; ?>
 type="text/javascript">var uimeta = (function () {var fieldInfo = <?php echo $_smarty_tpl->tpl_vars['FIELDS_INFO']->value;?>
;return {field: {get: function (name, property) {if (name && property === undefined) {return fieldInfo[name];}if (name && property) {return fieldInfo[name][property]}},isMandatory: function (name) {if (fieldInfo[name]) {return fieldInfo[name].mandatory;}return false;},getType: function (name) {if (fieldInfo[name]) {return fieldInfo[name].type}return false;}},};})();<?php echo '</script'; ?>
><?php }?></div>
<?php }
}
