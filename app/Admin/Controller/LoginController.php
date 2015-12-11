<?php namespace Admin\Controller; 

use Hdphp\Controller\Controller;
use Admin\Model\User;
class LoginController extends Controller{
    public $db;
	//构造函数
	public function __init()
	{
        $this->db = new User;
	}
	
    //动作

    public function login(){
       View::make();
    }

    public function doLogin() {
        // p($_POST);exit;
        if($this->db->login()) {
            go('Index/index');
        } else{
            $this->error($this->db->getError());
        }
    }

    public function code() {
        Code::make();
    }

    public function out() {
        session_unset();
        session_destroy();
        go('Login/login');

    }
}
