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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<style>
    img{
        margin-bottom: 10%;
    }
</style>
<body>
<div class="wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="pull-right">
                <a href="javascript:history.go(-1)"
                   class="btn btn-default" ><i class="fa fa-reply"></i></a>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <!--<?php if($act == 'pass' ): ?>-->
                        <!--<h3 class="panel-title"><i class="fa fa-list"></i> 反馈信息</h3>-->
                        <!--<?php else: ?>-->
                        <!--<h3 class="panel-title"><i class="fa fa-list"></i> 拒绝信息</h3>-->
                    <!--<?php endif; ?>-->
                    <h3 class="panel-title"><i class="fa fa-list"></i> 分类信息</h3>

                </div>
                <div class="panel-body ">
                    <form action="categoryHandle" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="category_id" value="<?php echo ($data["category_id"]); ?>" />

                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th >分类名称:</th>
                                    <td><input type="text" class="form-control" name="category_title" value="<?php echo ($data["category_title"]); ?>" ></td>
                                </tr>
                                <tr>
                                    <th >分类等级:</th>
                                    <td><input type="text" class="form-control" name="level" value="<?php echo ($data["level"]); ?> " ></td>
                                </tr>
                                <tr>
                                    <th >分类上级:</th>
                                    <td><input type="text" class="form-control" name="last_category_id" value="<?php echo ($data["last_category_id"]); ?> " ></td>
                                </tr>
                                <tr>
                                    <th >商品封面上传（jpg.png.jpeg.gif，不超过1000K，尺寸：px*px）</th>
                                    <td><input type="file" value="<?php echo ($data["image"]); ?>" name="image"></td>
                                    <td><img id="show_image" style="width: 300px;height: 300px" src="<?php echo (SHOW_URL); echo ($data["image"]); ?>"/></td>
                                </tr>
                                <input type="hidden" name="act" value="<?php echo ($act); ?>">
                                <input type="hidden" name="id" value="<?php echo ($id); ?>">
                            </table>





                        <table class="table table-bordered table-striped dataTable">
                            <tfoot>

                            <tr align="center">
                                <td><input class="btn btn-default" type="reset" value="重置">&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="btn btn-info" type="button" onclick="Submit()" value="提交">
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div>
        </div></section>
</div>
<script>
    $("input[name='image']").change(function(e) {
        for (var i = 0; i < e.target.files.length; i++) {
            var file = e.target.files.item(i);
            var freader = new FileReader();
            freader.readAsDataURL(file);
            freader.onload = function(e) {
                var src = e.target.result;
                $("#show_image").attr("src",src);
            }
        }
    });
</script>

<script>
    function Submit() {

        if ($('#role_name').val() == '' ) {
            layer.msg('输入不能为空', {icon: 2, time: 1000});//alert('少年，密码不能为空！');
            return false;
        }

        $('form').submit();

    }
</script>
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