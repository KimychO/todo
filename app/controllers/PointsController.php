<?php

namespace Controller;

use Model\Points as Model;

class PointsController
{
    protected $_model;
    protected $_view;

    public function __construct()
    {
        $this->_model = new Model();
    }


    public function getAction($todoId)
    {
        echo json_encode($this->_model->getPoints((int)$todoId));

        return true;
    }

    public function saveAction($todoId)
    {
        echo $todoId;
        var_dump($_POST);

        return true;
    }
}