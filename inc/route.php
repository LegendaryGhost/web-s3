<?php 

define('SITE_NAME', 'web-s3');
define('MAIN_URL', 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/' . SITE_NAME . '/');
define('ASSETS', MAIN_URL."public/assets/");
define('CSS', ASSETS . 'css/');
define('JS', ASSETS . 'js/');
	
 ?>