<?php
// 本类由系统自动生成，仅供测试用途
namespace Chat\Controller;
use Think\Controller;
class GoodController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->good = D('good');
        $this->category = D('category');

//        $this->user = D('user');
//        session('openid','oAdCq01YzcVjLWljmeEBFcDEswEY');
//        order('starttime desc')
    }

    public function index()
    {
        $goodid = I('get.id');
        $info = $this->good->get($goodid);
        $this->assign('data',$info);
        $this->display();
        echo "<script>
 function linkWechat(){
        $.alert(\"微信号：$info[seller_wechat]\");
    }
</script>";
        
    }










    public function trade()
    {
        $user = D('user');
        $course_id=I('get.course_id');
        session('course_id',$course_id);
        $weObj = new \Wechat();
        if ($_GET['code']) {
            $result = $weObj->getOauthAccessToken();
            $openId = $result['openid'];
            $access = $result['access_token'];
            if ($openId) {
                session('openid', $openId);
                session('access', $access);
            }
            //立用户信息
            if (!$user->getUser()) {
                $weObj = new \Wechat();
                $userInfo = $weObj->getOauthUserinfo(session('access'), session('openid'));
                if ($userInfo) {
                    $user->addUser($userInfo);
                }
            }
        }

        if(I('post.')){
            $trade=D('trade');
            $data=$trade->create();
            $data['openid']=session('openid');
            $data['cheap_price']=(int)I('post.total_price')-(int)I('post.final_price');
            $data['evidence']=$trade->getRandom(I('post.people_count/d'),session('course_id'));


            $course=D('course')->where(array('course_id'=>session('course_id')))->find();
            $course['people_current']+=$data['people_count'];
            D('course')->save($course);
            
            if(session('aid'))
                $data['agent_openid']=session('aid');

            if($data['course_price']=='0'){
                $data['trade_state']='已支付';
                D('user')->setAcitivity(1);
            }
            exit($trade->add($data));
        }

        $course=D('course');
        session('course_id',$course_id);
        $data=$course->where(array('course_id'=>$course_id))->find();
        $user_data=  $user->where(array('openid'=>session('openid')))->find();
        if($user_data)
            $data['bonus_current']=$user_data['bonus_current'];
        else
            $data['bonus_current']=0;

        $this->assign('data',$data);

        $this->assign('people_remain',$data['people_limit']-$data['people_current']);

        $this->display();
    }


    public function sortCategory(){
        $big_category=I('post.big_category');

        $category=I('post.category_name');
        if($category)
            $data =  D('course')->where(array("publish_state"=>1,"small_category"=>$category,'big_category'=>$big_category))->order('starttime desc')->select();
        else{
            $data =  D('course')->where(array("publish_state"=>1,'big_category'=>$big_category))->order('starttime desc')->select();

        }
        $str='';
        foreach ($data as $r){
            //
            $price=$r['price']==0?'免费报名':($r['price'].'元');
            if($big_category=='专题活动')//时间配置
                $r['starttime']=$this->time_zhuanti($r['starttime']);
            else{
                $r['starttime']=$this->time_day($r['starttime']);
            }
            $str .=sprintf("  <div  class=\"weui-media-box weui-media-box_appmsg\"style='padding: 5px'>
                                <img onclick=\"javascript:window . location . href = 'Chat/index/course?courseid=$r[course_id]'\" style='width: 90px;height: 62px;vertical-align: top;margin-bottom: 15px'  src=\"
                    %s\">
                            <div class=\"weui-media-box__bd\">
                                <a  href='Chat/index/course?courseid=$r[course_id]' class='course_title'>
                    $r[title]</a>
                                
                     <p class='weui-media-box__desc' >
                    $r[address]</p>
                    
                     <p class='weui-media-box__desc'  >
                    $r[starttime]</p>
                    
                                <p style='text-align: end'><i class='weui-media-box__desc_time'> $price </i> 
                  </p>

                               

                            </div>
                        </div>",SHOW_URL.$r['image']);
        }
        exit(json_encode(array('status'=>'finish','data'=>$str)));
    }
}
