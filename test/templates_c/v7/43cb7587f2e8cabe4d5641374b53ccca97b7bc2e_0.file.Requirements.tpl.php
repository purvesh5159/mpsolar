<?php
/* Smarty version 3.1.39, created on 2023-08-16 07:58:25
  from 'D:\wamp\www\mpsolar\layouts\v7\modules\Settings\ITS4YouInstaller\Requirements.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_64dc81a1742821_33730915',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '43cb7587f2e8cabe4d5641374b53ccca97b7bc2e' => 
    array (
      0 => 'D:\\wamp\\www\\mpsolar\\layouts\\v7\\modules\\Settings\\ITS4YouInstaller\\Requirements.tpl',
      1 => 1692172649,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64dc81a1742821_33730915 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="listViewPageDiv detailViewContainer" id="requirementsContents"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "><div id="listview-actions" class="listview-actions-container"><div class="clearfix"><h4 class="pull-left"><b><?php echo vtranslate('LBL_SYSTEM_REQUIREMENTS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b></h4></div><hr><div class="contents"><br><div><h4><?php echo vtranslate('LBL_PHP_REQUIREMENTS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
:</h4><table class="table border1px reqTable"><thead><tr><th></th><th><?php echo vtranslate('LBL_CURRENT_VALUE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_MINIMUM_REQ',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_RECOMMENDED_REQ',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th></tr></thead><tbody><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['REQUIREMENTS']->value->getPHPSettings(), 'DATA', false, 'NAME');
$_smarty_tpl->tpl_vars['DATA']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['NAME']->value => $_smarty_tpl->tpl_vars['DATA']->value) {
$_smarty_tpl->tpl_vars['DATA']->do_else = false;
?><tr class="<?php echo $_smarty_tpl->tpl_vars['DATA']->value['error'];?>
Error <?php echo $_smarty_tpl->tpl_vars['DATA']->value['warning'];?>
Warning"><td><b><?php echo vtranslate($_smarty_tpl->tpl_vars['NAME']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b> <?php if ($_smarty_tpl->tpl_vars['DATA']->value['info']) {?>(<?php echo vtranslate($_smarty_tpl->tpl_vars['DATA']->value['info'],$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
)<?php }?></td><td><?php echo $_smarty_tpl->tpl_vars['DATA']->value['current'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['DATA']->value['minimum'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['DATA']->value['recommended'];?>
</td></tr><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></tbody></table></div><br><div><h4><?php echo vtranslate('LBL_DB_REQUIREMENTS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
:</h4><table class="table border1px reqTable"><thead><tr><th></th><th><?php echo vtranslate('LBL_CURRENT_VALUE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th></th><th></th></tr></thead><tbody><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['REQUIREMENTS']->value->getDBSettings(), 'DATA', false, 'NAME');
$_smarty_tpl->tpl_vars['DATA']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['NAME']->value => $_smarty_tpl->tpl_vars['DATA']->value) {
$_smarty_tpl->tpl_vars['DATA']->do_else = false;
?><tr class="<?php echo $_smarty_tpl->tpl_vars['DATA']->value['error'];?>
Error <?php echo $_smarty_tpl->tpl_vars['DATA']->value['warning'];?>
Warning"><td><b><?php echo vtranslate($_smarty_tpl->tpl_vars['NAME']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b> <?php if ($_smarty_tpl->tpl_vars['DATA']->value['info']) {?>(<?php echo vtranslate($_smarty_tpl->tpl_vars['DATA']->value['info'],$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
)<?php }?></td><td><?php echo $_smarty_tpl->tpl_vars['DATA']->value['current'];?>
</td><td></td><td></td></tr><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></tbody></table></div><br><div><h4><?php echo vtranslate('LBL_FILE_REQUIREMENTS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
:</h4><table class="table border1px reqTable"><thead><tr><th><?php echo vtranslate('LBL_FILE_FOLDER',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_CURRENT_VALUE_WRITABLE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th></tr></thead><tbody><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['REQUIREMENTS']->value->getFilePermissions(), 'DATA', false, 'NAME');
$_smarty_tpl->tpl_vars['DATA']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['NAME']->value => $_smarty_tpl->tpl_vars['DATA']->value) {
$_smarty_tpl->tpl_vars['DATA']->do_else = false;
?><tr class="<?php echo $_smarty_tpl->tpl_vars['DATA']->value['error'];?>
Error <?php echo $_smarty_tpl->tpl_vars['DATA']->value['warning'];?>
Warning"><td><b><?php echo vtranslate($_smarty_tpl->tpl_vars['NAME']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b> <?php if ($_smarty_tpl->tpl_vars['DATA']->value['info']) {?>(<?php echo vtranslate($_smarty_tpl->tpl_vars['DATA']->value['info'],$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
)<?php }?></td><td><?php echo $_smarty_tpl->tpl_vars['DATA']->value['current'];?>
</td><td></td><td></td></tr><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></tbody></table></div><br><div><h4><?php echo vtranslate('LBL_USER_REQUIREMENTS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
:</h4><table class="table border1px reqTable"><thead><tr><th></th><th><?php echo vtranslate('LBL_CURRENT_VALUE_ERROR',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th></th><th></th></tr></thead><tbody><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['REQUIREMENTS']->value->getUserSettings(), 'DATA', false, 'NAME');
$_smarty_tpl->tpl_vars['DATA']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['NAME']->value => $_smarty_tpl->tpl_vars['DATA']->value) {
$_smarty_tpl->tpl_vars['DATA']->do_else = false;
?><tr class="<?php echo $_smarty_tpl->tpl_vars['DATA']->value['error'];?>
Error <?php echo $_smarty_tpl->tpl_vars['DATA']->value['warning'];?>
Warning"><td><b><?php echo vtranslate($_smarty_tpl->tpl_vars['NAME']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b> <?php if ($_smarty_tpl->tpl_vars['DATA']->value['info']) {?>(<?php echo vtranslate($_smarty_tpl->tpl_vars['DATA']->value['info'],$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
)<?php }?></td><td><?php echo $_smarty_tpl->tpl_vars['DATA']->value['current'];?>
</td><td></td><td></td></tr><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></tbody></table></div><br></div></div></div></div>
<?php }
}
