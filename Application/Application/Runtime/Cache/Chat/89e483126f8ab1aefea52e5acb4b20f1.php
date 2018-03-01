<?php if (!defined('THINK_PATH')) exit();?><meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<!--<script src="<?php echo (JS_URL); ?>jquery.js"></script>-->
<!--<script src="<?php echo (JS_URL); ?>jquery-weui.min.js"></script>-->

<!--<link rel="stylesheet" href="/erhuo/Public/bootstrap/css/bootstrap.css">-->
<!--<script rel="stylesheet" src="/erhuo/Public/bootstrap/js/bootstrap.js"></script>-->


<link href="<?php echo (CSS_URL); ?>vendors.css" relative="stylesheet" />
<!---->
<!--<link rel="stylesheet" href="<?php echo (CSS_URL); ?>weui.min.css">-->
<!--<link rel="stylesheet" href="<?php echo (CSS_URL); ?>jquery-weui.min.css">-->
<!--<script src="<?php echo (JS_URL); ?>jquery-weui.js"></script>-->
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.bootcss.com/weui/1.1.2/style/weui.min.css">
<link rel="stylesheet" href="https://cdn.bootcss.com/jquery-weui/1.2.0/css/jquery-weui.min.css">
<script src="https://cdn.bootcss.com/jquery-weui/1.2.0/js/jquery-weui.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-weui/1.2.0/js/swiper.min.js"></script>

<script src="<?php echo (JS_URL); ?>fastclick.js"></script>

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
        width: 30px;
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

</style>


<!--<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">-->
<!--<meta name="format-detection" content="telephone=no">-->



<!DOCTYPE html>


<html lang="en">
<head>

</head>
<style>
    body{
        font-size: 12px;
    }
    .page_title{
        margin-bottom: 8%;
    }
    select{
        float: right;
        margin-left: 2%;
    }
    .selectgroup{
        margin-top: 5%;
    }
</style>
<script>
    var sort_type='down';
    function sort() {
        //清空所有li
        if(sort_type=='down'){
            $('.weui-media-box').remove().sort(function(a,b) {
                //排序，按照指定的规则,a-b来对标签进行排序
                var price1=parseInt($(a).find('i').text().substring(3));
                var price2=parseInt($(b).find('i').text().substring(3));
                return price1-price2;
            } ).each( function(i,e) {
                //按照规则继续添加li
                $( '.weui-panel__bd' ).append( e );
            } );
            sort_type='up';
        }
        else{
            $('.weui-media-box').remove().sort(function(a,b) {
                //排序，按照指定的规则,a-b来对标签进行排序
                console.log($(a).find('i').text().substring(3));
                var price1=parseInt($(a).find('i').text().substring(3));
                var price2=parseInt($(b).find('i').text().substring(3));
                return price2-price1;
            } ).each( function(i,e) {
                //按照规则继续添加li
                $( '.weui-panel__bd' ).append( e );
            } );
            sort_type='down';

        }

    }

    $(document).ready(function() {
        $("h1").click(function () {
            window.location.href='/erhuo/index.php/chat';
        })

    });

</script>
<style>

    .course_title{
        font-weight: bold;
        font-size: 15px;
        overflow: hidden;

    }
    .weui-media-box__desc{
        margin-top: 4px;
        font-weight: normal;
    }
    .weui-media-box__bd{
            margin-left: 16px;
    }
    .weui-media-box__desc_time{
        font-weight:bold!important;
        text-align: end;
        color: #C35B14;
        padding:2px 18px 3px 18px;
        background-color: #E0E0E0;
        border-radius:10px;
        -webkit-border-radius:10px;
        -moz-border-radius :10px;

    }
    .weui-media-box_appmsg{
        margin-top: 10px;
        margin-bottom: 12px;
    }

    option{
        text-align:center;
    }

    /*清除ie的默认选择框样式清除，隐藏下拉箭头*/
    select::-ms-expand { display: none; }

    /* Default custom select styles */
    div.cs-select {
        display: inline-block;
        vertical-align: middle;
        position: relative;
        text-align: right;
        background: #fff;
        color: white;
        z-index: 100;
        width: 100%;
        max-width: 500px;
        font-weight: normal;


    }

    div.cs-select:focus {
        outline: none; /* For better accessibility add a style for this in your skin */
    }


    .cs-select span {
        display: block;
        position: relative;
        cursor: pointer;
        padding: 1em;
        white-space: nowrap;
        overflow: hidden;

        text-overflow: ellipsis;
        text-align: right;

    }

    /* Placeholder and selected option */
    .cs-select > span {

        padding-right: 3em;
    }

    .cs-select > span::after,
    .cs-select .cs-selected span::after {

        speak: none;
        position: absolute;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .cs-select > span::after {

        content: '\25BE';
        right: 1em;
    }

    .cs-select .cs-selected span::after {
        content: '\2713';
        margin-left: 1em;
    }

    .cs-select.cs-active > span::after {
        -webkit-transform: translateY(-50%) rotate(180deg);
        transform: translateY(-50%) rotate(180deg);
    }

    /* Options */
    .cs-select .cs-options {
        position: absolute;
        overflow: hidden;
        width: 100%;
        background: #fff;
        visibility: hidden;
    }

    .cs-select.cs-active .cs-options {
        visibility: visible;
    }

    .cs-select ul {

        list-style: none;
        margin: 0;
        padding: 0;
        width: 100%;
    }

    .cs-select ul span {

        padding: 1em;
    }

    .cs-select ul li.cs-focus span {
        background-color: #ddd;
    }

    /* Optgroup and optgroup label */
    .cs-select li.cs-optgroup ul {
        padding-left: 1em;
    }

    .cs-select li.cs-optgroup > span {
        cursor: default;
    }

    .tabimage{
        height: 25px;
        width: auto;

    }
    .weui-navbar{
        text-align:center;
        position: initial;
        border:1px solid #eb7537;
        height:auto;
        width:100%;
        color: #eb7537;
        border-radius:25px;
        -moz-border-radius:25px; /* 老的 Firefox */
    }
    .weui-navbar__item{
        padding:5px 0 5px 0;
        color: #eb7537;
        position: initial;

    }
    .weui-navbar__item.weui-bar__item--on{
        -webkit-border-radius:20px;
        -moz-border-radius :20px;
        background-color: #eb7537;;
        color: white;
    }
    .weui-navbar+.weui-tab__bd{
        padding-top: 12px!important;
    }

</style>

<!--background: #f9f9f9;-->
<body ontouchstart >
<div  >
        <div class="weui-tab__bd">
            <div class="weui-search-bar" id="searchBar">
                <i style="padding: 1%" id="category" class="weui-icon-circle"></i>
                <form class="weui-search-bar__form" action="/erhuo/index.php/chat/category/search" method="post">
                    <div class="weui-search-bar__box" style="height: 4%!important;">
                        <i class="weui-icon-search"></i>
                        <input name="keywords" type="search" class="weui-search-bar__input" id="searchInput" placeholder="搜索" required="">
                        <a href="javascript:" class="weui-icon-clear" id="searchClear"></a>
                    </div>
                    <label class="weui-search-bar__label" id="searchText">
                        <i class="weui-icon-search"></i>
                        <span>搜索</span>
                    </label>
                </form>
                <a href="javascript:" class="weui-search-bar__cancel-btn" id="searchCancel">取消</a>
            </div>
            <div class="page_title" style="margin: 8px">
                <h1 >二货市场</h1>
                <a id="price_sort" href="javascript:sort();" class="weui-btn weui-btn_default sortgroup">价格排序</a>

            </div>
                <!--<div class="selectgroup" >-->


                    <!--<select id="third_select"  class="cs-select cs-skin-elastic">-->
                        <!--<option value=""></option>-->
                        <!--<?php if(is_array($third_category_list)): $i = 0; $__LIST__ = $third_category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>-->
                            <!--<option value="<?php echo ($v["category_title"]); ?>"><?php echo ($v["category_title"]); ?></option>-->
                        <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                    <!--</select>-->

                    <!--<select id="second_select" class="cs-select cs-skin-elastic">-->
                        <!--<option value=""></option>-->
                        <!--<?php if(is_array($second_category_list)): $i = 0; $__LIST__ = $second_category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>-->
                            <!--<option value="<?php echo ($v["category_title"]); ?>"><?php echo ($v["category_title"]); ?></option>-->
                        <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                    <!--</select>-->
                    <!--<select id="first_select"  class="cs-select cs-skin-elastic">-->
                        <!--<option value=""></option>-->
                        <!--<?php if(is_array($first_category_list)): $i = 0; $__LIST__ = $first_category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>-->
                            <!--<option value="<?php echo ($v["category_title"]); ?>"><?php echo ($v["category_title"]); ?></option>-->
                        <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                    <!--</select>-->
                <!--</div>-->
             <div class="weui-panel__bd">
                 <?php if(($data == 'none')): ?><div class="empty_warn">
                         <i class="weui-icon-warn weui-icon_msg-primary"> 抱歉，没有查询到相关结果</i>
                     </div>
                     <?php else: ?>
                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href='/erhuo/index.php/chat/good?id=<?php echo ($v["good_id"]); ?>'>

                        <div  class="weui-media-box weui-media-box_appmsg" >
                            <img  src="<?php echo (SHOW_URL); echo ($v["image"]); ?>">
                            <div class="weui-media-box__bd">
                                <a  href='/erhuo/index.php/chat/good?id=<?php echo ($v["good_id"]); ?>' class='course_title'>
                                    <?php echo ($v["good_title"]); ?></a>
                                <p class='weui-media-box__desc' >
                                    <?php echo ($v["good_desc"]); ?></p>
                                <p class='weui-media-box__desc'  >
                                    <?php echo ($v["good_createtime"]); ?> </p>
                                <p style='text-align: end'>
                                    <i class='weui-media-box__desc_time'> ￥ <?php echo ($v["good_price"]); ?> </i>
                                </p>
                            </div>
                        </div>
                            </a><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </div>

            </div>
    </div>




</body >
<!-- body 最后 -->
<style>
    a{

        margin: 0 auto;
    }


</style>
<!--<div class="weui-tabbar" style="text-align: center;-->
<!--position:fixed ;background:url('http://www.cunpianzi.com/tpchat/Public/img/nav_bar.png')" >-->
    <!--<a href="/erhuo/index.php/chat">-->

        <!--<img  src="<?php echo (IMG_URL); ?>nav_index.png" alt="">-->

    <!--</a>-->
    <!--<a href="/erhuo/index.php/chat/log"   >-->

        <!--<img  src="<?php echo (IMG_URL); ?>nav_message.png" alt="">-->
    <!--</a>-->
    <!--<a href="/erhuo/index.php/chat/user" >-->

        <!--<img  src="<?php echo (IMG_URL); ?>nav_user.png" alt="">-->

    <!--</a>-->

<!--</div>-->




</html>

<title>二货市场</title>
<script>
    $(function() {
        FastClick.attach(document.body);
    });
</script>