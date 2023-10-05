<?php
/* Smarty version 3.1.39, created on 2023-10-04 05:46:14
  from 'D:\wamp\www\mpsolar\layouts\v7\modules\PDFMaker\ListPDFTemplatesContents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_651cfc26888813_90658598',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5d7d037e92b2294fe9f8362383f99836d5dffdf7' => 
    array (
      0 => 'D:\\wamp\\www\\mpsolar\\layouts\\v7\\modules\\PDFMaker\\ListPDFTemplatesContents.tpl',
      1 => 1692190666,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_651cfc26888813_90658598 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-sm-12 col-xs-12 ">

    <input type="hidden" name="idlist" >
    <input type="hidden" name="module" value="PDFMaker">
    <input type="hidden" name="parenttab" value="Tools">
    <input type="hidden" name="view" value="List">
    <div id="table-content" class="table-container">

        <form name='list' id='listedit' action='' onsubmit="return false;">
            <table id="listview-table" class="table <?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value == '0') {?>listview-table-norecords <?php }?> listview-table">
                <thead>
                <tr class="listViewContentHeader">
                    <th></th>
                    <th nowrap="nowrap"><a href="#" data-columnname="module" data-nextsortorderval="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
" class="listViewContentHeaderValues">&nbsp;<?php echo vtranslate("LBL_MODULENAMES",$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;</a></th>
                    <th nowrap="nowrap"><a href="#" data-columnname="description" data-nextsortorderval="<?php echo $_smarty_tpl->tpl_vars['description_dir']->value;?>
" class="listViewContentHeaderValues"><?php echo vtranslate("LBL_DESCRIPTION",$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;</a></th>
                </tr>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PDFTEMPLATES']->value, 'template', false, NULL, 'mailmerge', array (
));
$_smarty_tpl->tpl_vars['template']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['template']->value) {
$_smarty_tpl->tpl_vars['template']->do_else = false;
?>
                    <tr class="listViewEntries" data-id="<?php echo $_smarty_tpl->tpl_vars['template']->value['templateid'];?>
" data-recordurl="index.php?module=PDFMaker&view=DetailFree&templateid=<?php echo $_smarty_tpl->tpl_vars['template']->value['templateid'];?>
" id="PDFMaker_listView_row_<?php echo $_smarty_tpl->tpl_vars['template']->value['templateid'];?>
">
                        <td class="listViewRecordActions">
                            <div class="table-actions">
                                   <span class="more dropdown action">
                                            <span href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="fa fa-ellipsis-v icon"></i></span>
                                                <ul class="dropdown-menu">
                                                    <li><a data-id="<?php echo $_smarty_tpl->tpl_vars['template']->value['templateid'];?>
" href="index.php?module=PDFMaker&view=DetailFree&templateid=<?php echo $_smarty_tpl->tpl_vars['template']->value['templateid'];?>
&app=<?php echo $_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value;?>
"><?php echo vtranslate('LBL_DETAILS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li>
                                                    <?php echo $_smarty_tpl->tpl_vars['template']->value['edit'];?>

                                                </ul>
                                        </span>
                            </div>
                        </td>
                        <td class="listViewEntryValue"><?php echo $_smarty_tpl->tpl_vars['template']->value['module'];?>
</a></td>
                        <td class="listViewEntryValue"><?php echo $_smarty_tpl->tpl_vars['template']->value['description'];?>
&nbsp;</td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
        </form>
    </div>
</div>
<br>
<div align="center" class="small" style="color: rgb(153, 153, 153);"><?php echo vtranslate("PDF_MAKER",$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo $_smarty_tpl->tpl_vars['VERSION']->value;?>
 <?php echo vtranslate("COPYRIGHT",$_smarty_tpl->tpl_vars['MODULE']->value);?>
</div><?php }
}
