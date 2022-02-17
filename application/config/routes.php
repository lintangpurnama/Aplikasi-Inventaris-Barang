<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'Auth';

$route['dashboard'] = 'Admin_dashboard';
$route['auth'] = 'Auth';
$route['forget'] = 'Auth/forget';
$route['forgotpassword/(:any)/(:any)'] = 'Auth/forgotpassword/$1/$2';

//data departement
$route['departement'] = 'Admin_departement';
$route['departement/add'] = 'Admin_departement/create';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
