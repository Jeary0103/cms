<?php namespace Admin\Controller; 

use Admin\AuthController as Controller;
class TemplateController extends Controller{

	//构造函数
	public function __init()
	{
	}
	
    //动作
	public function index(){
		$data = Dir::tree('template');
		// p($data);
		$dirs=array();
		foreach($data as $d)
		{
			
			if(is_file($d['path'].'/config.php'))
			{
				$d['active'] = $d['filename']==C('web.style')?'class="active"':'';
				$d=array_merge($d,require $d['path'].'/config.php');
				$dirs[]=$d;
			}
		}
		
		View::with('dirs',$dirs)->make();
	}

	//选择模板
	public function selectTpl()
	{
		$tpl = Q('tpl');
		if(!is_dir('template/'.$tpl))
		{
			View::ajax(array('error'=>1,'message'=>'模板不存在'));
		}
		else
		{
			$config = new \Admin\Model\Config;
			$config->editOne('style',array('value'=>$tpl));
			View::ajax(array('errcode'=>0));
		}
	}
}
















