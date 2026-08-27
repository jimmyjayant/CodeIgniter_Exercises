<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'MultipleUpload::index');
$routes->get('index', 'MultipleUpload::index');
$routes->get('home', 'MultipleUpload::index');
$routes->post('upload', 'MultipleUpload::store');
