<?php /* Smarty version 3.1.27, created on 2016-10-17 08:46:47
         compiled from "/mnt/www/www.weidian.com/application/modules/Admin/views/news/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:125066794858041f77602f55_97982988%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '460c2ba3178f301cc94848548cf3008be7ac4325' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Admin/views/news/index.html',
      1 => 1476168114,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125066794858041f77602f55_97982988',
  'variables' => 
  array (
    'baseUrl' => 0,
    'title' => 0,
    'categoryOption' => 0,
    'statusOption' => 0,
    'data' => 0,
    'row' => 0,
    'cateList' => 0,
    'page' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58041f7768e112_11605522',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58041f7768e112_11605522')) {
function content_58041f7768e112_11605522 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '125066794858041f77602f55_97982988';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文章管理</title>
    <!-- Bootstrap -->
    <link href="/public/admin/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/public/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
</head>
<body>
<ul class="breadcrumb pull-left">
    <li>文章管理<span class="divider">/</span></li>
    <li class="active"><a href="/admin/news/index">文章管理</a></li>
</ul>
<div class="btn-group pull-right">
    <button type="button" class="btn btn-primary pull-right"  onclick="location.href='/admin/news/form/'">添加文章</button>
    <button class="btn" onClick="window.location.reload();">刷新界面</button>
</div>
<div class="clear"></div>

<!--搜索区域-->
<form class="form-search" id="searchForm" style="margin-bottom:20px;" method="get" action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
index/">
    标题： <input type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
" class="form-control" placeholder="标题" style="width: 300px;">
    分类：<select name="pid" id="pid" class="form-control">
    <?php echo $_smarty_tpl->tpl_vars['categoryOption']->value;?>

</select>
    状态：
    <select name="status" id="status" class="form-control">
        <?php echo $_smarty_tpl->tpl_vars['statusOption']->value;?>

    </select>
    <button type="submit" class="btn">搜索</button>
</form>
<!-- 内容区域 -->
<table class="table table-striped table-bordered table-condensed table-hover">
    <thead>
    <tr>
        <th>序号</th>
        <th>所在分类</th>
        <th>标题</th>
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
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['n_id'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['cateList']->value[$_smarty_tpl->tpl_vars['row']->value['nc_id']];?>
</td>
        <td>
            <?php if ($_smarty_tpl->tpl_vars['cateList']->value[$_smarty_tpl->tpl_vars['row']->value['nc_id']] == '头条') {?>
            <?php echo $_smarty_tpl->tpl_vars['row']->value['n_title'];?>
---<?php if ($_smarty_tpl->tpl_vars['row']->value['n_type'] == 2) {?><span class="label label-success">国内新闻</span><?php } else { ?><span class="label label-danger">国际新闻</span><?php }?>
            <?php } else { ?>
            <?php if ($_smarty_tpl->tpl_vars['row']->value['nc_id'] != 11) {?>
            <?php echo $_smarty_tpl->tpl_vars['row']->value['n_title'];?>

            <?php }?>
            <?php }?></td>

        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['n_sort'];?>
</td>
        <td>
            <a href="javascript:void(0);" data-json="确认要更改状态吗？" data-href="/admin/news/status/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['n_id'];?>
/status/<?php echo $_smarty_tpl->tpl_vars['row']->value['n_status'];?>
">
                <i class="<?php if ($_smarty_tpl->tpl_vars['row']->value['n_status'] == 1) {?>icon-eye-open<?php } else { ?>icon-eye-close<?php }?>" title="<?php if ($_smarty_tpl->tpl_vars['row']->value['n_status'] == 2) {?>禁用<?php } else { ?>正常<?php }?>"></i>
                <?php if ($_smarty_tpl->tpl_vars['row']->value['n_status'] == 1) {?><span class="label label-success">正常</span><?php } else { ?><span class="label label-warning">禁用</span><?php }?>
            </a>
        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['n_addtime'];?>
</td>
        <!--<td>-->
        <!--<a href="javascript:void(0);" data-json="确认要更改状态吗？" data-href="/news/recommend/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['n_id'];?>
/status/<?php echo $_smarty_tpl->tpl_vars['row']->value['n_status'];?>
">-->
        <!--<i class="glyphicon <?php if ($_smarty_tpl->tpl_vars['row']->value['n_recommend'] == 1) {?>icon-eye-open<?php } else { ?>icon-eye-close<?php }?>" title="<?php if ($_smarty_tpl->tpl_vars['row']->value['n_status'] == 2) {?>禁用<?php } else { ?>正常<?php }?>"></i>-->
        <!--<?php if ($_smarty_tpl->tpl_vars['row']->value['n_recommend'] == 1) {?><span class="label label-success">推荐</span><?php } else { ?><span class="label label-warning">未推荐</span><?php }?>-->
        <!--</a>-->
        <!--</td>-->
        <td>
            <a class="icon-edit" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/form/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['n_id'];?>
" title="编辑"></a>&nbsp;&nbsp;
            <a class="icon-remove" data-json="确认要删除吗？" href="javascript:void(0);" title="删除" data-href="/admin/news/delete/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['n_id'];?>
/"></a>&nbsp;&nbsp;
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