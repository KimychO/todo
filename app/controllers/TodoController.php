<?php
namespace Controller;

use Model\Todo;

class TodoController
{
    protected $_model;

    public function __construct()
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
        var_dump($this->_model->getTodoList());

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
        var_dump($id);
        var_dump($this->_model->getTodoById($id));
        return true;
    }
}