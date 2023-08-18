<?php
/* Smarty version 3.1.39, created on 2023-08-11 06:11:51
  from 'D:\wamp\www\mpsolar\layouts\v7\modules\ModuleBuilder\ModuleBuilderBlocks.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_64d5d12758e359_24533728',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6276478782d8d4170b061025bfc0792b46c1a0d' => 
    array (
      0 => 'D:\\wamp\\www\\mpsolar\\layouts\\v7\\modules\\ModuleBuilder\\ModuleBuilderBlocks.tpl',
      1 => 1687423360,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64d5d12758e359_24533728 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="main-container clearfix"><div id="modnavigator" class="module-nav editViewModNavigator"><div class="hidden-xs hidden-sm mod-switcher-container"><?php $_smarty_tpl->_subTemplateRender(vtemplate_path("partials/Menubar.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></div></div><div class="editViewPageDiv viewContent"><div class="col-sm-12 col-xs-12 content-area <?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value == '1') {?> full-width <?php }?>"><form class="tks_modulevalidate" name="tks_modulevalidate" id="tks_modulevalidate" novalidate="novalidate" method="post"><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" /><input type="hidden" name="action" value="InitModuleBuilder" /><input type="hidden" name="mode" value="initMB" /><input type="hidden" id="noofblocks" name="noofblocks" value="<?php echo $_smarty_tpl->tpl_vars['NOOFBLOCK']->value;?>
" /><input type="hidden" id="tkssequence" name="tkssequence" value="" /><input type="hidden" id="token" name="token" value="<?php echo $_smarty_tpl->tpl_vars['TOKEN']->value;?>
" /><input type="hidden" id="selectedModuleName" name="selectedModuleName" value="<?php echo $_smarty_tpl->tpl_vars['MODULE_LABEL']->value;?>
" /><div class="editViewHeader"><div class='row'><div class="col-lg-12 col-md-12 col-lg-pull-0"><h4 class="editHeader" style="margin-top:5px;"><?php echo vtranslate('LBL_CREATING_NEW',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4></div></div></div><div class="editViewBody"><div class="editViewContents"><div name="editContent"><div class='fieldBlockContainer'><h4 class='fieldBlockHeader'><?php echo vtranslate('LBL_BASIC_INFORMATION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4><hr><table class="table table-borderless"><tr><td class="fieldLabel alignMiddle"><?php echo vtranslate('MODULE_NAME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<span class="redColor">*</span></td><td class="fieldValue"><input type="text" name="tks_modulename" id="tks_modulename" class="inputElement" data-fieldname="tks_modulename" value="">&nbsp;<a href="#" rel="tooltip" title="" data-original-title="<?php echo vtranslate('LBL_ENTER_MODULENAME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><i class="fa fa-info-circle"></i></a></td><td class="fieldLabel alignMiddle"><?php echo vtranslate('MODULE_LABEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<span class="redColor">*</span></td><td class="fieldValue"><input type="text" name="tks_modulelabel" id="tks_modulelabel" class="inputElement" data-fieldname="tks_modulelabel" value="" data-fieldtype="string" data-rule-required="true">&nbsp;<a href="#" rel="tooltip" title="" data-original-title="<?php echo vtranslate('LBL_ENTER_MODULELABEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><i class="fa fa-info-circle"></i></a></td></tr><tr><td class="fieldLabel alignMiddle"><?php echo vtranslate('PARENT_TAB_NAME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<span class="redColor">*</span></td><td class="fieldValue"><select class="inputElement select2 select2-offscreen" data-fieldtype="picklist" name="tks_parent" id="tks_parent" ><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['TKS_PARENT_MODULE']->value, 'PARENTTAB');
$_smarty_tpl->tpl_vars['PARENTTAB']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['PARENTTAB']->value) {
$_smarty_tpl->tpl_vars['PARENTTAB']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['PARENTTAB']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['PARENTTABNAME']->value != '' && $_smarty_tpl->tpl_vars['PARENTTABNAME']->value == $_smarty_tpl->tpl_vars['PARENTTAB']->value) {?> selected='selected' <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['PARENTTAB']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select> &nbsp;<a href="#" rel="tooltip" title="" data-original-title="<?php echo vtranslate('SELECT_PARENT_TAB',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><i class="fa fa-info-circle"></i></a></td></tr></table></div></div></div></div><div class='modal-overlay-footer clearfix'><div class="row clearfix"><div class='textAlignCenter col-lg-12 col-md-12 col-sm-12 '><button type='button' id='nextStep' class='btn btn-success saveButton' ><?php echo vtranslate('LBL_NEXT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>&nbsp;&nbsp;<a class='cancelLink' href="javascript:history.back()" type="reset"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></div></div></div></form></div></div></div><?php }
}
