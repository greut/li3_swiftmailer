<?php

namespace li3_swiftmailer\extensions\adapter\mailer\transport;

/**
 * Transport relying on a command-line sendmail
 */
class Sendmail extends \li3_swiftmailer\extensions\adapter\mailer\Transport
{
	protected $_classes = array('command');
}

# vim: ts=4 noet
?>