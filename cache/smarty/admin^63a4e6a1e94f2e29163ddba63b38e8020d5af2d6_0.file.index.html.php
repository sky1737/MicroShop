<?php /* Smarty version 3.1.27, created on 2016-10-14 09:32:27
         compiled from "/mnt/www/www.weidian.com/application/modules/Admin/views/order/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:1759877681580035ab5f6f16_13201284%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63a4e6a1e94f2e29163ddba63b38e8020d5af2d6' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Admin/views/order/index.html',
      1 => 1476408746,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1759877681580035ab5f6f16_13201284',
  'variables' => 
  array (
    'baseUrl' => 0,
    'payOption' => 0,
    'orderOption' => 0,
    'returnOption' => 0,
    'title' => 0,
    'orderSn' => 0,
    'startTime' => 0,
    'endTime' => 0,
    'data' => 0,
    'row' => 0,
    'page' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_580035ab661366_13848458',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_580035ab661366_13848458')) {
function content_580035ab661366_13848458 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1759877681580035ab5f6f16_13201284';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>订单管理</title>
    <!-- Bootstrap -->
    <link href="/public/admin/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/public/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/public/admin/css/bootstrap-customfile.css" rel="stylesheet" type="text/css" />
    <link href="/public/admin/css/bootstrap-datetimepicker.css" rel="stylesheet">
</head>
<body>

<!--面包屑导航-->
<ul class="breadcrumb pull-left">
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
index/">订单管理</a><span class="divider">/</span></li>
    <li class="active">订单列表</li>
</ul>

<!--菜单按钮-->
<div class="btn-group pull-right">
    <button class="btn" onClick="window.location.reload();">刷新界面</button>
</div>
<div class="clear"></div>

<!-- 搜索区域 -->
<form class="form-search" id="searchForm" style="margin-bottom:20px;" method="get" action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
index/">
    支付状态：<select name="psid" id="psid" class="form-control">
                <?php echo $_smarty_tpl->tpl_vars['payOption']->value;?>

            </select>
    订单状态：<select name="osid" id="osid" class="form-control">
                <?php echo $_smarty_tpl->tpl_vars['orderOption']->value;?>

            </select>
    退款状态：<select name="rsid" id="rsid" class="form-control">
                <?php echo $_smarty_tpl->tpl_vars['returnOption']->value;?>

            </select>
    商品名称：<input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
" class="form-control" placeholder="商品名称">
    订单编号：<input type="text" name="orderSn" value="<?php echo $_smarty_tpl->tpl_vars['orderSn']->value;?>
" class="form-control" placeholder="订单编号"><br/><br/>
    创建时间：<input type="text" class="form-control" name="startTime" id="startTime" value="<?php echo $_smarty_tpl->tpl_vars['startTime']->value;?>
" style="width:180px; display: inline-block;"> ~
             <input type="text" class="form-control" name="endTime" id="endTime" value="<?php echo $_smarty_tpl->tpl_vars['endTime']->value;?>
" style="width:180px; display: inline-block;">&nbsp;&nbsp;
    <button type="submit" class="btn">搜索</button>
</form>
<!-- 表格 -->
<table class="table table-bordered table-striped">
    <tr>
        <td>编号</td>
        <td>用户ID</td>
        <td>订单编号</td>
        <td>商品名称</td>
        <td>套餐名称</td>
        <td>单价</td>
        <td>数量</td>
        <td>实付金额</td>
        <td>支付状态</td>
        <td>创建时间</td>
        <td>更新时间</td>
        <td>操作</td>
    </tr>
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
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['o_id'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['m_id'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['o_order_no'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['p_title'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['pp_names'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['o_price'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['ol_num'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['o_payment_amount'];?>
</td>
        <td><?php if ($_smarty_tpl->tpl_vars['row']->value['o_pay_status'] == 1) {?><span class="label label-danger"><i class="glyphicon glyphicon-remove"></i>&nbsp;未支付</span><?php } elseif ($_smarty_tpl->tpl_vars['row']->value['o_pay_status'] == 2) {?><span class="label label-danger"><i class="glyphicon glyphicon-remove"></i>&nbsp;取消订单</span><?php } elseif ($_smarty_tpl->tpl_vars['row']->value['o_pay_status'] == 3) {?><span class="label label-success"><i class="glyphicon glyphicon-ok"></i>&nbsp;已支付</span><?php }?></td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['o_addtime'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['o_updatetime'];?>
</td>
        <td>
            <?php if ($_smarty_tpl->tpl_vars['row']->value['o_order_status'] == 1 && $_smarty_tpl->tpl_vars['row']->value['o_pay_status'] == 1) {?>
            <a data-toggle="modal" data-target="#priceModal" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
priceForm/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['o_id'];?>
" title="修改价格"><span class="label label-primary"><i class="glyphicon glyphicon-check"></i>&nbsp;改价</span></a>
            <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['o_order_status'] == 1 && $_smarty_tpl->tpl_vars['row']->value['o_pay_status'] == 3) {?>
            <a data-toggle="modal" data-target="#expressModal" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
expressForm/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['o_id'];?>
" title="填写快递"><span class="label label-info"><i class="glyphicon glyphicon-plane"></i>&nbsp;快递</span></span></a>
            <a href="#" data-json="确认要发货么？" data-href="/order/send/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['o_id'];?>
"><span class="label label-danger"><i class="glyphicon glyphicon-import"></i>&nbsp;发货</span></span></a>
            <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['o_order_status'] == 2 && $_smarty_tpl->tpl_vars['row']->value['o_pay_status'] == 3) {?>
            <a data-toggle="modal" data-target="#expressModal" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
expressForm/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['o_id'];?>
" title="修改快递"><span class="label label-info"><i class="glyphicon glyphicon-plane"></i>&nbsp;快递</span></a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['row']->value['o_order_status'] == 3 && $_smarty_tpl->tpl_vars['row']->value['o_pay_status'] == 3) {?>
            <span class="label label-warning"><i class="glyphicon glyphicon-ok"></i>&nbsp;交易完成</span>
            <?php }?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
details/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['o_id'];?>
" title="订单详情"><span class="label label-success"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;详情</span></a>
        </td>
    </tr>
    <?php
$_smarty_tpl->tpl_vars['row'] = $foreach_row_Sav;
}
?>
    <?php }?>
</table>

<div class="pagination pagination-small">
    <ul class="pull-right"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
<a class="current">总记录：<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</a></ul>
    <div class="clear"></div>
</div>

<!--改价弹窗-->
<form class="form-horizontal" action="/ajax/order/priceSave" method="post">
    <div class="modal fade" id="priceModal" tabindex="-1" role="dialog"></div>
</form>
<!--快递弹窗-->
<form class="form-horizontal" action="/ajax/order/expressSave" method="post">
    <div class="modal fade" id="expressModal" tabindex="-1" role="dialog"></div>
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