<?php /* Smarty version 3.1.27, created on 2016-10-24 16:51:07
         compiled from "/mnt/www/www.weidian.com/application/modules/Admin/views/weixinmenu/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:1802688130580dcb7b295670_38573612%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d37ed0053f1efb99caba68ad2e85ec5145342a9' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Admin/views/weixinmenu/index.html',
      1 => 1475140235,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1802688130580dcb7b295670_38573612',
  'variables' => 
  array (
    'baseUrl' => 0,
    'statusOption' => 0,
    'data' => 0,
    'row' => 0,
    'menuList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_580dcb7b36c914_66380351',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_580dcb7b36c914_66380351')) {
function content_580dcb7b36c914_66380351 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1802688130580dcb7b295670_38573612';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>微信管理</title>
    <!-- Bootstrap -->
    <link href="/public/admin/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/public/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
</head>
<body>
<ul class="breadcrumb pull-left">
    <li><a href="javascript:void(0);">微信管理 </a></li>
    <li class="active">&nbsp;>&nbsp;自定义菜单</li>
</ul>
<div class="btn-group pull-right">
    <a href="#" data-json="确认要生成菜单吗？" data-href="/admin/weixinmenu/create/" type="button" class="btn btn-primary pull-right" >生成菜单</a>
    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#adminModal" href="/admin/weixinmenu/form/" style="margin: 0 10px;">添加菜单</button>
    <button class="btn" onClick="window.location.reload();">刷新界面</button>
</div>
<div class="clear"></div>

<!--搜索区域-->
<form class="form-search" id="searchForm" style="margin-bottom:20px;" method="get" action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
index/">
    状态：<select class="form-control" name="status" id="status" class="input-medium" style="width:150px;">
    <?php echo $_smarty_tpl->tpl_vars['statusOption']->value;?>

</select>
    <button type="submit" class="btn">搜索</button>
</form>
<!-- 内容区域 -->
<table class="table table-striped table-bordered table-condensed table-hover">
    <thead>
    <tr>
        <th>序号</th>
        <th>上级菜单</th>
        <th>菜单名称</th>
        <th>菜单类型</th>
        <th>菜单键值</th>
        <th>排序</th>
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
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['wm_id'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['menuList']->value[$_smarty_tpl->tpl_vars['row']->value['wm_pid']];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['wm_name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['wm_type'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['wm_key'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['wm_sort'];?>
</td>
        <td><a href="#" data-json="确认要更改状态吗？" data-href="/ajax/weixinmenu/status/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['wm_id'];?>
/status/<?php echo $_smarty_tpl->tpl_vars['row']->value['wm_status'];?>
">
            <i class="<?php if ($_smarty_tpl->tpl_vars['row']->value['wm_status'] == 1) {?>icon-eye-open<?php } else { ?>icon-eye-close<?php }?>" title="<?php if ($_smarty_tpl->tpl_vars['row']->value['wm_status'] == 2) {?>禁用<?php } else { ?>正常<?php }?>"></i>
            <?php if ($_smarty_tpl->tpl_vars['row']->value['wm_status'] == 1) {?><span class="label label-success">正常</span><?php } else { ?><span class="label label-warning">禁用</span><?php }?>
        </a></td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['wm_addtime'];?>
</td>
        <td>
            <a  data-toggle="modal" data-target="#adminModal" href="/admin/weixinmenu/form/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['wm_id'];?>
" title="编辑分类">编辑</a>&nbsp;&nbsp;
        </td>
    </tr>
    <?php
$_smarty_tpl->tpl_vars['row'] = $foreach_row_Sav;
}
?>
    <?php }?>
    </tbody>
</table>


<!--弹窗-->
<form class="form-horizontal" action="/ajax/weixinmenu/save" method="post">
    <div class="modal fade" id="adminModal" tabindex="-1" role="dialog"></div>
</form>
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