<?php

// use App\Controllers\HomeController;

$router->add('/', 'HomeController@index');
$router->add('/login', 'AuthController@login');
$router->add('/logout', 'AuthController@logout');
