<?php /* Smarty version 3.1.27, created on 2016-10-17 15:13:17
         compiled from "/mnt/www/www.weidian.com/application/modules/Mall/views/find/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:55966648358047a0d1a0c21_92324686%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f36528a737594014a5889f9a578e271762d66ae8' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Mall/views/find/index.html',
      1 => 1476688389,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55966648358047a0d1a0c21_92324686',
  'variables' => 
  array (
    'categorys' => 0,
    'vo' => 0,
    'key' => 0,
    'data' => 0,
    'vd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58047a0d2a21d7_65106985',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58047a0d2a21d7_65106985')) {
function content_58047a0d2a21d7_65106985 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '55966648358047a0d1a0c21_92324686';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>发现-列表</title>
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.css">
    <link rel="stylesheet" href="/public/mall/css/style.css">
</head>

<body>

<div class="buttons-tab">
    <?php if ($_smarty_tpl->tpl_vars['categorys']->value) {?>
        <?php
$_from = $_smarty_tpl->tpl_vars['categorys']->value;
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
            <a href="#tab<?php echo $_smarty_tpl->tpl_vars['vo']->value['nc_id'];?>
" class="tab-link <?php if ($_smarty_tpl->tpl_vars['key']->value == 0) {?>active<?php }?> button"><?php echo $_smarty_tpl->tpl_vars['vo']->value['nc_name'];?>
</a>
        <?php
$_smarty_tpl->tpl_vars['vo'] = $foreach_vo_Sav;
}
?>
    <?php }?>
</div>


<!-- 列表 -->
<div class="content find-list">
    <div class="tabs">
        <?php if ($_smarty_tpl->tpl_vars['categorys']->value) {?>
            <?php
$_from = $_smarty_tpl->tpl_vars['categorys']->value;
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
        <!-- tab1 -->
                <div id="tab<?php echo $_smarty_tpl->tpl_vars['vo']->value['nc_id'];?>
" class="tab <?php if ($_smarty_tpl->tpl_vars['key']->value == 0) {?> active<?php }?>">
                    <?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
                        <?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['vd'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['vd']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['vd']->value) {
$_smarty_tpl->tpl_vars['vd']->_loop = true;
$foreach_vd_Sav = $_smarty_tpl->tpl_vars['vd'];
?>
                            <?php if ($_smarty_tpl->tpl_vars['vd']->value['nc_id'] == $_smarty_tpl->tpl_vars['vo']->value['nc_id']) {?>
                                <div class="card demo-card-header-pic">
                                    <a href="/mall/find/details/id/<?php echo $_smarty_tpl->tpl_vars['vd']->value['n_id'];?>
">
                                        <div valign="bottom" class="card-header color-white no-border no-padding">
                                            <img class='card-cover' src="<?php echo $_smarty_tpl->tpl_vars['vd']->value['n_cover'];?>
" width="355" height="199">
                                        </div>
                                        <div class="card-content">
                                            <div class="card-content-inner">
                                                <p class="color-h4"><?php echo $_smarty_tpl->tpl_vars['vd']->value['n_title'];?>
</p>
                                                <p class="color-text"><?php echo $_smarty_tpl->tpl_vars['vd']->value['n_des'];?>
</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php }?>
                        <?php
$_smarty_tpl->tpl_vars['vd'] = $foreach_vd_Sav;
}
?>
                    <?php }?>

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