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
		$this->_var = array_merge_recursive($this->_var,$args);
	}

	public function render(){

		$__viewFile__ = VIEWS_PATH."/".$this->_viewpath.".php";//这里以html 为例
		$this->renderView($__viewFile__,$this->_var);

	}

	protected function renderView(string $__viewFile__,array $__var__){
		extract($__var__);
		include $__viewFile__;//如果出错则报错
	}


	public function __toString(){
		return $this->_viewname;
	}

}