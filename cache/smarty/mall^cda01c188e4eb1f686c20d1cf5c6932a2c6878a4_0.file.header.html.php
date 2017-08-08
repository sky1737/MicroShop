<?php /* Smarty version 3.1.27, created on 2016-10-14 08:59:00
         compiled from "/mnt/www/www.weidian.com/application/views/common/header.html" */ ?>
<?php
/*%%SmartyHeaderCode:154144971958002dd45ee979_78727478%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cda01c188e4eb1f686c20d1cf5c6932a2c6878a4' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/views/common/header.html',
      1 => 1476323111,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154144971958002dd45ee979_78727478',
  'variables' => 
  array (
    'cartCount' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58002dd45f4a14_24496193',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58002dd45f4a14_24496193')) {
function content_58002dd45f4a14_24496193 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '154144971958002dd45ee979_78727478';
?>
<header class="bar bar-nav">
    <a href="/mall/order/index" class="icon icon-menu pull-left"></a>
    <a href="/mall/shopcart/index" class="icon icon-cart pull-right" id="cartCount"><?php if ($_smarty_tpl->tpl_vars['cartCount']->value > 0) {?><span class="badge"><?php echo $_smarty_tpl->tpl_vars['cartCount']->value;?>
</span><?php }?></a>
    <h1 class="title"></h1>
</header><?php }
}
?>