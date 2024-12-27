<?php

use App\Controllers\Private\CartController;
use App\Controllers\Private\DashboardCategory;
use App\Controllers\Private\DashboardController;
use App\Controllers\Private\DashboardProduct;
use App\Controllers\Private\DashboardUser;
use App\Controllers\Public\HomeController;
use App\Controllers\Public\ProductController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [HomeController::class, 'index']);

$routes->group('product', function ($routes) {
    $routes->get('/', [ProductController::class, 'index']);
    $routes->get('(:any)', [ProductController::class, 'show']);
});

$routes->group('carts', function($routes) {
    $routes->get('/', [CartController::class, 'index']);
});

$routes->group('/', ['filter' => 'authFilter'], function ($routes) {
    $routes->get('auth/logout', 'AuthController::Logout');
});

$routes->group('dashboard', ['filter' => 'adminFilter'], function ($routes) {
    $routes->get('/', [DashboardController::class, 'index']);
    $routes->get('customers', [DashboardUser::class, 'index']);

    $routes->group('categories', function ($routes) {
        $routes->get('/', [DashboardCategory::class, 'index']);
        $routes->post('/', [DashboardCategory::class, 'create']);
        $routes->get('(:any)', [DashboardCategory::class, 'edit/$1']);
        $routes->post('(:any)', [DashboardCategory::class, 'update/$1']);
        $routes->delete('(:num)', [DashboardCategory::class, 'delete/$1']);
    });

    $routes->group('products', function ($routes) {
        $routes->get('/', [DashboardProduct::class, 'index']);
        $routes->get('add', [DashboardProduct::class, 'create']);
        $routes->post('add', [DashboardProduct::class, 'store']);
        $routes->get('(:any)', [DashboardProduct::class, 'edit/$1']);
        $routes->post('(:any)', [DashboardProduct::class, 'update/$1']);
        $routes->delete('(:any)', [DashboardProduct::class, 'delete/$1']);
    });
});

$routes->group('auth', ['filter' => 'guestFilter'], function ($routes) {
    $routes->get('login', 'AuthController::LoginPage');
    $routes->post('login', 'AuthController::Login');

    $routes->get('register', 'AuthController::RegisterPage');
    $routes->post('register', 'AuthController::Register');
});
