<?php
namespace Api\Controller;
use Think\Controller;
class CompanyController extends PublicController {
	//***************************
    public function index(){
    	$company = M('company_register')->limit(1)->find();
        if($company){
            $company['photo_x'] = __DATAURL__.$company['photo_x'];
            $company['process'] = __DATAURL__.$company['process'];
            //图片轮播数组
            $company['photo_string']=trim($company['photo_string'],",");
            $img=explode(',',$company['photo_string']);
            $b=array();
            if ($company['photo_string']) {
                foreach ($img as $k => $v) {
                    $b[] = __DATAURL__.$v;
                }
            }else{
                $b[] = $company['photo_x'];
            }
            $company['img_arr']=$b;//图片轮播数组
        }
        $adv = M('company_adv')->where('comp_id="'.intval($company['id']).'"')->select();
    	echo json_encode(array('company'=>$company,'adv'=>$adv));
    	exit();
    }
   
}
