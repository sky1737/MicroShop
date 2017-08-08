<?php /* Smarty version 3.1.27, created on 2016-11-02 11:04:53
         compiled from "/mnt/www/www.weidian.com/application/modules/Member/views/collect/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:909773087581957d54761f2_72344724%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc5dc3ab5a584ca869c2584772e821340006d0ae' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Member/views/collect/index.html',
      1 => 1476688389,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '909773087581957d54761f2_72344724',
  'variables' => 
  array (
    'data' => 0,
    'vo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_581957d54ff137_24301959',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_581957d54ff137_24301959')) {
function content_581957d54ff137_24301959 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '909773087581957d54761f2_72344724';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>收藏</title>
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.css">
    <link rel="stylesheet" href="/public/mall/css/style.css">
</head>

<body>

<header class="bar bar-nav">
    <h1 class="title">收藏</h1>
</header>


<!-- 列表 -->
<div class="content">
    <div class="keep">
        <div class="list-block media-list">
            <ul>
                <?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
                    <?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['vo']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
$_smarty_tpl->tpl_vars['vo']->_loop = true;
$foreach_vo_Sav = $_smarty_tpl->tpl_vars['vo'];
?>
                        <li>
                            <a href="/mall/product/details/pid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['p_id'];?>
" class="item-link item-content">
                                <div class="item-media"><img src="<?php echo @constant('APP_IMAGE_URL');
echo $_smarty_tpl->tpl_vars['vo']->value['p_cover'];?>
" style='width: 4rem;'></div>
                                <div class="item-inner">
                                    <div class="item-title-row">
                                        <div class="item-title"><?php echo $_smarty_tpl->tpl_vars['vo']->value['p_title'];?>
</div>
                                        <div class="item-after">￥<?php echo $_smarty_tpl->tpl_vars['vo']->value['p_price'];?>
</div>
                                    </div>
                                    <div class="item-text"><?php echo $_smarty_tpl->tpl_vars['vo']->value['p_title'];?>
</div>
                                </div>
                            </a>
                        </li>
                    <?php
$_smarty_tpl->tpl_vars['vo'] = $foreach_vo_Sav;
}
?>
                <?php }?>

            </ul>
        </div>
    </div>
</div>


<?php echo '<script'; ?>
 type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.js' charset='utf-8'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.js' charset='utf-8'><?php echo '</script'; ?>
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