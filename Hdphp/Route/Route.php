<?php namespace Hdphp\Route;

use Closure;
use Hdphp\Route\Compile;

/**
 * 路由处理类
 */
class Route extends Compile
{
	//路由定义
	public $route=array();

	//匹配到路由
	protected $found=false;

	//匹配到的参数
	protected $args=array();

	//请求的URI
	protected $requestUri;
	
	//路由缓存
	protected $cache=array();
	
	//正则替换字符
	protected $patterns=array(
		':num'=>'[0-9]+',
		':all'=>'.*'
		);

	//构造函数
	public function __construct()
	{
		$this->requestUri = $this->getRequestUri();
	}

	/**
	 * 取得请求url
	 * @return [type] [description]
	 */
	public function url()
	{
		return __WEB__.'/'.$this->requestUri;
	}

	/**
	 * 请求地址
	 * @return [type] [description]
	 */
	protected function getRequestUri()
	{
		if(isset($_SERVER['PATH_INFO']))
		{
			$REQUEST_URI = $_SERVER['PATH_INFO'];
		}
		else
		{
			if(dirname($_SERVER['SCRIPT_NAME'])!=='/')
			{
				$REQUEST_URI = str_replace(dirname($_SERVER['SCRIPT_NAME']),'',$_SERVER['REQUEST_URI']);
			}
			else
			{
				$REQUEST_URI = $_SERVER['REQUEST_URI'];
			}
		}
		
		$REQUEST_URI =  trim(preg_replace('/\w+\.php/i', '', $REQUEST_URI),'/');

		return $REQUEST_URI?parse_url($REQUEST_URI,PHP_URL_PATH):'/';
	}

	/**
	 * 使用正则表达式限制参数
	 * @param  [array] $args [参数]
	 * @return [type]       [description]
	 */
	public function where($name,$regexp=null)
	{
		if(is_array($name))
		{
			foreach($name as $k=>$v)
			{
				$this->route[count($this->route)-1]['where'][$k]='#^'.$v.'$#';
			}
		}
		else
		{
			$this->route[count($this->route)-1]['where'][$name]='#^'.$regexp.'$#';
		}
		
	}

	/**
	 * 解析标签
	 * @return [type] [description]
	 */
	public function dispatch()
	{
		//设置路由缓存
		if(C('http.route_cache') && ($route= S('route'))){
			$this->route  = $route;
			return true;
		}


		$this->parseRoute();

		//匹配路由
		foreach($this->route as $key=>$route)
		{
			$method='_'.$route['method'];

			$this->$method($key);

			if($this->found)
			{
				return true;
			}
		}

		//普通GET模式
		$this->RunGetModel($this->requestUri);
	}

	/**
	 * 解析路由
	 * @param  [type] $key [description]
	 * @return [type]      [description]
	 */
	protected function parseRoute()
	{	
		/**
		 * 为每一条路由规则生成正则表达式缓存
		 * 同时解析路由中的{name}等变量
		 * @var [type]
		 */
		foreach($this->route as $key=>$value)
		{
			//原始路由数据
			$regexp = $value['route'];

			//将:all等符号替换为标签路由字符
			if(strpos($regexp,':')!==false)
			{
				//替换正则符号
				$regexp = str_replace(array_keys($this->patterns), 
					array_values($this->patterns),$route);
			}

			//将{name?}等替换为(.*?)形式
			preg_match_all('#\{(.*?)(\?)?\}#',$regexp,$args,PREG_SET_ORDER);
			
			foreach($args as $i=>$ato)
			{
				//存在$ato[2]表示存在{name?}中的问号，用来设置正则中的?
				$has = isset($ato[2])?$ato[2]:'';
				if($has)
				{	
					//有{.*?}问号，表示变量是可选的，前面加? 组合成/? 形式
					//要不没变量时会多一个/
					$regexp = str_replace($ato[0],'?([^/]+?)'.$has,$regexp);
				}
				else
				{
					$regexp = str_replace($ato[0],'([^/]+?)'.$has,$regexp);
				}
				
			}

			$this->route[$key]['regexp']='#^'.$regexp.'$#';
			$this->route[$key]['args']=$args;
		}
		// p($this->route);
		//缓存路由
		if(C('http.route_cache'))
		{
			S('route',$this->route);
		}
	}

	/**
	 * 获取路由参数
	 * @param  string $name 变量名
	 * @return mixed
	 */
	public function input($name)
	{
		return isset($this->args[$name])?$this->args[$name]:null;
	}
}