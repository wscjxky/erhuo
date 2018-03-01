<?php
namespace Home\Controller;
use Think\Controller;
vendor('Wechat.wechat', '' ,'.php');

class IndexController extends Controller {
    public function index(){
        $weObj = new \Wechat();

        $this->display();
    }
}