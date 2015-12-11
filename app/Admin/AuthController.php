<?php namespace Admin;
use Hdphp\Controller\Controller;
use Admin\Controller\LoginController;
class AuthController extends Controller{
    public $auto;
    public function __construct(){
        
 parent::__construct();
        $this->auto = new LoginController;
        if(!Rbac::isLogin()) {
            go("Login/login");
        } 

        if(!Rbac::verify()) {
            if(__HISTORY__) {
                $this->error('没有操作权限');
            } else{
                go('Login/login');
            }
        }
       
    }
}

 ?>