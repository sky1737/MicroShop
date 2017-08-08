<?php /* Smarty version 3.1.27, created on 2016-10-17 08:43:41
         compiled from "/mnt/www/www.weidian.com/application/modules/Admin/views/ads/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:169079516358041ebddf0053_24374841%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90857469ce0cb80962833748a468f8f1ed7ef730' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Admin/views/ads/index.html',
      1 => 1476169140,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169079516358041ebddf0053_24374841',
  'variables' => 
  array (
    'baseUrl' => 0,
    'title' => 0,
    'statusOption' => 0,
    'data' => 0,
    'row' => 0,
    'page' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58041ebdeceb12_50283475',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58041ebdeceb12_50283475')) {
function content_58041ebdeceb12_50283475 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '169079516358041ebddf0053_24374841';
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
</head>
<body>
<ul class="breadcrumb pull-left">
    <li>广告管理<span class="divider">/</span></li>
    <li class="active"><a href="/admin/ads/index">广告管理</a></li>
</ul>
<div class="btn-group pull-right">
    <button class="btn" data-toggle="modal" href="/admin/ads/form" data-target="#formModal">添加广告</button>
    <button class="btn" onClick="window.location.reload();">刷新界面</button>
</div>
<div class="clear"></div>

<!--搜索区域-->
<form class="form-search" id="searchForm" style="margin-bottom:20px;" method="get" action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
index/">
广告名：<input type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
" class="input-large search-query" placeholder="广告名" style="width: 300px;">
状态：<select class="form-control" name="status" id="status" class="input-medium" style="width:150px;">
    <?php echo $_smarty_tpl->tpl_vars['statusOption']->value;?>

    </select>
    <button type="submit" class="btn">搜索</button>
</form>
<!-- 内容区域 -->
<table class="table table-striped table-bordered table-condensed table-hover">
    <thead>
    <tr>
        <th>广告ID</th>
        <th>广告名称</th>
        <th>别名</th>
        <th>图片</th>
        <th>链接</th>
        <th>状态</th>
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
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['a_id'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['a_title'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['a_alias'];?>
</td>
        <td>
            <img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['a_picture'];?>
" style="width: 50px;height: 50px;">
        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['a_link'];?>
</td>
        <td>
            <a href="javascript:void(0);" data-json="确认要更改状态吗？" data-href="/admin/ads/status/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['a_id'];?>
/status/<?php echo $_smarty_tpl->tpl_vars['row']->value['a_status'];?>
">
                <i class="<?php if ($_smarty_tpl->tpl_vars['row']->value['a_status'] == 1) {?>icon-eye-open<?php } else { ?>icon-eye-close<?php }?>" title="<?php if ($_smarty_tpl->tpl_vars['row']->value['a_status'] == 2) {?>禁用<?php } else { ?>正常<?php }?>"></i>
                <?php if ($_smarty_tpl->tpl_vars['row']->value['a_status'] == 1) {?><span class="label label-success">正常</span><?php } else { ?><span class="label label-warning">禁用</span><?php }?>
            </a>
        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['a_addtime'];?>
</td>
        <td>
            <a data-toggle="modal" data-target="#formModal" class="icon-edit" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/form/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['a_id'];?>
" title="编辑"></a>&nbsp;&nbsp;
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
<!-- 弹窗 -->
<form class="form-horizontal" id="form-process" action="/ajax/ads/save/">
    <div id="formModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalTtile" aria-hidden="true">
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
</html><?php }
}
?>