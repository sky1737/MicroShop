<?php /* Smarty version 3.1.27, created on 2016-11-02 11:04:49
         compiled from "/mnt/www/www.weidian.com/application/modules/Mall/views/shopcart/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:496954220581957d12e7734_55278627%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7b6d24f3efcfefcfd70810462454a5d00af836d' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Mall/views/shopcart/index.html',
      1 => 1478054021,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '496954220581957d12e7734_55278627',
  'variables' => 
  array (
    'shopCart' => 0,
    'key' => 0,
    'vo' => 0,
    'totalPrice' => 0,
    'cartCount' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_581957d1396928_25312639',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_581957d1396928_25312639')) {
function content_581957d1396928_25312639 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '496954220581957d12e7734_55278627';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>购物车</title>
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.css">
    <link rel="stylesheet" href="/public/mall/css/style.css">
</head>

<body>
<header class="bar bar-nav">
    <a class="button pull-left" href="/mall/index/index">商城首页</a>
    <a class="icon icon-remove pull-right" id="delete" href="javascript:void(0);"></a>
    <h1 class="title">购物车</h1>
</header>

<div class="content shopping-cart">
    <div class="list-block media-list">
        <ul>
            <?php if ($_smarty_tpl->tpl_vars['shopCart']->value) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['shopCart']->value;
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
                    <li id="li_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                        <div class="number">
                            <input class="jian" name="" type="button" value="-" scid="<?php echo $_smarty_tpl->tpl_vars['vo']->value['sc_id'];?>
" rel="<?php if ($_smarty_tpl->tpl_vars['vo']->value['ppInfo']) {
echo $_smarty_tpl->tpl_vars['vo']->value['ppInfo']['pp_price'];
} else {
echo $_smarty_tpl->tpl_vars['vo']->value['p_price'];
}?>"/>
                            <span class="span"><?php echo $_smarty_tpl->tpl_vars['vo']->value['sc_number'];?>
</span>
                            <input class="jia" name="" type="button" value="+" scid="<?php echo $_smarty_tpl->tpl_vars['vo']->value['sc_id'];?>
" rel="<?php if ($_smarty_tpl->tpl_vars['vo']->value['ppInfo']) {
echo $_smarty_tpl->tpl_vars['vo']->value['ppInfo']['pp_price'];
} else {
echo $_smarty_tpl->tpl_vars['vo']->value['p_price'];
}?>"/>
                        </div>
                        <label class="label-checkbox item-content">
                            <input type="checkbox" name="choice" value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['sc_id'];?>
" >
                            <div class="item-media"><i class="icon icon-form-checkbox"></i></div>
                            <div class="item-inner">
                                <div class="item-title-row">
                                    <div class="item-title"><?php echo $_smarty_tpl->tpl_vars['vo']->value['p_title'];?>
</div>
                                </div>
                                <?php if ($_smarty_tpl->tpl_vars['vo']->value['ppInfo']) {?>
                                <div class="item-subtitle">型号: <?php echo $_smarty_tpl->tpl_vars['vo']->value['ppInfo']['pp_name'];?>
</div>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['vo']->value['ppInfo']) {?>
                                <div class="item-text">¥<?php echo $_smarty_tpl->tpl_vars['vo']->value['ppInfo']['pp_price'];?>
 <del>¥<?php echo $_smarty_tpl->tpl_vars['vo']->value['p_price'];?>
</del></div>
                                <?php } else { ?>
                                <div class="item-text">¥<?php echo $_smarty_tpl->tpl_vars['vo']->value['p_price'];?>
</div>
                                <?php }?>
                            </div>
                        </label>
                    </li>
                <?php
$_smarty_tpl->tpl_vars['vo'] = $foreach_vo_Sav;
}
?>
            <?php }?>

        </ul>
    </div>

    <div class="text">总计(不含运费) : ￥<span id="totalPrice"><?php echo $_smarty_tpl->tpl_vars['totalPrice']->value;?>
</span></div>
    <a href="javascript:void(0);" id="buyBtn" class="bottom-btn button button-big button-fill button-danger">去结算(<?php echo $_smarty_tpl->tpl_vars['cartCount']->value;?>
)</a>
</div>




<?php echo '<script'; ?>
 type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.js' charset='utf-8'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.js' charset='utf-8'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $(".jia").click(function(){
        var a = $(this).siblings(".span").html();
        if(a > 9){
            $.alert("最多购买10个")
        }else{
            var price = parseFloat($(this).attr('rel'));
            var scid = $(this).attr('scid');
            var obj = $(this);
            $.post('/ajax/shopcart/update', {scid : scid, num : 1}, function(data){
                if(data.status == 'y'){
                    $('#totalPrice').html(parseFloat($('#totalPrice').html()) + price);
                    obj.siblings(".span").html(obj.siblings(".span").html() * 1 + 1)
                }
            }, 'json')

        }
    });

    $(".jian").click(function(){
        var a = $(this).siblings(".span").html();
        if(a < 2){
            $.alert("最少购买1个")
        }else{
            var price = parseFloat($(this).attr('rel'));
            var scid = $(this).attr('scid');
            var obj = $(this);
            $.post('/ajax/shopcart/update', {scid : scid, num : -1}, function(data){
                if(data.status == 'y'){
                    $('#totalPrice').html(parseFloat($('#totalPrice').html()) - price);
                    obj.siblings(".span").html(obj.siblings(".span").html() - 1)
                }
            }, 'json')

        }
    });



    $(document).ready(function(){
        $('#buyBtn').click(function(){
            var buyArr = [];
            $('input[name="choice"]:checked').each(function(){
                buyArr.push($(this).val());
            })
            if(buyArr.length <= 0){
                $.alert('未选择购买商品');return;
            }

            location.href = '/pay/order/?source=2&scids=' + buyArr.join(',');
        })

        $('#delete').click(function(){
            var delArr = [];
            $('input[name="choice"]:checked').each(function(){
                delArr.push($(this).val());
            })

            if(delArr.length <= 0){
                $.alert('未选择删除商品');return;
            }

            $.post('/ajax/shopcart/delete', {ids : delArr.join(',')}, function(data){
                if(data.status == 'y'){
                    for(var i in delArr){
                        $('#li_' + i).remove();
                    }
                }else{
                    $.alert(data.info);
                }
            }, 'json')
        })
    })
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
?>