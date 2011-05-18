<?php

namespace li3_swiftmailer\mailer;

/**
 * Generic transport adapter
 */
abstract class Transport extends \lithium\core\Object {
	protected $_mailer;
	protected $_transport;
	protected $_classes = array();
	protected $_config = array();
	protected $_autoConfig = array('classes', 'config');

	/**
	 * Keys to set within config
	 */
	protected $config = array();
	
	protected function _init() {
		$this->_classes += array(
			'transport' => '\\Swift_MailTransport',
			'mailer' => 'li3_swiftmailer\\mailer\\Mailer',
		);
		return parent::_init();
	}

	public function config(array $config=array()) {
		$this->_config = $config;
	}

	protected function _config() {
		$transport = $this->get_transport();
		foreach($this->config as $key) {
			if (isset($this->_config[$key])) {
				$transport->{"set" . ucfirst($key)}($this->_config[$key]);
			}
		}
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
			$this->_config();
			$this->_mailer = $mailer::newInstance($this->get_transport());
		}
		return $this->_mailer;
	}
}

# vim: ts=4 noet
?>