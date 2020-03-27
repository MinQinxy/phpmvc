<?php

use Vender\Core\RouteLoader;
use Vender\Facade\Request;
use Vender\Helpers\Env;
use Vender\Helpers\Config;

class Application{
	public static function run(){
		//for test
		//echo "FRAMEWORK_START"."<br/>";
		
		/*
			1、执行具体代码前：加载配置，定义常量
		 */

		self::init();

		/*
			2、文件按需加载：注册自动加载函数
		 */

		self::registerAutoload();

		/*
			3、loadEnv,loadConfig
		 */

		self::load();

		/*
			4、完成路由解析，调用业务逻辑，获得结果，完成输出。
		 */
		self::route();
	}

	public static function init(){
		

		
		define("BASE_PATH",dirname(getcwd()));
		

		define("ENV_PATH",BASE_PATH.".env");
		define("ENV_PREFIX","");
		//application business defination 
		define("CONFIG_PATH",BASE_PATH."/config");


		//project path defination
		define("ROUTES_PATH",BASE_PATH."/routes");
		define("APP_PATH",BASE_PATH."/app");
			
		define("MODELS_PATH",APP_PATH."/models");
		define("VIEWS_PATH",APP_PATH."/views");
		define("CONTROLLERS_PATH",APP_PATH."/controllers");
		
		//framework defination
		define("FRAMEWORK_PATH",BASE_PATH."/framework");
		define("CORE_PATH",FRAMEWORK_PATH."/core");
		define("DB_PATH",FRAMEWORK_PATH."/db");
		define("HELPERS_PATH",FRAMEWORK_PATH."/helpers");
		define("LIBRARY_PATH",FRAMEWORK_PATH."/library");

		
		define("GALL_PATH",BASE_PATH."/public");
		define("STORAGE_PATH",GALL_PATH."/storage");
		//upload defination
		define("UPLOAD_PATH",GALL_PATH."/upload");
		define("WEBRES_PATH",GALL_PATH."/webres");
	}

	protected static function registerAutoload(){
		spl_autoload_register("Application::autoload");
	}

	protected static function autoload($className){
		if(substr($className,"-10")=="Controller" && substr($className,0,12) == "Controllers\\"){//controller 自动加载
			include_once CONTROLLERS_PATH."\\".substr($className,12).".php";
		}else if(substr($className,"-5")=="Model" && substr($className,0,7) == "Models\\"){//model 自动加载
			include_once MODELS_PATH."\\".substr($className,7).".php";
		}else if(substr($className,0,7) == "Vender\\"){//框架类库自动加载
			include_once FRAMEWORK_PATH."\\".substr($className,7).".php";
		}
	}

	protected static function load(){
		Env::load();

		Config::load();

		$GLOBALS['Routing_Table'] = array();//设置routing-table ，路由载入

	}


	protected static function route(){
		// 加载自定义路由
		$routefile = ROUTES_PATH."/"."web.php";
		if(file_exists($routefile))
			include_once $routefile;
		//进行路由
		
		//使用原生的php $_SERVER
		$requestinfo = parse_url($_SERVER['REQUEST_URI']);
		RouteLoader::route($requestinfo['path']);
	}


	
}