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

    public function addPoint($data, $todoId)
    {
        $sql = "INSERT INTO `$this->_table` VALUES (NULL , :todoId, :description)";

        $result = Db::getDb()->prepare($sql);
        $result->bindParam(':todoId', $todoId);
        $result->bindParam(':description', $data['description']);

        return $result->execute();

    }

    public function deletePoint($id)
    {
        $sql = "DELETE FROM `$this->_table` WHERE `id` = :id";

        $result = Db::getDb()->prepare($sql);
        $result->bindParam(':id', $id);

        return $result->execute();

    }

    public function modifyPoint($data)
    {
        $sql = "UPDATE `$this->_table` SET `name` = :name, `description` = :description WHERE `id` = :id ";

        $result = Db::getDb()->prepare($sql);
        $result->bindParam(':id', $data['id']);
        $result->bindParam(':description', $data['description']);

        return $result->execute();
    }
}