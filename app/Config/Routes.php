<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'LoginController::index');
$routes->post('/login', 'LoginController::login');
$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/logout', 'DashboardController::logout');
$routes->get('/forgot-password', 'LoginController::forgot_password');

$routes->get('/dashboard', 'DashboardController::index');

// User Management
$routes->group('user', static function ($routes) {
    $routes->get('create', 'UserController::create');
    $routes->get('list', 'UserController::index');
    $routes->get('deactive-user-list', 'UserController::deactive_user_list');
});
