<?php

require_once __DIR__ . '/src/models/ApiModel.php';
require_once __DIR__ . '/src/controllers/HomeController.php';

use Controllers\HomeController;

$controller = new HomeController();
$controller->index();