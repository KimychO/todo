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

    public function saveAction()
    {

        //get raw post content
        $data = file_get_contents('php://input');
        //decode to assoc array
        $decoded = json_decode($data, true);

        $todoId = $decoded['todoId'];
        foreach ($decoded['remove'] as $id) {
            $this->_model->deletePoint($id);
        };
        foreach ($decoded['points'] as $point) {
            if (isset($point['id'])) {
                $this->_model->modifyPoint($point, $todoId);
            } else {
                $this->_model->addPoint($point, $todoId);
            };
        }

        return true;
    }
}