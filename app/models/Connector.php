<?php
namespace Model;

use \PDO;

abstract class Connector
{
    /**
     * name of table
     */
    protected $_table;

    /**
     * @var $_database PDO
     */
    protected $_database;

    protected function _construct()
    {
        $configs = include(CONF . 'database.php');
        $dsn = "mysql:host={$configs['host']};dbname={$configs['database']}";
        $this->_database = new PDO($dsn, $configs['user'], $configs['password']);
    }
}