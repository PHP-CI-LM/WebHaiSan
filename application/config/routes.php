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

// Test url
$route['gglogin'] = 'Account/gg_authenticate';

// Client pages route
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;
$route['chinh-sach.html'] = 'Home/policy';
$route['product/(:any).html'] = 'Product/index/$1';
$route['category/ca-bien.html'] = 'category/index/1';
$route['category/tom.html'] = 'category/index/3';
$route['category/muc.html'] = 'category/index/4';
$route['category/so.html'] = 'category/index/7';
$route['category/oc.html'] = 'category/index/8';
$route['dang-nhap.html'] = 'Account/login';
$route['dang-xuat.html'] = 'Account/logout';
$route['dang-ky-thanh-vien.html'] = 'Account/signup';
$route['gio-hang.html'] = 'Cart';
$route['catalog/(:any).html'] = 'Catalog/index/$1';
$route['thanh-toan.html'] = 'Payment/index';
$route['xac-nhan-thanh-toan.html']['POST'] = 'Payment/confirm';
$route['tim-kiem.html'] = 'Product/find';
$route['user/thong-tin-tai-khoan.html']['GET'] = 'Account/index';
$route['user/thong-tin-tai-khoan.html/(:num)']['POST'] = 'Account/updateInfomation/$1';
$route['user/thong-tin-tai-khoan.html/avatar/(:num)']['POST'] = 'Account/uploadAvatar/$1';
$route['ket-qua-dat-hang.html'] = 'Payment/result';
$route['kiem-tra-don-hang.html'] = 'Order/index';
$route['comment']['POST'] = 'Comment/add';
$route['fblogin'] = 'User_authentication/index';
$route['comments']['get'] = 'Comment/getListcomment';

// admin pages route
$route['ci-admin'] = 'admin_controller/admin/index';
$route['ci-admin/login.html']['get'] = 'admin_controller/admin/index';
$route['ci-admin/logout.html']['get'] = 'admin_controller/admin/logout';
$route['ci-admin/login.html']['post'] = 'admin_controller/admin/login';
$route['ci-admin/product.html']['get'] = 'admin_controller/product';
$route['ci-admin/product_(:num).html']['get'] = 'admin_controller/product/index/$1';
$route['ci-admin/order.html'] = 'admin_controller/order';
$route['ci-admin/user.html'] = 'admin_controller/user';
$route['ci-admin/add-product.html']['get'] = 'admin_controller/product/loadviewform';
$route['ci-admin/add-product.html']['post'] = 'admin_controller/product/addProduct';
$route['ci-admin/update-product.html/(:any)'] = 'admin_controller/product/loadviewform/$1';
$route['ci-admin/update-product.html/(:any)/save'] = 'admin_controller/product/UpdateProduct/$1';
$route['ci-admin/delete-product.html/save']['post'] = 'admin_controller/product/DeleteProduct';
$route['ci-admin/fill-product.html']['post'] = 'admin_controller/product/FillProduct';
$route['ci-admin/comment.html'] = 'admin_controller/comment';
$route['ci-admin/comment/filter.html']['get'] = 'admin_controller/comment/filter';
