<?php
namespace Models;
use Vender\Helpers\Error;

class FsModel{

	public static $basetrue = STORAGE_PATH."/fsdir";

	private static function toTruthPath(&$path="/"){
		if($path == "/" || $path == ""){
			return self::$basetrue;
		}else{
			if(substr($path,0,1) != "/")$path ="/".$path;
			return self::$basetrue.$path;
		}
	}

	private static function nextFsPath($now="/",$to=""){
		if(($now == "/" ||$now == "") && ($to == ".." || $to =="" ) ){
			return "/";
		}
		if($to == ".."){
			$dir =  dirname($now);
			if($dir == "" || $dir == "/" || $dir =="\\")return "/";
			else return $dir;
		}else{
			return ($now== "/"?"":$now) . "/". $to;
		}

	}

	// now
	// content 
	// 		next type content
	public function nowPathContent($cur){
		$truepath = self::toTruthPath($cur);
		$ret = array(
			"position"=>$cur,
			"content"=>array()
		);

		if(is_dir($truepath)){
			$dir = opendir($truepath);
			if($cur == "/" ||$cur == "" ){}
			else{
				array_push($ret['content'],
					array("next"=>self::nextFsPath($cur,".."),
						  "type"=>false,
						  "content"=>".."
					)
				);
			}
			while( ($file = readdir($dir)) ) {
				if($file == "."|| $file == ".."){}
				else{
					$next = self::nextFsPath($cur,$file);
					array_push($ret['content'],
						array("next"=>$next,
							  "type"=>false,
							  "content"=>is_dir(self::toTruthPath($next))?$file."/":$file
						)
					);
				}
			}
			closedir($dir);

		}else if(is_file($truepath) && file_exists($truepath)){
			array_push($ret['content'],
				array("next"=>self::nextFsPath($cur,".."),
					  "type"=>false,
					  "content"=>".."
				)
			);
			array_push($ret['content'],
				array("next"=>"",
					  "type"=>true,
					  "content"=>file_get_contents($truepath)
				)
			);
		}else{
			//404
			Error::error(404,"404 Not Found");
		}
		return $ret;
	}

}