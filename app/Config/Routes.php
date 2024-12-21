<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->group('/', ['filter' => 'authFilter'], function ($routes) {
    $routes->get('auth/logout', 'AuthController::Logout');
});

$routes->group('auth', ['filter' => 'guestFilter'], function ($routes) {
    $routes->get('login', 'AuthController::LoginPage');
    $routes->post('login', 'AuthController::Login');

    $routes->get('register', 'AuthController::RegisterPage');
    $routes->post('register', 'AuthController::Register');
});
