<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = 'cmserror/pagenotfound';
$route['translate_uri_dashes'] = FALSE;
$route['console'] = 'console';
$route['member/language/(:any)'] = 'member/language/switch/$1';
$route['member'] = 'member';
$route['(\w{2})/ajax/forms/enquiries'] = 'ajax/forms/enquiries';
$route['(\w{2})/ajax/residences/index'] = 'ajax/residences/index';
$route['(\w{2})/register'] = 'register/index';
$route['(\w{2})/pagenotfound'] = 'cmserror/pagenotfound';
$route['(\w{2})/news/(:any)'] = 'news/category/$2';
$route['(\w{2})/news/(:any)/(:any)'] = 'news/index/$3';
$route['(\w{2})/board/(:any)'] = 'board/index/$2';
$route['(\w{2})/residences/(:any)'] = 'residences/index/$2';
$route['(\w{2})/(:any)'] = 'home/index/$2';
$route['(\w{2})'] = $route['default_controller'];
$route['ajax'] = 'ajax';
$route['register'] = 'register/index';
$route['pagenotfound'] = 'cmserror/pagenotfound';
$route['news/(:any)'] = 'news/category/$1';
$route['news/(:any)/(:any)'] = 'news/index/$2';
$route['board/(:any)'] = 'board/index/$1';
$route['residences/(:any)'] = 'residences/index/$1';
$route['(:any)'] = 'home/index/$1';
