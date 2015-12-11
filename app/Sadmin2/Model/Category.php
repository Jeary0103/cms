<?php namespace Sadmin2\Model;

use Hdphp\Model\Model;

class Category extends Model{

	//数据表
	protected $table = "category";

	//自动验证
	protected $validate=array(
		//字段名: 表单字段名
		//验证方法: 函数或模型方法
		//验证条件: 1有字段时验证(默认)	2值不为空时验证  	3必须验证 
		//验证时间: 1 插入时验证		2更新时空时验证 	3全部情况验证 (默认)
		// array('字段名','验证方法','提示信息',验证条件,验证时间),
		['catname','required','栏目名称不能为空',3,3]
	);

	public function getAll() {
		$data = $this->get();
		$data = Data::tree($data,'catname','id');
		return $data;
	}


	public function store() {
		if($this->create()) {
			if($this->add()) {
				return true;
			}
		}
	}


	public function del($id){
		if($this->where('pid',$id)->first()) {
			$this->error = '先删除子元素才能删除父级菜单';
			return false;
		} else{
			if($this->delete($id)) {
				return true;
			} else{
				$this->error = '删除失败';
				return false;
			}
		}
	}

	public function getEdit($id,$pid) {
		$data = $this->getAll();

		foreach($data as $key => $value) {
			$data[$key]["_disabled"] = $data[$key]['_selected'] = '';
			if($id==$value['id']) {

				$data[$key]['_disabled'] = 'disabled=""';
			} 
			if(Data::isChild($data, $value['id'], $id, 'id')) {
				$data[$key]['_disabled'] = 'disabled=""';
			}
			if($value['id']==$pid) {
				$data[$key]['_selected'] = "selected=''";
			}
		}
		return $data;
	}
























































	
}