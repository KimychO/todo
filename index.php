<?php

ini_set('display_errors',1);
error_reporting(E_ALL);


define('ROOT', dirname(__FILE__));

define('CONF', ROOT . '/app/etc/config/');

include(ROOT . '/app/etc/components/Autoloader.php');

$router = new Router();
$router->run();

