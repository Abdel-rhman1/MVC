<?php 
	namespace PHPMVC\Controller;
	//use PHPMVC\LIB;
	abstract class AbstractController{
		protected $_controller;
		protected $_action;
		protected $_params;
		public function NotFountAction(){
			$this->_view();
		}
		public function setController($ControllerName){
			$this->_controller = $ControllerName ;
		}
		public function setAction($ActionName){
			$this->_action = $ActionName ;
		}
		public function setparas($paramArray){
			$this->_params = $paramArray ;
		}
		protected function _view(){
			if($this->_action == 'NotFountAction'){
				require_once VIEWPATH .'notfound' . DS . $this->_action .'.view.php';
			}else{
				$view = VIEWPATH . $this->_controller . DS . $this->_action .'.view.php';
				if(file_exists($view)){
					require_once $view;
				}else{
					require_once VIEWPATH .'notfound' . DS .'noview.view.php';
				}
			}
			// echo VIEWPATH . $this->_controller . DS . $this->_action;
		}
	}

?>