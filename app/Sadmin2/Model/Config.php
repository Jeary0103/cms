<?php namespace Sadmin2\Model;

use Hdphp\Model\Model;

class Config extends Model{

	//数据表
	protected $table = "config";
	protected $nichtSehn = ['style'];
	//自动验证
	protected $validate=array(
		//字段名: 表单字段名
		//验证方法: 函数或模型方法
		//验证条件: 1有字段时验证(默认)	2值不为空时验证  	3必须验证 
		//验证时间: 1 插入时验证		2更新时空时验证 	3全部情况验证 (默认)
		// array('字段名','验证方法','提示信息',验证条件,验证时间),
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

	//前置方法 比如: _before_add 为添加前执行的方法
	protected function _before_add(){}
	protected function _before_delete(){}

	protected function _after_add(){}
	protected function _after_delete(){}
	protected function _after_save(){}


	public function getAll() {
		$data = $this->get();
		$config = [];
		foreach ($data as $k => $v) {
			if(in_array($v['name'],$this->nichtSehn)) {
				continue;
			}
			$html = '';
			switch ($v['fieldtype']) {
				case 'input':
					$html = "<input type='text' name='{$v['value']}' value='{$v['value']}'/>";
					break;
				case 'textarea':
					$html = "<textarea name='{$v['value']}'>{$v['value']}</textarea>";
					break;
				case 'radio':
					$info = explode(',',$v['fieldvalue']);
					foreach ($info as $key => $value) {
						$mm = explode('|',$value);
						$check = $v['value']==$mm[0]?'checked':'';
						$html .= "{$mm[1]}:<input type='radio' name='{$v['name']}' value='{$mm[0]}' {$check}/>";
					}
					break;
			}
			$config[$k] = $v;
			$config[$k]['html'] = $html;
		}

		return $config;
	}

	public function update() {
		foreach ($_POST as $k => $v) {
			$array['value'] = $v;
			if(!$this->where('name',$k)->save($array)) {
				$this->error = '更新失败';
				return false;
			}
		}

		$this->createConfigFile();
		return true;
	}
	public function editOne($name,$data)
	{
		if(Db::table("config")->where('name',$name)->update($data))
		{
			$this->createConfigFile();
			return true;
		}
		else
		{
			$this->error = '更新失败';
			return false;
		}
	}	
	// public function editOne($name,$data)
	// {
	// 	if($this->where('name',$name)->update($data))
	// 	{
	// 		p(Db::getQueryLog());
	// 		$this->createConfigFile();
	// 		return true;
	// 	}
	// 	else
	// 	{
	// 		$this->error = '更新失败';
	// 		return false;
	// 	}
	// }

	// public function editOne($style,$data) {
	//     if($this->where('name',$style)->update($data)) {
	//         $this->createConfigFile();
	//         return true;
	//     } else{
	//     	$this->error = '更新失败';
	//     	return false;
	//     }
	// }


	public function createConfigFile() {
		$data = $this->get();
		$array = [];
		foreach ($data as $key => $value) {
			$array[$value['name']] = $value['value'];
		}

		file_put_contents('config/web2.php',"<?php \n return ".var_export($array,true)."\n; ?>");
	}



	














}