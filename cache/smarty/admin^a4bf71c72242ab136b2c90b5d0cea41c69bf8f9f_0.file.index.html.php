<?php /* Smarty version 3.1.27, created on 2016-10-14 10:03:44
         compiled from "/mnt/www/www.weidian.com/application/modules/Admin/views/user/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:165514228558003d005cec99_51144051%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4bf71c72242ab136b2c90b5d0cea41c69bf8f9f' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Admin/views/user/index.html',
      1 => 1476323012,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165514228558003d005cec99_51144051',
  'variables' => 
  array (
    'realname' => 0,
    'status_options' => 0,
    'data' => 0,
    'row' => 0,
    'page' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58003d00696728_82473312',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58003d00696728_82473312')) {
function content_58003d00696728_82473312 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '165514228558003d005cec99_51144051';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>管理员列表</title>
<!-- Bootstrap -->
<link href="/public/admin/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="/public/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
</head>

<body>
<ul class="breadcrumb pull-left">
	<li><a href="/admin/user/index">系统管理</a> <span class="divider">/</span></li>
	<li class="active">管理员列表</li>
</ul>
<div class="btn-group pull-right">
	<button class="btn" data-toggle="modal" href="/admin/user/form" data-target="#formModal">添加管理员</button>
    <button class="btn" onClick="window.location.reload();">刷新界面</button>
</div>
<div class="clear"></div>

<!-- 搜索区域 -->
<form class="form-search" id="searchForm" style="margin-bottom:20px;" method="get" action="/admin/user/index/">
    <input type="text" name="realname" value="<?php echo $_smarty_tpl->tpl_vars['realname']->value;?>
" class="input-medium search-query" placeholder="登录名">
	<select name="status" class="input-small">
		<?php echo $_smarty_tpl->tpl_vars['status_options']->value;?>

	</select>
    <button type="submit" class="btn">搜索</button>
</form>

<!-- 内容区域 -->
<table class="table table-striped table-condensed table-bordered table-hover">
     <thead>
        <tr>
            <th>用户ID</th>
            <th>管理员类型</th>
            <th>登录名</th>
            <th>姓名</th>
            <th>电话</th>
            <th>状态</th>
            <th>重置密码</th>
            <th>修改密码</th>
            <th>添加时间</th>
            <th>操作</th>
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
            <td rel="id"><?php echo $_smarty_tpl->tpl_vars['row']->value['a_id'];?>
</td>
            <td><?php if ($_smarty_tpl->tpl_vars['row']->value['a_role'] == 1) {?><span class="label label-important">超级管理员</span><?php } else { ?><span class="label label-success">普通管理员</span><?php }?></td>
            <td rel="name"><?php echo $_smarty_tpl->tpl_vars['row']->value['a_username'];?>
</td>
            <td rel="realname"><?php echo $_smarty_tpl->tpl_vars['row']->value['a_realname'];?>
</td>
            <td rel="phone"><?php echo $_smarty_tpl->tpl_vars['row']->value['a_phone'];?>
</td>
            <td >
			<?php if ($_smarty_tpl->tpl_vars['row']->value['a_status'] == 1) {?>
			<span class="label label-success">正常</span>
			<?php } else { ?>
			<span class="label label-warning">禁用</span>
			<a data-href="/admin/user/status/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['a_id'];?>
" data-json="确认要该员工禁用状态吗？" title="解除禁用"><i class="icon-refresh"></i></a>
			<?php }?>
			</td>
            <td style="display:none;" rel="status"><?php echo $_smarty_tpl->tpl_vars['row']->value['a_status'];?>
</td>
            <td><a data-href="/admin/user/password/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['a_id'];?>
" data-json="确认要重置该员工密码吗？" title="重置密码"><i class="icon-refresh"></i></a></td>
            <?php if (@constant('A_ROLE') == 1) {?>
            <td><a data-toggle="modal" href="/admin/user/editpassword/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['a_id'];?>
" data-target="#passportModal" title="修改密码"><i class="icon-cog"></i> 修改密码</a></td>
            <?php }?>
            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['a_addtime'];?>
</td>
            <td>
			    <a data-toggle="modal" href="/admin/user/form/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['a_id'];?>
" data-target="#formModal" title="编辑员工"><i class="icon-edit"></i></a>
			    <a data-href="/admin/user/delete/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['a_id'];?>
" data-json="确认要删除该员工信息吗？" title="删除员工"><i class="icon-remove"></i></a></td>
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

<!-- 弹窗 -->
<form class="form-horizontal" id="form-process" action="/admin/user/save/">
    <div id="formModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalTtile" aria-hidden="true"></div>
</form>

<form class="form-horizontal"action="/admin/password/change/">
<div id="passportModal" class="modal fade" tabindex="-1" role="dialog">
</div>
</form>
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
</body>
</html>
<?php }
}
?>