<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/29
 * Time: 19:42
 */
namespace Admin\Model;

use Think\Model;

class GoodModel extends Model {
    public function __construct() {
        parent::__construct();
    }
    public function get($good_id){
        return  $this->where(array("good_id"=> $good_id))->find();
    }
    public function del($good_id){
        return $this->good->where(array('good_id'=>$good_id))->delete();

    }
    public function msave($good_id,$data){
        return $this->where(array('good_id'=>$good_id))->save($data);
    }
}