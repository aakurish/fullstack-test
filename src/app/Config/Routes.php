<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('/comments/', 'CommentController::getAll');
$routes->post('/comments/add', 'CommentController::add');
$routes->delete('/comments/(:num)', 'CommentController::delete/$1');
