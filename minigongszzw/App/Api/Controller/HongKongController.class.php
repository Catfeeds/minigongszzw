<?php
namespace Api\Controller;
use Think\Controller;
class HongKongController extends PublicController {
	//***************************
    public function index(){
    	$hongkong = M('hongkong')->limit(1)->find();
        if($hongkong){
            $hongkong['photo_x'] = __DATAURL__.$hongkong['photo_x'];
            $hongkong['process'] = __DATAURL__.$hongkong['process'];
            $hongkong['data'] = __DATAURL__.$hongkong['data'];
            //图片轮播数组
            $hongkong['photo_string']=trim($hongkong['photo_string'],",");
            $img=explode(',',$hongkong['photo_string']);
            $b=array();
            if ($hongkong['photo_string']) {
                foreach ($img as $k => $v) {
                    $b[] = __DATAURL__.$v;
                }
            }else{
                $b[] = $hongkong['photo_x'];
            }
            $hongkong['img_arr']=$b;//图片轮播数组
        }
        $problem = M('hong_problem')->where('hong_id="'.intval($hongkong['id']).'"')->select();
    	echo json_encode(array('hongkong'=>$hongkong,'problem'=>$problem));
    	exit();
    }
   
}
