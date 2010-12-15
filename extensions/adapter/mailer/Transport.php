<?php

namespace li3_swiftmailer\extensions\adapter\mailer;

/**
 * Generic transport adapter
 */
abstract class Transport extends \lithium\core\Object {
	protected $_mailer;
	protected $_transport;
	protected $_classes = array();

	/**
	 * Keys to set within config
	 */
	protected $config = array();
	
	protected function _init() {
		$this->_classes += array(
			'transport' => '\Swift_MailTransport',
			'mailer' => '\li3_swiftmailer\mailer\Mailer'
		);
		return parent::_init();
	}

	public function config(array $config=array()) {
		$transport = $this->get_transport();
		foreach ($this->config as $key => $value) {
			$transport->{"set" . ucfirst($key)}($config[$value]);
		}
		return $this;
	}

	protected function get_transport() {
		if (!isset($this->_transport)) {
			$transport = $this->_classes['transport'];
			$this->_transport = $transport::newInstance();
		}
		return $this->_transport;
	}


	public function get_mailer() {
		if (!isset($this->_mailer)) {
			$mailer = $this->_classes['mailer'];
			$this->_mailer = $mailer::newInstance($this->get_transport());
		}
		return $this->_mailer;
	}

	public function __get($name) {
		if ($name === 'mailer') {
			return $this->get_mailer();
		}
		throw new \Exception("{$name} is undefined");
	}
}

# vim: ts=4 noet
?>