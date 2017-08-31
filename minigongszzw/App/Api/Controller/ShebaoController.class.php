<?php
namespace Api\Controller;
use Think\Controller;
class ShebaoController extends PublicController {
	//***************************
    public function index(){
    	$shebao = M('shebao')->limit(1)->find();
        if($shebao){
            $shebao['photo_x'] = __DATAURL__.$shebao['photo_x'];
            //图片轮播数组
            $shebao['photo_string']=trim($shebao['photo_string'],",");
            $img=explode(',',$shebao['photo_string']);
            $b=array();
            if ($shebao['photo_string']) {
                foreach ($img as $k => $v) {
                    $b[] = __DATAURL__.$v;
                }
            }else{
                $b[] = $shebao['photo_x'];
            }
            $shebao['img_arr']=$b;//图片轮播数组
        }
    	echo json_encode(array('shebao'=>$shebao));
    	exit();
    }
   
}
