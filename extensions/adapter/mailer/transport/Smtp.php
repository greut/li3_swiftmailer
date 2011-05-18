<?php

namespace li3_swiftmailer\extensions\adapter\mailer\transport;

/**
 * Transport relying on an SMTP server
 */
class Smtp extends \li3_swiftmailer\mailer\Transport
{
	protected $config = array('host', 'port', 'encryption', 'username', 'password');

	protected function _init() {
		$this->_classes += array(
			'transport' => '\\Swift_SmtpTransport',
		);
		return parent::_init();
	}
}

# vim: ts=4 noet
?>