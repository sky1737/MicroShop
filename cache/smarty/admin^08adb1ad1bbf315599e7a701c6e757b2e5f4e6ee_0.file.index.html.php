<?php /* Smarty version 3.1.27, created on 2016-10-14 10:03:42
         compiled from "/mnt/www/www.weidian.com/application/modules/Admin/views/menu/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:79892143458003cfed3c966_75074139%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08adb1ad1bbf315599e7a701c6e757b2e5f4e6ee' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Admin/views/menu/index.html',
      1 => 1476254592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79892143458003cfed3c966_75074139',
  'variables' => 
  array (
    'mid' => 0,
    'name' => 0,
    'topList' => 0,
    'top' => 0,
    'm_id' => 0,
    'menuList' => 0,
    'val' => 0,
    'list' => 0,
    'row' => 0,
    'parent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58003cfedd6608_42078220',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58003cfedd6608_42078220')) {
function content_58003cfedd6608_42078220 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '79892143458003cfed3c966_75074139';
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
	<li class="active"><a href="/admin/menu/index">菜单管理</a></li>
</ul>
<div class="btn-group pull-right">
	<button class="btn" data-toggle="modal" href="/admin/menu/form" data-target="#formModal">添加菜单</button>
	<!--<button class="btn" data-href="/admin/menu/refresh/" data-json="确认更新菜单缓存吗？">更新缓存</button>-->
    <button class="btn" onClick="window.location.reload();">刷新界面</button>
</div>
<div class="clear"></div>

<!-- 搜索区域 -->
<form class="form-search" id="searchForm" style="margin-bottom:20px;" method="get" action="/admin/menu/index/">
    <input type="text" name="mid" class="input-medium search-query" placeholder="菜单ID" value="<?php echo $_smarty_tpl->tpl_vars['mid']->value;?>
">
    <input type="text" name="nameSearch" class="input-medium search-query" placeholder="菜单名称" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">
    <select name="menuSearch">
        <?php
$_from = $_smarty_tpl->tpl_vars['topList']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['top'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['top']->_loop = false;
$_smarty_tpl->tpl_vars['m_id'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['m_id']->value => $_smarty_tpl->tpl_vars['top']->value) {
$_smarty_tpl->tpl_vars['top']->_loop = true;
$foreach_top_Sav = $_smarty_tpl->tpl_vars['top'];
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['top']->value['m_id'];?>
">+<?php echo $_smarty_tpl->tpl_vars['top']->value['m_name'];?>
</option>
            <?php
$_from = $_smarty_tpl->tpl_vars['menuList']->value[$_smarty_tpl->tpl_vars['m_id']->value]['son'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$foreach_val_Sav = $_smarty_tpl->tpl_vars['val'];
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['m_id'];?>
">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['val']->value['m_name'];?>
</option>
            <?php
$_smarty_tpl->tpl_vars['val'] = $foreach_val_Sav;
}
?>
        <?php
$_smarty_tpl->tpl_vars['top'] = $foreach_top_Sav;
}
?>
    </select>
    <button type="submit" class="btn">搜索</button>
</form>

<!-- 内容区域 -->
<table class="table table-striped table-bordered table-condensed table-hover">
     <thead>
        <tr>
            <th>菜单ID</th>
            <th>菜单名称</th>
            <th>菜单URL</th>
            <th>模块名称</th>
            <th>控制器名称</th>
            <th>菜单标记</th>
            <th>排序</th>
            <th>状态</th>
            <th>添加时间</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($_smarty_tpl->tpl_vars['list']->value) {?>
        <?php
$_from = $_smarty_tpl->tpl_vars['list']->value;
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
            <td style="display:none;"><?php echo $_smarty_tpl->tpl_vars['row']->value['m_parent_id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['m_name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['m_url'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['m_module_name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['m_controller_name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['m_tag'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['m_order'];?>
</td>
            <td ><?php if ($_smarty_tpl->tpl_vars['row']->value['m_status'] == 1) {?><span class="label label-success">正常</span><?php } else { ?><span class="label label-warning">禁用</span><?php }?></td>
            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['m_addtime'];?>
</td>
            <td style="display:none;"><?php echo $_smarty_tpl->tpl_vars['row']->value['m_memo'];?>
</td>
            <td>
                <a data-toggle="modal" href="/admin/menu/form/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['m_id'];?>
" data-target="#formModal" title="编辑"><i class="icon-edit"></i></a>
                <a data-href="/admin/menu/delete/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['m_id'];?>
" data-json="确认要删除该菜单信息吗？" title="删除菜单"><i class="icon-remove"></i></a></td></td>
        </tr>
        <?php
$_smarty_tpl->tpl_vars['row'] = $foreach_row_Sav;
}
?>
        <?php }?>
</table>

<!-- 弹窗 -->
<form class="form-horizontal" id="form-process" action="/admin/menu/save/">
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
 src="/public/admin/js/Validform_v5.3.2_min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/jquery.artDialog.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/common.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
var menuSearch = '<?php echo $_smarty_tpl->tpl_vars['parent']->value;?>
';
if (menuSearch) {
	$(':input[name="menuSearch"] option[value="' + menuSearch + '"]').attr('selected', true);  
};
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
?>