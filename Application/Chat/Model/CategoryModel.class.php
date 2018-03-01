<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/29
 * Time: 19:42
 */
namespace Chat\Model;

use Think\Model;

class CategoryModel extends Model {
    public function __construct() {
        parent::__construct();
    }
    public function get($category_id){
        return  $this->where(array("category_id"=> $category_id))->find();
    }
    public function getThirdid($first_category_title,$sec_category_title,$third_category_title){
        //书
        $re = $this->where(array("category_title"=> $first_category_title))->find();
        //大一
        $sec=$this->where(array("last_category_id"=> $re['category_id'],"category_title"=> $sec_category_title))->find();
        //计算机
        $third=$this->where(array("last_category_id"=> $sec['category_id'],"category_title"=> $third_category_title))->find();
        //书目的id
        return $third['category_id'];
    }
    public function getGoods($category_id){
        return  D('good')->where(array("category_id"=> $category_id))->select();
    }
    public function getStroage($category_id){
        return  count(D('good')->where(array("category_id"=> $category_id))->select());
    }

    public function getFirst(){
        $re=$this->where(array("level"=> 1))->select();
        $arr=array();
        foreach ($re as $row){
            if(!in_array($row['category_title'],$arr)) {
                array_push($arr, $row['category_title']);
            }
        }
        return  $arr;
    }
    public function getSecond(){
        $re=$this->where(array("level"=> 2))->select();
        $arr=array();
        foreach ($re as $row){
            if(!in_array($row['category_title'],$arr)) {
                array_push($arr, $row['category_title']);
            }
        }
        return  $arr;    }
    public function getThird(){
        $re=$this->where(array("level"=> 3))->select();
        $arr=array();
        foreach ($re as $row){
            if(!in_array($row['category_title'],$arr)) {
                array_push($arr, $row['category_title']);
            }
        }
        return  $arr;
    }
    public function getFour(){
        return  $this->where(array("level"=> 4))->select();
    }
    public function del($category_id){
        return $this->where(array('category_id'=>$category_id))->delete();

    }
    public function msave($category_id,$data){
        return $this->where(array('category_id'=>$category_id))->save($data);
    }
}