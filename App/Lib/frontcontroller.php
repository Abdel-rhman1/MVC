<?php 
	namespace PHPMVC\LIB;
	//use PHPMVC\Controller;
	class FrontController{
		const NOT_FOUND_ACTION = "NotFountAction";
		const NOT_FOUND_CONTROLLER = 'PHPMVC\Controller\\'.'NotFountController';
		private $_controller = 'index';
		private $_action = 'default';
		private $_paras = array();
		public  function __construct(){
			$this->_pasreUrl();
		}
		public function _pasreUrl(){
			$url=explode('/',trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) , '/') , 3);
			//var_dump($url);
			if(isset($url[0]) && $url[0] != ''){
				$this->_controller = $url[0];
			}
			if(isset($url[1]) && $url[1] != ''){
				$this->_action = $url[1];
			}
			if(isset($url[2]) && $url[2] != ''){
				$this->_paras = explode('/', $url[2]);
			}	 
		}
		public function dispatch(){
			//echo ucfirst($this->_controller);
			//echo gettype($this->_controller);
			$ControllerClassName = 'PHPMVC\Controller\\'.ucfirst($this->_controller) . "Controller";
			$actionName = $this->_action;
			if(!class_exists($ControllerClassName)){
				$ControllerClassName = self::NOT_FOUND_CONTROLLER;
				
			}
			$controller = new $ControllerClassName();
			if(!method_exists($controller, $actionName)) {
				$this->_action=$actionName = self::NOT_FOUND_ACTION;
			}
			$controller->setController($this->_controller);
			$controller->setAction($this->_action);
			$controller->setparas($this->_paras);
			$controller->$actionName();
		}
	}
?>