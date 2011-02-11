<?php

namespace li3_swiftmailer\tests\cases\mailer;

use li3_swiftmailer\mailer\Transports;

class TransportTest extends \lithium\test\Unit {

	public function test_smtp() {
		Transports::config(array('default' => array('test' => array(
			'adapter' => 'Smtp',
			'host' => 'smtp.example.org',
			'port' => 25,
			'encryption' => 'tls',
			'username' => 'john.doe',
			'password' => 'password'
		))));

		$mailer = Transports::get('default');
		$this->assert($mailer);

		$transport = $mailer->getTransport();
		$this->assert($transport);

		$this->assertEqual('smtp.example.org', $transport->getHost());
		$this->assertEqual(25, $transport->getPort());
		$this->assertEqual('tls', $transport->getEncryption());
		$this->assertEqual('john.doe', $transport->getUsername());
		$this->assertEqual('password', $transport->getPassword());
	}

	public function test_sendmail() {
		Transports::config(array('default' => array('test' => array(
			'adapter' => 'Sendmail',
			'command' => '/usr/sbin/sendmail -bs -i',
		))));

		$mailer = Transports::get('default');
		$this->assert($mailer);

		$transport = $mailer->getTransport();
		$this->assert($transport);

		$this->assertEqual('/usr/sbin/sendmail -bs -i', $transport->getCommand());
	}

	public function test_mail() {
		Transports::config(array('default' => array('test' => array(
			'adapter' => 'PhpMail'
		))));

		$mailer = Transports::get('default');
		$this->assert($mailer);
		
		$transport = $mailer->getTransport();
		$this->assert($transport);
	}

}

# vim: ts=4 noet
?>