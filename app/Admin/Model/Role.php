<?php namespace Admin\Model;

use Hdphp\Model\Model;

class Role extends Model{

	//数据表
	public $table = "role";

	//自动验证
	protected $validate=array(
		//字段名: 表单字段名
		//验证方法: 函数或模型方法
		//验证条件: 1有字段时验证(默认)	2值不为空时验证  	3必须验证 
		//验证时间: 1 插入时验证		2更新时空时验证 	3全部情况验证 (默认)
		//array('字段名','验证方法','提示信息',验证条件,验证时间),
		array('name','require','角色名称不能为空',3,3),
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

	//时间操作
	protected $timestamps=false;

	//允许插入的字段
	protected $insertFields=array();
	public function store() {
		if($this->create()) {
			$this->add();
			return true;
		}
	}

	public function getAll($id='') {
		if(empty($id)) {
			return $this->get();
		}
		if($id==1) {
			return $this->where('type',1)->get();
		}
		if($id==2) {
			return $this->where('type',2)->get();
		}

	}
	public function del($id) {
		if(Db::table('user_role')->where('role_id',$id)->delete()) {
			if(Db::table('role')->where('id',$id)->delete()) {
				if(Db::table('access')->where('role_id',$id)->delete()) {
					return true;
				}
			}
		}

		$this->error = '删除失败';
		return false;

	}

	public function upd() {
		
		if($this->create()) {
			return $this->save();
		}
	}


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