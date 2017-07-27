<?php
namespace Model;

class Todo extends Connector
{
    protected $_table = 'todo';

    /**
     * get all list if to-dos
     * @return array
     */
    public function getTodoList()
    {
        $result = $this->_database->query("SELECT `id`, `name`, `description` FROM `$this->_table`");

        return $result->fetchAll();
    }

    /**
     * get single to-do
     * @param integer $id
     * @return array
     */
    public function getTodoById($id)
    {
        $result = $this->_database->query("SELECT `id`, `name`, `description` FROM `$this->_table` WHERE `id` = '$id'");

        return $result->fetch();
    }
}