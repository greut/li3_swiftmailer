<?php

use \lithium\core\Libraries;

if (!defined('SWIFTMAILER_LIBRARY_PATH')) {
    $paths = array(
        'app' => LITHIUM_APP_PATH . '/libraries/swiftmailer/lib',
        'lib' => LITHIUM_LIBRARY_PATH . '/swiftmailer/lib',
        'vendor' => dirname(LITHIUM_APP_PATH) . '/vendor/swiftmailer/swiftmailer/lib'
    );

    switch(true) {
        case file_exists($paths['app']):
            $path = $paths['app'];
            break;
        case file_exists($paths['lib']):
            $path = $paths['lib'];
            break;
        case file_exists($paths['vendor']):
            $path = $paths['vendor'];
            break;
    }

	define('SWIFTMAILER_LIBRARY_PATH', $path);
}

$name = 'swiftmailer';
$library = Libraries::get($name);

if (empty($library)) {
	Libraries::add($name, array(
		'bootstrap' => 'swift_required.php',
		'path' => SWIFTMAILER_LIBRARY_PATH
	));
}

?>