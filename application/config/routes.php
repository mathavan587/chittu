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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['register'] = 'welcome/register';
$route['signup'] = 'welcome/signup';
$route['verification'] = 'welcome/verification';
$route['verify'] = 'welcome/verify';
$route['login'] = 'welcome/login';

//auth controller
$route['auth'] = 'auth/login';

//user conntroller
$route['user'] = 'User/index';
$route['transaction'] = 'User/Transaction';
// $route['Statistics'] = 'User';
//user conntroller
$route['logout'] = 'User/logout';

//import api
$route['importServices'] = 'SmmController/importServices';
// $route['getServicesByCategory'] = 'user/getServicesByCategory';

$route['importServices_view'] = 'SmmController/importServices_view';


$route['user/placeOrder'] = 'user/placeOrder';
    

//admin conntroller
$route['admin'] = 'Admin/index';
$route['admin/user'] = 'Admin/user';
$route['services'] = 'Admin/services';
$route['status'] = 'Admin/status';
$route['update/service'] = 'Admin/updateService';
$route['edit/service/(:num)'] = 'Admin/editService/$1';
$route['edit/categorie/(:num)'] = 'Admin/editcategorie/$1';
$route['delete'] = 'Admin/delete';
$route['categorie/delete'] = 'Admin/delete_categorie';
$route['editcategories'] = 'Admin/editcategories';
$route['import'] = 'Admin/import';
$route['categories'] = 'Admin/categories';
$route['providers'] = 'Admin/providers';