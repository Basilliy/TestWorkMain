<?php

define('__ROOT__', dirname(dirname(__FILE__)));
define('__ROOT_HOST__', $_SERVER['HTTP_HOST']);

include (__ROOT__.'/route/router.php');

use route\Router;

$response = Router::runRequest($_SERVER['REQUEST_URI']);

echo $response;
