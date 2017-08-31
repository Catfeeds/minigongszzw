<?php
namespace Api\Controller;
use Think\Controller;
class AffiliateController extends PublicController {
	//***************************
    public function index(){
    	$affiliate_small = M('affiliate')->where('type=1')->select();
        if($affiliate_small){
            foreach($affiliate_small as $k => $v){
                $affiliate_small[$k]['photo_x'] = __DATAURL__.$v['photo_x'];
                 //图片轮播数组
                $v['photo_string']=trim($v['photo_string'],",");
                $img=explode(',',$v['photo_string']);
                $b=array();
                if ($v['photo_string']) {
                    foreach ($img as $k2 => $v2) {
                        $b[] = __DATAURL__.$v2;
                    }
                }else{
                    $b[] = $v['photo_x'];
                }
                $affiliate_small[$k]['img_arr']=$b;//图片轮播数组
            } 
        }
        $affiliate = M('affiliate')->where('type=2')->select();
        if($affiliate){
            foreach($affiliate as $k => $v){
                $affiliate[$k]['photo_x'] = __DATAURL__.$v['photo_x'];
                //图片轮播数组
                $v['photo_string']=trim($v['photo_string'],",");
                $img=explode(',',$v['photo_string']);
                $b=array();
                if ($v['photo_string']) {
                    foreach ($img as $k2 => $v2) {
                        $b[] = __DATAURL__.$v2;
                    }
                }else{
                    $b[] = $v['photo_x'];
                }
                $affiliate[$k]['img_arr']=$b;//图片轮播数组
            }
            
        }
    	echo json_encode(array('affiliate_small'=>$affiliate_small,'affiliate'=>$affiliate));
    	exit();
    }

    public function detail(){
       $id = intval($_REQUEST['id']);
       $affiliate = M('affiliate')->where('id="'.$id.'"')->find();
        if($affiliate){
            
                $affiliate['photo_x'] = __DATAURL__.$affiliate['photo_x'];
                //图片轮播数组
                $affiliate['photo_string']=trim($affiliate['photo_string'],",");
                $img=explode(',',$affiliate['photo_string']);
                $b=array();
                if ($affiliate['photo_string']) {
                    foreach ($img as $k2 => $v2) {
                        $b[] = __DATAURL__.$v2;
                    }
                }else{
                    $b[] = $affiliate['photo_x'];
                }
                $affiliate['img_arr']=$b;//图片轮播数组
            
            
        }
        echo json_encode(array('affiliate'=>$affiliate));
        exit();
    }
   
}
