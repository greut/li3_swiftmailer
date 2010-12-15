<?php

namespace li3_swiftmailer\mailer;

/**
 * Manages transport for mailers
 */
class Transport extends \lithium\core\Adaptable {
	/**
	 * A Collection of the configurations you add through Catalog::config().
	 *
	 * @var Collection
	 */
	protected static $_configurations = array();

	/**
	 * Libraries::locate() compatible path to adapters for this class.
	 *
	 * @see lithium\core\Libraries::locate()
	 * @var string Dot-delimited path.
	 */
	protected static $_adapters = 'adapter.mailer.transport';

	/**
	 * Get a mailer `adapter` from the configuration.
	 *
	 * @param string $name configuration to set up
	 * @return object mailer
	 */
	public static function get($name) {
		$config = static::config();
		$transport = static::adapter($name);
		$transport->config($config[$name]);
		return $transport->mailer;
	}
}

# vim: ts=4 noet
?>