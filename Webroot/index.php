<?php

namespace My_MVC\Webroot;
use My_MVC\Router;
use My_MVC\Config\Core;
use My_MVC\Request;
use My_MVC\Dispatcher;

require __DIR__ . '/../vendor/autoload.php';

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));


$dispatch = new Dispatcher();
$dispatch->dispatch();

?>