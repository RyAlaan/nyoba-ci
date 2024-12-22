<?php

use App\Controllers\Private\CategoryController;
use App\Controllers\Private\DashboardController;
use App\Controllers\Private\UserController;
use App\Controllers\Public\HomeController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [HomeController::class, 'index']);

$routes->group('/', ['filter' => 'authFilter'], function ($routes) {
    $routes->get('auth/logout', 'AuthController::Logout');
});

$routes->group('dashboard', ['filter' => 'adminFilter'], function ($routes) {
    $routes->get('/', [DashboardController::class, 'index']);

    $routes->get('customers', [UserController::class, 'index']);

    $routes->group('categories', function ($routes) {
        $routes->get('/', [CategoryController::class, 'index']);
        $routes->post('/', [CategoryController::class, 'addCategory']);

        $routes->get('/{category_id}', [CategoryController::class, 'editCategory']);
        $routes->delete('/{category_id}', [CategoryController::class, 'deleteCategory']);
    });
});

$routes->group('auth', ['filter' => 'guestFilter'], function ($routes) {
    $routes->get('login', 'AuthController::LoginPage');
    $routes->post('login', 'AuthController::Login');

    $routes->get('register', 'AuthController::RegisterPage');
    $routes->post('register', 'AuthController::Register');
});
