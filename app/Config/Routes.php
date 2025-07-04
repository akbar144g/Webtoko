<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ROUTE BERANDA
$routes->get('/', 'Home::index', ['filter' => 'auth']);

// AUTH
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

// PRODUK
$routes->group('produk', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'ProdukController::index');
    $routes->post('', 'ProdukController::create');
    $routes->post('edit/(:any)', 'ProdukController::edit/$1');
    $routes->get('delete/(:any)', 'ProdukController::delete/$1');
    $routes->get('download', 'ProdukController::download');
});

// KERANJANG
$routes->group('keranjang', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'TransaksiController::index');
    $routes->post('', 'TransaksiController::cart_add');
    $routes->post('edit', 'TransaksiController::cart_edit');
    $routes->get('delete/(:any)', 'TransaksiController::cart_delete/$1');
    $routes->get('clear', 'TransaksiController::cart_clear');
});

// FAQ
$routes->get('faq', 'FaqController::index', ['filter' => 'auth']);

// DISKON (CRUD)
$routes->group('diskon', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'DiskonController::index');
    $routes->get('create', 'DiskonController::create');
    $routes->post('store', 'DiskonController::store');
    $routes->post('edit/(:num)', 'DiskonController::edit/$1');
    $routes->post('update/(:num)', 'DiskonController::update/$1');
    $routes->post('delete/(:num)', 'DiskonController::delete/$1');
});
