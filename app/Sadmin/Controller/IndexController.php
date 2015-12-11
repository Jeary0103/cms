<?php namespace Sadmin\Controller; 

use Hdphp\Controller\Controller;

//测试控制器
class IndexController extends Controller{

    //构造函数
    public function __init()
    {
    }
    
    //动作
    public function show(){
       View::make();
    }
    public function index(){
        View::make();
    }
}
