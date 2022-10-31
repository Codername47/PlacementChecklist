<?php

use Dread\Htdocs\Core\Router;

require_once './vendor/autoload.php';

$router = new Router(new \Dread\Htdocs\Core\Request());
$router->start();