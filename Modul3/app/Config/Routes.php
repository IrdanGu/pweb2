<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('lat01', 'Latihan0301::index');
$routes->get('salam', 'Latihan0302::formBiodata');  // Mengarah ke formBiodata
$routes->post('salam/store', 'Latihan0302::store');  // Menyimpan data dari form dan menampilkan salam
$routes->get('/alumni', 'Alumni::index');
$routes->get('/alumni/create', 'Alumni::create');
$routes->post('/alumni/store', 'Alumni::store');
