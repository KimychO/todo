<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = include(CONF . 'routes.php');
    }

    /**
     * returns request URI
     * @return string
     */
    protected function getRequestUri()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    public static function show404()
    {
        header("HTTP/1.0 404 Not Found");
        require_once(ROOT . '/app/templates/404.phtml');
    }

    public function run()
    {
        $uri = $this->getRequestUri();

        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode("/", $internalRoute);

                $controllerName = ucfirst(array_shift($segments)) . "Controller";
                $actionName = array_shift($segments) . "Action";
                $parameters = $segments;

                $controllerName = '\\Controller\\' . $controllerName;
                $controllerObject = new $controllerName;
                if (!is_callable([$controllerObject, $actionName])) {
                    self::show404();
                    return;
                }
                $result = call_user_func_array([$controllerObject, $actionName], $parameters);
                if ($result !== null) {
                    break;
                }
            }
        }
        if (isset($result) && $result == null) {
            self::show404();
        }
    }
}