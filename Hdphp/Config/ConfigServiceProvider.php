<?php namespace Hdphp\Config;

use Hdphp\Kernel\ServiceProvider;
use DirectoryIterator;
class ConfigServiceProvider extends ServiceProvider{
	
	//延迟加载
	public $defer=false;

	public function boot()
	{
		/**
		* 通过C('view') 有没有runtime编译文件
		* 没有时全部加载配置文件
		*/
		if(DEBUG===false && is_file('storage/config.php'))
		{
			\Config::setItems(require 'storage/config.php');
		}
		else
		{
			foreach(new DirectoryIterator('config') as $file)
			{
				if(!$file->isDot() && $file->getExtension()=='php')
				{
					\Config::set($file->getBasename('.php'),
						require $file->getPathname());
				}
			}

			//加载.env配置
			if(is_file('.env'))
			{
				$config = array();
				foreach(file('.env') as $file)
				{
					$data = explode('=',$file);
					$config[trim($data[0])]=trim($data[1]);
				}
				
				\Config::set('database.read.host',$config['DB_HOST']);
				\Config::set('database.read.user',$config['DB_USERNAME']);
				\Config::set('database.read.password',$config['DB_PASSWORD']);
				\Config::set('database.read.database',$config['DB_DATABASE']);
				\Config::set('database.read.prefix',$config['DB_PREFIX']);
				\Config::set('database.write.host',$config['DB_HOST']);
				\Config::set('database.write.user',$config['DB_USERNAME']);
				\Config::set('database.write.password',$config['DB_PASSWORD']);
				\Config::set('database.write.database',$config['DB_DATABASE']);
				\Config::set('database.write.prefix',$config['DB_PREFIX']);
			}

			if(DEBUG===false)
			{
				//缓存配置项
				$compile = "<?php \n return ".var_export(\Config::getAll(),true).";";

				//创建配置缓存
				file_put_contents('storage/config.php', $compile);
			}
		}
	}

	public function register()
	{
		$this->app->single('Config',function($app)
		{
			return new \Hdphp\Config\Config($app);
		},true);
	}
}