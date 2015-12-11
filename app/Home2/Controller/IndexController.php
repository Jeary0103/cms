<?php namespace Home2\Controller; 

use Hdphp\Controller\Controller;

//测试控制器
class IndexController extends Controller{

	//模板目录
	protected $tpl;
	//构造函数
	public function __init()
	{
		//path
		$this->tpl = 'template/'.C('web2.style');
	}
	
    //网站首页
    public function index(){
       View::make($this->tpl.'/index.html');
    }

    //栏目列表页
    public function category()
    {
    	$id = Q('get.id',0,'intval');
    	$field = Db::table('category')->where('id',$id)->first();
    	View::with('cms',$field);
    	View::make($this->tpl.'/category.html');
    }

    public function article()
    {
        $id = Q('id',0,'intval');
        $article = Db::table('article a')->where('a.id','=',$id)->first();
        $category = Db::table('category')
        ->where('id','=',$article['cid'])
        ->first();
        $cms=$article;
        $cms['category']=$category;
        View::with('cms',$cms)->make($this->tpl.'/article.html');
    }
}









