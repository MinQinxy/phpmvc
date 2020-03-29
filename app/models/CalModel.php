<?php
namespace Models;

class CalModel{

	public function add($a,$b){
		return $a + $b;
	}


	public function sub($a,$b){
		return $a - $b;
	}

	public function div($a,$b){
		if($b == 0)return false;
		return $a / $b;
	}

	public function mul($a,$b){
		return $a * $b;
	}

}