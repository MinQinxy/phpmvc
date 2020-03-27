<?php
namespace Vender\Facade;

//use Vender\Core\File;
 
class Request{
	/*$_SERVER
		$_SERVER['HTTP_HOST']
		$_SERVER['SERVER_PORT']
		$_SERVER['REQUEST_METHOD']
		$_SERVER['QUERY_STRING']
 	*/
 	protected $host;
 	protected $port;
 	protected $method;
 	protected $query;
 	protected $body;
 	protected $all;
	protected $REQUEST_INFO;
	public function __construct(){
		$this->REQUEST_INFO = $_SERVER;
		$this->host = $_SERVER['HTTP_HOST'];
		$this->port = $_SERVER['SERVER_PORT'];
		$this->methos = $_SERVER['REQUEST_METHOD'];
		

	}

	public function query($key){//uri 数据

	}

	public function all($key){//all 

	}

	// public function file($key){

	// }


} 