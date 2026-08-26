<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'FormValidation::index');
$routes->get('index', 'FormValidation::index');
$routes->post('login', 'FormValidation::login');
