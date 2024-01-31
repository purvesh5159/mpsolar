<?php
/* Smarty version 3.1.39, created on 2024-01-31 05:10:18
  from 'D:\wamp\www\mpsolar\layouts\v7\modules\ITS4YouProjectsChart\partials\Menubar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65b9d63a5b3c37_12979955',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5be46577a5204b35ca9f1f308448c4da679ef730' => 
    array (
      0 => 'D:\\wamp\\www\\mpsolar\\layouts\\v7\\modules\\ITS4YouProjectsChart\\partials\\Menubar.tpl',
      1 => 1692190918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65b9d63a5b3c37_12979955 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['MENU_STRUCTURE']->value) {?>
    <?php $_smarty_tpl->_assignInScope('topMenus', $_smarty_tpl->tpl_vars['MENU_STRUCTURE']->value->getTop());?>
    <?php $_smarty_tpl->_assignInScope('moreMenus', $_smarty_tpl->tpl_vars['MENU_STRUCTURE']->value->getMore());?>
    <div id="modules-menu" class="modules-menu">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SOURCE_MODULE_MENU']->value, 'moduleModel', false, 'moduleName');
$_smarty_tpl->tpl_vars['moduleModel']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['moduleName']->value => $_smarty_tpl->tpl_vars['moduleModel']->value) {
$_smarty_tpl->tpl_vars['moduleModel']->do_else = false;
?>
            <?php $_smarty_tpl->_assignInScope('translatedModuleLabel', vtranslate($_smarty_tpl->tpl_vars['moduleModel']->value->get('label'),$_smarty_tpl->tpl_vars['moduleName']->value));?>
            <ul title="<?php echo $_smarty_tpl->tpl_vars['translatedModuleLabel']->value;?>
" class="module-qtip">
                <li <?php if ($_smarty_tpl->tpl_vars['SOURCE_MODULE_NAME']->value == $_smarty_tpl->tpl_vars['moduleName']->value) {?>class="active" <?php } else { ?>class=""<?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getDefaultUrl();?>
&app=<?php echo $_smarty_tpl->tpl_vars['SOURCE_MODULE_MENU_PARENT']->value;?>
" style="border-color: <?php echo $_smarty_tpl->tpl_vars['DEFAULT_COLOR']->value;?>
">
                        <?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getModuleIcon();?>

                        <span><?php echo $_smarty_tpl->tpl_vars['translatedModuleLabel']->value;?>
</span>
                    </a>
                </li>
            </ul>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
<?php }
}
}
