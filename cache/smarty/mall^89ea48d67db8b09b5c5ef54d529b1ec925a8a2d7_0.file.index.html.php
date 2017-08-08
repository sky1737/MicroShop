<?php /* Smarty version 3.1.27, created on 2016-10-14 16:02:17
         compiled from "/mnt/www/www.weidian.com/application/modules/Mall/views/address/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:1618027690580091094e6ea6_64055178%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89ea48d67db8b09b5c5ef54d529b1ec925a8a2d7' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Mall/views/address/index.html',
      1 => 1476432135,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1618027690580091094e6ea6_64055178',
  'variables' => 
  array (
    'data' => 0,
    'vo' => 0,
    'url' => 0,
    'baseUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5800910956e443_59194754',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5800910956e443_59194754')) {
function content_5800910956e443_59194754 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1618027690580091094e6ea6_64055178';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>收货地址</title>
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.css">
    <link rel="stylesheet" href="/public/mall/css/style.css">
</head>

<body>

<header class="bar bar-nav">
    <a class="button pull-left" href="/mall/index/index">商城首页</a>
    <h1 class="title">我的地址</h1>
</header>



<div class="content shopping-cart">
    <div class="add">
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
                        <li id="li_<?php echo $_smarty_tpl->tpl_vars['vo']->value['a_id'];?>
" class="choiceBtn" rel="<?php echo $_smarty_tpl->tpl_vars['vo']->value['a_id'];?>
">
                            <label class="label-checkbox item-content">
                                <!--<a href="<?php if ($_smarty_tpl->tpl_vars['url']->value) {
echo $_smarty_tpl->tpl_vars['url']->value;?>
&addr=<?php echo $_smarty_tpl->tpl_vars['vo']->value['a_id'];
} else { ?>javascript:void(0);<?php }?>">-->
                                <input type="radio" name="my-radio" <?php if ($_smarty_tpl->tpl_vars['vo']->value['a_default'] == 2) {?>checked=checked<?php }?>>
                                <div class="item-media"><i class="icon icon-form-checkbox"></i></div>
                                <div class="item-inner">
                                    <div class="item-title-row">
                                        <div class="item-title"><?php echo $_smarty_tpl->tpl_vars['vo']->value['a_realname'];?>
</div>
                                        <div class="bar-tab add-btn">
                                            <a class="tab-item external" href="/mall/address/edit/id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['a_id'];?>
?url=<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
">
                                                <span class="icon icon-edit"></span>
                                            </a>
                                            <a class="tab-item external" id="delete" rel="<?php echo $_smarty_tpl->tpl_vars['vo']->value['a_id'];?>
" href="javascript:void(0);">
                                                <span class="icon icon-remove"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item-subtitle"><?php echo $_smarty_tpl->tpl_vars['vo']->value['a_phone'];?>
</div>
                                    <div class="item-text"><?php echo $_smarty_tpl->tpl_vars['vo']->value['a_address'];?>
</div>
                                </div>
                                <!--</a>-->
                            </label>
                        </li>
                    <?php
$_smarty_tpl->tpl_vars['vo'] = $foreach_vo_Sav;
}
?>
                <?php }?>


            </ul>
        </div>


        <nav class="bar bar-tab">
            <a href="/mall/address/edit?url=<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
" class="bottom-btn button button-big button-fill button-success">添加收货地址</a>
        </nav>
    </div>
</div>
    <?php echo '<script'; ?>
 type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.js' charset='utf-8'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.js' charset='utf-8'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $(document).ready(function(){
        $('#delete').click(function(){
            var id = $(this).attr('rel');
            $.post('/ajax/address/delete', {id : id}, function(data){
                $.alert(data.info);
                if(data.status == 'y'){
                    $('#li_' + id).remove();
                }
            }, 'json')
        })

        $('.choiceBtn').click(function(){
            var id = $(this).attr('rel');
            var url = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
';
            if(url){
                location.href = url + '&addr=' + id;
            }
        })
    })


<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
?>