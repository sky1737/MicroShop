<?php /* Smarty version 3.1.27, created on 2016-10-17 08:43:43
         compiled from "/mnt/www/www.weidian.com/application/modules/Admin/views/adsgroup/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:119160827658041ebfe96782_08300229%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12124a2b5fe67ab88b2c287950ce79509844f19b' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Admin/views/adsgroup/index.html',
      1 => 1474882129,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119160827658041ebfe96782_08300229',
  'variables' => 
  array (
    'baseUrl' => 0,
    'title' => 0,
    'data' => 0,
    'row' => 0,
    'ad' => 0,
    'page' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58041ebff0fd32_36132924',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58041ebff0fd32_36132924')) {
function content_58041ebff0fd32_36132924 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '119160827658041ebfe96782_08300229';
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
    <li>系统管理<span class="divider">/</span></li>
    <li class="active"><a href="/admin/adsgroup/index">广告组管理</a></li>
</ul>
<div class="btn-group pull-right">
    <button class="btn" data-toggle="modal" href="/admin/adsgroup/form" data-target="#adsgroupModal">添加广告组</button>
    <button class="btn" onClick="window.location.reload();">刷新界面</button>
</div>
<div class="clear"></div>

<!--搜索区域-->
<form class="form-search" id="searchForm" style="margin-bottom:20px;" method="get" action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
index/">
    广告组名: <input type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
" class="form-control" placeholder="广告组名" style="width: 300px;">
    <button type="submit" class="btn">搜索</button>
</form>
<!-- 内容区域 -->
<table class="table table-striped table-bordered table-condensed table-hover">
    <thead>
    <tr>
        <th>广告组名</th>
        <th>广告组别名</th>
        <th>关联广告</th>
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
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['ag_name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['ag_cname'];?>
</td>
        <td rel="eye">
            <div class="ad-list ad-hide">
                <div class="pull-left">
                    <p>共有<?php echo $_smarty_tpl->tpl_vars['row']->value['a_counts'];?>
个广告</p>
                    <?php
$_from = $_smarty_tpl->tpl_vars['row']->value['a_ids'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ad'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ad']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ad']->value) {
$_smarty_tpl->tpl_vars['ad']->_loop = true;
$foreach_ad_Sav = $_smarty_tpl->tpl_vars['ad'];
?>
                    <p><a href="<?php echo $_smarty_tpl->tpl_vars['ad']->value['a_link'];?>
" target="_blank"><i class="icon-picture"></i> <?php echo $_smarty_tpl->tpl_vars['ad']->value['a_title'];?>
</a>&nbsp;状态： <?php if ($_smarty_tpl->tpl_vars['ad']->value['a_status'] == 1) {?>[开启]<?php } else { ?>[关闭]<?php }?></p>
                    <?php
$_smarty_tpl->tpl_vars['ad'] = $foreach_ad_Sav;
}
?>
                </div>

                <div class="clear"></div>
            </div></td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['ag_addtime'];?>
</td>
        <td>
            <a data-toggle="modal" data-target="#adsgroupModal" class="icon-edit" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/form/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['ag_id'];?>
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
<!--广告组弹窗-->
<form class="form-horizontal" action="/ajax/adsgroup/save" method="post">
    <div class="modal fade" id="adsgroupModal" tabindex="-1" role="dialog"></div>
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