<?php

namespace Dread\Htdocs\Controller;

use Dread\Htdocs\Core\BaseController;
use Dread\Htdocs\Core\ControllerInterface;
use Dread\Htdocs\Entity\Placement;

class MainController extends BaseController
{
    function index(Placement $placement)
    {
        $this->render([], "MainController.php");
    }

    function edit(Placement $placement)
    {
        $this->render(['placement' => $placement], "MainControllerEdit.php");
    }

    function view(Placement $placement)
    {
        $this->render(['placement' => $placement], "MainControllerView.php");
    }

}