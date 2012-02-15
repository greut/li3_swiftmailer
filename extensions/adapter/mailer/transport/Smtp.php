<?php

namespace li3_swiftmailer\extensions\adapter\mailer\transport;

/**
 * Transport relying on a SMTP server.
 *
 * Options:
 *
 * - `'host'` SMTP server hostname
 * - `'port'` SMTP server port
 * - `'encryption'` what kind of encryption is used _none_, `tls` or `ssl`
 * - `'username'` if login is required the username
 * - `'password'` if login is required the password
 * - `'domain'` which domain is advertised while doing the EHLO phase
 *    (leave empty if unsure)
 *
 * @see li3_swiftmailer\mailer\Transport
 */
class Smtp extends \li3_swiftmailer\mailer\Transport
{
	/**
	 * The keys that are automagically configured.
	 */
	protected $config = array('host', 'port', 'encryption', 'username', 'password');

	protected function _init() {
		$this->_classes += array(
			'transport' => '\\Swift_SmtpTransport',
		);
		return parent::_init();
	}

	/**
	 * Do a special trick to set the localDomain using the domain key.
	 *
	 * @see li3_swiftmailer\mailer\Transport::_config()
	 */
	protected function _config() {
		parent::_config();
		if (isset($this->_config['domain'])) {
			$transport = $this->get_transport();
			$transport->setLocalDomain($this->_config['domain']);
		}
	}
}

# vim: ts=4 noet
?>