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
        $columns = "`t`.`id`, `t`.`name`, `t`.`description`, `p`.`description` as point_description, `p`.`todo_id`";
        $result = Db::getDb()->query("SELECT {$columns} FROM `$this->_table` AS `t` LEFT JOIN `points` AS `p` ON `t`.`id` = `p`.`todo_id`");


        return $this->_parseTodoList($result->fetchAll(PDO::FETCH_ASSOC));
    }

    /**
     * Preparing list values to view,
     * @param $list
     * @return array
     */
    protected function _parseTodoList($list)
    {
        $parsedList = [];
        foreach($list as $item){
            if(!isset($parsedList[$item['id']])){
                $parsedList[$item['id']] = [
                    "name" => $item['name'],
                    "id" => $item['id'],
                    "description" => $item['description'],
                    "points" => [],
                ];
            }
            if(!is_null($item['todo_id'])){
                array_push($parsedList[$item['todo_id']]['points'],$item['point_description']);
            }
        }
        return $parsedList;
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
        $sql = "UPDATE `$this->_table` SET `name` = :name, `description` = :description WHERE `id` = :id ";

        $result = Db::getDb()->prepare($sql);
        $result->bindParam(':id', $data['id']);
        $result->bindParam(':name', $data['name']);
        $result->bindParam(':description', $data['description']);

        return $result->execute();
    }

    public function deleteTodo($id)
    {
        $sql = "DELETE FROM `$this->_table` WHERE `id` = :id";

        $result = Db::getDb()->prepare($sql);
        $result->bindParam(':id', $id);

        return $result->execute();

    }
}