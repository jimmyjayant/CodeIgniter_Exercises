<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->setDefaultController('FileUpload');
$routes->setDefaultMethod('index');
$routes->get('/', 'FileUpload::index');
$routes->get('index', 'FileUpload::index');
$routes->get('home', 'FileUpload::index');
$routes->post('upload', 'FileUpload::store');
