<?php
namespace Api\Controller;
use Think\Controller;
class PersonRegisterController extends PublicController {
	//***************************
    public function index(){
    	$person = M('person_register')->limit(1)->find();
        if($person){
            $person['photo_x'] = __DATAURL__.$person['photo_x'];
            //图片轮播数组
            $person['photo_string']=trim($person['photo_string'],",");
            $img=explode(',',$person['photo_string']);
            $b=array();
            if ($person['photo_string']) {
                foreach ($img as $k => $v) {
                    $b[] = __DATAURL__.$v;
                }
            }else{
                $b[] = $person['photo_x'];
            }
            $person['img_arr']=$b;//图片轮播数组
        }
    	echo json_encode(array('person'=>$person));
    	exit();
    }
   
}
