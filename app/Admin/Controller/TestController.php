<?php namespace Admin\Controller; 

use Hdphp\Controller\Controller;

class TestController extends Controller{

	//构造函数
	public function __init()
	{
	}
	
    //动作
    public function index(){
        // $data = Db::table('article')->get();
        // $count = count($data);
        // // p($_SERVER);exit;
        // // // p($count);exit;
        // // // p(Page::getTotalPage($data));exit;
        // $page = Page::row(10)->pageNum(3)->make($count);
        // $data = Db::table('article')->
        // limit(Page::limit())->get();
        // $num = Page::getTotalPage($page);
        // // p($num);exit;
        // View::with('page',$page)->with('data',$data)->make();

        $data = Db::table('article')->get();
        // p($data);
        
        $page = Page::row(10)->pageNum(4)->make(count($data));
        $data = Db::table('article')->limit(Page::limit())->get();
        p(Page::limit());
        $num = Page::getTotalPage();
        p($num);
        View::with('page',$page)->with('data',$data)->make();
    }
}
