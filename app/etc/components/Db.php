<?php

class Db
{
    /**
     * @return PDO
     */
    public static function getDb()
    {
        $configs = include(CONF . 'database.php');
        $dsn = "mysql:host={$configs['host']};dbname={$configs['database']}";

        return new PDO($dsn, $configs['username'], $configs['password']);
    }
}