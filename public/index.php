<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require __DIR__ . '/../bootstrap.php';

define('APPNAME', 'Coffee Shops in CanTho');

session_start();

$router = new \Bramus\Router\Router();

//Homepage routes
$router->get('/', '\App\Controllers\HomeController@index');
$router->get('/home', '\App\Controllers\HomeController@index');
$router->get('/search','\App\Controllers\HomeController@search');


//404
$router->set404('\App\Controllers\BaseController@pageNotFound' );


// Auth routes
$router->post('/logout', '\App\Controllers\Auth\LoginController@logout');
$router->get('/register', '\App\Controllers\Auth\RegisterController@showRegisterForm');
$router->post('/register', '\App\Controllers\Auth\RegisterController@register');
$router->get('/login', '\App\Controllers\Auth\LoginController@showLoginForm');
$router->post('/login', '\App\Controllers\Auth\LoginController@login');

//Shop routes
$router->get('/coffeeshops', '\App\Controllers\ShopController@index');
$router->get('/coffeeshops', '\App\Controllers\ShopController@paginate');
$router->get('/create_shop', '\App\Controllers\ShopController@showAddPage');
$router->post('/create_shop', '\App\Controllers\ShopController@create');
$router->get('/edit_shop/(\d+)','\App\Controllers\ShopController@showEditPage');
$router->post('/edit_shop/(\d+)','\App\Controllers\ShopController@edit');
$router->get('/detail_shop/(\d+)','\App\Controllers\ShopController@showDetailPage');
$router->get('/delete_shop/(\d+)','\App\Controllers\ShopController@delete');
$router->get('/shops/district/(\d+)', '\App\Controllers\ShopController@filterByDt');

$router->run();
