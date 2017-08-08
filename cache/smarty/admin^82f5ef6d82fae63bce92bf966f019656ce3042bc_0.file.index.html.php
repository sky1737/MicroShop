<?php /* Smarty version 3.1.27, created on 2016-10-14 09:12:09
         compiled from "/mnt/www/www.weidian.com/application/modules/Admin/views/category/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:781878421580030e92d2b73_56859381%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82f5ef6d82fae63bce92bf966f019656ce3042bc' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Admin/views/category/index.html',
      1 => 1476321858,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '781878421580030e92d2b73_56859381',
  'variables' => 
  array (
    'baseUrl' => 0,
    'name' => 0,
    'categoryOption' => 0,
    'data' => 0,
    'row' => 0,
    'page' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_580030e9356822_19126431',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_580030e9356822_19126431')) {
function content_580030e9356822_19126431 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '781878421580030e92d2b73_56859381';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品管理</title>
    <!-- Bootstrap -->
    <link href="/public/admin/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/public/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/public/admin/css/bootstrap-customfile.css" rel="stylesheet" type="text/css" />
</head>
<body>

<!--面包屑导航-->
<ul class="breadcrumb pull-left">
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
index/">商品管理</a><span class="divider">/</span></li>
    <li class="active">产品分类管理</li>
</ul>

<!--菜单按钮-->
<div class="btn-group pull-right">
    <button class="btn" data-toggle="modal" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
form/" data-target="#formModal">添加分类</button>
    <button class="btn" onClick="window.location.reload();">刷新界面</button>
</div>
<div class="clear"></div>

<!-- 搜索区域 -->
<form class="form-search" id="searchForm" style="margin-bottom:20px;" method="get" action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
index/">
    <input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" class="input-large search-query" placeholder="分类名称">
    所属分类：<select class="form-control" name="pid" id="pid" class="input-medium" style="width:150px;">
    <?php echo $_smarty_tpl->tpl_vars['categoryOption']->value;?>

    </select>
    <button type="submit" class="btn">搜索</button>
</form>

<!-- 内容区域 -->
<table class="table table-striped table-condensed table-bordered table-hover">
    <thead>
    <tr>
        <th>分类ID</th>
        <!--<th>上级分类</th>-->
        <th>分类名称</th>
        <th>分类别名</th>
        <th>排序</th>
        <th>状态</th>
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
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['pc_id'];?>
</td>
        <!--<td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['pc_pname'])===null||$tmp==='' ? '根目录' : $tmp);?>
</td>-->
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['pc_name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['pc_alise'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['pc_order'];?>
</td>

        <td>
            <?php if ($_smarty_tpl->tpl_vars['row']->value['pc_status'] == 1) {?><span class="label label-success">正常</span><?php } else { ?><span class="label label-important">禁用</span><?php }?>
            <a data-json="确认要更改状态吗？" data-href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
status/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['pc_id'];?>
/status/<?php echo $_smarty_tpl->tpl_vars['row']->value['pc_status'];?>
">
                <i class="<?php if ($_smarty_tpl->tpl_vars['row']->value['pc_status'] == 1) {?>icon-eye-open<?php } else { ?>icon-eye-close<?php }?>" title="<?php if ($_smarty_tpl->tpl_vars['row']->value['pc_status'] == 2) {?>禁用<?php } else { ?>正常<?php }?>"></i></a>
        </td>
         <td>
            <a data-toggle="modal" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
form/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['pc_id'];?>
" data-target="#formModal" title="编辑分类公司"><i class="icon-edit"></i></a>
            <!--<a title="删除分类" data-json="确认要删除此分类及子分类么？" data-href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
delete/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['pc_id'];?>
"><i class="icon-remove"></i></a>-->
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

<!--弹窗-->
<form class="form-horizontal" id="form-process" method="post" action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
save/" >
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
 src="/public/admin/js/bootstrap-customfile.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
?>