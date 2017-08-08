<?php /* Smarty version 3.1.27, created on 2016-11-07 14:15:39
         compiled from "/mnt/www/www.weidian.com/application/modules/Admin/views/product/add.html" */ ?>
<?php
/*%%SmartyHeaderCode:57638437358201c0b05f6e3_95920660%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5f62a12661bb8d4202ea32cdd3d9b3a3a38ab8e' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Admin/views/product/add.html',
      1 => 1476321202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57638437358201c0b05f6e3_95920660',
  'variables' => 
  array (
    'row' => 0,
    'menuList' => 0,
    'key' => 0,
    'vo' => 0,
    'categoryOption' => 0,
    'count' => 0,
    'picRow' => 0,
    'pkey' => 0,
    'profileTypeOption' => 0,
    'ppList' => 0,
    'profileType' => 0,
    'pt_id' => 0,
    'ppType' => 0,
    'v' => 0,
    'ppCount' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58201c0b193e79_99801248',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58201c0b193e79_99801248')) {
function content_58201c0b193e79_99801248 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '57638437358201c0b05f6e3_95920660';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta   http-equiv="Expires"   CONTENT="0">
    <meta   http-equiv="Cache-Control"   CONTENT="no-cache">
    <meta   http-equiv="Pragma"   CONTENT="no-cache">
    <title></title>
    <!-- Bootstrap -->
    <link href="/public/admin/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/public/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/public/admin/css/bootstrap-customfile.css" rel="stylesheet" type="text/css" />
    <link href="/public/admin/js/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <link href="/public/admin/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <?php echo '<script'; ?>
 src="/public/admin/js/jquery-1.8.1.min.js"><?php echo '</script'; ?>
>
    <style>
        .cad_day{ position: relative; width: 80px; height: 80px; line-height: 80px; text-align: center; border: 1px solid #ccc;}
        .cad_day .outProfile { display: none; position: absolute; top: 80px; left: -2px; padding: 10px 0; width: 220px; background: #ccc; z-index: 2;}
        .cad_day .outProfile span  { display: block; float: left; width: 120px; height: 30px; line-height: 30px;}
        .cad_day .outProfile input { display: block; float: right; width: 80px;padding-right: 10px;}
        .cad_day .outProfile .profileList  { width: 220px;}
        .controls .time     {     width: 581px;
            height: 35px;
            line-height: 35px;
            font-size: 14px;
            margin-top: 2px;
            background: #ccc;
            color: #fff;
            text-align: center;
        }
        .cad_day .outProfile i
        {width: 0px;
            height: 0px;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-bottom: 10px solid rgb(204, 204, 204);
            position: absolute;
            top: -10px;
            left: 37px;}
        .open{display:block;}
        .lp_td td { padding: 4px 8px;}
    </style>
</head>
<body>
<style>
    #right .nav-tabs { margin-bottom:0;}
    #right .tab-content {  border-top:none; padding:20px 20px 0;}
    .news{display:none;}
    .img_left { position: relative; float: left; margin-right: 10px;}
    .img_left .order { margin-top: 5px; line-height: 30px;}
    .img_left .order span { margin-right: 5px;}
    .img_left a { position: absolute; top: 14px; right: 2px; display: block; width: 20px; height: 20px; background: #fff; color: #fff; text-align: center; line-height: 20px; font-size: 12px;  border-radius: 999px; opacity: .8;}
    #productProfile .controls { margin-top: 20px; margin-bottom: 10px; padding-bottom: 30px; border-bottom: 1px solid #E8E8E8; overflow: auto;}
    .ppinfo_col { float: left; margin-right: 20px; margin-bottom: 10px;}
    .ppinfo_col span { display: block; float: left; height: 30px; line-height: 30px;}
    .ppinfo_col input { margin-left:4px;}
    .dropdown-menu{z-index: 999!important;}
    .switch_case{float:right}
</style>
<!-- 工作栏 -->
<ul class="breadcrumb pull-left">
    <li><a href="/admin/product/index">商品列表</a> <span class="divider">/</span></li>
    <li id="modalTtile"><?php if ($_smarty_tpl->tpl_vars['row']->value['p_id']) {?>编辑商品<?php } else { ?>添加商品<?php }?></li>
</ul>
<div class="btn-group pull-right">
    <button class="btn" onClick="window.location.reload();">刷新界面</button>
</div>
<div class="clear"></div>

<form class="form-horizontal" id="form-save" action="/admin/product/save/">
    <?php if ($_smarty_tpl->tpl_vars['menuList']->value) {?>
        <!--<input type="hidden" value="<?php echo $_GET['uid'];?>
" name="uid" />-->
        <div id="right" class="tabbable" style="margin-top:30px;">
            <ul class="nav nav-tabs">
                <?php
$_from = $_smarty_tpl->tpl_vars['menuList']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['vo']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['__foreach_top'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['vo']->value) {
$_smarty_tpl->tpl_vars['vo']->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_top']->value['iteration']++;
$_smarty_tpl->tpl_vars['__foreach_top']->value['first'] = $_smarty_tpl->tpl_vars['__foreach_top']->value['iteration'] == 1;
$foreach_vo_Sav = $_smarty_tpl->tpl_vars['vo'];
?>
                <li <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_top']->value['first']) ? $_smarty_tpl->tpl_vars['__foreach_top']->value['first'] : null)) {?>class="active"<?php }?>><a target="rightTop" tag="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_right" href="#<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_right" data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['vo']->value;?>
</a></li>
                <?php
$_smarty_tpl->tpl_vars['vo'] = $foreach_vo_Sav;
}
?>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="basic_right">
                    <input type="hidden" name="id" id="p_id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['p_id'];?>
" />
                    <div class="control-group">
                        <label class="control-label">所在分类</label>
                        <div class="controls">
                            <select datatype="*" nullmsg="请选择所在分类" id="pc_id" name="pc_id">
                                <?php echo $_smarty_tpl->tpl_vars['categoryOption']->value;?>

                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">商品标题</label>
                        <div class="controls">
                            <input type="text" name="p_title" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['p_title'];?>
" placeholder="商品名称" datatype="*" nullmsg="请填写商品名称" style="width: 500px;"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">商品内容</label>
                        <div class="controls">
                            <textarea name="p_content" id="p_content" style="width:800px; height:350px;" ><?php echo $_smarty_tpl->tpl_vars['row']->value['p_content'];?>
</textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">封面图片</label>
                        <div class="controls">
                            <input type="file" name="upload" id="upload" onchange="return ajaxFileUpload2();" />
                            <?php if ($_smarty_tpl->tpl_vars['row']->value['p_cover']) {?>
                            <div style="padding-top:10px;"><img src="<?php echo @constant('APP_IMAGE_URL');
echo $_smarty_tpl->tpl_vars['row']->value['p_cover'];?>
" id="upload-img" style="max-width:200px;"/></div>
                            <input type="hidden" name="p_cover" id="file"  value="<?php echo $_smarty_tpl->tpl_vars['row']->value['p_cover'];?>
" datatype="*" nullmsg="请上传封面图片"/>
                            <?php } else { ?>
                            <input type="hidden" name="p_cover" id="file" datatype="*" nullmsg="请上传封面图片" />
                            <div style="padding-top:10px;"><img src="" id="upload-img" style="max-width:200px; display:none"/></div>
                            <?php }?>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">主图</label>
                        <div class="controls">
                            <input type="hidden" name="uploadImgs" id="uploadImgs" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['count']->value)===null||$tmp==='' ? 0 : $tmp);?>
">
                            <input type="file" name="uploadCover" id="uploadCover" onchange="return ajaxFileUpload();" datatype="*" nullmsg="请上传主图"/>
                            <div id="imagesList">
                                <?php if ($_smarty_tpl->tpl_vars['picRow']->value) {?>
                                <?php
$_from = $_smarty_tpl->tpl_vars['picRow']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['vo']->_loop = false;
$_smarty_tpl->tpl_vars['pkey'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['pkey']->value => $_smarty_tpl->tpl_vars['vo']->value) {
$_smarty_tpl->tpl_vars['vo']->_loop = true;
$foreach_vo_Sav = $_smarty_tpl->tpl_vars['vo'];
?>
                                <div id="picRow_<?php echo $_smarty_tpl->tpl_vars['pkey']->value;?>
" class="img_left">
                                    <a href="javascript:void(0);" rel="<?php echo $_smarty_tpl->tpl_vars['pkey']->value;?>
" class="removeImg"><i class="icon-remove" rel="<?php echo $_smarty_tpl->tpl_vars['pkey']->value;?>
"></i></a>
                                    <div style="padding-top:10px;"><img src="<?php if ($_smarty_tpl->tpl_vars['vo']->value['pp_url']) {
echo @constant('APP_IMAGE_URL');
echo $_smarty_tpl->tpl_vars['vo']->value['pp_url'];
}?>" style="max-width:200px;"/></div>
                                    <div class="order">
                                        <input type="hidden" name="file[]" value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['pp_url'];?>
" />
                                        <span>排序</span><input type="text" name="pp_order[]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['vo']->value['pp_order'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['key']->value : $tmp);?>
" placeholder="排序号" style="width:50px;"/>
                                    </div>
                                </div>
                                <?php
$_smarty_tpl->tpl_vars['vo'] = $foreach_vo_Sav;
}
?>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">排序</label>
                        <div class="controls">
                            <input type="text" class="span2" name="p_sort" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['p_sort'])===null||$tmp==='' ? 0 : $tmp);?>
" placeholder="排序" datatype="n" nullmsg="请填写排序" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">销量</label>
                        <div class="controls">
                            <input type="text" class="span2" name="p_sales" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['p_sales'])===null||$tmp==='' ? 0 : $tmp);?>
" placeholder="销量" />
                        </div>
                    </div>

                    <div class="control-group">

                        <label class="control-label">价格</label>
                        <div class="controls">
                            <input type="text" class="span2" name="p_price" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['p_price'];?>
" placeholder="价格" datatype="*" nullmsg="请填写价格"/>
                        </div>

                    </div>
                    <div class="control-group">
                        <label class="control-label">库存</label>
                        <div class="controls">
                            <input type="text" class="span2" name="p_stock" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['p_stock'])===null||$tmp==='' ? 0 : $tmp);?>
" placeholder="库存" datatype="*" nullmsg="请填写库存"/>
                        </div>
                    </div>

                </div>
                <div class="tab-pane" id="profile_right">
                    <!--<div class="alert alert-info">新增或者删除套餐配置，如果启用日历，需要重新生成日历套餐！！！</div>-->
                    <div class="control-group">
                        <label class="control-label">价格类型名称</label>
                        <div class="controls">
                            <select name="profileType" id="profileType">
                                <?php echo $_smarty_tpl->tpl_vars['profileTypeOption']->value;?>

                            </select>
                            <a class="btn btn-default" href="javascript:void(0);" role="button" id="addProfileType">添加</a>
                        </div>
                    </div>
                    <div id="profileTypeList">
                        <?php if ($_smarty_tpl->tpl_vars['ppList']->value) {?>
                        <?php
$_from = $_smarty_tpl->tpl_vars['profileType']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['vo']->_loop = false;
$_smarty_tpl->tpl_vars['pt_id'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['pt_id']->value => $_smarty_tpl->tpl_vars['vo']->value) {
$_smarty_tpl->tpl_vars['vo']->_loop = true;
$foreach_vo_Sav = $_smarty_tpl->tpl_vars['vo'];
?>
                        <?php if (in_array($_smarty_tpl->tpl_vars['pt_id']->value,$_smarty_tpl->tpl_vars['ppType']->value)) {?>
                        <div id="profileType_<?php echo $_smarty_tpl->tpl_vars['pt_id']->value;?>
" style="margin-bottom: 15px;">
                            <ul class="breadcrumb">
                                <li><a href="#"><?php echo $_smarty_tpl->tpl_vars['vo']->value;?>
</a> <span class="divider">/</span></li>
                                <li class="active">套餐配置</li>
                            </ul>
                            <!--<a class="btn btn-default" href="javascript:void(0);" role="button" onclick="delProfileType(<?php echo $_smarty_tpl->tpl_vars['pt_id']->value;?>
)">删除</a>-->
                            <table name="ptInfo_<?php echo $_smarty_tpl->tpl_vars['pt_id']->value;?>
" id="ptInfo_<?php echo $_smarty_tpl->tpl_vars['pt_id']->value;?>
" >
                                <tbody  class="lp_td">
                                <tr>
                                    <td width="200px">名称</td>
                                    <td width="100px">价格</td>
                                    <td width="100px">库存</td>
                                    <td width="100px">操作</td>
                                </tr>
                                </tbody>
                                <tbody id="ppList_<?php echo $_smarty_tpl->tpl_vars['pt_id']->value;?>
">
                                <?php
$_from = $_smarty_tpl->tpl_vars['ppList']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                                <?php if ($_smarty_tpl->tpl_vars['v']->value['pt_id'] == $_smarty_tpl->tpl_vars['pt_id']->value) {?>

                                <tr id="pp_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                                    <input type="hidden" name="pp_id[<?php echo $_smarty_tpl->tpl_vars['pt_id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['pp_id'];?>
">
                                    <td width="200px"><input type="text" style="width:200px;" name="pp_name[<?php echo $_smarty_tpl->tpl_vars['pt_id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['pp_name'];?>
"></td>
                                    <td width="100px"><input type="text" style="width:100px;" name="pp_price[<?php echo $_smarty_tpl->tpl_vars['pt_id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['pp_price'];?>
"></td>
                                    <td width="100px"><input type="text" style="width:100px;" name="pp_stock[<?php echo $_smarty_tpl->tpl_vars['pt_id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['pp_stock'];?>
"></td>
                                    <td width="100px">
                                        <a class="btn btn-default" href="javascript:void(0);" role="button" onclick="delProfile(<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
)">删除</a>
                                    </td>
                                </tr>
                                <?php }?>
                                <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>

                                </tbody>
                                <tr>
                                    <td width="200px"></td>
                                    <td width="100px"></td>
                                    <td width="100px"></td>
                                    <td width="100px">
                                    <a class="btn btn-default" href="javascript:void(0);" role="button" onclick="addPpInfo(<?php echo $_smarty_tpl->tpl_vars['pt_id']->value;?>
)">增加一项</a></td>
                                </tr>
                            </table>
                        </div>
                        <?php }?>
                        <?php
$_smarty_tpl->tpl_vars['vo'] = $foreach_vo_Sav;
}
?>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
    <div class="control-group" style="margin-top: 30px;">
        <label class="control-label"></label>
        <div class="controls">
            <button class="btn btn-primary" type="submit">保存</button>
            <a class="btn btn-default" href="/admin/product/index" role="button">返回列表</a>
        </div>
    </div>
</form>
<!--弹窗-->
<form class="form-horizontal" id="form-process" method="post" action="/admin/product/saveDate/" >
    <div id="formModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalTtile" aria-hidden="true">
    </div>
</form>
<?php echo '<script'; ?>
 src="/public/admin/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/common.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/umeditor/umeditor.config.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/umeditor/umeditor.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/umeditor/lang/zh-cn/zh-cn.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/Validform_v5.3.2_min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/jquery.ajaxfileupload.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/bootstrap-customfile.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/bootstrap-datetimepicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/jquery.artDialog.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var ppCount = parseInt('<?php echo $_smarty_tpl->tpl_vars['ppCount']->value;?>
');
    function addPpInfo(pt_id){
        ppCount = ppCount + 1;
        var html = '';
        html += '<tr id="pp_'+ppCount+'">';
        html += '<input type="hidden" name="pp_id['+pt_id+']['+ppCount+']" value="">';
        html += '<td width="200px"><input type="text" style="width:200px;" name="pp_name['+pt_id+']['+ppCount+']" value=""></td>';
        html += '<td width="100px"><input type="text" style="width:100px;" name="pp_price['+pt_id+']['+ppCount+']" value=""></td>';
        html += '<td width="100px"><input type="text" style="width:100px;" name="pp_stock['+pt_id+']['+ppCount+']" value=""></td>';
        html += '<td width="100px">';
        html += '<a class="btn btn-default" href="javascript:void(0);" role="button" onclick="delProfile('+ppCount+')">删除</a>';
        html += '</td>';
        html += '</tr>';

        $('#ppList_'+pt_id).append(html);
    }

function delProfileType(pt_id){
    if(confirm('删除会把数据项也一起删除，确定吗')){
        $('#profileType_' + pt_id).remove();
    }
}

function delProfile(pp_id){
    if(confirm('删除该项，确认吗')){
        $('#pp_' + pp_id).remove();
    }
}

$(document).ready(function(){
    UM.getEditor('p_content');

    $('#addProfileType').click(function(){
        var pt_id = $('#profileType').val();
        ppCount = ppCount + 1;
        if(!pt_id){
            $.dialog.tips('请选择价格类型');
            return;
        }

        if($('#ptInfo_' + pt_id).length > 0){
            $.dialog.tips('该价格类型名称已存在，请重新选择');
            return;
        }

        $.ajax({
            type: 'POST',
            url : "/admin/product/addProfile",
            data: {pt_id:pt_id,ppCount : ppCount},
            dataType: 'html',
            success: function(data){
                if(data) {
                    //赋值数据
                    $('#profileTypeList').append(data);

                } else {
                    $.dialog.tips('添加失败');
                    return false;
                }
            }
        });
    })

});

    var editor =  '';
    var count  =  '<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
';
    var url = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
';
    var loading = $.dialog.loading('注意：正在导入数据，请耐心等待，千万不要关闭或者刷新页面！').hide();
    $(function(){
        window.UMEDITOR_HOME_URL = "<?php echo @constant('APP_DOMAIN');?>
";
        UM.getEditor('basic_content');
        $('.conternLi').click(function(){
            var rel = $(this).attr('rel');
            UM.getEditor(rel);
        })
    });

    $("#form-save").Validform({
        ajaxPost: true,
        tipSweep: true,
        tiptype:function(msg,o,cssctl){
            if(o.type == 3)
                $.dialog.tips(msg);
        },
        beforeSubmit:function(curform){},
        callback:function(response){
            if ( response.status == 'y' ) {
                $.dialog.tips(response.info.tip);
                $('#p_id').val(response.info.id);
                $('#pe_id').val(response.info.pe_id);
//                window.setTimeout(function(){
//                    if(url){
//                        location.href = url;
//                    }else{
//                        location.reload();
//                    }
//
//                }, 2000);
            }else{
                $.dialog.tips(response.info);
            }
        }
    });

    $("#form-process").Validform({
        ajaxPost: true,
        tipSweep: true,
        tiptype:function(msg,o,cssctl){
            if(o.type == 3)
                $.dialog.tips(msg);
        },
        beforeSubmit:function(curform){},
        callback:function(response){
            if ( response.status == 'y' ) {
                $.dialog.tips(response.info.tip);
                $('.' + response.info.date).html('编辑');
                $('.modal-backdrop').click();
            }else{
                $.dialog.tips(response.info);
            }
        }
    });

    /*初始化上传文件*/
    for(var i = 0; i < count; i++){
        $("#upload" + i).customFileInput();
    }

    $('#uploadCover').customFileInput();
    var processing = false;
    function ajaxFileUpload() {
        if ( processing == true ) {
            return false;
        }

        var count = parseInt($('#uploadImgs').val());
        var rel = count + 1;
        var dialog = $.dialog.loading('上传中，请稍等！').show();
        processing = true;
        $.ajaxFileUpload({
            url:'/admin/product/upload/',
            secureuri:false,
            fileElementId:'uploadCover',
            dataType: 'json',
            success: function (data, status){
                setTimeout( function() {
                    processing = false;
                }, 500);
                dialog.close();

                if ( data.status == 'y' ) {
                    var html = '';
                    html += '<div id="picRow_'+count+'" class="img_left">';
                    html += '<a href="javascript:void(0);" rel="'+count+'" class="removeImg"><i class="icon-remove" rel="'+count+'"></i></a>';
                    html += '<div style="padding-top:10px;"><img src="'+ data.info.url +'" style="max-width:200px;"/></div>';
                    html += '<div class="order">';
                    html += '<input type="hidden" name="file[]" value="'+data.info.fileName+'" />';
                    html += '<span>排序</span><input type="text" name="pp_order[]" value="" placeholder="排序号" style="width:50px;"/>';
                    html += '</div>';
                    html += '</div>';
                    $('#imagesList').append(html);
                    return;
                }

                $.dialog.error(data.info);
                return false;
            },
            error: function (data, status, e){
                $.dialog.error(e);
            }
        });
    }

    $('.removeImg').live('click', function(){
        var rel = $(this).attr('rel');
        $('#picRow_' + rel).remove();
    });

    /*初始化上传文件*/
    $("#upload").customFileInput();

    var processing = false;
    function ajaxFileUpload2() {
        if ( processing == true ) {
            return false;
        }

        var dialog = $.dialog.loading('上传中，请稍等！').show();
        processing = true;
        $.ajaxFileUpload({
            url:'/admin/product/upload2/',
            secureuri:false,
            fileElementId:'upload',
            dataType: 'json',
            success: function (data, status){
                setTimeout( function() {
                    processing = false;
                }, 500);
                dialog.close();

                if ( data.status == 'y' ) {
                    $("#upload-img").attr('src', data.info.url).show();
                    $('#file').val(data.info.fileName);
                    return;
                }

                $.dialog.error(data.info);
                return false;
            },
            error: function (data, status, e){
                $.dialog.error(e);
            }
        });
    }

<?php echo '</script'; ?>
>
</body>
</html><?php }
}
?>