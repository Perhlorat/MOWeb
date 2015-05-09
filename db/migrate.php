#!/usr/bin/php
<?php
/**
 * This file is the main script which should be run on the command line in order to perform database migrations.
 * If you want to use this script like so:  ./migrate.php -- you will need to give it executable permissions (chmod +x migrate.php) and ensure the top line of this script points to the actual location of your PHP binary.
 *
 * @package    mysql_php_migrations
 * @subpackage Globals
 * @license    http://www.opensource.org/licenses/bsd-license.php  The New BSD License
 * @link       http://code.google.com/p/mysql-php-migrations/
 */

// настроим пути и окружение для Зенда
if(!defined('APPLICATION_PATH')) {
	define('APPLICATION_PATH', realpath(dirname(__FILE__).'/../app/public'));
}

if(!defined('APPLICATION_ENV')) {
    $env = 'development';
    foreach($argv as $i => $arg) {
        if(substr($arg, 0, 6) == '--env=') {
            $env = substr($arg, 6);
            unset($argv[$i]);
        }
    }

	define('APPLICATION_ENV', $env);
}

if(!defined('DB')) {
	define('DB', 'default');
}

// we want to see any errors
ini_set('display_errors', 1);
error_reporting(E_ALL);

/** 
 * Define the full path to this file.
 */
define('MPM_PATH', dirname(__FILE__));

/**
 * Version Number - for reference
 */
define('MPM_VERSION', '2.0.1');

/**
 * Include the init script.
 */
require_once(MPM_PATH . '/lib/init.php');

// get the proper controller, do the action, and exit the script
$obj = MpmControllerFactory::getInstance($argv);
$obj->doAction();
exit;

?>
