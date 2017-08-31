<?php
namespace Api\Controller;
use Think\Controller;
class ApproveController extends PublicController {
	//***************************
    public function index(){
    	$approve = M('special_approval')->limit(1)->find();
        if($approve){
            $approve['photo_x'] = __DATAURL__.$approve['photo_x'];
            //图片轮播数组
            $approve['photo_string']=trim($approve['photo_string'],",");
            $img=explode(',',$approve['photo_string']);
            $b=array();
            if ($approve['photo_string']) {
                foreach ($img as $k => $v) {
                    $b[] = __DATAURL__.$v;
                }
            }else{
                $b[] = $approve['photo_x'];
            }
            $approve['img_arr']=$b;//图片轮播数组
        }
    	echo json_encode(array('approve'=>$approve));
    	exit();
    }
   
}
