<?php
// 本类由系统自动生成，仅供测试用途
namespace Chat\Controller;
use Think\Controller;
class CategoryController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->category = D('category');
        $this->good=D('good');

//        session('openid','oAdCq01YzcVjLWljmeEBFcDEswEY');
//        order('starttime desc')
    }

    public function index(){
        $categoryid = I('get.id');
        $info = $this->category->getGoods($categoryid);
        $this->assign('data',$info);
        $this->display();
        $this->getCategory();
    }

    public function search(){
        if(I('post.')){
            $keywords=I('post.keywords');
            $data=$this->good->query("
                        SELECT*
             FROM  `good`  
            WHERE  `good_title`  like '%$keywords%'");
            if(!$data)
                $this->assign('data', 'none');
            else
                $this->assign('data', $data);

            $this->display();
            $this->getCategory();
        }
    }

    public function getCategory(){
        $arr1='[';
        foreach ($this->category->getFirst() as $key=>$vaule)
            $arr1.="'".$vaule."',";

        $arr1.=']';
        $arr2='[';
        foreach ($this->category->getSecond() as $key=>$vaule)
            $arr2.="'".$vaule."',";

        $arr2.=']';
        $arr3='[';

        foreach ($this->category->getThird() as $key=>$vaule)
            $arr3 .= "'" . $vaule . "',";
        $arr3.=']';

        echo "<script>
            $('#category').picker({
        title: '选择分类',
        cols: [
          {
              textAlign: 'center',
            values: $arr1
          },
          {
              textAlign: 'center',
            values: $arr2
          }
          ,
          {
              textAlign: 'center',
            values: $arr3
          }
        ],
        onClose: function(d){
            console.log(d.displayValue);
             $.ajax({
                type: 'post',
                url: '".SHOW_URL."index.php/Chat/index/sortCategory',
                data: {
                    category:d.displayValue
                },
                dataType: 'json',
                success: function (data) {
                    console.log(data.data);
                    $('.weui-panel__bd').html(data.data);
                }
            });
        }
      });</script>";
    }

    public function sortCategory(){
        $first_category=I('post.category')[0];
        $second_category=I('post.category')[1];
        $third_category=I('post.category')[2];

//        $four_category=I('post.four_category');
//        if($first_category)
//        $arr=array("first_category"=>$first_category);
//        if($second_category)
//        $arr['second_category']=$second_category;
//        if($third_category)
//            $arr['third_category']=$third_category;
//        if($four_category)
//            $arr['four_category']=$four_category;
        $third_category_id = $this->category->getThirdid($first_category,$second_category,$third_category);
        $data=$this->category->where(array('last_category_id'=>$third_category_id))
            ->order('createtime desc')->select();
//        $data=$first_category.$second_category.$third_category.$four_category;
        $str='';

        foreach ($data as $r){
            $r['category_stroage']=$this->category->getStroage($r['category_id']);
            $str.=sprintf("    <div  class=\"weui-media-box weui-media-box_appmsg\" >
                            <img    src=\"%s
                \">
                            <div class=\"weui-media-box__bd\">
                                <a  href='%s' class='course_title'>
                                    
                $r[category_title]</a>
                              
                                <p style='text-align: end'>
                                    <i class='weui-media-box__desc_time'> 库存 
                $r[category_stroage] </i>
                                </p>
                            </div>
                        </div>",SHOW_URL.$r['image'],SHOW_URL."index.php/Chat/category?id=".$r['category_id']);
        }
        //去掉价格排序
        $str.='<script>$(\'#price_sort\').remove();</script>';
       
        exit(json_encode(array('status'=>'finish','data'=>$str)));
    }
}
