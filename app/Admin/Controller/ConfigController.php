<?php namespace Admin\Controller; 

use Admin\AuthController as Controller;
use Admin\Model\Config;
class ConfigController extends Controller{

	public $db;
	//构造函数
	public function __init()
	{
		$this->db = new Config;
	}
	
    //动作
    public function index(){
    	//获取所有配置项
      	$data = $this->db->getAll();
      	View::with('data',$data)->make();
    }
    //更新配置
    public function update()
    {
        // p($_POST);
    	// if($this->db->upd())
     //    {
     //        $this->ajax(array('code'=>0,'message'=>'修改成功'));
     //    }
     //    else
     //    {
     //        $this->ajax(array('code'=>1,'message'=>$this->db->getError()));
     //    }
        // p($this->db->upd());exit;
        if($this->db->upd())
    	{
    		$this->success('保存成功','index');
    	}
    	else
    	{
    		$this->error($this->db->getError(),'index',100);
    	}
    }
}










