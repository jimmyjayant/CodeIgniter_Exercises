<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'FileUpload::index');
$routes->get('index', 'FileUpload::index');
$routes->post('upload', 'FileUpload::store');
