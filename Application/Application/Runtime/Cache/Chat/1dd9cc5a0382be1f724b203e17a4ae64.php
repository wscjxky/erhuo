<?php if (!defined('THINK_PATH')) exit();?><meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<!--<script src="<?php echo (JS_URL); ?>jquery.js"></script>-->
<!--<script src="<?php echo (JS_URL); ?>jquery-weui.min.js"></script>-->

<!--<link rel="stylesheet" href="/erhuo/Public/bootstrap/css/bootstrap.css">-->
<!--<script rel="stylesheet" src="/erhuo/Public/bootstrap/js/bootstrap.js"></script>-->


<!--<link href="<?php echo (CSS_URL); ?>vendors.css" relative="stylesheet" />-->
<!---->
<!--<link rel="stylesheet" href="<?php echo (CSS_URL); ?>weui.min.css">-->
<!--<link rel="stylesheet" href="<?php echo (CSS_URL); ?>jquery-weui.min.css">-->
<!--<script src="<?php echo (JS_URL); ?>jquery-weui.js"></script>-->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.bootcss.com/weui/1.1.2/style/weui.min.css">
<link rel="stylesheet" href="https://cdn.bootcss.com/jquery-weui/1.2.0/css/jquery-weui.min.css">
<link rel="stylesheet" href="/erhuo/Public/js/layer/mobile/need/layer.css">
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>

<title>二货市场</title>
<style>
    .page-title{
        background-color:#dfdfdf
    }
    .arrow-left.backpage {
        margin-top: 4px
    }
    .weui-btn.weui-btn_primary{
        position: fixed; /*or前面的是absolute就可以用*/
        bottom: 0px;
        margin-left: 11%;
        margin-bottom:  5%;

        width: 75%;
    }
    h1{
        padding-top:1%;
        font-size: 23px;
    }
    img{
        width: 60px;height: 60px;vertical-align: top
    }
    #price_sort{
        margin-top: -1%;
        font-size:10px!important;
        text-align: center;
        float: right;
    }
    .weui-panel__bd{
        margin-top: 10%;
    }
    .empty_warn{
        text-align: center;
        margin-top: 35%;
    }
    .weui-icon_msg-primary{
        font-size: 25px;
    }
    /*搜索栏覆盖*/
    .weui-search-bar__label{
        bottom: -2px!important;
    }
    .weui-navbar+.weui-tab__bd{
        padding-top: 12px!important;
    }
    /*分类图*/
    .result-box .result-icon {
        width: 22px;
        height: 30px;
        margin-right: 10px;
        padding-right: 10px;

        background-repeat: no-repeat;
        /*//属性设置是否及如何重复背景图像*/
        background-position: center;
        /*//背景位置居中*/
        background-size: cover;
        /*background-size的cover特定值会保持图像本身的宽高比例，将图片缩放到正好完全覆盖定义背景的区域。*/
        display: block;
        /*//变成块状，这个属性一定要加，要不然不显示。因为<i>标签不是块级元素*/
    }
    .result-box .result-fail{
        background-image:url("<?php echo (IMG_URL); ?>/category.png") ;
    }
/*备案号的问题，因为panl只占了100%而不是铺满屏幕*/
    .weui-tab__bd{
        height: auto;!important;
    }
</style>


<!--<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">-->
<!--<meta name="format-detection" content="telephone=no">-->



<!DOCTYPE html>

<style>
    p{
        margin: 0 0 0;
    }
</style>
<head>
    <meta charset="UTF-8">
    <link href="/erhuo/Public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript">
    $(document).ready(function(){
    });

</script>
<body>
<div class="weui-panel__bd" style="padding: 10px">


    <div class="weui-form-preview">

        <div class="weui-form-preview__hd" style="padding: 8%;text-align: center">
            <img  style='width: 250px;height: 250px;'
                  src="<?php echo (SHOW_URL); echo ($data["image"]); ?>">


        </div>
        <div class="weui-form-preview__bd">
            <div class="weui-form-preview__item">
                <label class="weui-form-preview__label">商品</label>
                <span class="weui-form-preview__value"><?php echo ($data["good_title"]); ?></span>
            </div>
            <div class="weui-form-preview__item">
                <label class="weui-form-preview__label">商品描述</label>
                <span class="weui-form-preview__value"><?php echo ($data["good_desc"]); ?></span>
            </div>
            <div class="weui-form-preview__item">
                <label class="weui-form-preview__label">价格</label>
                <span class="weui-form-preview__value" style="color: brown">￥<?php echo ($data["good_price"]); ?></span>
            </div>
            <div class="weui-form-preview__item">
                <label class="weui-form-preview__label">新旧程度</label>
                <span class="weui-form-preview__value" style="color: brown"><?php echo ($data["good_degree"]); ?>成新</span>
            </div>
            <div class="weui-form-preview__item">
                <label class="weui-form-preview__label">卖家信息</label>
                <span class="weui-form-preview__value" style="color: brown"><?php echo ($data["sell_desc"]); ?></span>
            </div>
        </div>
        <div class="weui-form-preview__ft">
            <a class="weui-form-preview__btn weui-form-preview__btn_default" href="javascript:linkWechat();">联系卖家</a>
            <button type="submit" class="weui-form-preview__btn weui-form-preview__btn_primary" onclick="javascript:linkSever();">联系客服</button>
        </div>
    </div>
        <ul class="weui-media-box__info" >
            <li class="weui-media-box__info__meta"></li>
            <li class="weui-media-box__info__meta "></li>
        </ul>
</div>

<style>
    a{

        margin: 0 auto;
    }
</style>

</body>
<script src="<?php echo (JS_URL); ?>jquery.qrcode.min.js"  type="text/javascript"></script>
<!-- body 最后 -->
<script>
    function linkSever(){
        console.log('asd');
        layer.open({
            type: 1,
            closeBtn: 0,
            skin: '#ADADAD', //没有背景色
            shadeClose: true,
            content:'<img   style="width: 200px;height: 200px" id="qrcode" src="<?php echo (IMG_URL); ?>gzh.jpg">\n',
            end: function () {
            }
        });
    }
    function linkWechat(){
        $.alert("");
    }
</script>
</html>

<script>
    $(function() {
        FastClick.attach(document.body);
    });
</script>

<script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/jquery-weui/1.2.0/js/jquery-weui.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-weui/1.2.0/js/swiper.min.js"></script>

<script src="<?php echo (JS_URL); ?>fastclick.js"></script>
<script src="/erhuo/Public/js/layer/mobile/layer.js"></script><!-- 弹窗js 参考文档 http://layer.layui.com/-->