<?php /* Smarty version 3.1.27, created on 2016-10-17 08:48:22
         compiled from "/mnt/www/www.weidian.com/application/modules/Admin/views/adsgroup/form.html" */ ?>
<?php
/*%%SmartyHeaderCode:182026051758041fd61c2301_89031530%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11b66e71ee4d632e5d27a40ed3affda18aa64dd6' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Admin/views/adsgroup/form.html',
      1 => 1476665299,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182026051758041fd61c2301_89031530',
  'variables' => 
  array (
    'id' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58041fd621c144_62617313',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58041fd621c144_62617313')) {
function content_58041fd621c144_62617313 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '182026051758041fd61c2301_89031530';
?>
<div class="modal-dialog" role="document">

    <div class="modal-content" style="width:600px; background: #fff;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="passportModalLabel"><?php if ($_smarty_tpl->tpl_vars['id']->value) {?>编辑广告组<?php } else { ?>添加广告组<?php }?></h4>
        </div>
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['ag_id'];?>
" />
        <div class="modal-body">
            <div class="alert alert-dismissible" role="alert" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong></strong>
            </div>

            <div class="control-group">
                <label class="control-label">标题</label>
                <div class="controls">
                    <input type="text" class="form-control" name="ag_name" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['ag_name'];?>
" placeholder="广告组名" datatype="*" nullmsg="请填写广告组名" style="width: 300px;"/>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">别名</label>
                <div class="controls">
                    <input type="text" class="form-control" name="ag_cname" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['ag_cname'];?>
" placeholder="广告别名" datatype="*" nullmsg="请填写广告组别名" style="width: 300px;" <?php if ($_smarty_tpl->tpl_vars['row']->value['ag_id']) {?>readonly<?php }?>/>
                </div>
            </div>
            <div class="control-group clearafter" >
                <label class="control-label display_left" style=" text-align: center;margin:10px 0;">隶属广告列表</label>
                <label class="control-label display_right" style=" text-align: center;margin:10px 0">已选择广告顺序</label>
            </div>
            <div class="control-group well clearafter">
                <div id="wrap" data="<?php echo $_smarty_tpl->tpl_vars['row']->value['a_ids'];?>
" style="width:48%;float: left;">
                </div>
                <div id="choose" style="width:48%;float: right;">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="submit" class="btn btn-primary btn-submit">确认修改</button>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
>
    $("#form-save").Validform({
        ajaxPost: true,
        tipSweep: true,
        tiptype:function(msg,o,cssctl){
            if(o.type == 3)
                $.dialog.tips(msg);
        },
        beforeSubmit:function(curform){
        },
        callback:function(response){
            $.dialog.tips(response.info);
            if ( response.status == 'y' ) {
                window.setTimeout(function(){
                    location.reload();
                }, 2000)
            }
        }
    });

    getAd();

    var aids = $("#wrap").attr('data');
    if ( aids != '' ) {
        aids = aids.split(',');
    }

    function getAd() {
        $("#choose").html('');
        $.getJSON('/admin/adsgroup/getad/', function(json) {
            alert(json.data);
            $("#wrap").html(json.data).find(':checkbox').each(function() {
                for (var i in aids) {
                    if ( aids[i] == $(this).val() ) {
                        $(this).attr('checked', true) ;
                    }
                }

                $(this).bind('change', function() {
                    var $select = $( '#select-' + $(this).val() ).get(0);
                    var has_select = ( typeof $select == 'undefined' || $select.tagName.toUpperCase() != 'DIV') ? false : true
                    if ( $(this).is(':checked') ) {
                        n = $("#choose").find('div').length + 1;
                        ! has_select && $("#choose").append('<div id="select-'+$(this).val()+'"><input name="aid[]" type="hidden" value="'+$(this).val()+ '" /><label><span class="label label-success">'+n+'</span> ' + $(this).parent().text() + '</label></div>' );
                    } else {
                        has_select && $select.remove();
                    }
                });
            });

            for (var i in aids) {
                n = $("#choose").find('div').length + 1;
                $("#choose").append('<div id="select-'+aids[i]+'"><input name="aid[]" type="hidden" value="'+aids[i]+ '" /><label><span class="label label-success">'+n+'</span> ' + $("#wrap").find(":checkbox[value='"+aids[i]+"']").parent().text() + '</label></div>' );
            }
        });
    }

<?php echo '</script'; ?>
>
<?php }
}
?>