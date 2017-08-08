<?php /* Smarty version 3.1.27, created on 2016-10-17 15:13:22
         compiled from "/mnt/www/www.weidian.com/application/modules/Mall/views/index/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:167132860358047a12546e90_36862380%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bf223af0cb94fe6a4ca8c1cfe5fe671cd240c4d' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Mall/views/index/index.html',
      1 => 1476688389,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167132860358047a12546e90_36862380',
  'variables' => 
  array (
    'categorys' => 0,
    'vo' => 0,
    'banner' => 0,
    'products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58047a125caab1_44562105',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58047a125caab1_44562105')) {
function content_58047a125caab1_44562105 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '167132860358047a12546e90_36862380';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title></title>
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
    <link rel="stylesheet" href="/public/mall/css/style.css">
</head>

<body>
<?php echo $_smarty_tpl->getSubTemplate ("application/views/common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<!-- 侧栏 -->
<div class="panel panel-left panel-cover theme-dark sidebar" id='panel-js-demo'>
    <div class="bar bar-header-secondary">
        <div class="searchbar">
            <a class="searchbar-cancel">取消</a>
            <div class="search-input">
                <label class="icon icon-search" for="search"></label>
                <input type="search" id='search' placeholder='输入关键字...'/>
            </div>
        </div>
    </div>
    <div class="list-group">
        <ul>
            <li class="list-group-title">商品分类</li>
            <?php if ($_smarty_tpl->tpl_vars['categorys']->value) {?>
            <?php
$_from = $_smarty_tpl->tpl_vars['categorys']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['vo']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
$_smarty_tpl->tpl_vars['vo']->_loop = true;
$foreach_vo_Sav = $_smarty_tpl->tpl_vars['vo'];
?>
            <li class="cate_class"><a href="/mall/product/index?cid=<?php echo $_smarty_tpl->tpl_vars['vo']->value['pc_id'];?>
"><div class="item-title"><?php echo $_smarty_tpl->tpl_vars['vo']->value['pc_name'];?>
</div></a></li>
            <?php
$_smarty_tpl->tpl_vars['vo'] = $foreach_vo_Sav;
}
?>
            <?php }?>
        </ul>
    </div>
</div>



<div class="content index">
    <div class="content-padded">
        <!-- Slider -->
        <div class="swiper-container" data-space-between='10'>
            <div class="swiper-wrapper">
                <?php if ($_smarty_tpl->tpl_vars['banner']->value) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['banner']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['vo']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
$_smarty_tpl->tpl_vars['vo']->_loop = true;
$foreach_vo_Sav = $_smarty_tpl->tpl_vars['vo'];
?>
                <div class="swiper-slide"><a href="<?php echo $_smarty_tpl->tpl_vars['vo']->value['a_link'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['vo']->value['a_picture'];?>
" alt=""></a></div>
                <?php
$_smarty_tpl->tpl_vars['vo'] = $foreach_vo_Sav;
}
?>
                <?php }?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>


    <div class="content-padded">
        <div class="content-block-title">店长推荐</div>
        <?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
        <?php
$_from = $_smarty_tpl->tpl_vars['products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['vo']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
$_smarty_tpl->tpl_vars['vo']->_loop = true;
$foreach_vo_Sav = $_smarty_tpl->tpl_vars['vo'];
?>
        <div class="card demo-card-header-pic">
            <a href="/mall/product/details/pid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['p_id'];?>
">
                <div valign="bottom" class="card-header color-white no-border no-padding">
                    <img class='card-cover' src="<?php echo @constant('APP_IMAGE_URL');
echo $_smarty_tpl->tpl_vars['vo']->value['p_cover'];?>
" alt="">
                </div>
                <div class="card-content">
                    <div class="card-content-inner">
                        <p><?php echo $_smarty_tpl->tpl_vars['vo']->value['p_title'];?>
</p>
                        <p><span>￥<?php echo $_smarty_tpl->tpl_vars['vo']->value['p_price'];?>
</span></p>
                    </div>
                </div>
            </a>
        </div>
        <?php
$_smarty_tpl->tpl_vars['vo'] = $foreach_vo_Sav;
}
?>
        <?php }?>
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
        var config = {speed: 400};
        $(".swiper-container").swiper(config);
        $(".content").scroller({
            type: 'native'
        });

        $('#search').change(function(){
            var content = $(this).val();
            location.href = '/mall/product/index?title=' + content;
        })
    });
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
?>