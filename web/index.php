<?php
session_start();
use Motork\CarController;

require_once __DIR__.'/../src/bootstrap.php';
$controller = CarController::create();

$urlParts = parse_url($_SERVER['REQUEST_URI']);

$tab = explode('/',$urlParts['path']);

if (preg_match('#/detail/([^/]+)$#i', $urlParts['path'], $matches)) {
    $controller->getDetail($matches[1]);
} elseif(strpos($urlParts['path'],'process') !== false) {
    $controller->process();
} else {
    $controller->getIndex();
}

