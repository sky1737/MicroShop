<?php /* Smarty version 3.1.27, created on 2016-10-14 15:58:19
         compiled from "/mnt/www/www.weidian.com/application/modules/Mall/views/address/edit.html" */ ?>
<?php
/*%%SmartyHeaderCode:2628303275800901b10dc29_77592671%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bc5f7c8729bc8406b35fa1f94800c6848f64cbe' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Mall/views/address/edit.html',
      1 => 1476323111,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2628303275800901b10dc29_77592671',
  'variables' => 
  array (
    'data' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5800901b1d5a49_15751895',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5800901b1d5a49_15751895')) {
function content_5800901b1d5a49_15751895 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2628303275800901b10dc29_77592671';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>编辑收货地址</title>
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.css">
    <link rel="stylesheet" href="/public/mall/css/style.css">
</head>

<body>

<div class="add">
    <div class="content">
        <div class="list-block">
            <input type="hidden" name="id" id="id" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['a_id'])===null||$tmp==='' ? 0 : $tmp);?>
">
            <ul>
                <!-- Text inputs -->
                <li>
                    <div class="item-content">
                        <div class="item-media"><i class="icon icon-form-name"></i></div>
                        <div class="item-inner">
                            <div class="item-title label">收货人</div>
                            <div class="item-input">
                                <input type="text" placeholder="请输入收货人姓名" name="a_realname" id="a_realname" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['a_realname'];?>
">
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-content">
                        <div class="item-media"><i class="icon icon-form-email"></i></div>
                        <div class="item-inner">
                            <div class="item-title label">手机号码</div>
                            <div class="item-input">
                                <input type="number" placeholder="请输入收货人手机号码" name="a_phone" id="a_phone" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['a_phone'];?>
">
                            </div>
                        </div>
                    </div>
                <li>
                    <div class="item-content">
                        <div class="item-media"><i class="icon icon-form-email"></i></div>
                        <div class="item-inner">
                            <div class="item-title label">所在地区</div>
                            <div class="item-input">
                                <input type="text" placeholder="请选择" id='city-picker' name="city" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['a_province'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['a_city'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['a_area'];?>
"/>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="align-top">
                    <div class="item-content">
                        <div class="item-media"><i class="icon icon-form-comment"></i></div>
                        <div class="item-inner">
                            <div class="item-title label">详细地址</div>
                            <div class="item-input">
                                <textarea placeholder="请输入街道地址"  name="a_address" id="a_address"><?php echo $_smarty_tpl->tpl_vars['data']->value['a_address'];?>
</textarea>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- Switch (Checkbox) -->
                <li>
                    <div class="item-content">
                        <div class="item-media"><i class="icon icon-form-toggle"></i></div>
                        <div class="item-inner">
                            <div class="item-title label">设为默认地址</div>
                            <div class="item-input">
                                <label class="label-switch">
                                    <input type="checkbox" name="a_default" id="a_default" <?php if ($_smarty_tpl->tpl_vars['data']->value['a_default'] == 2) {?>checked="checked"<?php }?>>
                                    <div class="checkbox"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="content-block">
            <div class="row">
                <div class="col-100"><a href="javascript:void(0);" id="saveBtn" class="bottom-btn button button-big button-fill button-success">保存并提交</a></div>
            </div>
        </div>
    </div>
</div>


<?php echo '<script'; ?>
 type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.js' charset='utf-8'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.js' charset='utf-8'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="//g.alicdn.com/msui/sm/0.6.2/js/sm-city-picker.min.js" charset="utf-8"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $("#city-picker").cityPicker({
        toolbarTemplate: '<header class="bar bar-nav">\
    <button class="button button-link pull-right close-picker">确定</button>\
    <h1 class="title">选择收货地址</h1>\
    </header>'
    });

    $(document).ready(function(){
        $('#saveBtn').click(function(){
            var id = $('#id').val();
            var realname = $('#a_realname').val();
            var phone = $('#a_phone').val();
            var city = $('#city-picker').val();
            var address = $('#a_address').val();
            var a_default = $('#a_default').is(':checked');
            var url = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
';
            $.post('/ajax/address/add', {id:id,realname:realname,phone:phone,city:city,address:address,a_default:a_default}, function(data){
                if(data.status == 'y'){
                    $.alert(data.info.info);
                    if(url){
                        location.href = url + '&addr=' + data.info.id;
                    }else{
                        location.href = '/mall/address/index';
                    }
                }else{
                    $.alert(data.info);
                }
            }, 'json')
        })
    })
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
?>