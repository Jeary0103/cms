<?php namespace Sadmin2\Controller; 

use Hdphp\Controller\Controller;

class TemplateController extends Controller{

    protected $tmp;
	//构造函数
	public function __init()
	{
        $this->tmp = 'template/'.C('web.style');
	}
	
    //动作
        
    public function index(){
        $data = Dir::tree('template');
        // p($data);
        $array = [];
        foreach ($data as $k=> $v) {
            if($v['filename']==C('web2.style')) {
                $v['class'] = "class='active'";
            } else {
                $v['class'] = "";
            }

            // $array[] = $v;
            if(is_file($v['path'].'/config.php')) {
                $array[] = array_merge($v,require $v['path'].'/config.php');
            }
        }
        // p($array);
        View::with('data',$array)->make();
    }

    public function selectTmp() {
        $tmp = Q('tmp');
        if(!is_dir('template/'.$tmp)) {
            View::ajax(['errcode'=>0,'message'=>'模板不存在']);
        } else{
            $config = new \Sadmin2\Model\Config;
            if($config->editOne('style',array('value'=>$tmp))) {
                View::ajax(['errcode'=>1]);
            } else{
                View::ajax(['errcode'=>0,'message'=>$this->getError()]);
            }
        }
        
            // $config = new \Sadmin2\Model\Config;
            // $config->editOne('style',array('value'=>$tmp));
    }
}
