<?php /* Smarty version 3.1.27, created on 2016-11-07 16:17:24
         compiled from "/mnt/www/www.weidian.com/application/modules/Mall/views/order/list.html" */ ?>
<?php
/*%%SmartyHeaderCode:101426404258203894722be5_86487574%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e204ede2166aeebe2d58eb3a622c167a8d633218' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Mall/views/order/list.html',
      1 => 1478506643,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '101426404258203894722be5_86487574',
  'variables' => 
  array (
    'showType' => 0,
    'allData' => 0,
    'v' => 0,
    'total' => 0,
    'pageSize' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58203894797b19_58399190',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58203894797b19_58399190')) {
function content_58203894797b19_58399190 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '101426404258203894722be5_86487574';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>订单列表</title>
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.css">
    <link rel="stylesheet" href="/public/mall/css/style.css">
    <link rel="stylesheet" href="/public/mall/js/dropload/dropload.min.js">
</head>
<style>
    .dropload-down{position: absolute;bottom:15vw; width:200px;margin:0 0 0 -100px;left:50%;text-align: center; z-index: 999;}
    .tabs{ position: relative;padding-bottom: 25vw;}
 </style>
<body>
<div class="buttons-tab lp-menu">
    <a href="/mall/order/list" class="tab-link button <?php if (!$_smarty_tpl->tpl_vars['showType']->value) {?>active<?php }?>">全部</a>
    <a href="/mall/order/list/?showType=1" class="tab-link button <?php if ($_smarty_tpl->tpl_vars['showType']->value == 1) {?>active<?php }?>">待付款</a>
    <a href="/mall/order/list/?showType=2" class="tab-link button <?php if ($_smarty_tpl->tpl_vars['showType']->value == 2) {?>active<?php }?>">待发货</a>
    <a href="/mall/order/list/?showType=3" class="tab-link button <?php if ($_smarty_tpl->tpl_vars['showType']->value == 3) {?>active<?php }?>">待收货</a>
    <a href="/mall/order/list/?showType=4" class="tab-link button <?php if ($_smarty_tpl->tpl_vars['showType']->value == 4) {?>active<?php }?>">待评价</a>
    <a href="/mall/order/list/?showType=5" class="tab-link button <?php if ($_smarty_tpl->tpl_vars['showType']->value == 5) {?>active<?php }?>">退款中</a>
</div>
<!-- 列表 -->
<div class="content orders-list">
    <div class="tabs">
        <!-- tab1 -->
        <div id="order_list" class="tab active">
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
            <div class="card">
                <a href="/mall/order/details/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['o_id'];?>
">
                    <div class="card-header">
                        <?php if ($_smarty_tpl->tpl_vars['v']->value['o_pay_status'] == 1 && $_smarty_tpl->tpl_vars['v']->value['o_order_status'] == 1) {?>
                            待付款
                        <?php } elseif ($_smarty_tpl->tpl_vars['v']->value['o_pay_status'] == 3 && $_smarty_tpl->tpl_vars['v']->value['o_order_status'] == 1) {?>
                            待发货
                        <?php } elseif ($_smarty_tpl->tpl_vars['v']->value['o_pay_status'] == 3 && $_smarty_tpl->tpl_vars['v']->value['o_order_status'] == 2) {?>
                         待发货
                        <?php } elseif ($_smarty_tpl->tpl_vars['v']->value['o_pay_status'] == 3 && $_smarty_tpl->tpl_vars['v']->value['o_order_status'] == 3) {?>
                         待评价
                        <?php } elseif ($_smarty_tpl->tpl_vars['v']->value['o_pay_status'] == 2 && $_smarty_tpl->tpl_vars['v']->value['o_order_status'] == 1) {?>
                        订单取消
                        <?php }?>
                    </div>
                    <div class="card-content">
                        <div class="list-block media-list">
                            <ul>
                                <li class="item-content">
                                    <div class="item-media">
                                        <img src="<?php if ($_smarty_tpl->tpl_vars['v']->value['p_cover']) {
echo @constant('APP_IMAGE_URL');
echo $_smarty_tpl->tpl_vars['v']->value['p_cover'];
} else {
}?>" width="44">
                                    </div>
                                    <div class="item-inner">
                                        <div class="item-title-row">
                                            <div class="item-title"><?php echo $_smarty_tpl->tpl_vars['v']->value['p_title'];?>
</div>
                                        </div>
                                        <div class="item-subtitle">型号：<?php if ($_smarty_tpl->tpl_vars['v']->value['pp_names']) {
echo $_smarty_tpl->tpl_vars['v']->value['pp_names'];
} else { ?>暂无<?php }?>（福州送货上门）</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span>共<?php if ($_smarty_tpl->tpl_vars['v']->value['ol_num']) {
echo $_smarty_tpl->tpl_vars['v']->value['ol_num'];
} else { ?>0<?php }?>件商品</span>
                        <span>总价：￥<?php if ($_smarty_tpl->tpl_vars['v']->value['o_payment_amount']) {
echo $_smarty_tpl->tpl_vars['v']->value['o_payment_amount'];
} else { ?>0<?php }?></span>
                    </div>
                </a>
            </div>
            <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
            <?php }?>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
 src="/public/admin/js/jquery-2.0.2.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/mall/js/dropload/dropload.min.js"><?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->getSubTemplate ("application/views/common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php echo '<script'; ?>
>
    var total    = parseInt('<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
');
    var pageSize = parseInt('<?php echo $_smarty_tpl->tpl_vars['pageSize']->value;?>
');
    var showType = parseInt('<?php echo $_smarty_tpl->tpl_vars['showType']->value;?>
') > 0 ? parseInt('<?php echo $_smarty_tpl->tpl_vars['showType']->value;?>
') : '';

    $(function(){

        var page = 2;
        if(total >= pageSize) {

            $("#order_list").dropload({
                domDown : {                                                          // 下方DOM
                    domClass   : 'dropload-down',
                    domRefresh : '<div class="dropload-refresh">↑上拉加载更多</div>',
                    domLoad    : '<div class="dropload-load"><span class="loading"></span>加载中...</div>',
                    domNoData  : '<div class="dropload-noData">没有啦╮(╯_╰)╭</div>'
                },
                scrollArea : window,
                loadDownFn : function(me){

                    $.ajax({
                        type: 'GET',
                        url : "/mall/order/list/page/"+page+"?type=load&showType=" + showType,
                        dataType: 'html',
                        success: function(data){
                            if(data) {
                                //赋值数据
                                $("#order_list").append(data);
                                page++;
                            } else {
                                // 锁定
                                me.lock();
                                // 无数据
                                me.noData();
                            }
                            // 每次数据加载完，必须重置
                            me.resetload();
                        },
                        error: function(xhr, type){
                            // 即使加载出错，也得重置
                            me.resetload();
                        }
                    });
                }
            });
        }
    });
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
?>