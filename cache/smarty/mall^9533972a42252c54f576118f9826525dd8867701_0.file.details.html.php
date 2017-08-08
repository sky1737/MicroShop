<?php /* Smarty version 3.1.27, created on 2016-10-14 16:16:23
         compiled from "/mnt/www/www.weidian.com/application/modules/Mall/views/find/details.html" */ ?>
<?php
/*%%SmartyHeaderCode:6350395635800945707a528_19082732%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9533972a42252c54f576118f9826525dd8867701' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Mall/views/find/details.html',
      1 => 1476426869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6350395635800945707a528_19082732',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58009457161547_42466126',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58009457161547_42466126')) {
function content_58009457161547_42466126 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '6350395635800945707a528_19082732';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>发现-内页</title>
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.css">
    <link rel="stylesheet" href="/public/mall/css/style.css">
</head>

<body>

<header class="bar bar-nav">
    <h1 class="title"><?php echo $_smarty_tpl->tpl_vars['data']->value['n_title'];?>
</h1>
</header>

<div class="content find-show">
    <?php echo $_smarty_tpl->tpl_vars['data']->value['n_content'];?>

</div>

<?php echo $_smarty_tpl->getSubTemplate ("application/views/common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php echo '<script'; ?>
 type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.js' charset='utf-8'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.js' charset='utf-8'><?php echo '</script'; ?>
>
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