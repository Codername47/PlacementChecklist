<?php

namespace Dread\Htdocs\Core;

use Dread\Htdocs\Entity\Placement;
use Dread\Htdocs\Controller;

class Router implements RouterInterface
{
    private string $controllerName = 'MainController';
    private string $actionName = "index";
    private Request $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    function start()
    {


        $placement = new Placement($this->request);

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if ( !empty($routes[1]) )
        {
            $this->controllerName = explode("?", $routes[1])[0];
        }

        $this->actionName = $placement->getMode();


        $modelName = $this->controllerName;



        $controllerFile = $this->controllerName.'.php';


        $controllerPath = "./src/Controller/" .$controllerFile;
        if(!file_exists($controllerPath))
        {
            Router::ErrorPage404();
            return;
        }
        $controller_name_with_namespace = "\Dread\Htdocs\Controller\\".$this->controllerName;
        $controller = new $controller_name_with_namespace;
        $action = $this->actionName;
        if(method_exists($controller, $action))
        {
            $controller->$action($placement);
        }
        else
        {
            Router::ErrorPage404();
            return;
        }

    }
    static function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
        echo "404 not found";
    }
}