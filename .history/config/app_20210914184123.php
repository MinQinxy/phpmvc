<?php
use Vender\Helpers\Env;
return [
	"APP_DEBUG"=>Env::get("APP_DEBUG",true),

	"APP_NAME"=>Env::get("APP_NAME","Mindas"),
	
	"APP_URL"=>Env::get("APP_URL","localhost"),
	
	"APP_DIR"=>"/app",
	
	"TIME_ZONE"=>"UTC",
	
	"LOCALE"=>"en",
	"VIEW_TEMPLATE"=>"DEFAULT",// DEFAULT,MLADE
];