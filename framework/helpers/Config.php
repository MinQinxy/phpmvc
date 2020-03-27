<?php
namespace Vender\Helpers;

class Config{

	private static $configFile = array("app","database");
	private static $config  = array(); 
	public static function load(){
		foreach(self::$configFile as $file){
			$cfg = include_once CONFIG_PATH."/".$file.".php";
			self::$config[$file] = $cfg;
		}
	}

	public static function app($key,$default=""){
		$cfg = self::$config['app'];
		if(isset($cfg[$key])){
			return $cfg[$key];
		}
		else{
			return $default;
		}
	}

	public static function database($key,$default=""){
		$cfg = self::$config['database'];
		if(isset($cfg[$key])){
			return $cfg[$key];
		}
		else{
			return $default;
		}
	}


}