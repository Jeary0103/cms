<?php namespace Admin\Model;

use Hdphp\Model\Model;

class Article extends Model{

	//数据表
	public $table = "article";

	//自动验证
	protected $validate=array(
		//字段名: 表单字段名
		//验证方法: 函数或模型方法
		//验证条件: 1有字段时验证(默认)	2值不为空时验证  	3必须验证 
		//验证时间: 1 插入时验证		2更新时空时验证 	3全部情况验证 (默认)
		// array('字段名','验证方法','提示信息',验证条件,验证时间),
		array('title','required','标题不能为空',3,3),
		array('click','required','点击数不能为空',3,3),
		array('content','required','内容不能为空',3,3),
		);

	//自动完成
	protected $auto=array(
		//字段名: 表单字段名
		//处理方法: 函数或模型方法
		//方法类型: string(字符串 默认)  function(函数)  method(模型方法)
		//处理时间: 1 插入时  2更新时 3全部情况 (默认)
		// array('字段名','处理方法','方法类型',处理时间),
		array('addtime','strtotime','function',3,3)
		);

	//时间操作
	protected $timestamps=false;

	//允许插入的字段
	protected $insertFields=array();

	//允许更新的字段
	protected $updateFields=array();

	//获取列表页文章
	public function getAll(){
		$count = $this->join('category c','article.cid','=','c.id')->count('article.id');
		$page = Page::row(5)->pageNum(5)->make($count);
		
		$data= $this->table('article a')
		->field('a.title,a.id,c.catname,a.addtime')
		->join('category c','a.cid','=','c.id')
		->limit(Page::limit())
		->get();
		// $data[] = $this->where('notice',1)->get();
		return array('page'=>$page,'data'=>$data);
	}
	//保存
	public function store()
	{
		if($this->create())
		{
			if($this->add())
			{
				return true;
			}
		}
	}

	//更新
	public function update()
	{
		if($this->create())
		{
			if($this->save())
			{
				return true;
			}
		}
	}

	//前置方法 比如: _before_add 为添加前执行的方法
	protected function _before_add(){}
	protected function _before_delete(){}
	protected function _before_save(&$data){}

	protected function _after_add(){}
	protected function _after_delete(){}
	protected function _after_save(){}

}