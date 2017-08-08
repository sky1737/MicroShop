<?php /* Smarty version 3.1.27, created on 2016-11-07 14:59:58
         compiled from "/mnt/www/www.weidian.com/application/modules/Mall/views/shopcart/order.html" */ ?>
<?php
/*%%SmartyHeaderCode:21400617295820266e34a063_46805919%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d2177a91f5741e39ca60304cc9549c88a0161a8' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Mall/views/shopcart/order.html',
      1 => 1478501989,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21400617295820266e34a063_46805919',
  'variables' => 
  array (
    'addrInfo' => 0,
    'cartList' => 0,
    'vo' => 0,
    'totalPrice' => 0,
    'signPackage' => 0,
    'scids' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5820266e3b4067_05112798',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5820266e3b4067_05112798')) {
function content_5820266e3b4067_05112798 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '21400617295820266e34a063_46805919';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>确认购买</title>
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.css">
    <link rel="stylesheet" href="/public/mall/css/style.css">
</head>

<body>
<!--<header class="bar bar-nav">-->
    <!--<a class="button pull-left" href="index.html">商城首页</a>-->
    <!--<a class="button pull-right button-danger open-popup">快速登录</a>-->
    <!--<h1 class="title">确认购买</h1>-->
<!--</header>-->

<div class="content buying">
    <div class="list-block">
        <a class="item-content item-link" href="/mall/address/index/pay/1">
            <div class="item-inner">
                <?php if ($_smarty_tpl->tpl_vars['addrInfo']->value) {?>
                <?php echo $_smarty_tpl->tpl_vars['addrInfo']->value['a_province'];?>
 <?php echo $_smarty_tpl->tpl_vars['addrInfo']->value['a_city'];?>
 <?php echo $_smarty_tpl->tpl_vars['addrInfo']->value['a_area'];?>
 <?php echo $_smarty_tpl->tpl_vars['addrInfo']->value['a_address'];?>
 <?php echo $_smarty_tpl->tpl_vars['addrInfo']->value['a_realname'];?>
 <?php echo $_smarty_tpl->tpl_vars['addrInfo']->value['a_phone'];?>

                <?php } else { ?>
                请填写收货地址
                <?php }?>
            </div>
        </a>
    </div>

    <div class="list-block media-list">
        <ul>
            <li>
                <label class="label-checkbox item-content">
                    <input name="my-radio" type="radio" checked>
                    <div class="item-media"><i class="icon icon-form-checkbox"></i></div>
                    <div class="item-inner">
                        <div class="item-title-row">
                            <div class="item-title">在线支付</div>
                        </div>
                    </div>
                </label>
            </li>
        </ul>
    </div>

    <div class="orders-title">商品信息</div>
    <?php if ($_smarty_tpl->tpl_vars['cartList']->value) {?>
        <?php
$_from = $_smarty_tpl->tpl_vars['cartList']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['vo']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
$_smarty_tpl->tpl_vars['vo']->_loop = true;
$foreach_vo_Sav = $_smarty_tpl->tpl_vars['vo'];
?>
            <div class="orders-goods">
                <img src="<?php echo @constant('APP_IMAGE_URL');
echo $_smarty_tpl->tpl_vars['vo']->value['productInfo']['p_cover'];?>
">
                <div class="text">
                    <p><?php echo $_smarty_tpl->tpl_vars['vo']->value['productInfo']['p_title'];?>
<span>价格：￥<?php echo $_smarty_tpl->tpl_vars['vo']->value['price'];?>
</span></p>
                    <p><?php if ($_smarty_tpl->tpl_vars['vo']->value['ppname']) {?>型号：<?php echo $_smarty_tpl->tpl_vars['vo']->value['ppname'];
}?><span>x1</span></p>
                </div>
            </div>
        <?php
$_smarty_tpl->tpl_vars['vo'] = $foreach_vo_Sav;
}
?>
    <?php }?>

    <div class="goods-list">
        <p>商品金额<span>¥<?php echo $_smarty_tpl->tpl_vars['totalPrice']->value;?>
</span></p>
        <!--<p>运费<span>￥100.0</span>0</p>-->
        <p>实付款<strong>¥<span id="totalPrice"><?php echo $_smarty_tpl->tpl_vars['totalPrice']->value;?>
</span></strong></p>
    </div>
    <div class="orders-title">留言信息</div>
    <div class="message">
        <!--<input name="wechat" id="wechat" type="text" placeholder="微信号">-->
        <textarea name="message" id="message" cols="" rows="" placeholder="留言内容"></textarea>
    </div>
    <a href="javascript:void(0);" id="buyBtn" class="bottom-btn button button-big button-fill button-danger">去付款</a>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.js' charset='utf-8'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.js' charset='utf-8'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var appId     = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['appId'];?>
';var timestamp = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['timestamp'];?>
';
    var nonceStr  = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['nonceStr'];?>
';var signature = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['signature'];?>
';

    wx.config({
        appId: appId,
        timestamp:timestamp,
        nonceStr: nonceStr,
        signature: signature,
        jsApiList: [
            'chooseWXPay'
        ]
    });

    var operation = false;

    $('#buyBtn').click(function(){
        var addr = '<?php echo (($tmp = @$_smarty_tpl->tpl_vars['addrInfo']->value['a_id'])===null||$tmp==='' ? 0 : $tmp);?>
';
        var scids = '<?php echo $_smarty_tpl->tpl_vars['scids']->value;?>
';
        var message = $('#message').val();
        if(operation){
            return;
        }

        operation = true;
        $.post('/ajax/product/buyCart', {scids : scids, addr:addr,memo:message}, function(data){
            operation = false;
            if(data.status == 'y'){
                var jsApiParameters = data.info.params;
                var orderNo = data.info.orderNo;
                var id = data.info.id;
                Pay(jsApiParameters, "/mall/order/index", orderNo, id);
            }else{
                $.alert(data.info);
            }
        }, 'json')
    })

    function Pay(jsApiParameters, url){
        wx.chooseWXPay({
            timestamp: jsApiParameters.timeStamp,
            nonceStr: jsApiParameters.nonceStr,
            package: jsApiParameters.package,
            signType: jsApiParameters.signType, // 注意：新版支付接口使用 MD5 加密
            paySign: jsApiParameters.paySign,
            success: function (res) {
                window.location.href = url;
            }
        });
    }

<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
?>