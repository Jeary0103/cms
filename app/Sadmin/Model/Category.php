<?php namespace Sadmin\Model;

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
		['catname','required','栏目名称不能为空',3,3],
	);

	//自动完成
	protected $auto=array(
		//字段名: 表单字段名
		//处理方法: 函数或模型方法
		//方法类型: string(字符串 默认)  function(函数)  method(模型方法)
		//处理时间: 1 插入时  2更新时 3全部情况 (默认)
		// array('字段名','处理方法','方法类型',处理时间),
	);

	//时间操作
	protected $timestamps=false;

	//允许插入的字段
	protected $insertFields=array();

	//允许更新的字段
	protected $updateFields=array();

	public function getAll() {
		$data = $this->get();
		// p($data);exit;
		$data = Data::tree($data, 'catname', 'id');
		return $data;
	}

	public function store(){
		if($this->create()) {
			if($this->add())
			return true;
		} 
	}

	public function del($id) {
		if($this->where('pid',$id)->first()) {
			$this->error="必须先删除子元素";
			return false;
		} 
		if($this->delete($id)){
			return true;
		} else{
			$this->error = '删除栏目失败';
		}
	}

	public function update() {
		if($this->create()){
			if($this->save()){
				return true;
			}
			
		}
	}


	
	public function getEditData($id,$pid)
	{
		$data = $this->getAll();
		foreach($data as $k=>$d)
		{
			$data[$k]['_selected']=$data[$k]['_disabled']='';
			if($d['id']==$id)
			{
				$data[$k]['_disabled']=' disabled=""';
			}
			if(Data::isChild($data, $d['id'], $id, 'id'))
			{
				$data[$k]['_disabled']=' disabled=""';
			}
			if($pid== $d['id'])
			{
				$data[$k]['_selected']=" selected=''";
			}
		}
		return $data;
	}
	// 	public function getEditData($id,$pid)
	// {
	// 	$data = $this->getAll();
	// 	foreach($data as $k=>$d)
	// 	{
	// 		$data[$k]['_selected']=$data[$k]['_disabled']='';
	// 		if($d['id']==$id)
	// 		{
	// 			$data[$k]['_disabled']=' disabled=""';
	// 		}
	// 		if(Data::isChild($data, $d['id'], $id, 'id'))
	// 		{
	// 			$data[$k]['_disabled']=' disabled=""';
	// 		}
	// 		if($pid== $d['id'])
	// 		{
	// 			$data[$k]['_selected']=" selected=''";
	// 		}
	// 	}
	// 	return $data;
	// }

}