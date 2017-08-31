<?php
namespace Api\Controller;
use Think\Controller;
class ChangeController extends PublicController {
	//***************************
    public function index(){
    	$change = M('gongsi_change')->limit(1)->find();
        if($change){
            $change['photo_x'] = __DATAURL__.$change['photo_x'];
            //图片轮播数组
            $change['photo_string']=trim($change['photo_string'],",");
            $img=explode(',',$change['photo_string']);
            $b=array();
            if ($change['photo_string']) {
                foreach ($img as $k => $v) {
                    $b[] = __DATAURL__.$v;
                }
            }else{
                $b[] = $change['photo_x'];
            }
            $change['img_arr']=$b;//图片轮播数组
        }
    	echo json_encode(array('change'=>$change));
    	exit();
    }
   
}
