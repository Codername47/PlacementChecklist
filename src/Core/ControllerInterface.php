<?php

namespace Dread\Htdocs\Core;

use Dread\Htdocs\Entity\Placement;

interface ControllerInterface
{
    function index(Placement $placement);
    function edit(Placement $placement);
    function view(Placement $placement);
    function render(array $parameters, string $file);
}