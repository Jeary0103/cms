<?php namespace Admin\Model;

use Hdphp\Model\Model;

class Node extends Model{

	//数据表
	public $table = "node";

	//自动验证
	protected $validate=array(
		//字段名: 表单字段名
		//验证方法: 函数或模型方法
		//验证条件: 1有字段时验证(默认)	2值不为空时验证  	3必须验证 
		//验证时间: 1 插入时验证		2更新时空时验证 	3全部情况验证 (默认)
		//array('字段名','验证方法','提示信息',验证条件,验证时间),
		array('name','required','中文标题不能为空',3,3),
		array('title','required','节点动作不能为空',3,3),
	);

	//自动完成
	protected $auto=array(
		//字段名: 表单字段名
		//处理方法: 函数或模型方法
		//方法类型: string(字符串 默认)  function(函数)  method(模型方法)
		//验证条件: 1有字段时处理(默认)	2值不为空时 3必须处理
		//处理时间: 1 插入时  2更新时 3全部情况 (默认)
		//array('字段名','处理方法','方法类型',验证条件,验证时间),
	);
	public function getAll($id='') {
		if(empty($id)) {
			$data = $this->get();
			return Data::tree($data, 'title', 'id');
		} else{
			return $this->where('id',$id)->first();
		}
		
	}


	public function getchannletree(){
		$data = $this->get();
		// return Data::channelList($data, 0, $html = "&nbsp;", 'id');
		return Data::channelLevel($data,0, $html = "&nbsp;", 'id');
		
	}
	public function del($id){
		if($this->where('id',$id)->delete()) {
			return Db::table('access')->where('node_id',$id)->delete();
		}
	}

	public function store(){
		if($this->create()) {
			return $this->add();
		}
	}

	public function upd(){
		if($this->create()) {
			return $this->save();
		}
	}
	//时间操作
	protected $timestamps=false;

	//允许插入的字段
	protected $insertFields=array();

	//允许更新的字段
	protected $updateFields=array();

	//前置方法 比如: _before_add 为添加前执行的方法
	protected function _before_add(){}
	protected function _before_delete(){}
	protected function _before_save(&$data){}

	protected function _after_add(){}
	protected function _after_delete(){}
	protected function _after_save(){}

}