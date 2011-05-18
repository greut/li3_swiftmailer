<?php

namespace li3_swiftmailer\extensions\adapter\mailer\transport;

/**
 * Transport relying on a command-line sendmail
 */
class Sendmail extends \li3_swiftmailer\mailer\Transport
{
	protected $config = array('command');

	protected function _init() {
		$this->_classes += array(
			'transport' => '\\Swift_SendmailTransport',
		);
		return parent::_init();
	}
}

# vim: ts=4 noet
?>