<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'CRUDDBController::index');
$routes->get('index', 'CRUDDBController::index');
$routes->get('home', 'CRUDDBController::index');
$routes->get('create', 'CRUDDBController::create');
$routes->post('store', 'CRUDDBController::store');
$routes->get('edit/(:num)', 'CRUDDBController::edit/$1');
$routes->get('delete/(:num)', 'CRUDDBController::delete/$1');
$routes->post('update/(:num)', 'CRUDDBController::update/$1');

$routes->set404Override(function() {
    return view("errors/custom_404");
});
