<?php

/**
 * Router try to substitute the Controller's path
 * but if the router and action specify in format 'Controller@Action'
 * the Router will try to to find the Controller only in App\Controllers folder.
 * If You need something else then just specify controller with fullpath
 */

use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\LogoutController;
use App\Controllers\Auth\RegisterController;

$router->add('/', ['HomeController', 'index']);
$router->add('/login', LoginController::class);
$router->add('/logout', LogoutController::class);
$router->add('/register', RegisterController::class);
