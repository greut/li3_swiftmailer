<?php

namespace li3_swiftmailer\mailer;

/**
 * Manages transport for mailers
 */
class Transports extends \lithium\core\Adaptable
{
	/**
	 * To be re-defined in sub-classes.
	 *
	 * @var object `Collection` of configurations, indexed by name.
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
	 * Override adapter creation
	 *
	 * @see lithium\core\Adaptable::_initAdapter()
	 */
	protected static function _initAdapter($class, array $config) {
		return static::_filter(__FUNCTION__, compact('class', 'config'), function($self, $params) {
			$transport = new $params['class']($params['config']);
			$transport->config($params['config']);
			return $transport->get_mailer();
		});
	}
}

# vim: ts=4 noet
?>