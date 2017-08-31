<?php
namespace Api\Controller;
use Think\Controller;
class SubsidyController extends PublicController {
	//***************************
    public function index(){
    	$subsidy = M('subsidy')->limit(1)->find();
        if($subsidy){
            $subsidy['photo_x'] = __DATAURL__.$subsidy['photo_x'];
            $subsidy['process'] = __DATAURL__.$subsidy['process'];
            //图片轮播数组
            $subsidy['photo_string']=trim($subsidy['photo_string'],",");
            $img=explode(',',$subsidy['photo_string']);
            $b=array();
            if ($subsidy['photo_string']) {
                foreach ($img as $k => $v) {
                    $b[] = __DATAURL__.$v;
                }
            }else{
                $b[] = $subsidy['photo_x'];
            }
            $subsidy['img_arr']=$b;//图片轮播数组
        }
        $more = M('subsidy_more')->where('sub_id="'.intval($subsidy['id']).'"')->select();
    	echo json_encode(array('subsidy'=>$subsidy,'more'=>$more));
    	exit();
    }
   
}
