<?php /* Smarty version 3.1.27, created on 2016-10-17 15:13:23
         compiled from "/mnt/www/www.weidian.com/application/modules/Mall/views/order/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:172502152158047a137619a1_24630336%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2bbf138108e53843bb533254a3f179df0d3b99b' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Mall/views/order/index.html',
      1 => 1476688389,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172502152158047a137619a1_24630336',
  'variables' => 
  array (
    'data' => 0,
    'waitNumber' => 0,
    'payNumber' => 0,
    'sendNumber' => 0,
    'overNumber' => 0,
    'returnNumber' => 0,
    'cartCount' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58047a137d4b05_87340358',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58047a137d4b05_87340358')) {
function content_58047a137d4b05_87340358 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '172502152158047a137619a1_24630336';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>我的订单</title>
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
    <link rel="stylesheet" href="/public/mall/css/style.css">
</head>

<body>

<div class="content">
    <div class="orders">
        <header class="bar bar-nav">
            <a class="button pull-left" href="/mall/index/index">商城首页</a>
            <a class="button pull-right" href="/mall/order/list">全部订单</a>
            <h1 class="title">我的订单</h1>
        </header>

        <div class="content">
            <div class="list-block media-list">
                <ul>
                    <li>
                        <div class="item-content">
                            <div class="item-media"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['m_avatar'];?>
" style='width: 2.2rem;'></div>
                            <div class="item-inner">
                                <div class="item-title-row">
                                    <div class="item-title"><?php echo $_smarty_tpl->tpl_vars['data']->value['m_nickname'];?>
</div>
                                </div>
                                <div class="item-subtitle">已绑定手机：<?php echo $_smarty_tpl->tpl_vars['data']->value['m_phone'];?>
</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="bar-tab orders-menu">
                <a class="tab-item external" href="/mall/order/list/?showType=1">
                    <span class="icon iconfont">&#xe600;</span>
                    <span class="tab-label">待付款</span>
                    <?php if ($_smarty_tpl->tpl_vars['waitNumber']->value) {?> <span class="badge"><?php echo $_smarty_tpl->tpl_vars['waitNumber']->value;?>
</span><?php }?>
                </a>
                <a class="tab-item external" href="/mall/order/list/?showType=2">
                    <i class="icon iconfont">&#xe602;</i>
                    <span class="tab-label">待发货</span>
                    <?php if ($_smarty_tpl->tpl_vars['payNumber']->value) {?> <span class="badge"><?php echo $_smarty_tpl->tpl_vars['payNumber']->value;?>
</span><?php }?>
                </a>
                <a class="tab-item external" href="/mall/order/list/?showType=3">
                    <span class="icon iconfont">&#xe604;</span>
                    <span class="tab-label">待收货</span>
                    <?php if ($_smarty_tpl->tpl_vars['sendNumber']->value) {?> <span class="badge"><?php echo $_smarty_tpl->tpl_vars['sendNumber']->value;?>
</span><?php }?>
                </a>
                <a class="tab-item external" href="/mall/order/list/?showType=4">
                    <span class="icon iconfont">&#xe605;</span>
                    <span class="tab-label">已收货</span>
                    <?php if ($_smarty_tpl->tpl_vars['overNumber']->value) {?> <span class="badge"><?php echo $_smarty_tpl->tpl_vars['overNumber']->value;?>
</span><?php }?>
                </a>
                <a class="tab-item external" href="/mall/order/list/?showType=5">
                    <span class="icon iconfont">&#xe606;</span>
                    <span class="tab-label">退款中</span>
                    <?php if ($_smarty_tpl->tpl_vars['returnNumber']->value) {?> <span class="badge"><?php echo $_smarty_tpl->tpl_vars['returnNumber']->value;?>
</span><?php }?>
                </a>
            </div>
            <div class="clear"></div>
            <div class="bar-tab orders-menu">
                <a class="tab-item external" href="/member/collect/index">
                    <span class="icon iconfont">&#xe60a;</span>
                    <span class="tab-label">收藏商品</span>
                </a>
                <a class="tab-item external" href="/mall/find/index">
                    <span class="icon iconfont">&#xe601;</span>
                    <span class="tab-label">发现好货</span>
                </a>
                <a class="tab-item external" href="/mall/shopcart/index">
                    <span class="icon iconfont">&#xe607;</span>
                    <span class="tab-label">购物车</span>
                    <span class="badge"><?php if ($_smarty_tpl->tpl_vars['cartCount']->value) {
echo $_smarty_tpl->tpl_vars['cartCount']->value;
} else {
}?></span>
                </a>
                <a class="tab-item external" href="/mall/address/index">
                    <span class="icon iconfont">&#xe608;</span>
                    <span class="tab-label">收货地址</span>
                </a>
            </div>
            <div class="clear"></div>
        </div>

    </div>
</div>

<?php echo '<script'; ?>
 type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.js' charset='utf-8'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.js' charset='utf-8'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'><?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("application/views/common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

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