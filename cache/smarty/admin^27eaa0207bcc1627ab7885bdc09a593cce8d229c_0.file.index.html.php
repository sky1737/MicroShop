<?php /* Smarty version 3.1.27, created on 2016-10-14 09:12:02
         compiled from "/mnt/www/www.weidian.com/application/modules/Admin/views/index/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:2036746300580030e2ed9005_40085523%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27eaa0207bcc1627ab7885bdc09a593cce8d229c' => 
    array (
      0 => '/mnt/www/www.weidian.com/application/modules/Admin/views/index/index.html',
      1 => 1476087665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2036746300580030e2ed9005_40085523',
  'variables' => 
  array (
    'topMenu' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_580030e3027901_01634584',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_580030e3027901_01634584')) {
function content_580030e3027901_01634584 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2036746300580030e2ed9005_40085523';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>运营支撑平台</title>
    <!-- Bootstrap -->
    <link href="/public/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/public/admin/css/index.css" rel="stylesheet">
</head>
<body>
<div id="header" class="header">
    <div class="logo">
        <a href="javascript:;">微店平台</a>
    </div>
    <div id="login-bar" class="pull-right">
        <a href="javascript:;"><i class="icon-name icon-white"></i> <?php echo @constant('A_REALNAME');?>
</a>
        <!--<a id="secret" data-toggle="modal" data-target="#secret-dialog"><i class="icon-file icon-white"></i> 查看密保卡</a>-->
        <!--<a id="weixin" data-toggle="modal" data-target="#weixin-dialog"><i class="icon-file icon-white"></i> 查看微信密匙</a>-->
        <a href="#" id="editPassword"><i class="icon-cog icon-white"></i> 修改密码</a>
        <a href="/admin/login/logout"><i class="icon-off icon-white"></i> 退出</a>
    </div>
</div>
<!--<div id="main-nav" class="clearfix">-->
    <!--<ul class="nav-list">-->
        <!--<?php
$_from = $_smarty_tpl->tpl_vars['topMenu']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['row']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$foreach_row_Sav = $_smarty_tpl->tpl_vars['row'];
?>-->
        <!--<li><a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['m_url'];?>
" rel="<?php echo $_smarty_tpl->tpl_vars['row']->value['m_id'];?>
" tag="<?php echo $_smarty_tpl->tpl_vars['row']->value['m_tag'];?>
" data-toggle="tab" target="topTab"><?php echo $_smarty_tpl->tpl_vars['row']->value['m_name'];?>
</a></li>-->
        <!--<?php
$_smarty_tpl->tpl_vars['row'] = $foreach_row_Sav;
}
?>-->
        <!--<li style="float: right;"><a href="javascript:;" id="hideHeader">隐藏头部</a></li>-->
    <!--</ul>-->
<!--</div>-->
<div class="container-fluid">
    <div id="container" class="row-fluid">
        <div class="span2" id="con-left">
            <div class="tab-content" id="content-left">
                <div class="tab-pane" id="systemTag">
                    <p style="display:none;">0</p>
                </div>
            </div>
        </div>
        <div class="btn-click" id="btn-click">点击关闭</div>
        <div class="span10" id="con-right">
            <ul class="nav nav-tabs" id="navigation" style="margin-bottom:0;">
                <li class="disabled"><a href="#welcomeContent" data-toggle="tab">我的主页</a></li>
            </ul>
            <div class="tab-content" id="pageContent">
                <div class="tab-pane active" id="welcomeContent">

                </div>
            </div>
        </div>
    </div>
</div>

<!-- 修改密码 -->
<div class="modal hide fade" id="passwordTip">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>修改密码</h3>
    </div>
    <form class="form-horizontal" id="password" onSubmit="return editPassword();">
        <div class="modal-body">
            <div class="control-group">
                <label class="control-label" for="oldPassword">原密码</label>
                <div class="controls">
                    <input type="password" name="oldPassword" id="oldPassword" placeholder="原密码">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="newPassword">新密码</label>
                <div class="controls">
                    <input type="password" name="newPassword" id="newPassword" placeholder="新密码">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="confirmPassword">确认密码</label>
                <div class="controls">
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="确认密码">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
            <button class="btn btn-primary" type="submit">保存</button>
        </div>
    </form>
</div>
<?php echo '<script'; ?>
 src="/public/admin/js/jquery-1.8.2.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/jquery.artDialog.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/jquery.cookies-2.2.0.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">

//隐藏、显示左栏
var conLeft=$('#con-left'),conRight=$('#con-right'),btnClick=$('#btn-click');
function leftCss(){
    conLeft.css('display','block');
    conRight.css('width','84%');
    btnClick.removeClass('btn-click-current');
}

btnClick.bind('click',function(){
    var conLeftDis=conLeft.css('display');
    if(conLeftDis=='block'){
        conLeft.css('display','none');
        conRight.css('width','98%');
        btnClick.addClass('btn-click-current');
    }else{
        leftCss();
    }
});

//隐藏显示头部
$('#hideHeader').toggle(
        function(){
            $('#header').hide();
            $(this).text('显示头部');

            var height = $(window).height() - $('#container').height() - $("#main-nav").height();
            $("iframe").attr('height', height);
        },
        function() {
            $('#header').show();
            $(this).text('隐藏头部');
            $("iframe").attr('height', setIFrameHeight() );
        }
);

var domain = '';
var role = '<?php echo @constant('A_ROLE');?>
';

$("ul.nav-list li:first, .tab-pane:first").addClass('active');
var firstProject = $("ul.nav-list li:first a");
getMenuList(firstProject.attr('rel'), firstProject.attr('tag'));

//$('#secret-link').bind('click', function() {
//	$("#secret-picture").attr('src', '/secret/index/?r=' + Math.random() ).show();
//	$("#secret-tip").html('请将密保卡下载后，并保存为你的专用密保。');
//	$("#secret-link").html('重新生成密保卡');
//	$("#secret-save").show();
//	$("#secret-close").hide();
//});
//
//$('#secret-save').bind('click', function() {
//	$.getJSON( '/secret/save/', function(json){
//		$.dialog.alert(json.data);
//		if(json.code == 1) {
//			 window.location.reload();
//		}
//	});
//});

//Fresh Session
setInterval(function(){
    $.getJSON( '/freshSession/', function(json){
        if(json.code == -1) {
            window.location.reload();
        }
    });
}, '300000');


$(function(){
    $('body').css;
    var env      = "<?php echo @constant('APP_ENV');?>
";


});


function setTab(tagName,url,title,memuId) {
    var isExistTab     = $('[href="#' + tagName  + '"]');
    var isExistContent = $('#' + tagName);

    if( isExistTab.size() == 0 && isExistContent.size() == 0 ) {

        //setCookie
        tabCookie[tagName] = {a_rel:tagName,a_href:url,a_title:title,a_id:memuId};
        //tab数量太多减少一些
        if ( $("#navigation > li").size() > 8 ) {
            var remove_tab = $('#navigation li:not(.disabled):first a').attr('href');
            var remove_tag = $('#navigation li:not(.disabled):first a').attr('rel');
            $('#navigation li:not(.disabled):first').remove();
            $(remove_tab).remove();
            delete tabCookie[remove_tag];
        }
        $.cookies.set('tabCookie',tabCookie);
        //标签
        $('#navigation li.active').removeClass('active');

        var tabHtml = '<li class="active"><a href="#' + tagName + '" data-toggle="tab" target="menuTab" rel="'+tagName+'">' + title + '<i class="icon-remove" rel="close_' + tagName + '"></i><i class="icon-refresh" rel="refresh_' + tagName + '"></i><i class="icon-flag" rel="setQuick_' + tagName + '" data-id="' + memuId + '" title="添加为快捷菜单"></i></a></li>';
        $('#navigation li:last').after(tabHtml);

        //内容
        $('#pageContent > div').each(function(){
            $(this).removeClass('active');
        });
        var pageHtml ='<div class="tab-pane active" id="' + tagName +'"></div>';
        $('#pageContent > div:last').after(pageHtml);

        var iframeHtml = '<iframe id="if-'+tagName+'" src="' + url +'" width="100%" height="'+setIFrameHeight()+'" frameborder="0"></iframe>';
        $("#" + tagName).html(iframeHtml);

        //删除标签页和内容页
        $('[rel="close_'+ tagName + '"]').bind('click', function(){
            var prev = $('[href="#' + tagName  + '"]').parent().prev().find('a');
            $('[href="#' + tagName  + '"]').parent().remove();
            $('#' + tagName).remove();
            // 删除Cookie

            var cookie = $.cookies.get('tabCookie');

            if ( typeof cookie[tagName] == 'object')
                delete cookie[tagName];

            $.cookies.set('tabCookie', cookie);
            prev.tab('show')
        });

        $('[rel="refresh_'+ tagName + '"]').bind('click', function(){
            document.getElementById('if-' + tagName).contentDocument.location.reload(true);
        });

        //设置添加快捷菜单
        $('[rel="setQuick_'+ tagName + '"]').bind('click', function(){
            $.ajax({
                url: '/menu/saveQuickMemu?id='+memuId,
                dataType: 'json',
                success:function(json) {

                    $.dialog.tips(json.data);
                }
            });
        });
    } else {
        isExistTab.trigger('click');
        document.getElementById('if-' + tagName).src = url;
        //document.getElementById('if-' + tagName).contentDocument.location.reload(true);
    }
}

// 删除快捷菜单
$('#quickMemu .icon-remove').click(function() {
    id = $(this).parent().find('a').attr('data-id');
    $.ajax({
        url: '/menu/removeQuickMemu?id='+id,
        dataType : 'json',
        success : function(json) {
            $.dialog.tips(json.data);
            if(json.code == 1) {
                setTimeout( function() { window.location.reload() }, 500);
            }
        }
    });
});

function setIFrameHeight() {
    return $(window).height() - $('#container').height() - $("#header").height() - $("#main-nav").height();
}

function getMenuList(rel, tag) {
    $.ajax({
        url: '/admin/menu/info/?id=1',
        dataType: 'json',
        success: function(json){
            $('#systemTag p').html(1);
            var menuHtml = '<div class="accordion">';
            var dataSon = json.data.son;
            for(var i in dataSon) {
                menuHtml += '<div class="accordion-group">';
                menuHtml += '<div class="accordion-heading">';
                menuHtml += '<a class="accordion-toggle" data-toggle="collapse" href="' + dataSon[i]['m_url'] + '">' + dataSon[i]['m_name'] + '</a>';
                menuHtml += '</div>';
                menuHtml += '<div id="' + dataSon[i]['m_tag'] + '" class="accordion-body collapse">';
                menuHtml += '<div class="accordion-inner">';
                menuHtml += '<ul class="unstyled">';
                var child = dataSon[i].son;
                for(var k in child) {

                    //如果调用的是外网地址
                    if(child[k]['m_url'].substr(0,7)=='http://'){
                        child[k]['m_url']=child[k]['m_url'].replace('{APP_ENV}','<?php echo @constant('APP_ENV');?>
');
                    }

                    menuHtml += '<li><a target="navTab" rel="' + child[k]['m_tag'] + '" href="'  + child[k]['m_url'] + '" title="' + child[k]['m_name'] + '" data-id="' + child[k]['m_id'] + '">' + child[k]['m_name'] + '</a></li>';
                }
                menuHtml += '</ul>';
                menuHtml += '</div>';
                menuHtml += '</div>';
                menuHtml += '</div>';
            }
            menuHtml += '</div>';

            $('#systemTag').html(menuHtml).find('.accordion-toggle:eq(0)').trigger('click');

            $(document).on('click', '[target="navTab"]', function () {
                var tagName = $(this).attr("rel");
                var url     = $(this).attr("href");
                var title   = $(this).attr('title');
                var memuId   = $(this).attr('data-id');
                //添加标签页,内容页
                setTab(tagName,url,title,memuId);
                return false;
            });

            return 'aa';
        }
    });
}

$('#editPassword').click(function() {
    $('#oldPassword').val('');
    $('#newPassword').val('');
    $('#confirmPassword').val('');
    $('#passwordTip').modal();
});

function editPassword() {
    var oldPassword = $('#oldPassword').val();
    var newPassword = $('#newPassword').val();
    var confirmPassword = $('#confirmPassword').val();

    if(newPassword != confirmPassword) {
        $.dialog.alert('新密码不一致');
        return false;
    }

    $.ajax({
        url: '/admin/password/index/',
        async: false,
        type: "POST",
        data: {oldPassword:oldPassword, newPassword:newPassword, confirmPassword:confirmPassword},
        dataType: 'json',
        success: function(json){
            $.dialog.alert(json.data);
            if(json.code == 1) {
                $('#passwordTip').modal('hide');
            }
        }
    });
    return false;
}

// 窗口化改变，IFrame自适应
$(window).resize(function() {
    $("iframe").attr('height', setIFrameHeight() );
});

// 外框架按F5刷新，内框架刷新
document.onkeydown=function(event){
    var e = event || window.event || arguments.callee.caller.arguments[0];
    if(e && e.keyCode == 1116){
        $("#pageContent .tab-pane.active").find('iframe').get(0).contentDocument.location.reload(true);
        return false;
    }
};

if($.cookies.get('tabCookie')){
    var tabCookie = $.cookies.get('tabCookie');

    $.each(tabCookie, function(index, item){
        setTab(item.a_rel, item.a_href, item.a_title, item.a_id);
    });
} else {
    var tabCookie={};
}
<?php echo '</script'; ?>
>

</body>
</html><?php }
}
?>