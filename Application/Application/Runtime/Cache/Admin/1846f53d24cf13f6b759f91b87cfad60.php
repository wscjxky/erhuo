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
<head>
	<meta charset="UTF-8">
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


	<!-- jQuery 2.1.4 -->

</head>

<body>



       <div class="row">
		   <div class="col-md-1" style="margin-left: 30px">
			   <h3>分类列表</h3>
			   <h5>(共<?php echo ($count); ?>条记录)</h5>
		   </div>
	   </div>


				<a href="categoryinfo"><button type="button" class="btn btn-primary">添加分类</button></a>



							<table id="list-table" class="table table-bordered table-striped dataTable">

								<thead>

								<tr role="row">
									<th>编号</th>
									<th>分类名称</th>
									<th>分类等级</th>
									<th>上级分类编号</th>
									<th>创建时间</th>
									<th>操作</th>
								</tr>
								</thead>
								<tbody>
								<?php if(is_array($data)): foreach($data as $k=>$v): ?><tr role="row" >
										<td><?php echo ($v["category_id"]); ?></td>

										<td><?php echo ($v["category_title"]); ?></td>
										<td><?php echo ($v["level"]); ?></td>
										<td><?php echo ($v["last_category_id"]); ?></td>

										<td ><img src="<?php echo (SHOW_URL); echo ($v["image"]); ?>" height="60" width="60"/></td>

										<td><?php echo ($v["createtime"]); ?></td>
										<td>
											<a class="btn btn-primary"  href="categoryinfo?id=<?php echo ($v["category_id"]); ?>"><i class="fa fa-pencil"></i></a>
											<a class="btn btn-danger" data-id="<?php echo ($v["category_id"]); ?>" data-act="del"  data-url="<?php echo U('Good/categoryHandle');?>" onclick="delfunc(this)"><i class="fa fa-trash-o"></i></a>
										</td>

									</tr><?php endforeach; endif; ?>
								</tbody>
								<tfoot>
								</tfoot>
							</table>
					<div class="row">
						<div class="col-sm-6 text-left"></div>
						<div class="col-sm-6 text-right"><?php echo ($page); ?></div>
					</div>


</body>
<script>

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