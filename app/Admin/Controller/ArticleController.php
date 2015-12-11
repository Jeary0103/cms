<?php namespace Admin\Controller; 

use Admin\Model\Article;
use Admin\AuthController as Controller;

class ArticleController extends Controller{
	public $db;
	public function __construct()
    {
        parent::__construct();
        $this->db = new Article;
    }
 //    public function __init()
	// {
 //        // parent::__construct();
	// 	$this->db = new Article;
	// }

    public function index(){
        // p($this->db);exit;
        $data = $this->db->getAll();
        // $data = Db::table('article')->get();
        // p($data);exit;
        View::with('data',$data)->make();
    }

    //发表文章
    public function add()
    {
    	if(IS_POST)
    	{
            // p($_POST);exit;
    		if($this->db->store())
    		{
    			View::success('发表成功','index');
    		}
    		else
    		{
    			View::error($this->db->getError());
    		}
    	}
    	else
    	{
    		$category = new \Admin\Model\Category;
    		$cat = $category->getAll();
    		View::with('cat',$cat);
    		View::make();
    	}
    }

    //发表文章
    public function edit()
    {
        if(IS_POST)
        {
            if($this->db->update())
            {
                View::success('修改成功','index');
            }
            else
            {
                View::error($this->db->getError());
            }
        }
        else
        {
            //读取栏目数据
            $category = new \Admin\Model\Category;
            $cat = $category->getAll();

            //原文章的数据
            $field = Db::table('article')->where('id',$_GET['id'])->first();
            View::with('cat',$cat)->with('field',$field);
            View::make();
        }
    }


    //上传缩略图
    public function uploadThumb()
    {
    	$file = Upload::make();
    	$data['path']=$file[0]['path'];
    	$data['url']=__ROOT__.'/'.$file[0]['path'];
    	$this->ajax($data);
    }
    //正文图片上传
    public function contentImageUpload()
    {
    	$file = Upload::make();
    	$data['error']=0;
    	$data['url']=__ROOT__.'/'.$file[0]['path'];
    	$this->ajax($data);
    }
}










