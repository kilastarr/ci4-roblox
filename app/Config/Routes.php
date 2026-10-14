<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('roblox', 'Roblox::index');
$routes->get('roblox/create', 'Roblox::create');
$routes->post('roblox/store', 'Roblox::store');
$routes->get('roblox/edit/(:num)', 'Roblox::edit/$1');
$routes->post('roblox/update/(:num)', 'Roblox::update/$1');
$routes->get('roblox/delete/(:num)', 'Roblox::delete/$1');