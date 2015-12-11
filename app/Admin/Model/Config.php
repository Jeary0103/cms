<?php namespace Admin\Model;

use Hdphp\Model\Model;

class Config extends Model{

	//数据表
	public $table = "config";

	public $denyEdit=array('style');
	//自动验证
	protected $validate=array(
		//字段名: 表单字段名
		//验证方法: 函数或模型方法
		//验证条件: 1有字段时验证(默认)	2值不为空时验证  	3必须验证 
		//验证时间: 1 插入时验证		2更新时空时验证 	3全部情况验证 (默认)
		// array('字段名','验证方法','提示信息',验证条件,验证时间),
		array('name','required','变量名不能为空',3,3),
		array('value','required','变量值不能为空',3,3),
		);

	//自动完成
	protected $auto=array(
		//字段名: 表单字段名
		//处理方法: 函数或模型方法
		//方法类型: string(字符串 默认)  function(函数)  method(模型方法)
		//处理时间: 1 插入时  2更新时 3全部情况 (默认)
		// array('字段名','处理方法','方法类型',处理时间),
		);	

	//获取所有配置项
	public function getALl()
	{
		$config = $this->get();
		$data= array();
		foreach($config as $k=>$d)
		{
			if(in_array($d['name'],$this->denyEdit))
			{
				continue;
			}

			$html='';
			switch($d['fieldtype'])
			{
				case 'input':
				$html ="<input type='text'
				name='{$d['name']}' value='{$d['value']}'>";
				break;
				case 'textarea':
				$html="<textarea name='{$d['name']}' class='hd-w300 hd-h100'>{$d['value']}</textarea>";
				break;
				case 'radio':
				$info = explode(',',$d['fieldvalue']);
				foreach($info as $r)
				{
					$radio = explode('|', $r);
					$checked=$radio[0]==$d['value']?'checked':'';
					$html.="<input type='radio' name='{$d['name']}' value='{$radio[0]}' $checked/> {$radio[1]}";
				}
				break;
			}
			$data[$k]=$d;
			$data[$k]['html']=$html;
		}

		return $data;
	}

	public function upd()
	{	
		foreach($_POST as $name=>$value)
		{
			$data['value']=$value;
			if($this->where('name',$name)->save($data)===false)
			{
				return false;
			}
		} 
			//创建配置文件
		$this->createConfigFile();
		return true;
	}

	/**
	 * 更新一个配置项
	 * @param  [type] $name 配置名称
	 * @param  [type] $data 更新数据
	 * @return [type]        [description]
	 */
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
		}
	}


	private function createConfigFile()
	{
		$config = $this->get();
		// p($config);exit;
		$data = array();

		foreach($config as $v)
		{
			$data[$v['name']]=$v['value'];
		}

		file_put_contents('config/web.php', "<?php \nreturn ".var_export($data,true)."\n;?>");
	}
}












