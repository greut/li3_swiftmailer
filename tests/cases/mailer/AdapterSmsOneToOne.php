<?php

namespace li3_swiftmailer\tests\cases\mailer;

use li3_swiftmailer\mailer\Transports;
use lithium\core\Environment;

class AdapterSmsOneToOneTest extends \lithium\test\Unit {
	public function testInitConfig(){
		$this->assertTrue(is_array(Transports::config()),'set transport configuration in /bootstrap/transport.php for test');
	}

	public function testSmsAuthFail() {

		Transports::config(array('smsAuthFail' => array(
				'adapter' => 'SmsOneToOne',
				'username' => 'john.doe',
				'password' => 'password',
				'from' => 7909
		)) + Transports::config());

		$mailer = Transports::adapter('smsAuthFail');
		$this->assert($mailer);
		// Poland numeration
		$this->assertFalse($mailer->send('test', array('to' => 606242046)));
	}

	public function testSmsBySystemConfig() {
		$this->assertEqual('test',Environment::get());
		$mailer = Transports::adapter('sms');
		//configs var are protected
		//$this->assertTrue( (isset($mailer->config['username']) && !empty($mailer->config['username']))? true : false );
		//$this->assertTrue( (isset($mailer->config['password']) && !empty($mailer->config['password']))? true : false );
		//$this->assertTrue( (isset($mailer->config['from']) && !empty($mailer->config['from']))? true : false );
		$this->assert($mailer);

// Poland numeration
		$this->assertTrue($mailer->send('test', array('to' => 606242046)));
	}

}

# vim: ts=4 noet
?>