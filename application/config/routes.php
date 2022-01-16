<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'Auth';

$route['auth'] = 'Auth';
$route['forget'] = 'Auth/forget';
$route['forgotpassword/(:any)/(:any)'] = 'Auth/forgotpassword/$1/$2';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
