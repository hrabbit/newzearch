<?php
/**
 * Fuel
 *
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 * @link       http://fuelphp.com
 */


Autoloader::add_classes(array(
    'Net_NNTP_Client' => __DIR__.'/Net/NNTP/Client.php',
    'Net_NNTP_Protocol_Client' => __DIR__.'/Net/NNTP/Protocol/Client.php',
));

require_once('Net/NNTP/Protocol/Responsecode.php');

/* End of file bootstrap.php */

