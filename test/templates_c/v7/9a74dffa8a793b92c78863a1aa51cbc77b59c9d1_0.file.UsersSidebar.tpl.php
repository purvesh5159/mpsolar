<?php
/* Smarty version 3.1.39, created on 2024-02-16 08:34:06
  from 'D:\wamp\www\mpsolar\layouts\v7\modules\Users\UsersSidebar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65cf1dfe740125_09767192',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a74dffa8a793b92c78863a1aa51cbc77b59c9d1' => 
    array (
      0 => 'D:\\wamp\\www\\mpsolar\\layouts\\v7\\modules\\Users\\UsersSidebar.tpl',
      1 => 1706510637,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65cf1dfe740125_09767192 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('SETTINGS_MENU_LIST', Settings_Vtiger_Module_Model::getSettingsMenuListForNonAdmin());?><div class="settingsgroup"><div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"><div class="settingsgroup-panel panel panel-default"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SETTINGS_MENU_LIST']->value, 'BLOCK_MENUS', false, 'BLOCK_NAME');
$_smarty_tpl->tpl_vars['BLOCK_MENUS']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['BLOCK_NAME']->value => $_smarty_tpl->tpl_vars['BLOCK_MENUS']->value) {
$_smarty_tpl->tpl_vars['BLOCK_MENUS']->do_else = false;
$_smarty_tpl->_assignInScope('NUM_OF_MENU_ITEMS', sizeof($_smarty_tpl->tpl_vars['BLOCK_MENUS']->value));
if ($_smarty_tpl->tpl_vars['NUM_OF_MENU_ITEMS']->value > 0) {?><div id="<?php echo $_smarty_tpl->tpl_vars['BLOCK_NAME']->value;?>
_accordion" class="app-nav" role="tab"><div class="app-settings-accordion"><div class="settingsgroup-accordion"><a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $_smarty_tpl->tpl_vars['BLOCK_NAME']->value;?>
"><i class="fa <?php if ($_smarty_tpl->tpl_vars['ACTIVE_BLOCK']->value['block'] == $_smarty_tpl->tpl_vars['BLOCK_NAME']->value) {?> fa-angle-down <?php } else { ?> fa-angle-right <?php }?>"></i>&nbsp;<span><?php echo vtranslate($_smarty_tpl->tpl_vars['BLOCK_NAME']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span></a></div></div></div><div id="<?php echo $_smarty_tpl->tpl_vars['BLOCK_NAME']->value;?>
" class="panel-collapse collapse <?php if ($_smarty_tpl->tpl_vars['ACTIVE_BLOCK']->value['block'] == $_smarty_tpl->tpl_vars['BLOCK_NAME']->value) {?> in <?php }?>"><ul class="list-group"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BLOCK_MENUS']->value, 'URL', false, 'MENU');
$_smarty_tpl->tpl_vars['URL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['MENU']->value => $_smarty_tpl->tpl_vars['URL']->value) {
$_smarty_tpl->tpl_vars['URL']->do_else = false;
$_smarty_tpl->_assignInScope('MENU_URL', '#');
$_smarty_tpl->_assignInScope('MENU_LABEL', $_smarty_tpl->tpl_vars['MENU']->value);
if ($_smarty_tpl->tpl_vars['MENU']->value == 'My Preferences') {
$_smarty_tpl->_assignInScope('MENU_URL', $_smarty_tpl->tpl_vars['USER_MODEL']->value->getPreferenceDetailViewUrl());
} elseif ($_smarty_tpl->tpl_vars['MENU']->value == 'Calendar Settings') {
$_smarty_tpl->_assignInScope('MENU_URL', $_smarty_tpl->tpl_vars['USER_MODEL']->value->getCalendarSettingsDetailViewUrl());
} elseif ($_smarty_tpl->tpl_vars['MENU']->value === $_smarty_tpl->tpl_vars['URL']->value) {
if ($_smarty_tpl->tpl_vars['SETTINGS_MENU_ITEMS']->value[$_smarty_tpl->tpl_vars['MENU']->value]) {
$_smarty_tpl->_assignInScope('MENU_URL', $_smarty_tpl->tpl_vars['SETTINGS_MENU_ITEMS']->value[$_smarty_tpl->tpl_vars['MENU']->value]->getURL());
}
} elseif (is_string($_smarty_tpl->tpl_vars['URL']->value)) {
$_smarty_tpl->_assignInScope('MENU_URL', $_smarty_tpl->tpl_vars['URL']->value);
}?><li><a href="<?php echo $_smarty_tpl->tpl_vars['MENU_URL']->value;?>
" class="menuItemLabel <?php if ($_smarty_tpl->tpl_vars['ACTIVE_BLOCK']->value['menu'] == $_smarty_tpl->tpl_vars['MENU']->value) {?> settingsgroup-menu-color <?php }?>"><?php echo vtranslate($_smarty_tpl->tpl_vars['MENU_LABEL']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></li><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul></div><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div></div><?php }
}
