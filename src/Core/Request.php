<?php

namespace Dread\Htdocs\Core;

use Dread\Htdocs\Entity\Placement;
use Exception;

class Request extends Dictionary
{
    public function __construct()
    {
        $array = $_REQUEST;
        parent::__construct($array, true);
    }
}