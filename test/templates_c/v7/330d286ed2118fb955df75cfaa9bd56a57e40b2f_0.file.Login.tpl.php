<?php
/* Smarty version 3.1.39, created on 2023-08-16 12:53:25
  from 'D:\wamp\www\mpsolar\layouts\v7\modules\Settings\ITS4YouInstaller\Login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_64dcc6c531f3d3_29400078',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '330d286ed2118fb955df75cfaa9bd56a57e40b2f' => 
    array (
      0 => 'D:\\wamp\\www\\mpsolar\\layouts\\v7\\modules\\Settings\\ITS4YouInstaller\\Login.tpl',
      1 => 1692190379,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64dcc6c531f3d3_29400078 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="col-lg-12">
    <div class="clearfix">
        <h4>
            <?php echo vtranslate('LBL_INSTALLER_LOGIN',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>

        </h4>
        <hr>
    </div>
    <div class="row">
        <div class="col-lg-6" style="border-right: 1px solid #ddd;">
            <form class="form-horizontal loginForm" method="post" action="index.php">
                <input type="hidden" name="module" value="ITS4YouInstaller"/>
                <input type="hidden" name="parent" value="Settings"/>
                <input type="hidden" name="action" value="Basic"/>
                <input type="hidden" name="userAction" value="login"/>
                <input type="hidden" name="mode" value="registerAccount"/>
                <div class="form-group">
                    <span class="control-label col-sm-3 fieldLabel"></span>
                    <div class="controls col-sm-5">
                        <h5><b><?php echo vtranslate('LBL_USERLOGIN_TAB',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b></h5>
                    </div>
                </div>
                <div class="form-group">
                    <span class="control-label col-sm-3 fieldLabel"><?php echo vtranslate('LBL_EMAIL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span>
                    <div class="controls col-sm-5">
                        <input type="text" id="emailAddress" name="emailAddress" data-rule-required="true"
                               data-rule-email="true" class="inputElement" placeholder="@">
                    </div>
                </div>
                <div class="form-group">
                    <span class="control-label fieldLabel col-sm-3"><?php echo vtranslate('LBL_PASSWORD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span>
                    <div class="controls col-sm-5">
                        <input type="password" id="password" name="password" data-rule-required="true"
                               class="inputElement" placeholder="******">
                    </div>
                </div>
                <div class="form-group">
                    <span class="control-label fieldLabel col-sm-3">&nbsp;</span>
                    <div class="controls col-sm-5">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['SHOP_LINK']->value;?>
" target="_blank"><?php echo vtranslate('LBL_REGISTER',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a>
                        <?php echo vtranslate('LBL_OR','Vtiger');?>

                        <a href="<?php echo $_smarty_tpl->tpl_vars['SHOP_LINK']->value;?>
"
                           target="_blank"><?php echo vtranslate('LBL_FORGOT_PASSWORD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a>
                    </div>
                </div>
                <div class="form-group">
                    <span class="control-label fieldLabel col-sm-3">&nbsp;</span>
                    <div class="controls col-sm-5">
                        <button class="btn btn-success" name="userLogin" type="submit">
                            <strong><?php echo vtranslate('LBL_LOGIN',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-6">
            <form class="form-horizontal loginKeyForm" method="post" action="index.php">
                <input type="hidden" name="module" value="ITS4YouInstaller">
                <input type="hidden" name="parent" value="Settings">
                <input type="hidden" name="action" value="Basic">
                <input type="hidden" name="userAction" value="login">
                <input type="hidden" name="mode" value="registerAccount">
                <input type="hidden" name="emailAddress" value="accesskey">
                <div class="form-group">
                    <span class="control-label col-sm-3 fieldLabel"></span>
                    <div class="controls col-sm-5">
                        <h5><b><?php echo vtranslate('LBL_KEYLOGIN_TAB',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b></h5>
                    </div>
                </div>
                <div class="form-group">
                    <span class="control-label col-sm-3 fieldLabel"><?php echo vtranslate('LBL_PACKAGE_KEY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span>
                    <div class="controls col-sm-5">
                        <input type="text" id="password" name="password" data-rule-required="true"
                               class="inputElement" placeholder="******">
                    </div>
                </div>
                <div class="form-group">
                    <span class="control-label fieldLabel col-sm-3">&nbsp;</span>
                    <div class="controls col-sm-5">
                        <button class="btn btn-success" name="userLogin" type="submit">
                            <strong><?php echo vtranslate('LBL_LOGIN',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php }
}
