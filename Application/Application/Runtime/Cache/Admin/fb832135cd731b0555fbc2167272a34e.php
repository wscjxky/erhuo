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

<html>

<style>
    .layui-layer.layui-anim.layui-layer-page{
        top:150px !important;
    }
</style>
<!-- Content Header (Page header) -->
<body>
<!-- Main content -->
<div id="qrcode" ></div>
<div class="row">

    <div class="col-md-1" style="margin-left: 30px">
        <h3>商品列表</h3>
        <h5>(共<?php echo ($count); ?>条记录)</h5>
    </div>
    <!--<form class="navbar-form form-inline" style="margin-top: 50px" method="post" action="/index.php/Admin/order/export_order"  name="search-form2" id="search-form2">-->

        <!--<div class="sDiv">-->
            <!--&lt;!&ndash;<div class="col-md-1">&ndash;&gt;-->
                <!--&lt;!&ndash;<input type="text" size="30" id="add_time_begin" name="add_time_begin" value="" class="qsbox"  placeholder="起始时间">&ndash;&gt;-->
            <!--&lt;!&ndash;</div>&ndash;&gt;-->
            <!--&lt;!&ndash;<div class="col-md-2">&ndash;&gt;-->
                <!--&lt;!&ndash;<input type="text" size="30" id="add_time_end" name="add_time_end" value="" class="qsbox"  placeholder="结束时间">&ndash;&gt;-->
            <!--&lt;!&ndash;</div>&ndash;&gt;-->


            <!--&lt;!&ndash;<div class="col-md-1">&ndash;&gt;-->
                <!--&lt;!&ndash;<select name="shipping_status" class="select" style="width:100px;">&ndash;&gt;-->
                    <!--&lt;!&ndash;<option value="0">正在</option>&ndash;&gt;-->
                    <!--&lt;!&ndash;<option value="1">已参加</option>&ndash;&gt;-->
                <!--&lt;!&ndash;</select>&ndash;&gt;-->
            <!--&lt;!&ndash;</div>&ndash;&gt;-->

            <!--&lt;!&ndash;<div class="col-md-1">&ndash;&gt;-->
                <!--&lt;!&ndash;<select  name="keytype" class="select">&ndash;&gt;-->
                    <!--&lt;!&ndash;<option value="consignee">商品发布者</option>&ndash;&gt;-->
                    <!--&lt;!&ndash;<option value="order_sn">商品编号</option>&ndash;&gt;-->
                    <!--&lt;!&ndash;</foreach>&ndash;&gt;-->
                <!--&lt;!&ndash;</select>&ndash;&gt;-->
            <!--&lt;!&ndash;</div>&ndash;&gt;-->
            <!--&lt;!&ndash;<div class="col-md-2">&ndash;&gt;-->
                <!--&lt;!&ndash;<input type="text" size="30" name="keywords" class="qsbox" placeholder="搜索相关数据...">&ndash;&gt;-->
            <!--&lt;!&ndash;</div>&ndash;&gt;-->



        <!--</div>-->
    <!--</form>-->
</div>




<table class="table table-hover table-condensed table-striped table-bordered">
    <!--<div class="navbar-form form-inline" style="margin-top: 50px" method="post" action="/index.php/Admin/order/export_order"  name="search-form2" id="search-form2">-->
        <div class="col-md-1">
            <!--<select  id="selector" name="keytype" class="select">-->
                <!--<option value="title">商品名称</option>-->
                <!--<option value="speaker">主讲老师</option>-->
            <!--</select>-->
            <a href="goodinfo"><button type="button" class="btn btn-primary">添加商品</button></a>

        </div>
        <!--<div class="col-md-2">-->
            <!--<input id="keyword"  type="text" size="30" name="keywords" class="qsbox" placeholder="输入相关数据">-->
        <!--</div>-->
        <!--<div class="col-md-1">-->
            <!--<button class="btn btn-primary" onclick="search()">搜索</button>-->
        <!--</div>-->

    <!--</div>-->
    <thead>
    <tr>
        <th>商品号</th>
        <th>商品标题</th>
        <th>商品分类</th>
        <th>商品简介</th>

        <th>单价</th>
        <th>图片</th>
        <th>添加时间</th>
        <th>卖家信息</th>
        <th>卖家微信号</th>

        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr id="<?php echo ($v["good_id"]); ?>">
            <td ><?php echo ($v["good_id"]); ?></td>
            <td ><?php echo ($v["good_title"]); ?></td>
            <td ><?php echo ($v["first_category"]); ?>-><?php echo ($v["second_category"]); ?>-><?php echo ($v["third_category"]); ?>-><?php echo ($v["four_category"]); ?></td>
            <td ><?php echo ($v["good_desc"]); ?></td>
            <td><?php echo ($v["good_price"]); ?></td>
            <td ><img src="<?php echo (SHOW_URL); echo ($v["image"]); ?>" height="60" width="60"/></td>
            <td ><?php echo ($v["createtime"]); ?></td>
            <td><?php echo ($v["seller_desc"]); ?></td>
            <td><?php echo ($v["seller_wechat"]); ?></td>

            <td >
                <a class="btn btn-primary"  href="goodinfo?id=<?php echo ($v["good_id"]); ?>"><i class="fa fa-pencil"></i></a>
                <a class="btn btn-danger" data-id="<?php echo ($v["good_id"]); ?>" data-act="del"  data-url="<?php echo U('Good/goodHandle');?>" onclick="delfunc(this)"><i class="fa fa-trash-o"></i></a>

            </td>

        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
</body>
<script>
//    function search() {
//                var keyword=$("#keyword").val();
//                var act=$("#selector").val();
//                window.location.href="/erhuo/index.php/admin/good/search?act="+act+"&keyword="+keyword;
//    }
</script>
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