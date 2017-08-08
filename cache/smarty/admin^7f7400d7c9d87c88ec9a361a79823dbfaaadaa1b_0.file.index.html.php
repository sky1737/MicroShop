<?php /* Smarty version 3.1.27, created on 2016-10-17 08:46:46
         compiled from "/mnt/www/www.weidian.com/application/modules/Admin/views/weixinconfig/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:177740228258041f76cd0d30_17036154%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f7400d7c9d87c88ec9a361a79823dbfaaadaa1b' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Admin/views/weixinconfig/index.html',
      1 => 1476167146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177740228258041f76cd0d30_17036154',
  'variables' => 
  array (
    'typeList' => 0,
    'vo' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58041f76d5c275_11428635',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58041f76d5c275_11428635')) {
function content_58041f76d5c275_11428635 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '177740228258041f76cd0d30_17036154';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>微信配置管理</title>
    <!-- Bootstrap -->
    <link href="/public/admin/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/public/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/public/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/public/admin/css/bootstrap-customfile.css" rel="stylesheet" type="text/css" />
    <link href="/public/admin/js/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">

</head>
<body>
<ul class="breadcrumb pull-left">
    <li>微信配置列表<span class="divider">/</span></li>
    <li class="active"><a href="/admin/weixinconfig/index">&nbsp;微信配置列表</a></li>
</ul>
<div class="btn-group pull-right">
    <button class="btn" onClick="window.location.reload();">刷新界面</button>
</div>
<div class="clear"></div>

<div class="tabbable" >
    <ul class="nav nav-tabs">
        <?php
$_from = $_smarty_tpl->tpl_vars['typeList']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['vo']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['vo']->value) {
$_smarty_tpl->tpl_vars['vo']->_loop = true;
$foreach_vo_Sav = $_smarty_tpl->tpl_vars['vo'];
?>
        <li class="active"><a href="javascript:void(0);" ><?php echo $_smarty_tpl->tpl_vars['vo']->value;?>
</a></li>
        <?php
$_smarty_tpl->tpl_vars['vo'] = $foreach_vo_Sav;
}
?>
    </ul>
    <div class="tab-content">
        <form class="form-horizontal" id="form-save" action="/admin/weixinconfig/save/">
            <div class="tab-pane active" id="basic_right" >
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['wc_id'];?>
" />

                <div class="control-group">
                    <label class="control-label">微信appid:</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="wc_appid" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['wc_appid'];?>
" placeholder="微信appid" datatype="*" nullmsg="请填写微信appid"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">微信appsecret:</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="wc_appsecret" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['wc_appsecret'];?>
" placeholder="微信appsecret" datatype="*" nullmsg="请填写微信appsecret"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">微信token:</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="wc_apptoken" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['wc_apptoken'];?>
" placeholder="微信token" datatype="*" nullmsg="微信token"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">商户ID:</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="wc_mch_id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['wc_mch_id'];?>
" placeholder="商户ID" datatype="*" nullmsg="请填写支付密钥"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">商户支付密钥:</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="wc_pay_key" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['wc_pay_key'];?>
" placeholder="商户支付密钥" datatype="*" nullmsg="请填写商户支付密钥"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">sslcert证书路径：</label>
                    <div class="controls">
                        <input type="file" name="upload" id="upload" onchange="return ajaxFileUpload();" />
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['wc_sslcert_path']) {?>
                        <div style="padding-top:10px;" id="ssl_cert"><?php echo $_smarty_tpl->tpl_vars['data']->value['wc_sslcert_path'];?>
</div>
                        <input type="hidden" name="wc_sslcert_path" id="file"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['wc_sslcert_path'];?>
"/>
                        <?php } else { ?>
                        <input type="hidden" name="wc_sslcert_path" id="file"  />
                        <div style="padding-top:10px;" id="ssl_cert"></div>
                        <?php }?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">sslkey证书路径:</label>
                    <div class="controls">
                        <input type="file" name="upload2" id="upload2" onchange="return ajaxFileUpload2();" />
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['wc_sslkey_path']) {?>
                        <div style="padding-top:10px;" id="ssl_key"><?php echo $_smarty_tpl->tpl_vars['data']->value['wc_sslkey_path'];?>
</div>
                        <input type="hidden" name="wc_sslkey_path" id="file2"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['wc_sslkey_path'];?>
" />
                        <?php } else { ?>
                        <input type="hidden" name="wc_sslkey_path" id="file2" />
                        <div style="padding-top:10px;" id="ssl_key"></div>
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                    <button class="btn btn-primary" type="submit">保存</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php echo '<script'; ?>
 src="/public/admin/js/jquery-1.8.2.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/common.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/Validform_v5.3.2_min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/jquery.ajaxfileupload.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/bootstrap-customfile.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/bootstrap-datetimepicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/jquery.artDialog.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $("#form-save").Validform({
        ajaxPost: true,
        tipSweep: true,
        tiptype:function(msg,o,cssctl){
            if(o.type == 3)
                $.dialog.tips(msg);
        },
        beforeSubmit:function(curform){
        },
        callback:function(response){
            $.dialog.tips(response.info);
            if ( response.status == 'y' ) {
                window.setTimeout(function(){
                    location.reload();
                }, 2000)
            }
        }
    });

    /*初始化上传文件*/
    $("#upload").customFileInput();
    var processing = false;
    function ajaxFileUpload() {
        if ( processing == true ) {
            return false;
        }

        var dialog     = $.dialog.loading('上传中，请稍等！').show();
        processing = true;
        $.ajaxFileUpload({
            url:'/admin/weixinconfig/upload/',
            secureuri:false,
            fileElementId:'upload',
            dataType: 'json',
            success: function (data, status){
                setTimeout( function() {
                    processing = false;
                }, 500);
                dialog.close();

                if ( data.status == 'y' ) {
                    $("#ssl_cert").html(data.info.path);
                    $('#file').val(data.info.path);
                    return;
                }

                $.dialog.error(data.info);
                return false;
            },
            error: function (data, status, e){
                $.dialog.error(e);
            }
        });
    }

    $("#upload2").customFileInput();

    var processing = false;
    function ajaxFileUpload2() {
        if ( processing == true ) {
            return false;
        }

        var dialog = $.dialog.loading('上传中，请稍等！').show();
        processing = true;
        $.ajaxFileUpload({
            url:'/admin/weixinconfig/upload2/',
            secureuri:false,
            fileElementId:'upload2',
            dataType: 'json',
            success: function (data, status){
                setTimeout( function() {
                    processing = false;
                }, 500);
                dialog.close();

                if ( data.status == 'y' ) {
                    $("#ssl_key").html(data.info.path);
                    $('#file2').val(data.info.path);
                    return;
                }else{
                    alert(data.info.msg);
                }

                return false;
            },
            error: function (data, status, e){
                $.dialog.error(e);
            }
        });
    }

<?php echo '</script'; ?>
>
</body>
</html><?php }
}
?>