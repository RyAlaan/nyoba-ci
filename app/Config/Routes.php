<?php

use App\Controllers\Private\CategoryController;
use App\Controllers\Private\DashboardController;
use App\Controllers\Private\ProductController;
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
        $routes->post('/', [CategoryController::class, 'create']);
        $routes->get('/edit/(:any)', [CategoryController::class, 'edit/$1']);
        $routes->post('/edit/(:any)', [CategoryController::class, 'update/$1']);
        $routes->delete('/delete/(:num)', [CategoryController::class, 'delete/$1']);
    });
    
    $routes->group('products', function ($routes) {
        $routes->get('/', [ProductController::class, 'index']);
        $routes->get('add', [ProductController::class, 'create']);
        $routes->post('add', [ProductController::class, 'store']);
        $routes->get('edit/(:any)', [ProductController::class, 'edit/$1']);
        $routes->post('edit/(:any)', [ProductController::class, 'update/$1']);
        $routes->delete('delete/(:num)', [ProductController::class, 'delete/$1']);
    });
});

$routes->group('auth', ['filter' => 'guestFilter'], function ($routes) {
    $routes->get('login', 'AuthController::LoginPage');
    $routes->post('login', 'AuthController::Login');

    $routes->get('register', 'AuthController::RegisterPage');
    $routes->post('register', 'AuthController::Register');
});
