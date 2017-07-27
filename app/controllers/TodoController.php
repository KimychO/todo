<?php
namespace Controllers;

use Model\Todo;

class TodoController
{
    protected $_model;

    private function __construct()
    {
        $this->_model = new Todo();
    }

    /**
     * Action to show to-dos list
     *
     * @return bool
     */
    public function listAction(){
        echo "list action";
        print_r($this->_model->getTodoList());

        return true;
    }

    /**
     * Action to show single to-do element
     *
     * @param $id
     * @return bool
     */
    public function viewAction($id)
    {
        echo "view action<br/>";
        print_r($id);
        print_r($this->_model->getTodoById($id));
        return true;
    }
}