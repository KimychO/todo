<?php
namespace Controller;

use Model\Todo as Model;
use View\Todo as View;

class TodoController
{
    protected $_model;
    protected $_view;

    public function __construct()
    {
        $this->_model = new Model();
        $this->_view = new View();
    }

    /**
     * Action to show to-dos list
     *
     * @return bool
     */
    public function listAction()
    {
        $data['todoList'] = $this->_model->getTodoList();
        $data['content'] = 'todo/list';
        $this->_view->generate($data);

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
        $data['todo'] = $this->_model->getTodoById($id);
        $data['content'] = 'todo/item';
        $this->_view->generate($data);
        return true;
    }

    public function newAction()
    {
        $data['content'] = 'todo/edit';
        $data['action'] = '/todo/save';
        $this->_view->generate($data);

        return true;
    }

    public function editAction()
    {

        $data['content'] = 'todo/edit';
        $data['action'] = 'todo/save/';
        $this->_view->generate($data);

        return true;
    }
}