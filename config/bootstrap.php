<?php

use \lithium\core\Libraries;

/**
 * Composer SWIFTMAILER path:
 * `/../vendor/swiftmailer/swiftmailer/lib/classes`
 *
 * Git clone SWIFTMAILER path:
 * `/swiftmailer/lib/classes`
 */
if (!defined('SWIFTMAILER_LIBRARY_PATH')) {
	/**
	 * Git clone SWIFTMAILER path
	 * Comment if use composer path
	 */
	$path = '/swiftmailer/lib/classes';

	/**
	 * Composer SWIFTMAILER path
	 * Uncomment if use composer path
	 */
	// $path = '/../vendor/swiftmailer/swiftmailer/lib/classes';

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