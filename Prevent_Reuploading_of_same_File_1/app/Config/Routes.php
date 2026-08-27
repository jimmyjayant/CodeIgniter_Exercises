<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Reuploading::index');
$routes->get('index', 'Reuploading::index');
$routes->get('home', 'Reuploading::index');
$routes->post('upload', 'Reuploading::store');
