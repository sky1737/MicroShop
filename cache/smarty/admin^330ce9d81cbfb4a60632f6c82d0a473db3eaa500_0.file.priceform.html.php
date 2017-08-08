<?php /* Smarty version 3.1.27, created on 2016-10-14 14:02:51
         compiled from "/mnt/www/www.weidian.com/application/modules/Admin/views/order/priceform.html" */ ?>
<?php
/*%%SmartyHeaderCode:14073673255800750b7e7fe6_09280540%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '330ce9d81cbfb4a60632f6c82d0a473db3eaa500' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Admin/views/order/priceform.html',
      1 => 1476170087,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14073673255800750b7e7fe6_09280540',
  'variables' => 
  array (
    'id' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5800750b8ea574_75467323',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5800750b8ea574_75467323')) {
function content_5800750b8ea574_75467323 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '14073673255800750b7e7fe6_09280540';
?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="passportModalLabel"><?php if ($_smarty_tpl->tpl_vars['id']->value) {?>修改价格<?php }?></h4>
        </div>
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['o_id'];?>
" />
        <div class="modal-body">
            <div class="alert alert-dismissible" role="alert" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong></strong>
            </div>
            <div class="control-group">
                <label class="control-label">修改价格</label>
                <div class="controls">
                    <input type="text" name="o_payment_amount" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['o_payment_amount'];?>
" placeholder="修改价格" datatype="*" nullmsg="请填写修改价格" />
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="submit" class="btn btn-primary btn-submit">确认修改</button>
        </div>
    </div>
</div>
<?php }
}
?>