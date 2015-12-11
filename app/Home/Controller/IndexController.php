<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//测试控制器
class IndexController extends Controller{

	//模板目录
	protected $tpl;
	//构造函数
	public function __init()
	{
		//path
		$this->tpl = 'template/'.C('web.style');
        defined('__TEMPLATE__')||define('__TEMPLATE__',$this->tpl);
	}
	
    //网站首页
    public function index(){
       View::make($this->tpl.'/index.html');
    }

    //栏目列表页
    public function category()
    {
    	$id = Q('get.id',0,'intval');

        $article = Db::table('article')->where('cid',$id)->get();

        $page = Page::row(5)->make(count($article));
        $article = Db::table('article')->where('cid',$id)->limit(Page::limit())->get();
    	$field = Db::table('category')->where('id',$id)->first();
// p($field);exit;
    	View::with('page',$page)->with('cms',$field)->with('article',$article);
    	View::make($this->tpl.'/category.html');
    }

    public function article()
    {
        $id = Q('get.id',0,'intval');
        $article = Db::table('article a')->where('a.id','=',$id)->first();
        $category = Db::table('category')
        ->where('id','=',$article['cid'])
        ->first();
        $cms=$article;
        $cms['category']=$category;
        // p($cms);exit;
        View::with('cms',$cms)->make($this->tpl.'/article.html');
    }
}









