<?php
namespace Vender\Helpers;

class Env{
	public static function get($key,$default=""){
		$env = getenv(ENV_PREFIX.$key);
		if($env && $env != ""){
			return $env;	
		}
		else{
			return $default;
		}
	}

	public static function load(){
		if(is_file(ENV_PATH)) {
			$env = parse_ini_file(ENV_PATH,true);
			foreach($env as $key => $val){
				$name = ENV_PREFIX.strtouper($key);

				if(is_array($val)){
					foreach($val as $k => $v){
						$item = $name."_".strtoupper($k);
						putenv("$item=$v");
					}
				}else{
					putenv("$name=$val");
				}
			}
		}
	}
}
