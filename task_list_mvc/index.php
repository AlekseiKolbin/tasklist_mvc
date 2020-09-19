<?
require 'lib/dev.php';

use core\router;


spl_autoload_register(function($class)
{
	$path = str_replace('\\', '/', $class.'.php');
	if (file_exists($path)) {
		require $path;
	}
});

$router = new router;
$router->run();
?>