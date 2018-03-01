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

<!--<script type="text/javascript" src="/public/static/js/jquery.js"></script>-->
<!--<link rel="stylesheet" type="text/css" href="/erhuo/Public/bootstrap/css/bootstrap.css"></link>-->
<!--<link href="/erhuo/Public/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />-->
<!--<script src="/erhuo/Public/plugins/daterangepicker/moment.min.js" type="text/javascript"></script>-->
<!--<script src="/erhuo/Public/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>-->
    <!-- Content Header (Page header) -->
<link rel="stylesheet" href="<?php echo (CSS_URL); ?>jquery-confirm.min.css">
<script  src="<?php echo (JS_URL); ?>jquery-confirm.min.js"></script>

    <!-- Main content -->
<div class="row">

            <!--<div class="col-md-2" style="margin-left: 30px">-->
                <!--<h3>订单列表</h3>-->
                <!--<h5>共<?php echo ($count); ?>条记录，课程购买数：<?php echo ($total_people); ?></h5>-->
            <!--</div>-->
            <!--<div class="navbar-form form-inline" style="margin-top: 50px" method="post" action="/index.php/Admin/order/export_order"  name="search-form2" id="search-form2">-->

                    <!--<div class="col-md-1">-->
                        <!--<select  id='selector' name="keytype" class="select">-->
                            <!--<option value="chatname">用户名</option>-->
                            <!--<option value="course_title">课程标题</option>-->
                            <!--</foreach>-->
                        <!--</select>-->
                    <!--</div>-->
                    <!--<div class="col-md-2">-->
                        <!--<input id='keyword' type="text" size="30" name="keyword" class="qsbox" placeholder="输入相关数据">-->
                    <!--</div>-->

                <!--<div class="col-md-1">-->
                    <!--<select  id='trade_state' name="keytype" class="select">-->
                        <!--<option value="-&#45;&#45;">-&#45;&#45;</option>-->

                        <!--<option value="未支付">未支付</option>-->
                        <!--<option value="已支付">已支付</option>-->

                        <!--</foreach>-->
                    <!--</select>-->
                <!--</div>-->
                    <!--<div class="col-md-2">-->
                        <!--<button onclick="search()" class="btn btn-primary" >搜索</button>-->
                    <!--</div>-->
            <!--</div>-->
        </div>



<table class="table table-hover table-condensed table-striped table-bordered">
    <thead>
    <tr>
        <th>订单编号</th>
        <th>学员名称</th>
        <th>下单时间</th>
        <th>课程标题</th>
        <th>课程数</th>
        <th>金额</th>
        <th>订单状态</th>

    </tr>
    </thead>
    <tbody>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr id="<?php echo ($v["trade_id"]); ?>">
            <td ><?php echo ($v["trade_id"]); ?></td>
                <td ><?php echo ($v["chatname"]); ?></td>
                <td ><?php echo ($v["createtime"]); ?></td>
                <td><?php echo ($v["course_title"]); ?></td>
                <td >
                  <?php echo ($v["people_count"]); ?>
                   </td>
                <td >¥<?php echo ($v["final_price"]); ?></td>
            <td ><?php echo ($v["trade_state"]); ?></td>

        </tr>
    <tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>



<!--订单-->
<!--<div style="float: right;margin-right: 20px" class="result page"><?php echo ($page); ?></div>-->



</body>
<script>
//    function search() {
//        var keyword=$("#keyword").val();
//        var act=$("#selector").val();
//        var trade_state=$("#trade_state").val();
//        console.log(trade_state);
//        window.location.href="/erhuo/index.php/admin/trade/search?act="+act+"&keyword="+keyword+"&trade_state="+trade_state;
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