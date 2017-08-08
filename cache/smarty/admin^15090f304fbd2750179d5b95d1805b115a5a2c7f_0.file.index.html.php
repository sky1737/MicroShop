<?php /* Smarty version 3.1.27, created on 2016-10-14 10:03:47
         compiled from "/mnt/www/www.weidian.com/application/modules/Admin/views/log/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:2607374358003d037aa023_81596278%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15090f304fbd2750179d5b95d1805b115a5a2c7f' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Admin/views/log/index.html',
      1 => 1474958051,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2607374358003d037aa023_81596278',
  'variables' => 
  array (
    'baseUrl' => 0,
    'name' => 0,
    'data' => 0,
    'row' => 0,
    'page' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58003d038468e2_56418547',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58003d038468e2_56418547')) {
function content_58003d038468e2_56418547 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2607374358003d037aa023_81596278';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>系统管理</title>
    <!-- Bootstrap -->
    <link href="/public/admin/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/public/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
</head>
<body>
<ul class="breadcrumb pull-left">
    <li>系统管理<span class="divider">/</span></li>
    <li class="active"><a href="/admin/log/index">登陆日志</a></li>
</ul>
<div class="btn-group pull-right">
    <button class="btn" onClick="window.location.reload();">刷新界面</button>
</div>
<div class="clear"></div>

<!--搜索区域-->
<form class="form-search" id="searchForm" style="margin-bottom:20px;" method="get" action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
index/">
    登录名：<input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" class="input-medium search-query" placeholder="登录名">
    <button type="submit" class="btn">搜索</button>
</form>
<!-- 内容区域 -->
<table class="table table-striped table-bordered table-condensed table-hover">
    <thead>
    <tr>
        <th>登录名</th>
        <th>登陆账号</th>
        <th>Ip</th>
        <th>时间</th>
    </tr>
    </thead>
    <tbody>
    <?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
    <?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$foreach_row_Sav = $_smarty_tpl->tpl_vars['row'];
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['ll_username'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['ll_realname'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['ll_login_ip'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['ll_login_time'];?>
</td>

    </tr>
    <?php
$_smarty_tpl->tpl_vars['row'] = $foreach_row_Sav;
}
?>
    <?php }?>
    </tbody>
</table>
<div class="pagination pagination-small">
    <ul class="pull-right"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
<a class="current">总记录：<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</a></ul>
    <div class="clear"></div>
</div>

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
</body>
</html><?php }
}
?>