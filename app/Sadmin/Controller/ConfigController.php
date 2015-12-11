<?php namespace Sadmin\Controller; 

use Hdphp\Controller\Controller;
use Sadmin\Model\Config;


class ConfigController extends Controller{
    protected $db;
	//构造函数
	public function __init()
	{ 
        $this->db = new Config;
	}
	
    //动作
    // public function index(){
    //     $data = $this->db->getAll();
    //     View::with('data',$data)->make();
    // }


    // public function update() {
    //     if($this->db->update($_POST)) {
    //         $json = ['message'=>'更新成功'];
    //     } else{
    //         $json = ['message'=>$this->db->getError()];
    //     }
    //     View::ajax($json);
    // }

    public function index() {
        $data = $this->db->getAll();
        // p($data);
        View::with('data',$data)->make();
    }


    public function post() {
        if($this->db->store()) {
            $json = ['message'=>'success'];
        } else{
            $json = ['message'=>$this->db->getError()];
        }
        
        View::ajax($json);
    }

}
