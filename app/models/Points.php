<?php

namespace Model;

use \Db;
use \PDO;

class Points
{
    protected $_table = 'points';

    /**
     * @param int $todoId
     * @return array
     */
    public function getPoints($todoId)
    {

        /** @noinspection SqlResolve */
        $result = Db::getDb()->query("SELECT * FROM `$this->_table` WHERE `todo_id` = $todoId");

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }
}