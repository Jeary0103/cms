<?php namespace Sadmin\Model;

use Hdphp\Model\Model;

class Config extends Model{

	//数据表
	protected $table = "config";


	protected $KeinSehn = ['style'];
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


	// public function getALl()
	// {
	// 	$config = $this->get();
	// 	$data= array();
	// 	foreach($config as $k=>$d)
	// 	{
	// 		if(in_array($d['name'],$this->KeinSehn))
	// 		{
	// 			continue;
	// 		}

	// 		$html='';
	// 		switch($d['fieldtype'])
	// 		{
	// 			case 'input':
	// 			$html ="<input type='text'
	// 			name='{$d['name']}' value='{$d['value']}'>";
	// 			break;
	// 			case 'textarea':
	// 			$html="<textarea name='{$d['name']}' class='hd-w300 hd-h100'>{$d['value']}</textarea>";
	// 			break;
	// 			case 'radio':
	// 			$info = explode(',',$d['fieldvalue']);
	// 			foreach($info as $r)
	// 			{
	// 				$radio = explode('|', $r);
	// 				$checked=$radio[0]==$d['value']?'checked':'';
	// 				$html.="<input type='radio' name='{$d['name']}' value='{$radio[0]}' $checked/> {$radio[1]}";
	// 			}
	// 			break;
	// 		}
	// 		$data[$k]=$d;
	// 		$data[$k]['html']=$html;
	// 	}

	// 	return $data;
	// }


public function getAll() {
	$data = $this->get();
	$config = array();
	foreach($data as $k => $v) {
		if(in_array($v['name'],$this->KeinSehn)) {
			continue;
		}
		$html = '';
		switch ($v['fieldtype']) {
			case 'input':
				$html = "<input type='text' name='{$v['name']}' class='hd-w300' value='{$v['value']}'/>";
				break;
			case 'textarea':
				$html = "<textarea name='{$v['name']}' style='width:800px;height:400px;'>{$v['value']}</textarea>";
				break;
			case 'radio':
				$info = explode(',',$v['fieldvalue']);
				foreach($info as $key => $value) {
					$mm = explode('|',$value);
					$check = $v['value']==$mm[0]?'checked':'';

					$html .= "$mm[1]: <input type='radio' name='{$v['name']}' value='{$mm[0]}' {$check}/>";
				}
				break;
			
		}
		$config[$k]=$v;
		$config[$k]['html'] = $html;
	}
	return $config;
}


public function store() {
	foreach ($_POST as $name => $value) {
		$data['value'] = $value;
		if(!$this->where('name',$name)->save($data)) {
			return false;
		}
	}
	$this->createConfigFile();
	return true;
}


public function createConfigFile() {
	$data = $this->get();
	$array = [];
	foreach ($data as $key => $value) {
		$array[$value['name']] = $value['value'];
	}

	file_put_contents('config/web3.php',"<?php \n return ".var_export($array,true)." \n ; ?>");
}



























}