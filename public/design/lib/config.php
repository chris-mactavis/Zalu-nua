<?php

if ($_SERVER['HTTP_HOST'] == 'localhost') {
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
  	
  define('SITE_URL', 'http://localhost/zalu-nua-design/');

  define('UPLOADPATH', '../uploads/');
    
  define('DATABASE', 'zalu-nua');

	define('USER', 'baronpaul');

	define('PASSWORD', 'jeshua1980');

	define('SERVER', 'localhost');

}
else {
  	error_reporting(0);
    //ini_set('display_errors', '1');

  	define('SITE_URL', 'http://www.mariephiliplab.com.ng/zalu-nua/');

  	define('UPLOADPATH', '../uploads/');

    define('DATABASE', 'puerandp_site2');

    define('USER', 'puerandp_admin');

    define('PASSWORD', 'Jeshua1980');

    define('SERVER', 'localhost');
  	
}
