<?php
/* Smarty version 3.1.39, created on 2024-01-25 05:35:03
  from 'D:\wamp\www\mpsolar\layouts\v7\modules\Payment\OverlayEditView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65b1f307a75365_73787163',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'effa0419f6c4d3f6097b38b863701fd078deb23c' => 
    array (
      0 => 'D:\\wamp\\www\\mpsolar\\layouts\\v7\\modules\\Payment\\OverlayEditView.tpl',
      1 => 1669872319,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65b1f307a75365_73787163 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(vtemplate_path('OverlayEditView.tpl','Inventory'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SCRIPTS']->value, 'jsModel', false, 'index');
$_smarty_tpl->tpl_vars['jsModel']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['jsModel']->value) {
$_smarty_tpl->tpl_vars['jsModel']->do_else = false;
?>
    <?php echo '<script'; ?>
 type="<?php echo $_smarty_tpl->tpl_vars['jsModel']->value->getType();?>
" src="<?php echo $_smarty_tpl->tpl_vars['jsModel']->value->getSrc();?>
"><?php echo '</script'; ?>
>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
