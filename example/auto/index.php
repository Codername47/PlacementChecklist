<?php
define("PATH", __DIR__);
$_SERVER['APP_ROOT'] = "";
define("ROOT_DIR", $_SERVER['CONTEXT_DOCUMENT_ROOT'].($_SERVER['APP_ROOT']?$_SERVER['APP_ROOT']:''));
require_once(ROOT_DIR.'/index.php');
