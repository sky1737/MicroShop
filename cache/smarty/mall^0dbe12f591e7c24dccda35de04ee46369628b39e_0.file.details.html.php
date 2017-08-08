<?php /* Smarty version 3.1.27, created on 2016-11-07 14:38:51
         compiled from "/mnt/www/www.weidian.com/application/modules/Mall/views/product/details.html" */ ?>
<?php
/*%%SmartyHeaderCode:1388215820217b82e745_62073836%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0dbe12f591e7c24dccda35de04ee46369628b39e' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Mall/views/product/details.html',
      1 => 1478499803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1388215820217b82e745_62073836',
  'variables' => 
  array (
    'data' => 0,
    'discount' => 0,
    'ppCount' => 0,
    'ppData' => 0,
    'vo' => 0,
    'vl' => 0,
    'key' => 0,
    'collect' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5820217b8c5ce4_13284792',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5820217b8c5ce4_13284792')) {
function content_5820217b8c5ce4_13284792 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1388215820217b82e745_62073836';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>商品详情</title>
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.css">
    <link rel="stylesheet" href="/public/mall/css/style.css">
</head>

<body>
<?php echo $_smarty_tpl->getSubTemplate ("application/views/common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>



<div class="content">
    <div class="goods-show">
        <img src="<?php echo @constant('APP_IMAGE_URL');
echo $_smarty_tpl->tpl_vars['data']->value['p_cover'];?>
">
        <h4><?php echo $_smarty_tpl->tpl_vars['data']->value['p_title'];?>
</h4>
        <h5>￥<?php echo $_smarty_tpl->tpl_vars['data']->value['p_price'];?>
</h5>
        <?php if ($_smarty_tpl->tpl_vars['discount']->value) {?>
        <div class="hang"><mark>限时</mark><span>剩余时间<?php echo $_smarty_tpl->tpl_vars['discount']->value['pd_endTime'];?>
</span></div>
        <?php }?>
        <div class="hang open-bulletin"><mark>包邮</mark><span>偏远地区除外 ></span></div>

        <a class="assure open-guarantee">
            <span class="icon icon-check"></span>商城担保交易<span class="icon icon-check"></span>7天退货<span class="icon icon-check"></span>微信支付<span class="icon icon-right"></span></a>
        <div class="goods-title">商品详情</div>
        <div class="text">
           <?php echo $_smarty_tpl->tpl_vars['data']->value['p_content'];?>

        </div>
    </div>
</div>
<input type="hidden" name="choice_type" id="choice_type" value="1">

<!-- popup -->
<div class="popup popup-buy goods-popup">
    <a class="close-popup goods-popup-title" href="javascript:void(0);">收起</a>
    <div class="list-block media-list">
        <ul>
            <li>
                <div class="item-content">
                    <div class="item-media"><img src="<?php echo @constant('APP_IMAGE_URL');
echo $_smarty_tpl->tpl_vars['data']->value['p_cover'];?>
"></div>
                    <div class="item-inner">
                        <div class="item-title-row">
                            <div class="item-title">￥<span id="price"><?php echo $_smarty_tpl->tpl_vars['data']->value['p_price'];?>
</span></div>
                        </div>
                        <!--<div class="item-subtitle"><del>￥8888.00</del></div>-->
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <input type="hidden" name="ppCount" id="ppCount" value="<?php echo $_smarty_tpl->tpl_vars['ppCount']->value;?>
">
    <?php if ($_smarty_tpl->tpl_vars['ppData']->value) {?>
        <?php
$_from = $_smarty_tpl->tpl_vars['ppData']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['vo']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['vo']->value) {
$_smarty_tpl->tpl_vars['vo']->_loop = true;
$foreach_vo_Sav = $_smarty_tpl->tpl_vars['vo'];
?>
            <div class="goods-popup-title"><?php echo $_smarty_tpl->tpl_vars['vo']->value['name'];?>
</div>
            <div class="list-block media-list">
                <ul>
                    <?php
$_from = $_smarty_tpl->tpl_vars['vo']->value['list'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['vl'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['vl']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['vl']->value) {
$_smarty_tpl->tpl_vars['vl']->_loop = true;
$foreach_vl_Sav = $_smarty_tpl->tpl_vars['vl'];
?>
                    <li>
                        <label class="label-checkbox item-content" price="<?php echo $_smarty_tpl->tpl_vars['vl']->value['pp_price'];?>
">
                            <input type="radio" name="ppid_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"  class="ppids"  value="<?php echo $_smarty_tpl->tpl_vars['vl']->value['pp_id'];?>
">
                            <div class="item-media"><i class="icon icon-form-checkbox"></i></div>
                            <div class="item-inner">
                                <div class="item-title-row">
                                    <div class="item-title"><?php echo $_smarty_tpl->tpl_vars['vl']->value['pp_name'];?>
</div>
                                </div>
                            </div>
                        </label>
                    </li>
                    <?php
$_smarty_tpl->tpl_vars['vl'] = $foreach_vl_Sav;
}
?>
                </ul>
            </div>
        <?php
$_smarty_tpl->tpl_vars['vo'] = $foreach_vo_Sav;
}
?>
    <?php }?>

    <div class="goods-popup-title">购买数量</div>
    <div class="number">
        <input class="jian" name="" type="button" value="-" />
        <span class="span">1</span>
        <input class="jia" name="" type="button" value="+" />
    </div>
    <a href="javascript:void(0);" id="buyBtn" class="bottom-btn button button-big button-fill button-danger">确定</a>
</div>

<div class="popup popup-bulletin">
    <a class="close-popup goods-popup-title" href="javascript:void(0);">收起</a>
    <div class="guarantee-hang">
        <p class="guarantee-intro">xx地区</p>
    </div>
</div>
<div class="popup popup-guarantee">
    <a class="close-popup goods-popup-title" href="javascript:void(0);">收起</a>
    <div class="guarantee-h4">服务保障</div>
    <div class="guarantee-hang">
        <p class="guarantee-title">7天退货</p>
        <p class="guarantee-intro">确认收货后的7天内,货款将被冻结,消费者收到货物有问题可 以发起退换货申请</p>
    </div>
    <div class="guarantee-hang">
        <p class="guarantee-title">微店担保</p>
        <p class="guarantee-intro">该商家已开通了担保交易服务,货款将由微店提供担保,在买 家确认收货后再结算给卖家。</p>
    </div>
    <div class="guarantee-hang">
        <p class="guarantee-title">支付宝支付</p>
        <p class="guarantee-intro">该商家店铺支持使用支付宝支付。</p>
    </div>
    <div class="guarantee-hang">
        <p class="guarantee-title">信用卡支付</p>
        <p class="guarantee-intro">该商家店铺支持使用信用卡支付。</p>
    </div>
</div>

<div class="agg-bj"></div>
<div class="agg-goods">
    <img src="/public/mall/images/banner.jpg">
</div>


<nav class="bar bar-tab">
    <a class="tab-item external" href="javascript:void(0);">
        <?php if ($_smarty_tpl->tpl_vars['collect']->value) {?>
        <span class="icon iconfont" id="collect">&#xe609;</span>
        <?php } else { ?>
        <span class="icon iconfont" id="collect">&#xe60a;</span>
        <?php }?>
        <span class="tab-label">收藏</span>
    </a>
    <a class="tab-item external open-buy2" href="javascript:void(0);">
        <span class="icon icon-cart"></span>
        <span class="tab-label">加入购物车</span>
    </a>
    <a class="tab-item external open-buy" href="javascript:void(0);">
        <span class="icon iconfont">&#xe603;</span>
        <span class="tab-label">立即购买</span>
    </a>
</nav>
<?php echo '<script'; ?>
 type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.js' charset='utf-8'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.js' charset='utf-8'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $('#collect').click(function(){
        $.post('/ajax/product/collect', {pid : parseInt('<?php echo $_smarty_tpl->tpl_vars['data']->value['p_id'];?>
')}, function(data){
            $.alert(data.info);
            if(data.status == 'y'){
                if($('#collect').html() == '&#xe60a;'){
                    $('#collect').html('&#xe609;');
                }else{
                    $('#collect').html('&#xe60a;');
                }
            }
        }, 'json')
    })

    $('#buyBtn').click(function(){
        var choice = $('#choice_type').val();
        var pid = parseInt('<?php echo $_smarty_tpl->tpl_vars['data']->value['p_id'];?>
');
        var ppids = [];
        var ppCount = parseInt($('#ppCount').val());
        var num = parseInt($('.span').html());
        $('input[type="radio"]:checked').each(function(){
            ppids.push($(this).val());
        })

        if(ppids.length < ppCount){
            $.alert('请选择规格');
            return;
        }

        if(choice == 1){
            location.href = '/pay/order/?pid=' + pid + '&ppids=' + ppids.join(',') + '&num=' + num;
        }else{
            // 加入购物车
            $.post('/ajax/shopcart/addcart', {pid : pid, ppids : ppids.join(','), num : num}, function(data){
                if(data.status == 'y'){
                    $(".agg-goods").show();
                    $(".agg-bj").show();
                    setTimeout(function(){
                        $.alert(data.info.info);
                    },2000)

                    $('#cartCount').html("<span class='badge'>" + data.info.count + "</span>");
                }else{
                    $.alert(data.info)
                }
            }, 'json')
        }
    })

    $(document).on('click','.label-checkbox', function () {
        $('#price').val($(this).val)
    });

    $(document).on('click','.open-buy', function () {
        $('#choice_type').val(1);
        $.popup('.popup-buy');
    });

    $(document).on('click','.open-buy2', function () {
        $('#choice_type').val(2);
        $.popup('.popup-buy');
    });

    $(document).on('click','.open-bulletin', function () {
        $.popup('.popup-bulletin');
    });

    $(document).on('click','.open-guarantee', function () {
        $.popup('.popup-guarantee');
    });

    $(".jia").click(function(){
        var a=$(this).siblings(".span").html();
        if(a>9){
            $.alert("最多购买10个")
        }else{
            $(this).siblings(".span").html($(this).siblings(".span").html()*1+1)
        }
    });

    $(".jian").click(function(){
        var a=$(this).siblings(".span").html();
        if(a<2){
            $.alert("最少购买1个")
        }else{
            $(this).siblings(".span").html($(this).siblings(".span").html()-1)
        }
    });

    $(".agg-btn").click(function(){
        $(".agg-goods").show();
        $(".agg-bj").show();
        setTimeout(function(){
            $.alert("已添加到购物车")
        },2000)
    });
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
?>