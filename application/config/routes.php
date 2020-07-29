<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

$route['students'] = 'page/students_login';
$route['students/login/(:any)'] = 'page/students_login/$1';
$route['students/login'] = 'page/students_login';
//temporay interfacce for students
$route['id/(:any)'] = 'idcard/gateway/$1';
$route['sign_in'] = 'page/sign_in';
$route['staff/login'] = 'page/staff_login';
$route['staff'] = 'staff/dashboard';
$route['staff/index'] = 'staff/dashboard';
$route['staff/login/(:any)'] = 'page/staff_login/$1';

$route['parents/login'] = 'page/parents_login';
$route['parent'] = 'parents/dashboard';
$route['parents'] = 'parents/dashboard';
$route['parents/index'] = 'parents/dashboard';
$route['parents/login/(:any)'] = 'page/parents_login/$1';

$address = $_SERVER['HTTP_HOST'];
if (
    $address == WEB_BASE_URL ||
    in_array($address, ['127.0.0.1', 'localhost'])
) {
    $route['pricing'] = 'page/pricing';
    $route['login'] = 'page/login';
    $route['Login'] = 'page/login';
    $route['register'] = 'page/register';
    $route['Register'] = 'page/register';
    $route['web_dashboard'] = 'web_dashboard/index';

    $route['default_controller'] = 'page';

    $route['contact_us'] = 'page/contact_us';

    $route['404_override'] = '';
    $route['translate_uri_dashes'] = false;
} else {
    $route['(:any)'] = 'subwebsite/index/$1';
    $route['(:any)/(:any)'] = 'subwebsite/index/$1';

    $route['default_controller'] = 'subwebsite';
    $route['404_override'] = '';
    $route['translate_uri_dashes'] = false;
}