<?php

use \lithium\core\Libraries;

if (!defined('SWIFTMAILER_LIBRARY_PATH')) {
	$path = '/swiftmailer/lib/classes';
	$path = file_exists(LITHIUM_LIBRARY_PATH . $path) ?
		LITHIUM_LIBRARY_PATH . $path :
		LITHIUM_APP_PATH . "/libraries/{$path}";
	define('SWIFTMAILER_LIBRARY_PATH', $path);
}

$name = 'swiftmailer';
$library = Libraries::get($name);

if (empty($library)) {
	Libraries::add($name, array(
		'bootstrap' => '/../swift_required.php',
		'path' => SWIFTMAILER_LIBRARY_PATH,
		'prefix' => 'Swift_'
	));
}

?>