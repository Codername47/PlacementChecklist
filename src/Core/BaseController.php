<?php

namespace Dread\Htdocs\Core;

use Dread\Htdocs\Entity\Placement;

abstract class BaseController implements ControllerInterface
{
    function index(Placement $placement)
    {
        // TODO: Implement index() method.
    }

    function edit(Placement $placement)
    {
        // TODO: Implement edit() method.
    }

    function view(Placement $placement)
    {
        // TODO: Implement view() method.
    }

    final function render(array $parameters, string $file)
    {
        require_once dirname(__DIR__)."/Template/".$file;
    }

}