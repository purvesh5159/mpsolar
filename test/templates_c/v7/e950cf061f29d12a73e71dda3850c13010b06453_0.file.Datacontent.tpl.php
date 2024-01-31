<?php
/* Smarty version 3.1.39, created on 2024-01-31 05:10:19
  from 'D:\wamp\www\mpsolar\layouts\v7\modules\ITS4YouProjectsChart\Datacontent.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65b9d63b0c8d54_87991742',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e950cf061f29d12a73e71dda3850c13010b06453' => 
    array (
      0 => 'D:\\wamp\\www\\mpsolar\\layouts\\v7\\modules\\ITS4YouProjectsChart\\Datacontent.tpl',
      1 => 1692190918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65b9d63b0c8d54_87991742 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('PROJECT_MODEL', Vtiger_Module_Model::getInstance('Project'));
if (!empty($_smarty_tpl->tpl_vars['PROJECTS']->value['tasks'])) {?><br/><input id="projects" type="hidden" value="<?php echo Vtiger_Util_Helper::toSafeHTML(Zend_Json::encode($_smarty_tpl->tpl_vars['PROJECTS']->value));?>
"><input id="originalprojects" type="hidden" value="<?php echo Vtiger_Util_Helper::toSafeHTML(Zend_Json::encode($_smarty_tpl->tpl_vars['PROJECTS']->value));?>
"><input id="userDateFormat" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['USER_DATE_FORMAT']->value;?>
"><div id="workSpace" style="height:50em;padding:0px;border:1px solid #e5e5e5;position:relative;margin:0 5px"></div><div id="gantEditorTemplates" style="display:none;"><div class="__template__" type="TASKSEDITHEAD"><!--<table class="gdfTable" cellspacing="0" cellpadding="0"><thead><tr style='height:50px'><th class="gdfColHeader" style="width:35px;"></th><th class="gdfColHeader cursorPointer" style="width:240px;text-align:center;" data-name="name" data-text="<?php echo vtranslate('Project Name',$_smarty_tpl->tpl_vars['PROJECT_MODULE']->value);?>
"><?php echo vtranslate('Project Name',$_smarty_tpl->tpl_vars['PROJECT_MODULE']->value);?>
</th><th class="gdfColHeader cursorPointer" style="width:90px;text-align:center;" data-name="startdate" data-text="<?php echo vtranslate('LBL_START_DATE',$_smarty_tpl->tpl_vars['PROJECT_MODULE']->value);?>
" ><?php echo vtranslate('LBL_START_DATE',$_smarty_tpl->tpl_vars['PROJECT_MODULE']->value);?>
</th><th class="gdfColHeader cursorPointer" style="width:90px;text-align:center;" data-name="enddate" data-text="<?php echo vtranslate('LBL_END_DATE',$_smarty_tpl->tpl_vars['PROJECT_MODULE']->value);?>
" ><?php echo vtranslate('LBL_END_DATE',$_smarty_tpl->tpl_vars['PROJECT_MODULE']->value);?>
</th></tr></thead></table>--></div><div class="__template__" type="TASKROW"><!--<tr taskId="(#=obj.id#)" class="taskEditRow" level="(#=level#)"><th class="gdfCell editTaskDIS" align="right" style="text-align:center;" data-recordid="(#=obj.recordid#)"><span class="taskRowIndex">(#=obj.getRow()+1#)</span> </th><td class="gdfCell indentCell" style="padding-left:(#=obj.level*10#)px;"><div class="taskStatus cvcColorSquare" status="(#=obj.number#)"></div>&nbsp;<div class="(#=obj.isParent()?'exp-controller expcoll exp':'exp-controller'#)" align="center"></div><a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['PROJECT_MODULE']->value;?>
&view=<?php echo $_smarty_tpl->tpl_vars['PROJECT_MODEL']->value->getDetailViewName();?>
&record=(#=obj.recordid#)">(#=obj.name#)</a></td><td class="gdfCell" name="start"></td><td class="gdfCell" name="end"></td></tr>--></div><div class="__template__" type="TASKEMPTYROW"><!--<tr class="taskEditRow emptyRow" ><th class="gdfCell" align="right"></th><td class="gdfCell noClip" align="center"></td><td class="gdfCell"></td><td class="gdfCell"></td><td class="gdfCell"></td></tr>--></div><div class="__template__" type="TASKBAR"><!--<div class="taskBox taskBoxDiv" taskId="(#=obj.id#)" ><div class="layout (#=obj.hasExternalDep?'extDep':''#)"><div class="taskStatus" status="(#=obj.number#)"></div><div></div><div class="taskProgress" style="width:(#=obj.progress>100?100:obj.progress#)%; background-color:(#=obj.progress>100?'red':'rgb(153,255,51);'#);"></div><div class="milestone (#=obj.startIsMilestone?'active':''#)" ></div><div class="taskLabel"></div><div class="milestone end (#=obj.endIsMilestone?'active':''#)" ></div></div></div>--></div><div class="__template__" type="CHANGE_STATUS"><!--<div class="taskStatusBox"><div class="taskStatus cvcColorSquare" status="STATUS_ACTIVE" title="active"></div><div class="taskStatus cvcColorSquare" status="STATUS_DONE" title="completed"></div><div class="taskStatus cvcColorSquare" status="STATUS_FAILED" title="failed"></div><div class="taskStatus cvcColorSquare" status="STATUS_SUSPENDED" title="suspended"></div><div class="taskStatus cvcColorSquare" status="STATUS_UNDEFINED" title="undefined"></div></div>--></div><div class="__template__" type="TASK_EDITOR"><!--<div class="ganttTaskEditor"><table width="100%"><tr><td><table cellpadding="5"><tr><td><label for="code">code/short name</label><br><input type="text" name="code" id="code" value="" class="formElements"></td></tr><tr><td><label for="name">name</label><br><input type="text" name="name" id="name" value="" size="35" class="formElements"></td></tr><tr></tr><td><label for="description">description</label><br><textarea rows="5" cols="30" id="description" name="description" class="formElements"></textarea></td></tr></table></td><td valign="top"><table cellpadding="5"><tr><td colspan="2"><label for="status">status</label><br><div id="status" class="taskStatus" status=""></div></td><tr><td colspan="2"><label for="progress">progress</label><br><input type="text" name="progress" id="progress" value="" size="3" class="formElements"></td></tr><tr><td><label for="start">start</label><br><input type="text" name="start" id="start" value="" class="date" size="10" class="formElements"><input type="checkbox" id="startIsMilestone"> </td><td rowspan="2" class="graph" style="padding-left:50px"><label for="duration">dur.</label><br><input type="text" name="duration" id="duration" value="" size="5" class="formElements"></td></tr><tr><td><label for="end">end</label><br><input type="text" name="end" id="end" value="" class="date" size="10" class="formElements"><input type="checkbox" id="endIsMilestone"></td></table></td></tr></table><h2>assignments</h2><table cellspacing="1" cellpadding="0" width="100%" id="assigsTable"><tr><th style="width:100px;">name</th><th style="width:70px;">role</th><th style="width:30px;">est.wklg.</th><th style="width:30px;" id="addAssig"><span class="teamworkIcon" style="cursor: pointer">+</span></th></tr></table><div style="text-align: right; padding-top: 20px"><button id="saveButton" class="button big">save</button></div></div>--></div><div class="__template__" type="ASSIGNMENT_ROW"><!--<tr taskId="(#=obj.task.id#)" assigId="(#=obj.assig.id#)" class="assigEditRow" ><td ><select name="resourceId" class="formElements" (#=obj.assig.id.indexOf("tmp_")==0?"":"disabled"#) ></select></td><td ><select type="select" name="roleId" class="formElements"></select></td><td ><input type="text" name="effort" value="(#=getMillisInHoursMinutes(obj.assig.effort)#)" size="5" class="formElements"></td><td align="center"><span class="teamworkIcon delAssig" style="cursor: pointer">d</span></td></tr>--></div><div class="__template__" type="RESOURCE_EDITOR"><!--<div class="resourceEditor" style="padding: 5px;"><h2>Project team</h2><table cellspacing="1" cellpadding="0" width="100%" id="resourcesTable"><tr><th style="width:100px;">name</th><th style="width:30px;" id="addResource"><span class="teamworkIcon" style="cursor: pointer">+</span></th></tr></table><div style="text-align: right; padding-top: 20px"><button id="resSaveButton" class="button big">save</button></div></div>--></div><div class="__template__" type="RESOURCE_ROW"><!--<tr resId="(#=obj.id#)" class="resRow" ><td ><input type="text" name="name" value="(#=obj.name#)" style="width:100%;" class="formElements"></td><td align="center"><span class="teamworkIcon delRes" style="cursor: pointer">d</span></td></tr>--></div></div><?php } else { ?><table class="emptyRecordsDiv"><tbody><tr><td><?php $_smarty_tpl->_assignInScope('IS_MODULE_EDITABLE', $_smarty_tpl->tpl_vars['PROJECT_MODEL']->value->isPermitted('CreateView'));
$_smarty_tpl->_assignInScope('SINGLE_MODULE', "SINGLE_Project");
echo vtranslate('LBL_NO');?>
 <?php echo vtranslate('Project','Project');?>
 <?php echo vtranslate('LBL_FOUND');?>
 <?php echo vtranslate('LBL_NO_RECORDS_FOUND','Project');?>
.<?php if ($_smarty_tpl->tpl_vars['IS_MODULE_EDITABLE']->value) {?> <a href="<?php echo $_smarty_tpl->tpl_vars['PROJECT_MODEL']->value->getCreateRecordUrl();?>
"> <?php echo vtranslate('LBL_CREATE');?>
 </a><?php }?></td></tr></tbody></table><?php }
}
}
