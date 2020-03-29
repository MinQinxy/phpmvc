<?php
namespace Vender\Helpers;

use Vender\Core\ViewLoader;
class Error{

	public static function error($state,$errmsg,$customView=NULL,$customArgs = NULL){
		http_response_code($state);

		$view = new ViewLoader(
			$customView?$customView:"error.error",
			array("error_state"=>"$state",
				  "error_echo_message"=>$errmsg
			)
		);
		if($customArgs &&is_array($customArgs))
			$view->assigns();
		$view->render();
		exit();
	}

}