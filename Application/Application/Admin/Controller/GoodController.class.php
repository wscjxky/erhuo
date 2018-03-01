<?php
/**
 * Created by PhpStorm.
 * User: hhh
 * Date: 2017/8/17
 * Time: 下午1:48
 */

namespace Admin\Controller;
use Think\Controller;

class GoodController extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->good=D('good');
    }


    public function index(){
        $data= $this->good->select();
        $this->assign('data',$data);
        $this->assign('count',count($data));
        $this->display();
    }

    public function goodinfo(){
        $goodid = I('get.id');
        $cate=D('category');
        
        $this->assign('first_category_list',$cate->getLevel(1));
        $this->assign('second_category_list',$cate->getLevel(2));
        $this->assign('third_category_list',$cate->getLevel(3));
        $this->assign('four_category_list',$cate->getLevel(4));


        if(!empty($goodid)){
            $info = $this->good->get($goodid);
            $this->assign('data',$info);
        }
        $act = empty($goodid) ? 'add' : 'update';
        $this->assign('act',$act);
        $this->assign('id',$goodid);
        var_dump($act);

        $this->display();
    }

    public function goodHandle(){
        $good_id = I('post.id/d');
        $act = I('post.act');
        if($act == 'update') {
            $this->uploadImg(400,400);
            $data=I('post.');
            unset($data['act']);
            unset($data['third_category']);
            unset($data['four_category']);
            $r =  $this->good->msave($good_id,$data);

        }
        else if($act == 'del'){
            $r=$this->good->delete($good_id);
            if($r){
                exit(json_encode(1));
            }else{
                exit(json_encode("删除失败"));
            }
        }
        else if($act == 'add'){
            $this->uploadImg(400,400);
            $_POST['category_id']=D('category')->getFourid(I('post.first_category'),I('post.second_category'),I('post.third_category'),I('post.four_category'));
            $data=I('post.');
            unset($data['good_id']);
            $r =  $this->good->add($data);
        }
        
        if($r){
            $this->success("操作成功",U('Admin/Good/index'));
        }else{
            exit("操作失败，请重试");
        }

    }

   
    

    public function category(){
        $model=D('category');
        $data= $model->select();
        $this->assign('data',$data);
        $this->assign('count',count($data));
        $this->display();
    }
    public function categoryinfo(){
        $model=D('category');
        $category_id = I('get.id');
        if(!empty($category_id)){
            $info = $model->where(array("category_id"=> $category_id))->find();
            $this->assign('data',$info);
        }
        $act = empty($category_id) ? 'add' : 'update';
        $this->assign('act',$act);
        $this->assign('id',$category_id);
        $this->display();
    }

    public function categoryHandle(){
        $model=D('category');
        $category_id = I('post.id/d');
        $act = I('post.act');
        if($act == 'update') {
            $this->uploadImg(400,400);

            $data=I('post.');
            unset($data['act']);
            $r = $model->msave($category_id,$data);
        }
        else if($act == 'del'){
            $r = $model->del($category_id);
            if($r){
                exit(json_encode(1));
            }else{
                exit(json_encode("删除失败"));
            }
        }
        else if($act == 'add'){
            $this->uploadImg(400,400);

            $data=I('post.');
            unset($data['category_id']);
            $r = $model->add($data);
        }
        if($r){
            $this->success("操作成功",U('Admin/Good/category'));
        }else{
            exit("操作失败，请重试");
        }

    }
}