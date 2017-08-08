<?php /* Smarty version 3.1.27, created on 2016-10-14 09:11:55
         compiled from "/mnt/www/www.weidian.com/application/modules/Admin/views/login/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:1873424248580030db059897_01993631%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57ee5d044b5c58ca505a56a65ffc7fe5be6eae14' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Admin/views/login/index.html',
      1 => 1475202029,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1873424248580030db059897_01993631',
  'variables' => 
  array (
    'pageTitle' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_580030db0cf242_36961520',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_580030db0cf242_36961520')) {
function content_580030db0cf242_36961520 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1873424248580030db059897_01993631';
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="/public/admin/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/public/admin/css/login.css" >
    <link rel="stylesheet" type="text/css" href="/public/admin/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/admin/css/plugs.css">

    <?php echo '<script'; ?>
 src="/public/admin/js/jquery.12.0.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="/public/admin/js/Headroom.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/public/admin/js/Validform_v5.3.2_min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/public/admin/js/jquery.artDialog-4.1.7.min.js"><?php echo '</script'; ?>
>
</head>
<body style="background:#191919;">

<div class="login_logo"></div>

<div class="login_con">
    <form action="/admin/login/passport/" class="form-process">
        <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
        <div class="input-group input-group">
            <span class="input-group-addon"><i class="icon-user"></i></span>
            <input type="text" class="form-control" name="username" placeholder="请输入您的用户名" aria-describedby="sizing-addon2" datatype="*" nullmsg="请输入登录用户名" />
        </div>
        <div class="input-group input-group">
            <span class="input-group-addon"><i class="icon-lock"></i></span>
            <input type="password" class="form-control" name="password" placeholder="请输入您的登录密码" aria-describedby="sizing-addon2" datatype="*" nullmsg="请输入登录密码" />
        </div>
        <div class="input-group input-group" style="">
            <span class="input-group-addon"><i class="icon-picture"></i></span>
            <input type="text" class="form-control"  name="code" placeholder="请输入验证码" aria-describedby="sizing-addon2" datatype="*" nullmsg="请输入验证码" />
            <img style=" position: absolute; top:5px; z-index: 9;  right: 103px;
" id="verifyImg" src="/admin/login/code/" title="验证码" />
            <a style=" position: absolute; z-index: 9; width: 100px; right: -8px;top:0; line-height: 33px; font-size: 12px;"href="javascript:;" id="refreshCode"><span>看不清，换一张</span></a>
        </div>

        <button type="submit" class="btn btn-primary btn btn-block">登录系统</button>
    </form>
    <p>Copyright © 2016-2017 福州华闽易家网络科技有限公司. All Rights Reserved </p>
</div>
<?php echo '<script'; ?>
 type="application/javascript">
    $(function(){
        $('#refreshCode').click(function(){
            var src = "/admin/login/code/?t=" + Math.random();
            $('#verifyImg').attr('src', src);
        });
    });

    $(".form-process").Validform({
        btnSubmit: '.btn',
        ajaxPost: true,
        tipSweep: true,
        tiptype:function(msg,o,cssctl){
            if(o.type == 3) {
                $.dialog.tips(msg);
            }

        },
        callback:function(json){
            $.dialog.tips(json.info);
            if ( json.status == 'y' ) {
                window.location.href = '/admin/index/index/';
            }
            return false;
        }
    });
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
?>