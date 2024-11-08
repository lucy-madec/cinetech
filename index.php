<?php

require_once __DIR__ . '/vendor/autoload.php';

use Router\Router;

// Router initialization and request launch
$router = new Router();
$router->routeRequest();