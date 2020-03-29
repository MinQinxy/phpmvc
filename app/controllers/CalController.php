<?php
namespace Controllers;

use Vender\Core\Controller;
use Models\CalModel;
use Vender\Core\ViewLoader;
class CalController{

	public function index(){
		$a = $_GET['a'];
		$op = $_GET['op'];
		$b = $_GET['b'];
		$ret = 0;
		$cal = new CalModel;
		switch($op){
			case '+':
				$ret = $cal->add($a,$b);
				break;
			case '-':
				$ret = $cal->sub($a,$b);
				break;
			case '*':
				$ret = $cal->mul($a,$b);
				break;
			case '/':
				$ret = $cal->div($a,$b);
				break;
		}
		if(!$ret) $ret = "Wrong ARGS,May be $b == 0 when operation is '/'";
		$view =  new ViewLoader("ret",array("calret"=>$ret));

		$view ->render();

	}
}