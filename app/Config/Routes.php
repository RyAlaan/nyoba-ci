<?php

use App\Controllers\OrderController;
use App\Controllers\Private\CartController;
use App\Controllers\Private\DashboardCategory;
use App\Controllers\Private\DashboardController;
use App\Controllers\Private\DashboardProduct;
use App\Controllers\Private\DashboardUser;
use App\Controllers\ProfileController;
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

$routes->group('auth', ['filter' => 'guestFilter'], function ($routes) {
    $routes->get('login', 'AuthController::LoginPage');
    $routes->post('login', 'AuthController::Login');

    $routes->get('register', 'AuthController::RegisterPage');
    $routes->post('register', 'AuthController::Register');
});

$routes->group('/', ['filter' => 'authFilter'], function ($routes) {
    $routes->group('carts', function ($routes) {
        $routes->get('/', [CartController::class, 'index']);
        $routes->post('add-to-cart', [CartController::class, 'create']);
        $routes->post('order', [CartController::class, 'order']);
        $routes->delete('delete/(:num)', [CartController::class, 'delete/$1']);
    });

    $routes->get('profile', [ProfileController::class, 'index']);
    $routes->put('profile', [ProfileController::class, 'update']);

    $routes->get('orders', [OrderController::class, 'index']);
    $routes->get('orders/(:any)', [OrderController::class, 'show/$1']);

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
