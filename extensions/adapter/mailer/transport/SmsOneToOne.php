<?php

namespace li3_swiftmailer\extensions\adapter\mailer\transport;

use lithium\net\http\Service;

/**
 * Adapter for transport and delivery by sms gateway from operator `OneToOne` - www.one-2-one.pl.
 * U should be config transport.php in /app/config/bootstrap config support `\Environment` params for eg (development,
 * test, production).
 * {{{
 * use li3_swiftmailer\mailer\Transports;
 * Transports::config(array(
 * 	'sms' => array(
 * 		'development' => array(
 * 			'adapter' => 'SmsOneToOne',
 * 			'username' => 'xxx',
 * 			'password' => 'xxx',
 * 			'from' => 1111
 * 		),
 * 		'test' => array(
 * 			'adapter' => 'SmsOneToOne',
 * 			'username' => 'xxx',
 * 			'password' => 'xxx',
 * 			'from' => 1111
 * 		),
 * 		'production' => array(
 * 			'adapter' => 'SmsOneToOne',
 * 			'username' => 'xxx',
 * 			'password' => 'xxx',
 * 			'from' => 1111
 * 		)
 * 	)
 * ));
 * }}}
 * Usage for eg. in controler put
 * {{{
 * use li3_swiftmailer\mailer\Transports;
 * $mailer = Transports::adapter('sms');
 * $mailer->send($this->request->data['message'], array('to' => 606242046)));
 * }}}
 *
 * @author AgBorkowski <andrzejborkowski@gmail.com>
 * @link http://holicon.pl, http://blog.aeonmedia.eu
 */
class SmsOneToOne extends \lithium\core\Object {
	/**
	 * @param array $config support configuration params:
	 *	- `'adapter'`: adaptable class name
	 * 	- `'username'`: acces to service
	 *	- `'password'`: acces to service
	 *	- `'from'`: sender number
	 */
	protected $config = array('username', 'password', 'from');


	public function send($message, $options = array()) {
		$defaults = array(
			'username' => $this->config['username'],
			'password' => $this->config['password'],
			'from' => $this->config['from'],
		);
		$options += $defaults;

		$params = array(
			'user' => $options['username'],
			'pass' => $options['password'],
			'msg' => $message,
			'pr_sms' => $options['from'],
			'gsm' => $options['to']
		);

		return $this->_filter(__METHOD__, $params, function($self, $params) {
			$http = new Service(array('host' => 'panel.one-2-one.pl'));
			$result = $http->get('/distribution/sendsms.php', $params);
			return (substr($result, 0, 9) == $params['gsm']) ? true : false;

		});
	}
	public function config(array $config=array()) {
		$this->config = $config;
	}
	public function get_mailer(){
		return $this;
	}
	public function get_transport() {
		return $this;
	}
}

?>