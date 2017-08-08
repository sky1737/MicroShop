<?php /* Smarty version 3.1.27, created on 2016-10-17 15:47:36
         compiled from "/mnt/www/www.weidian.com/application/modules/Admin/views/member/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:2103650326580482187b5bd6_82011326%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eec3dbfcab6eab128a44c1e9546dc120773da578' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Admin/views/member/index.html',
      1 => 1476169420,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2103650326580482187b5bd6_82011326',
  'variables' => 
  array (
    'baseUrl' => 0,
    'phone' => 0,
    'statusOption' => 0,
    'data' => 0,
    'row' => 0,
    'page' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5804821884a296_94841345',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5804821884a296_94841345')) {
function content_5804821884a296_94841345 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2103650326580482187b5bd6_82011326';
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
    <li>会员管理<span class="divider">/</span></li>
    <li class="active"><a href="/admin/member/index">会员列表</a></li>
</ul>
<div class="btn-group pull-right">
    <button class="btn" onClick="window.location.reload();">刷新界面</button>
</div>
<div class="clear"></div>

<!-- 搜索区域 -->
<form class="form-search" id="searchForm" style="margin-bottom:20px;" method="get" action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
index/">
    手机号码: <input type="text" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
" class="input-large search-query" placeholder="手机">
    状态：<select class="form-control" name="status" id="status" class="input-medium" style="width:150px;">
    <?php echo $_smarty_tpl->tpl_vars['statusOption']->value;?>

    </select>
        <button type="submit" class="btn">搜索</button>
</form>
<!-- 内容区域 -->
<table class="table table-striped table-bordered table-condensed table-hover">
    <thead>
    <tr>
        <th>用户编号</th>
        <th>open ID</th>
        <th>手机号码</th>
        <th>状态</th>
        <th>注册IP</th>
        <th>收货地址</th>
        <th>添加时间</th>
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
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['m_id'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['m_openId'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['m_phone'];?>
</td>
        <td>
            <?php if ($_smarty_tpl->tpl_vars['row']->value['m_status'] == 1) {?><span class="label label-success">正常</span><?php } else { ?><span class="label label-important">禁用</span><?php }?>
            <a data-json="确认要更改状态吗？" data-href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
status/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['m_id'];?>
/status/<?php echo $_smarty_tpl->tpl_vars['row']->value['m_status'];?>
">
                <i class="<?php if ($_smarty_tpl->tpl_vars['row']->value['m_status'] == 1) {?>icon-eye-open<?php } else { ?>icon-eye-close<?php }?>" title="<?php if ($_smarty_tpl->tpl_vars['row']->value['m_status'] == 2) {?>禁用<?php } else { ?>正常<?php }?>"></i></a>
        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['m_regIp'];?>
</td>
        <td><a data-toggle="modal" href="/admin/address/index/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['m_id'];?>
"  title="收货地址">查看</a></td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['m_addtime'];?>
</td>
    </tr>
    <?php
$_smarty_tpl->tpl_vars['row'] = $foreach_row_Sav;
}
?>
    <?php }?>
    </tbody>
</table>
<?php echo '<script'; ?>
 src="/public/admin/js/jquery-1.8.2.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/Validform_v5.3.2_min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/common.js"><?php echo '</script'; ?>
>

<div class="pagination pagination-small">
    <ul class="pull-right"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
<a class="current">总记录：<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</a></ul>
    <div class="clear"></div>
</div>
</body>
</html><?php }
}
?>