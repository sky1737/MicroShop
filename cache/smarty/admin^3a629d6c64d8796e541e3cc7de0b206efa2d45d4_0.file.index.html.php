<?php /* Smarty version 3.1.27, created on 2016-10-14 10:02:56
         compiled from "/mnt/www/www.weidian.com/application/modules/Admin/views/right/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:90572331758003cd03d64f5_39191788%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a629d6c64d8796e541e3cc7de0b206efa2d45d4' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Admin/views/right/index.html',
      1 => 1476089619,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90572331758003cd03d64f5_39191788',
  'variables' => 
  array (
    'userOptions' => 0,
    'menuList' => 0,
    'menu' => 0,
    'child' => 0,
    'right' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58003cd04bcac0_49255150',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58003cd04bcac0_49255150')) {
function content_58003cd04bcac0_49255150 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '90572331758003cd03d64f5_39191788';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>菜单管理</title>
    <!-- Bootstrap -->
    <link href="/public/admin/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/public/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/public/admin/css/tinyselect.css" rel="stylesheet" />
</head>
<style>
    #right .nav-tabs { margin-bottom:0;}
    #right .tab-content { border:1px solid #ddd; border-top:none; padding:20px 20px 0;}
</style>
<body>
<ul class="breadcrumb pull-left">
    <li>系统管理<span class="divider">/</span></li>
    <li class="active"><a href="javascript:void(0);">权限管理</a></li>
</ul>

<div class="btn-group pull-right">
    <!--<button class="btn" data-href="/admin/menu/refresh/" data-json="确认更新菜单缓存吗？">更新缓存</button>-->
    <button class="btn" onClick="window.location.reload();">刷新界面</button>
</div>
<div class="clear"></div>
<div class="right_con">
    <div class="alert alert-success" style="margin-bottom:30px;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Tip: 第一步:选择用户登录名; 第二步:勾选需授权的菜单; 第三步:分发权限
    </div>
<!-- 搜索区域 -->
<form class="form-search" id="searchForm" style="margin-bottom:20px;" method="get" action="/admin/right/index/">
    选择：<select id="uid" name="uid" class="form-control" style="display: inline-block; width: 200px;">
    <?php echo $_smarty_tpl->tpl_vars['userOptions']->value;?>

</select>
    <button type="submit" class="btn">搜索</button>
</form>
<?php if ($_smarty_tpl->tpl_vars['menuList']->value) {?>
<form class="form-horizontal" id="form-save" action="/admin/right/save/" method="post">
    <input type="hidden" value="<?php echo $_GET['uid'];?>
" name="uid" />
    <div id="" class="tabbable" style="margin-top:30px;">

        <div class="tab-content">
            <?php
$_from = $_smarty_tpl->tpl_vars['menuList']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['menu']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
$foreach_menu_Sav = $_smarty_tpl->tpl_vars['menu'];
?>
            <h6><i class="icon-forward"></i><?php echo $_smarty_tpl->tpl_vars['menu']->value['m_name'];?>
</h6>
                <?php
$_from = $_smarty_tpl->tpl_vars['menu']->value['son'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['child'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['child']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
$foreach_child_Sav = $_smarty_tpl->tpl_vars['child'];
?>
                <label class="checkbox inline"><input type="checkbox" name="right[]" <?php if (in_array($_smarty_tpl->tpl_vars['child']->value['m_id'],$_smarty_tpl->tpl_vars['right']->value)) {?>checked<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['child']->value['m_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['child']->value['m_name'];?>
</label>
                <?php
$_smarty_tpl->tpl_vars['child'] = $foreach_child_Sav;
}
?>
            <hr />
            <?php
$_smarty_tpl->tpl_vars['menu'] = $foreach_menu_Sav;
}
?>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary" style="margin-top: 20px;">分配权限</button>
    </div>
</form>
<?php }?>
<?php echo '<script'; ?>
 src="/public/admin/js/jquery-1.8.2.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/Validform_v5.3.2_min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/jquery.artDialog.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/common.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/tinyselect.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    //管理员列表
    $(function(){
        $("#uid").tinyselect();
    });

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
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
?>