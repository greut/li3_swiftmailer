<?php

namespace li3_swiftmailer\extensions\adapter\mailer\transport;

/**
 * Transport relying on an SMTP server
 */
class Smtp extends \li3_swiftmailer\extensions\adapter\mailer\Transport {
	protected $_classes = array('host', 'port', 'secure', 'username',
	                            'password');
}

# vim: ts=4 noet
?>