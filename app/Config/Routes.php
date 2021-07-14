<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ['filter' => 'authAdmin']);

// Auth Routes
$routes->get('/login', 'Login::index', ['filter' => 'noauth']);
// $routes->post('/admin/checkAuth', 'Admin\Home::checkAuth');
$routes->get('/getHash/(:any)', 'Login::getHash/$1');
$routes->get('logout', 'Login::logout');

// patients Routes
$routes->post('/patients/store_patient', 'Home::store', ['filter' => 'authAdmin']);
$routes->post('/patients/get_data_patients', 'Home::get_data_patients', ['filter' => 'authAdmin']);
$routes->get('/patients/(:num)', 'Home::show/$1', ['filter' => 'authAdmin']);
$routes->post('/patients/update_patient', 'Home::update', ['filter' => 'authAdmin']);
$routes->post('/patients/delete_patient', 'Home::delete', ['filter' => 'authAdmin']);
$routes->post('/patients/add_image/(:num)', 'Home::add_image/$1', ['filter' => 'authAdmin']);
$routes->post('/patients/delete_image', 'Home::delete_image', ['filter' => 'authAdmin']);
$routes->get('/patients/(:num)/classification', 'Home::classification/$1', ['filter' => 'authAdmin']);
$routes->get('/patients/(:num)/segmentation', 'Home::segmentation/$1', ['filter' => 'authAdmin']);
$routes->post('/patients/rciu_check', 'Home::rciu_check', ['filter' => 'authAdmin']);

$routes->get('/patients/testUpload_client', 'Home::testUpload_client');
$routes->post('/patients/testUpload_server', 'Home::testUpload_server');

// other Routes
$routes->get('/analytics', 'Home::analytics', ['filter' => 'authAdmin']);
$routes->get('/literature', 'Home::literature', ['filter' => 'authAdmin']);
$routes->get('/reports', 'Home::reports', ['filter' => 'authAdmin']);


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
