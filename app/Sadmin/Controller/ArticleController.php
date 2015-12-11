<?php namespace Sadmin\Controller; 

use Hdphp\Controller\Controller;
use Sadmin\Model\Article;
use Sadmin\Model\Category;


class ArticleController extends Controller{
	protected $db;
    protected $category;
	public function __init()
	{
		$this->db = new Article;
        $this->category = new Category;
	}

    public function index(){
       $data = $this->db->getAll();
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
    		$cat = $this->category->getAll();
    		View::with('cat',$cat)->make();
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

    public function del() {
        if($this->db->del(Q('id'))) {
            $this->success('删除成功',U('index'));
        } else{
            $this->error($this->db->getError());
        }
    }


    public function edit() {
        // p($_POST);
        if(IS_POST) {
            if($this->db->upd()) {
                $this->success('更新成功',U('index'));
            } else{
                $this->error($this->db->getError());
            }
        } else{
            $data = $this->db->find(Q('id'));
            // p($data);
// 正则表达式处理thumb的字段
// $data['thumb'] = preg_replace('@\/\/@', '/', $data['thumb']);
// $data['thumb'] = __ROOT__.'/'.$data['thumb'];
          
// 正则表达式处理content的字段
// $data['content'] = preg_replace('@(.*?)(<img src=")(.*?" alt="" />)(.*?)@im','\1\2'.__ROOT__.'\3\4', $data['content']);
            // p($data['content']);
           
            $pid = $data['cid'];
            $cat = $this->category->getAll();
            View::with('data',$data)->with('pid',$pid)->with('cat',$cat)->make();
        }
        
    }


























































}










