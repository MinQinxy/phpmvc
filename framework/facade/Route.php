<?php
namespace Vender\Facade;

use Vender\Core\RouteLoader;
use Vender\Core\ViewLoader;

class Route{

	public static function view($route,$view,$callback=NULL){
		RouteLoader::assign($route,$view,array("VIEW") );
		if($callback){
			$callback();
		}
	}

	public static function any($route,$dispatch,$callback=NULL){
		RouteLoader::assign($route,$dispatch,ViewLoader::METHODS);
		if($callback){
			$callback();
		}
	}

	public static function match(array $method,$route,$dispatch,$callback=NULL){
		RouteLoader::assign($route,$dispatch,$method);
		if($callback){
			$callback();
		}
	}

    public static function get($route,$dispatch,$callback=NULL){
    	RouteLoader::assign($route,$dispatch,array("GET")) ;
		if($callback){
			$callback();
		}
    }

	public static function post($route,$dispatch,$callback=NULL){
		RouteLoader::assign($route,$dispatch,array("POST")) ;
		if($callback){
			$callback();
		}
	}
/*
	public static function put(){}

	public static function head(){}

	public static function delete(){}

	public static function options(){}

	public static function patch(){}

	public static function trace(){}

	public static function connect(){}
*/



}