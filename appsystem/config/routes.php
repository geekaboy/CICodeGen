<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login';
// $route['register'] = 'website/register';
$route['404_override'] = 'website/home/content_not_found';
$route['translate_uri_dashes'] = FALSE;
