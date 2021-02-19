<?php 
if(!defined('DS')){
	define ('DS' ,  DIRECTORY_SEPARATOR);
}
define ('APP_PATH' , realpath(dirname(__FILE__)));
define ('VIEWPATH' , APP_PATH . DS . 'Views' . DS);
?>