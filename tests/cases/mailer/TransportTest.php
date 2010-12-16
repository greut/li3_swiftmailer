<?php

namespace li3_swiftmailer\tests\cases\mailer;

use li3_swiftmailer\mailer\Transport;

class TransportTest extends \lithium\test\Unit {
	public function test_smtp() {
		Transport::config(array('default' => array(
			'adapter' => 'Smtp',
			'host' => 'smtp.example.org',
			'port' => 25,
			'secure' => 'tls',
			'username' => 'john.doe',
			'password' => 'password'
		)));

		$mailer = Transport::get('default');
		$this->assert($mailer);
	}

	public function test_sendmail() {
		Transport::config(array('default' => array(
			'adapter' => 'Sendmail',
			'command' => '/usr/sbin/sendmail -bs -i',
		)));

		$mailer = Transport::get('default');
		$this->assert($mailer);
	}

	public function test_mail() {
		Transport::config(array('default' => array(
			'adapter' => 'PhpMail'
		)));

		$mailer = Transport::get('default');
		$this->assert($mailer);
	}

}

# vim: ts=4 noet
?>