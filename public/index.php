<?php
$breakpoint = true;
require_once __DIR__ . '/../vendor/autoload.php';


use Core\Router;

session_start();

$router = new Router();

require_once __DIR__ . '/../config/routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->dispatch($uri);
