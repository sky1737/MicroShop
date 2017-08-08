<?php /* Smarty version 3.1.27, created on 2016-10-14 09:12:08
         compiled from "/mnt/www/www.weidian.com/application/modules/Admin/views/product/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:747422949580030e857cbc1_72814602%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41cf16e1403eaa099806b8062516036512bff930' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Admin/views/product/index.html',
      1 => 1475221421,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '747422949580030e857cbc1_72814602',
  'variables' => 
  array (
    'baseUrl' => 0,
    'title' => 0,
    'categoryOption' => 0,
    'statusOption' => 0,
    'startTime' => 0,
    'endTime' => 0,
    'allData' => 0,
    'v' => 0,
    'category_data' => 0,
    'page' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_580030e85fe893_04579132',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_580030e85fe893_04579132')) {
function content_580030e85fe893_04579132 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '747422949580030e857cbc1_72814602';
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
    <link href="/public/admin/css/bootstrap-datetimepicker.css" rel="stylesheet">
</head>

<body>
<ul class="breadcrumb pull-left">
    <li>商品管理 <span class="divider">/</span></li>
    <li class="active">商品列表</li>
</ul>
<div class="btn-group pull-right">
    <button class="btn" onClick="window.location.href='/admin/product/add/'" style="margin-right: 20px;">添加商品</button>
    <button class="btn" onClick="window.location.reload();">刷新界面</button>
</div>
<div class="clear"></div>
<!-- 搜索区域 -->
<form class="form-search" id="searchForm" style="margin-bottom:20px;" method="get" action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
index/">
    商品名称：<input type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
" class="form-control" placeholder="商品名称关键字" style="width: 280px;margin-right: 10px;">
    所在分类：<select class="form-control" name="type" id="type"  class="input-medium" style="width:150px;"><?php echo $_smarty_tpl->tpl_vars['categoryOption']->value;?>
</select>
    &nbsp;&nbsp;状态：<?php echo $_smarty_tpl->tpl_vars['statusOption']->value;?>

    &nbsp;&nbsp;添加时间: <input type="text" class="form-control" name="startTime" id="startTime" value="<?php echo $_smarty_tpl->tpl_vars['startTime']->value;?>
"> ~
    <input type="text" class="form-control" name="endTime" id="endTime" value="<?php echo $_smarty_tpl->tpl_vars['endTime']->value;?>
">&nbsp;&nbsp;
    <button type="submit" class="btn">搜索</button>
</form>
<!-- 内容区域 -->
<table class="table table-striped table-condensed table-bordered table-hover">
    <thead>
    <tr>
        <th>商品id</th>
        <th>商品名称</th>
        <th>所在分类</th>
        <th>销量</th>
        <th>产品状态</th>
        <th>添加时间</th>
        <th>更新时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if ($_smarty_tpl->tpl_vars['allData']->value) {?>
    <?php
$_from = $_smarty_tpl->tpl_vars['allData']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['p_id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['p_title'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['category_data']->value[$_smarty_tpl->tpl_vars['v']->value['pc_id']];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['p_sales'];?>
</td>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['p_status'] == 1) {?><span class="label label-success">上架</span><?php } else { ?><span class="label label-important">下架</span><?php }?>
                <a data-json="<?php if ($_smarty_tpl->tpl_vars['v']->value['p_status'] == 1) {?>确认要更改下架吗？<?php } else { ?>确认要上架吗？<?php }?>" data-href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
status/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['p_id'];?>
/status/<?php echo $_smarty_tpl->tpl_vars['v']->value['p_status'];?>
">
                    <i class="<?php if ($_smarty_tpl->tpl_vars['v']->value['p_status'] == 1) {?>icon-eye-open<?php } else { ?>icon-eye-close<?php }?>" title="<?php if ($_smarty_tpl->tpl_vars['v']->value['p_status'] == 2) {?>下架<?php } else { ?>上架<?php }?>"></i></a>
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['p_addTime'];?>
 </td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['p_updateTime'];?>
 </td>
            <td>
                <a title="编辑商品" href="/admin/product/add/?id=<?php echo $_smarty_tpl->tpl_vars['v']->value['p_id'];?>
&name=<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
"><i class="icon-edit"></i></a>
                <!--<a title="预览商品" data-json="请通过企业号预览商品：<br/><?php echo $_smarty_tpl->tpl_vars['v']->value['p_title'];?>
" data-href="/admin/product/view/?id=<?php echo $_smarty_tpl->tpl_vars['v']->value['p_id'];?>
"><i class="icon-eye-open"></i></a>-->
                <?php if ($_smarty_tpl->tpl_vars['v']->value['p_status'] == 2) {?><a title="删除商品" data-json="确认要删除此商品么？" data-href="/admin/product/delete/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['p_id'];?>
"><i class="icon-remove"></i></a><?php }?>
            </td>
        </tr>
    <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
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
<?php echo '<script'; ?>
 src="/public/admin/js/bootstrap-datetimepicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $("#startTime,#endTime").datetimepicker({
        format: "yyyy-mm-dd hh:ii",
        autoclose: 1,
        pickerPosition: "bottom-left"
    });
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
?>