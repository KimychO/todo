<?php
namespace Model;

use \Db;

class Todo
{
    protected $_table = 'todo';

    /**
     * get all list if to-dos
     * @return array
     */
    public function getTodoList()
    {

        /** @noinspection SqlResolve */
        $result = Db::getDb()->query("SELECT `id`, `name`, `description` FROM `$this->_table`");

        return $result->fetchAll();
    }

    /**
     * get single to-do
     * @param integer $id
     * @return array
     */
    public function getTodoById($id)
    {
        /** @noinspection SqlResolve */
        $result = Db::getDb()->query("SELECT `id`, `name`, `description` FROM `$this->_table` WHERE `id` = '$id'");

        return $result->fetch();
    }
}