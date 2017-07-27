<?php
namespace Controllers;

use Model\Todo;

class TodoController
{
    /**
     * Action to show to-dos list
     *
     * @return bool
     */
    public function listAction(){
        echo "list action";
        Todo::getTodoList();

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
        Todo::getTodoById($id);
        return true;
    }
}