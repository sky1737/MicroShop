<?php /* Smarty version 3.1.27, created on 2016-11-02 08:54:54
         compiled from "/mnt/www/www.weidian.com/application/modules/Mall/views/product/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:11061720885819395ec2a5c5_18353108%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0eb117f5f858fbba4a6c72dbc30f78ca54df6eaf' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Mall/views/product/index.html',
      1 => 1476688389,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11061720885819395ec2a5c5_18353108',
  'variables' => 
  array (
    'title' => 0,
    'categorys' => 0,
    'vo' => 0,
    'products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5819395ed8c1d9_94013587',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5819395ed8c1d9_94013587')) {
function content_5819395ed8c1d9_94013587 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '11061720885819395ec2a5c5_18353108';
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
                <input type="search" id='search' value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
" placeholder='输入关键字...'/>
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

<div class="content goods-list">
    <div class="list-block media-list">
        <ul>
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
                                <!--<div class="item-text"><?php echo $_smarty_tpl->tpl_vars['vo']->value['p_content'];?>
...</div>-->
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

        $(document).on("click", ".my-btn", function() {
            $.openPanel("#panel-js-demo");
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