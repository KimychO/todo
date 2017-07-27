<?php
namespace Components;

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

    public function run()
    {
        $uri = $this->getRequestUri();

        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode("/", $internalRoute);

                $controllerName = ucfirst(array_shift($segments)) . "Controller";
                $actionName = array_shift($segments) . "Action";
                $controllerFile = CONTROLLER . $controllerName . ".php";

                $parameters = $segments;

                if(is_file($controllerFile)){
                    include_once($controllerFile);
                }

                $controllerObject = new $controllerName;
                $result = call_user_func_array([$controllerObject, $actionName], $parameters);
                if($result !== null ){
                    break;
                }

            }
        }
    }
}