<?php
	namespace PHPMVC;
	use PHPMVC\LIB\FrontController;
	if(!defined('DS')){
		define ('DS' ,  DIRECTORY_SEPARATOR);
	}
	require_once '..' . DS . 'App' . DS . 'config.php';
	require_once APP_PATH . DS . 'lib' . DS . 'autoload.php';
	//echo APP_PATH;
	$front = new FrontController();
	$front->dispatch(); 
 ?>