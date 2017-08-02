<?php
namespace View;

class Todo
{

    /**
     * @param $template
     * @param null $data
     */
    public function generate($data = null, $template = 'index')
    {
        if (is_array($data)) {
            extract($data);
        }
        /** @noinspection PhpIncludeInspection */
        require_once(ROOT . '/app/templates/' . $template . '.phtml');
    }
}