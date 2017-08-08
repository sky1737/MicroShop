<?php /* Smarty version 3.1.27, created on 2016-10-17 09:14:22
         compiled from "/mnt/www/www.weidian.com/application/modules/Mall/views/order/details.html" */ ?>
<?php
/*%%SmartyHeaderCode:85734083580425eee80d51_57253341%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2722beddddbea810b0e6959871c5d82297f276ea' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Mall/views/order/details.html',
      1 => 1476437702,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85734083580425eee80d51_57253341',
  'variables' => 
  array (
    'data' => 0,
    'orderProduct' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_580425eef07d21_40339376',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_580425eef07d21_40339376')) {
function content_580425eef07d21_40339376 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '85734083580425eee80d51_57253341';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>订单列表</title>
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.css">
    <link rel="stylesheet" href="/public/mall/css/style.css">
</head>
<body>
<header class="bar bar-nav">
    <a class="button pull-left" href="/mall/index/index">商城首页</a>
    <a class="button pull-right" href="/mall/order/list">全部订单</a>
    <h1 class="title">我的订单</h1>
</header>
<div class="orders-show content">
    <div class="list">
        <ul>
            <li>
                <a class="tab-item external" href="#">
                    <i class="icon iconfont">&#xe60c;</i>
                </a>
                <div class="text">订单状态：<span>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['o_pay_status'] == 1 && $_smarty_tpl->tpl_vars['data']->value['o_order_status'] == 1) {?>
                            待付款
                        <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['o_pay_status'] == 3 && $_smarty_tpl->tpl_vars['data']->value['o_order_status'] == 1) {?>
                            待发货
                        <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['o_pay_status'] == 3 && $_smarty_tpl->tpl_vars['data']->value['o_order_status'] == 2) {?>
                         待发货
                        <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['o_pay_status'] == 3 && $_smarty_tpl->tpl_vars['data']->value['o_order_status'] == 3) {?>
                         待评价
                        <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['o_pay_status'] == 2 && $_smarty_tpl->tpl_vars['data']->value['o_order_status'] == 1) {?>
                        订单取消
                        <?php }?>
                </span></div>
            </li>
            <li>
                <a class="tab-item external" href="#">
                    <i class="icon iconfont">&#xe60b;</i>
                </a>
                <div class="text">订单总价：<span>￥<?php echo $_smarty_tpl->tpl_vars['data']->value['o_payment_amount'];?>
</span></div>
            </li>
        </ul>

        <div class="orders-title">收货人信息</div>
        <ul>
            <li>
                <a class="tab-item external" href="#">
                    <i class="icon iconfont">&#xe60d;</i>
                </a>
                <div class="text"><?php if ($_smarty_tpl->tpl_vars['data']->value['oe_contacts']) {
echo $_smarty_tpl->tpl_vars['data']->value['oe_contacts'];
}?>：<span><?php if ($_smarty_tpl->tpl_vars['data']->value['oe_phone']) {
echo $_smarty_tpl->tpl_vars['data']->value['oe_phone'];
}?></span></div>
            </li>
            <li>
                <a class="tab-item external" href="#">
                    <i class="icon iconfont">&#xe608;</i>
                </a>
                <div class="text">收货地址：<?php echo $_smarty_tpl->tpl_vars['data']->value['oe_address'];?>
</div>
            </li>
        </ul>

        <div class="orders-title">物流信息</div>
        <ul>
            <li>
                <a class="tab-item external" href="#">
                    <i class="icon iconfont">&#xe60e;</i>
                </a>
                <div class="text"><?php echo $_smarty_tpl->tpl_vars['data']->value['oe_express_company'];?>
&nbsp;:&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['oe_express_number'];?>
</div>
            </li>
        </ul>
    </div>

    <div class="orders-title">商品信息</div>
    <?php if ($_smarty_tpl->tpl_vars['orderProduct']->value) {?>
    <?php
$_from = $_smarty_tpl->tpl_vars['orderProduct']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
    <div class="orders-goods">
        <a href="/mall/product/details/id=<?php echo $_smarty_tpl->tpl_vars['v']->value['p_id'];?>
">
        <img src="<?php if ($_smarty_tpl->tpl_vars['v']->value['p_cover']) {
echo @constant('APP_IMAGE_URL');
echo $_smarty_tpl->tpl_vars['v']->value['p_cover'];
} else {
}?>">
        <div class="text">
            <p><?php echo $_smarty_tpl->tpl_vars['v']->value['p_title'];?>
<span>价格：￥<?php echo $_smarty_tpl->tpl_vars['v']->value['p_price'];?>
</span></p>
            <p>型号：<?php echo $_smarty_tpl->tpl_vars['v']->value['pp_names'];?>
<span>x<?php echo $_smarty_tpl->tpl_vars['v']->value['ol_num'];?>
</span></p>
        </div>
            </a>
    </div>
    <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
    <?php }?>
    <div class="clear"></div>
    <div class="goods-list">
        <p>商品金额<span>¥<?php echo $_smarty_tpl->tpl_vars['data']->value['o_order_amount'];?>
</span></p>
        <p>实付款<span>¥<?php echo $_smarty_tpl->tpl_vars['data']->value['o_payment_amount'];?>
</span></p>
        <p>微店订单号:<span><?php echo $_smarty_tpl->tpl_vars['data']->value['o_order_no'];?>
</span></p>
        <p>订单分类:<span>担保交易</span></p>
        <p>下单时间:<span><?php echo $_smarty_tpl->tpl_vars['data']->value['o_addtime'];?>
</span></p>
        <p>付款时间:<span><?php echo $_smarty_tpl->tpl_vars['data']->value['o_paytime'];?>
</span></p>
        <p>发货时间:<span><?php if ($_smarty_tpl->tpl_vars['data']->value['oe_express_company']) {
echo $_smarty_tpl->tpl_vars['data']->value['oe_sipping_time'];
} else { ?>暂未发货<?php }?></span></p>
    </div>
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['o'];?>
">
    <?php if ($_smarty_tpl->tpl_vars['data']->value['o_pay_status'] == 1 && $_smarty_tpl->tpl_vars['data']->value['o_order_status'] == 1) {?>
    <div class="content-block">
        <div class="row">
            <div class="col-100"><a href="/pay/order/?source=3&oid=<?php echo $_smarty_tpl->tpl_vars['data']->value['o_id'];?>
" class="button button-light button-fill button-danger button-success">继续支付</a></div>
        </div>
    </div>
    <?php }?>

</div>
<?php echo '<script'; ?>
 type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.js' charset='utf-8'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.js' charset='utf-8'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $(function() {
        $(".content").scroller({
            type: 'native'
        });
    });
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
?>