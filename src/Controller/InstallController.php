<?php

namespace Dread\Htdocs\Controller;

use Dread\Htdocs\Core\BaseController;
use Dread\Htdocs\Entity\Placement;

class InstallController extends BaseController
{
    public function index(Placement $placement)
    {
        $handler = ($_SERVER['SERVER_PORT'] === '443' ? 'https' : 'https').'://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/';
        $this->render(["placement" => $placement, "handler" => $handler], "InstallController.php");
    }
}