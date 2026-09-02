<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'FileUpload::index');
$routes->get('home', 'FileUpload::index');
$routes->get('index', 'FileUpload::index');
$routes->get('create', 'FileUpload::create');
$routes->post('save', 'FileUpload::store');
$routes->get('edit/(:num)', 'FileUpload::edit/$1');
$routes->post('update/(:num)', 'FileUpload::update/$1');
$routes->get('delete/(:num)', 'FileUpload::delete/$1');
$routes->get('download/(:num)', 'FileUpload::download/$1');
$routes->get('view/(:num)', 'FileUpload::view/$1');
