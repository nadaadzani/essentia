<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Home
$routes->get('/', 'Home::index');

// Authentication
$routes->get('/register', 'Users\Register::index');
$routes->post('/register/save', 'Users\Register::save');
$routes->get('/login', 'Users\Login::index');
$routes->post('/login/auth', 'Users\Login::auth');

// Products
$routes->get('/products/add', 'Products::index/$1');
$routes->post('/products/save', 'Products::save');
$routes->get('/products/edit/(:segment)', 'Products::edit/$1');
$routes->post('/products/update/(:segment)', 'Products::update/$1');

// Add shopping item to cart
$routes->get('/products/shop-cart', 'Products::shopCart');
$routes->post('/products/add-cart/', 'Products::add');
// Checkout

// Shop history
$routes->get('/shop-history', 'History::index');
