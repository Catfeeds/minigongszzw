<?php
namespace Api\Controller;
use Think\Controller;
class AgencyController extends PublicController {
	//***************************
    public function index(){
    	$agency = M('agency')->limit(1)->find();
        if($agency){
            $agency['photo_x'] = __DATAURL__.$agency['photo_x'];
            $agency['process'] = __DATAURL__.$agency['process'];
            $agency['server_process'] = __DATAURL__.$agency['server_process'];
            $agency['get_server'] = __DATAURL__.$agency['get_server'];
        }
        $data = explode('。',$agency['data']);
    	echo json_encode(array('agency'=>$agency,'data'=>$data));
    	exit();
    }
   
}
