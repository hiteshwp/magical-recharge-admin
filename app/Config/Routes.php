<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->set404Override(function(){
    return view('404');
});
//$routes->setAutoRoute(true);

$routes->get('/clear-cache', function(){
    echo command('cache:clear');
});

$routes->get('/', 'LoginController::index');
$routes->post('/login', 'LoginController::login');
$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/logout', 'DashboardController::logout');
$routes->get('/forgot-password', 'LoginController::forgot_password');
$routes->get('/reset-password', 'LoginController::reset_password');
$routes->post('/reset-password', 'LoginController::do_reset_password');

// User Management
$routes->group('user', function ($routes) {
    $routes->get('create', 'UserController::create');
    $routes->get('list', 'UserController::index');
    $routes->get('deactive-list', 'UserController::deactive_user_list');
    $routes->post('store-user-data', 'UserController::store_user_data');
    $routes->post('act-get-state', 'UserController::get_state_data');
    $routes->post('act-get-city', 'UserController::get_city_data');
    $routes->post('get-user-list', 'UserController::get_ajax_user_list');
    $routes->get('select/(:num)', 'UserController::select_user/$1');
    $routes->post('update-user-data', 'UserController::update_user_data');
    $routes->post('delete-user-info', 'UserController::delete_user_data');
    $routes->post('get-user-deactive-list', 'UserController::get_ajax_user_deactive_list');
});


$routes->group("api", ["namespace"=> "App\Controllers\Api"], function ($routes) {
    
    // To Registration
    $routes->post('user-registration', 'ApiController::user_registration');
    $routes->post('user-login', 'ApiController::user_login');
    $routes->post('forgot-password', 'ApiController::forgot_password');
    $routes->post('new-password', 'ApiController::new_password');
});
