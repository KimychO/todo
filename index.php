<?php

ini_set('display_errors',1);
error_reporting(E_ALL);


define('ROOT', dirname(__FILE__));

define('CONF', ROOT . '/app/etc/config/');
define('CONTROLLER', ROOT . '/app/controllers/');
define('MODEL', ROOT . '/app/model/');
define('VIEW', ROOT . '/app/view/');


require_once(ROOT . '/app/etc/components/Router.php');

$router = new \Components\Router();
$router->run();

