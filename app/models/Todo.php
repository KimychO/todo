<?php
namespace Model;

use \Db;
use \PDO;

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

        return $result->fetchAll(PDO::FETCH_ASSOC);
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

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function addTodo($data)
    {
        $sql = "INSERT INTO `$this->_table` VALUES (NULL , :name, :description)";

        $result = Db::getDb()->prepare($sql);
        $result->bindParam(':name', $data['name']);
        $result->bindParam(':description', $data['description']);

        return $result->execute();

    }

    public function modifyTodo($data)
    {
        $sql = "UPDATE `$this->_table` SET `name` = :name, `description` = :description ) WHERE `id` = :id ";

        $result = Db::getDb()->prepare($sql);
        $result->bindParam(':id', $data['id']);
        $result->bindParam(':name', $data['name']);
        $result->bindParam(':description', $data['description']);

        return $result->execute();
    }
}