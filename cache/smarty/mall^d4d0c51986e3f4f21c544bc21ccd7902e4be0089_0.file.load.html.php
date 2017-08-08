<?php /* Smarty version 3.1.27, created on 2016-11-07 15:02:09
         compiled from "/mnt/www/www.weidian.com/application/modules/Mall/views/order/load.html" */ ?>
<?php
/*%%SmartyHeaderCode:935584719582026f1dc9c85_40720452%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4d0c51986e3f4f21c544bc21ccd7902e4be0089' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Mall/views/order/load.html',
      1 => 1476688389,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '935584719582026f1dc9c85_40720452',
  'variables' => 
  array (
    'allData' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_582026f1e47055_92672687',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_582026f1e47055_92672687')) {
function content_582026f1e47055_92672687 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '935584719582026f1dc9c85_40720452';
if ($_smarty_tpl->tpl_vars['allData']->value) {?>
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
<?php }
}
}
?>