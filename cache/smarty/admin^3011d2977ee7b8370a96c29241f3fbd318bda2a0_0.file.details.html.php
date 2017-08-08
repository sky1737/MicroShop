<?php /* Smarty version 3.1.27, created on 2016-10-14 14:34:16
         compiled from "/mnt/www/www.weidian.com/application/modules/Admin/views/order/details.html" */ ?>
<?php
/*%%SmartyHeaderCode:16666078758007c684ed3b7_66471516%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3011d2977ee7b8370a96c29241f3fbd318bda2a0' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Admin/views/order/details.html',
      1 => 1476426603,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16666078758007c684ed3b7_66471516',
  'variables' => 
  array (
    'breadTitle' => 0,
    'data' => 0,
    'productNum' => 0,
    'orderProduct' => 0,
    'v2' => 0,
    'express' => 0,
    'progressData' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58007c6855ca81_01279771',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58007c6855ca81_01279771')) {
function content_58007c6855ca81_01279771 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '16666078758007c684ed3b7_66471516';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>订单管理</title>
    <!-- Bootstrap -->
    <link href="/public/admin/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/public/admin/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="/public/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/public/admin/css/bootstrap-customfile.css" rel="stylesheet" type="text/css" />
    <link href="/public/admin/css/bootstrap-datetimepicker.css" rel="stylesheet">
</head>
<style>
    .hide{display: none;}
    .panel-body > p > b{width:100px; display: inline-block;border-right: dashed 1px #d5d5d5;margin-right:2%;}
    .panel-body > p{padding-bottom: 15px;border-bottom: dashed 1px #c5c5c5;}
    .panel_header{background: #999;width: 100%;padding:5px 0px 5px 20px; font-size:16px;margin-bottom:10px;color:#fff;}
    .table > thead > tr > th{border:none;}
    .clearafter:after{ clear:both; content:"."; height:0px; font-size:0px; visibility:hidden; display:block; }
    .order_content li{width: 48%; float: left;padding:10px;border-bottom: dashed 1px #c5c5c5;}
    .order_content li > b{width:100px; display: inline-block;margin-right:2%;}
</style>
<body>

<div class="main">
    <div id="right">
        <!--面包屑导航-->
        <ul class="breadcrumb">
            <li><a href="/admin/order/index/">订单列表 </a></li>
            <li class="active"><?php echo $_smarty_tpl->tpl_vars['breadTitle']->value;?>
</li>
        </ul>
        <div class="form-horizontal" style="width:95%;margin:0 auto;">
            <div class="row">
                <div class="col-sm-7">
                    <div class="panel panel-success">
                        <!-- Default panel contents -->
                        <div class="panel-heading">购买人信息</div>
                        <div class="panel-body">
                            <div class="panel_header" >订单信息</div>
                            <ul class="order_content clearafter">
                                <li><b>订单ID:</b>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['o_id'];?>
</li>
                                <li><b>订单编号:</b>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['o_order_no'];?>
</li>
                                <li><b>用户ID:</b>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['m_id'];?>
</li>
                                <li><b>购买数量:</b>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['productNum']->value;?>
</li>
                                <li><b>订单总额:</b>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['o_order_amount'];?>
</li>
                                <li><b>实付金额:</b>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['o_payment_amount'];?>
</li>
                                <li><b>支付状态:</b>&nbsp;&nbsp;
                                    <?php if ($_smarty_tpl->tpl_vars['data']->value['o_pay_status'] == 1) {?><span class="label label-danger">未支付</span><?php } elseif ($_smarty_tpl->tpl_vars['data']->value['o_pay_status'] == 2) {?><span class="label label-danger">取消订单</span><?php } elseif ($_smarty_tpl->tpl_vars['data']->value['o_pay_status'] == 3) {?><span class="label label-success">已支付</span><?php }?>
                                </li>
                                <li><b>订单添加时间:</b>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['o_addtime'];?>
</li>
                                <li><b>订单状态:</b>&nbsp;&nbsp;
                                    <?php if ($_smarty_tpl->tpl_vars['data']->value['o_order_status'] == 1) {?><span class="label label-danger">未发货</span><?php } elseif ($_smarty_tpl->tpl_vars['data']->value['o_order_status'] == 2) {?><span class="label label-danger">已发货</span><?php } elseif ($_smarty_tpl->tpl_vars['data']->value['o_order_status'] == 3) {?><span class="label label-success">确认收货</span><?php }?>
                                </li>
                                <li><b>订单更新时间:</b>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['o_updatetime'];?>
</li>
                                <li><b>退款状态:</b>&nbsp;&nbsp;
                                    <?php if ($_smarty_tpl->tpl_vars['data']->value['o_refund_status'] == 1) {?><span class="label label-danger">未退款</span><?php } elseif ($_smarty_tpl->tpl_vars['data']->value['o_refund_status'] == 2) {?><span class="label label-danger">退款中</span><?php } elseif ($_smarty_tpl->tpl_vars['data']->value['o_refund_status'] == 3) {?><span class="label label-success">已退款</span><?php }?>
                                </li>
                                <li><b>支付时间:</b>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['o_paytime'];?>
</li>
                            </ul>
                            <?php if ($_smarty_tpl->tpl_vars['orderProduct']->value) {?>
                            <div class="panel_header" style="">商品信息</div>
                            <?php
$_from = $_smarty_tpl->tpl_vars['orderProduct']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v2'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v2']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v2']->value) {
$_smarty_tpl->tpl_vars['v2']->_loop = true;
$foreach_v2_Sav = $_smarty_tpl->tpl_vars['v2'];
?>
                                <ul class="order_content clearafter">
                                    <li><b>商品名称:</b>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['v2']->value['p_title'];?>
</li>
                                    <li><b>商品价格:</b>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['v2']->value['p_price'];?>
</li>
                                    <li><b>型号:</b>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['v2']->value['pp_names'];?>
</li>
                                    <li><b>数量:</b>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['v2']->value['ol_num'];?>
</li>
                                </ul>
                            <?php
$_smarty_tpl->tpl_vars['v2'] = $foreach_v2_Sav;
}
?>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['express']->value) {?>
                            <div class="panel_header" style="">发货地址信息</div>
                            <ul class="order_content clearafter">
                                <li><b>快递公司:</b>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['express']->value['oe_express_company'];?>
</li>
                                <li><b>快递单号:</b>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['express']->value['oe_express_number'];?>
</li>
                            <li><b>联系人:</b>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['express']->value['oe_contacts'];?>
</li>
                                <li><b>联系电话:</b>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['express']->value['oe_phone'];?>
</li>
                            <li><b>地址:</b>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['express']->value['oe_address'];?>
</li>
                                </ul>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <?php if ($_smarty_tpl->tpl_vars['progressData']->value) {?>
                    <div class="panel panel-danger">
                        <!-- Default panel contents -->
                        <div class="panel-heading">订单进度</div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead style="border-bottom: solid 2px #c33;">
                                    <tr>
                                        <th>时间</th>
                                        <th>信息</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
$_from = $_smarty_tpl->tpl_vars['progressData']->value;
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
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['op_addtime'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['op_memo'];?>
</td>
                                    </tr>
                                    <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>

            <div class="clear10"></div>
        </div>
    </div>
    <div class="clear"></div>
</div>


<?php }
}
?>