<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['login'] = 'login/form';
$route['login/aksi_login'] = 'login/aksi_login';
$route['logout'] = 'login/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
