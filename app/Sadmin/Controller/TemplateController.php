<?php namespace Sadmin\Controller; 

use Hdphp\Controller\Controller;

class TemplateController extends Controller{

	//构造函数
	public function __init()
	{
	}
	
    //动作
    public function index(){
       View::make();
    }
}
