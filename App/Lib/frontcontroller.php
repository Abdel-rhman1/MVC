<?php 
	namespace PHPMVC\LIB;
	class FrontController{
		private $_controller = 'index';
		private $_action = 'default';
		private $_paras = array();
		public function _pasreUrl(){
			$url=explode('/',trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
			var_dump($url);
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
			
		}
	}
?>