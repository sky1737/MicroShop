<?php /* Smarty version 3.1.27, created on 2016-11-02 11:04:53
         compiled from "/mnt/www/www.weidian.com/application/views/common/footer.html" */ ?>
<?php
/*%%SmartyHeaderCode:168013525581957d55145b4_66399554%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfc99a34247ffdb7c80ab388efa831f22b1cd9ce' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/views/common/footer.html',
      1 => 1476688389,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168013525581957d55145b4_66399554',
  'variables' => 
  array (
    'nav' => 0,
    'cartCount' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_581957d55414e3_60133617',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_581957d55414e3_60133617')) {
function content_581957d55414e3_60133617 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '168013525581957d55145b4_66399554';
?>

<!-- 工具栏 -->
<nav class="bar bar-tab">
    <a class="tab-item external my-btn" href="javascript:void(0);">
        <span class="icon icon-app"></span>
        <span class="tab-label">分类</span>
    </a>
    <a class="tab-item external <?php if (isset($_smarty_tpl->tpl_vars['nav']->value) && $_smarty_tpl->tpl_vars['nav']->value == 2) {?>active<?php }?>" href="/mall/find/index">
        <span class="icon icon-browser"></span>
        <span class="tab-label">发现</span>
    </a>
    <a class="tab-item external" href="/mall/shopCart/index">
        <span class="icon icon-cart"></span>
        <span class="tab-label">购物车</span>
        <?php if ($_smarty_tpl->tpl_vars['cartCount']->value > 0) {?>  <span class="badge"><?php echo $_smarty_tpl->tpl_vars['cartCount']->value;?>
</span><?php }?>
    </a>
    <a class="tab-item external <?php if (isset($_smarty_tpl->tpl_vars['nav']->value) && $_smarty_tpl->tpl_vars['nav']->value == 4) {?>active<?php }?>" href="/mall/order/index">
        <span class="icon icon-menu"></span>
        <span class="tab-label">我的订单</span>
    </a>
</nav>
<?php echo '<script'; ?>
>

    $(document).on("click", ".my-btn", function() {
        $.openPanel("#panel-js-demo");
    });
<?php echo '</script'; ?>
><?php }
}
?>