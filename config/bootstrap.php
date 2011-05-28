<?php

use \lithium\core\Libraries;

if (!defined('SWIFTMAILER_LIBRARY_PATH')) {
	$path = '/swiftmailer/lib';
	$path = file_exists(LITHIUM_LIBRARY_PATH.$path) ?
		LITHIUM_LIBRARY_PATH.$path :
		LITHIUM_APP_PATH.'/libraries'.$path;
	define('SWIFTMAILER_LIBRARY_PATH', $path);
}

require SWIFTMAILER_LIBRARY_PATH . '/swift_required.php';

$name = 'swiftmailer';
$library = Libraries::get($name);

if (empty($library)) {
	Libraries::add($name, array(
		'bootstrap' => false,
		'path' => SWIFTMAILER_LIBRARY_PATH,
		'prefix' => 'Swift_'
	));
}

# vim: ts=4 noet
?>