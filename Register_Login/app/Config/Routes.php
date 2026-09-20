<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->setDefaultController('MainController');
$routes->setDefaultMethod('index');

$routes->get('/', 'MainController::index');
$routes->get('/index', 'MainController::index');
$routes->get('/home', 'MainController::index');
$routes->get('/register', 'MainController::register');
$routes->post('/register', 'MainController::addUser');
$routes->get('/login', 'MainController::login');
$routes->post('login', 'MainController::getUser');
$routes->get('logout', 'MainController::logOutUser');
$routes->set404Override('errors/custom_404');
