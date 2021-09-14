<?php
namespace Vender\Core;

use Vender\Core\ViewLoader;
use Vender\Facade\Request;
use Vender\Helpers\Error;

class RouteLoader{


	const METHODS = array("GET","POST","PUT","HEAD","DELETE","TRACE","OPTIONS","PATCH","CONNECT");

	// Routing_table 每一项是一个元组,是以路径为key
	// value: methods array(methods=>, dispatch=>"")

	public static function assign($route,$dispatch,array $methods){
		if(isset($GLOBALS['Routing_Table'][$route])){//出现重复记录报错失败
			return false;
		}
		$GLOBALS['Routing_Table'][$route] = array("dispatch"=>$dispatch,"methods"=>$methods);
		return true;
	}

	public static function route($route,Reuqest $request = NULL ){//单实例路由  $request 位Request 封装提供接口
		if(!isset($GLOBALS['Routing_Table'][$route])){
			//404
			Error::error(404,"404 Not Found");
			// http_response_code(404);
			// //文件不存在
			// (new ViewLoader("error.error",array(
			// 	"error_state"=>"404",
			// 	"error_echo_message" => "404 Not Found"
			// )))->render();
			// exit();
		}
		//request update
		$request_method = $_SERVER['REQUEST_METHOD'];

		$info = $GLOBALS['Routing_Table'][$route];
		if(in_array("VIEW",$info['methods']) ){
			$view = new ViewLoader($info['dispatch']);
		    echo $view->render();

		}else if(in_array($request_method,$info['methods'])){
			//将请求转发给前端控制器
			$dispatchinfo = explode("@",$info['dispatch']);
			if(count($dispatchinfo)>2){
				Error::error(500,"500 Server Error");
				// http_response_code(500);
				// (new ViewLoader("error.error",array(
				// 	"error_state"=>"500",
				// 	"error_echo_message" => "500 Server Error"
				// )))->render();
				// exit();
			}
			if(count($dispatchinfo)==2)
			self::dispatch($dispatchinfo[0],$dispatchinfo[1],$request);
			else if(count($dispatchinfo)==1)
			self::dispatch($dispatchinfo[0],"index",$request);
			
		}else{
			Error::error(405,"405 Resources Banned");
			// http_response_code(405);
			// //请求方法不支持
			// (new ViewLoader("error.error",array(
			// 	"error_state"=>"405",
			// 	"error_echo_message" => "405 Resources Banned"
			// )))->render();
			// exit();
		}

	}

	protected static function dispatch($controller="IndexController",$action="index",Request $request=NULL){
		$controllerClass = "Controllers\\".strtr($controller,".","\\");
		$controllerPath = CONTROLLERS_PATH."\\".strtr($controller,".","\\").".php";
		require $controllerPath;

		$controllerInstance = new $controllerClass();
		$controllerInstance->$action($request);

	}


}