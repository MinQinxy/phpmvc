<?php
namespace Vender\Core;
//view loader


class ViewLoader{

	protected $_viewname;
	protected $_viewpath; 
	protected $_var = array();
	

	public function __construct($viewName,$arg =array()){
		$this->_viewname = $viewName;
		$this->_viewpath = strtr($viewName,".","/");
		$this->_var = $arg;
	}

	public function assign($key,$value){
		$this->_var[$key] = $value;
	}

	public function assigns(array $args){
		$this->_var = array_merge($this->_var,$args);
	}

	public function render(){
		extract($this->_var);
		$viewFile = VIEWS_PATH."/".$this->_viewpath.".php";//这里以html 为例
		include $viewFile ;//如果出错则报错


	}

	public function __toString(){
		return $this->_viewname;
	}

}