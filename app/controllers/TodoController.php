<?php
namespace Controller;

use Model\Todo as Model;
use View\Todo as View;
use Model\Validator;

class TodoController
{
    protected $_model;
    protected $_view;

    public function __construct()
    {
        session_start();
        $_SESSION['messages'] = [];
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
        $data['header'] = "To-dos List";
        $this->_view->generate($data);

        return true;
    }

    public function newAction()
    {
        $data['todo'] = ['name' => "", "description" => ""];
        $data['content'] = 'todo/edit';
        $data['action'] = '/todo/save';
        $data['header'] = "Create New Todo";
        $this->_view->generate($data);

        return true;
    }

    public function saveAction($id = null)
    {
        if (isset($_POST['submit'])
            && Validator::validateText('Todo Name', $_POST['name'], 5)
        ) {
            $data = [
                'name'        => $_POST['name'],
                'description' => $_POST['description'],
            ];
            if ($id != null) {
                $data['id'] = $id;
                $this->_model->modifyTodo($data);

            } else {
                $this->_model->addTodo($data);
            }

        }
        header("Location: /");
        exit();
    }

    public function editAction($id)
    {
        $data['todo'] = $this->_model->getTodoById($id);
        $data['content'] = 'todo/edit';
        $data['header'] = "Editing of \"{$data['todo']['name']}\"";
        $data['action'] = '/todo/save/' . $id;
        $data['todoId'] = $id;
        $this->_view->generate($data, 'edit');

        return true;
    }

    public function removeAction($id)
    {
       $this->_model->deleteTodo($id);
        header("Location: /");
        exit();
    }
}