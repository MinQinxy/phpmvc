<?php
namespace Vender\Core;
//base controller
class Controller{
	
	public function View($viewName,$data=NULL){
		$view = new ViewLoader($viewName,$data);
		$view->render();
	}

}