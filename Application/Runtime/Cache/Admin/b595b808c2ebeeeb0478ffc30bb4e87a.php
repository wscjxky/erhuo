<?php if (!defined('THINK_PATH')) exit();?>
<head>
    <meta charset="UTF-8">
    <title>二货后台</title>
    <script src="<?php echo (JS_URL); ?>jquery.js"></script>
    <!-- Bootstrap 3.3.4 -->
    <link href="/erhuo/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- FontAwesome 4.3.0 -->
    <link href="/erhuo/Public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/erhuo/Public/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <script src="/erhuo/Public/js/layer/layer.js"></script><!-- 弹窗js 参考文档 http://layer.layui.com/-->
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>jquery-confirm.min.css">
    <script  src="<?php echo (JS_URL); ?>jquery-confirm.min.js"></script>
    <script  src="/erhuo/Public/bootstrap/js/bootstrap.min.js"></script>

    <style>
        table{

        }
    </style>
    <script>
        function delfunc(obj){

            console.log($(obj));
            console.log($(obj).attr('data-url'));

            layer.confirm('确认删除？', {
                    btn: ['确定','取消'] //按钮
                }, function(){
                    $.ajax({
                        type : 'post',
                        url : $(obj).attr('data-url'),
                        data : {act:$(obj).attr('data-act'),
                            id:$(obj).attr('data-id')},
                        dataType : 'json',
                        success : function(data){
                            console.log(data);
                            if(data==1){
                                layer.msg('操作成功', {icon: 1});
                                $(obj).parent().parent().remove();
                            }
                            else if(data==2){
                                layer.msg('请先清空所属该角色的管理员', {icon: 1});
                            }
                            else{
                                layer.msg(data, {icon: 2,time: 2000});
                            }
                        }
                    })
                }, function(index){
                    layer.close(index);
                    return false;// 取消
                }
            );
        }</script>
</head>

<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">

    <title>商品管理</title>
    <!--<script type="text/javascript">-->
        <!--var SITEURL = window.location.host +'/index.php/admin';-->
    <!--</script>-->
    <link href="/erhuo/Public/static/css/main.css" rel="stylesheet" type="text/css">
    <link href="/erhuo/Public/static/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/erhuo/Public/static/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/erhuo/Public/static/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="/erhuo/Public/static/js/jquery.validation.min.js"></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>admin.js"></script>

</head>
<body style='overflow:auto ;'>

<div class="admincp-header">

    <div id="foldSidebar"><i class="fa fa-outdent " title="展开/收起侧边导航"></i></div>
    <!--<div class="admincp-name" onClick="javascript:openItem('welcome|Index');">-->
        <!--&lt;!&ndash; <h2 style="cursor:pointer;">TPshop2.0<br>平台系统管理中心</h2> &ndash;&gt;-->
    <!--</div>-->

    <div class="admincp-header-r">
        <ul class="operate nc-row">
            <li></li>

            <li><a class="login-out show-option" href="/erhuo/index.php/admin/index/logout" title="安全退出管理中心">&nbsp;</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<div class="admincp-container unfold">
    <div class="admincp-container-left">
        <div class="top-border"><span class="nav-side"></span><span class="sub-side"></span></div>

        <div id="admincpNavTabs_index" class="nav-tabs" style="display: block!important;">

            <dl>
                <dt><a href="javascript:void(0);"><span class="ico-shop-1"></span><h3>订单</h3>
                </a></dt>
                <dd class="sub-menu">
                    <ul>
                        <li><a href="javascript:void(0);" data-param="index|Trade">订单列表</a></li>
                    </ul>
                </dd>
            </dl>
            <dl>
                <dt><a href="javascript:void(0);"><span class="ico-shop-0"></span><h3>商品</h3>
                </a></dt>
                <dd class="sub-menu">
                    <ul>
                        <li><a href="javascript:void(0);" data-param="index|Good">商品列表</a></li>
                        <li><a href="javascript:void(0);" data-param="category|Good">商品分类</a></li>
                    </ul>
                </dd>
            </dl>

            <!--<dl>-->
                <!--<dt><a href="javascript:void(0);"><span class="ico-system-1"></span><h3>用户</h3></a></dt>-->
                <!--<dd class="sub-menu">-->
                    <!--<ul>-->

                        <!--<li><a href="javascript:void(0);" data-param="index|User">用户列表</a></li>-->

                    <!--</ul>-->
                <!--</dd>-->
            <!--</dl>-->
            <!--<dl>-->
                <!--<dt>-->
                    <!--<a href="javascript:void(0);"><span class="ico-system-5"></span><h3>单页面</h3>-->
                    <!--</a>-->
                <!--</dt>-->
                <!--<dd class="sub-menu">-->
                    <!--<ul>-->
                        <!--<li><a href="javascript:void(0);" data-param="index|Module">首页轮播图</a></li>-->

                    <!--</ul>-->
                <!--</dd>-->
            <!--</dl>-->
        </div>


</div>
    <div class="admincp-container-right">
        <div class="top-border"></div>
        <iframe src="" id="workspace" name="workspace" style="overflow: visible;" frameborder="0" width="100%" height="94%" scrolling="yes" onload="window.parent"></iframe>
    </div>
</div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

</body>
</html>