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
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['admin/bahan_postingan/up_bahan'] = 'admin/up_bahan';
$route['admin/bahan_postingan/bahan_post'] = 'admin/bahan_post';
$route['user/bahan_postingan/bahan_post'] = 'user/bahan_post';
$route['admin/pengumuman_upload_process'] = 'admin/pengumuman_upload_process';
$route['admin/pengumuman_upload'] = 'admin/pengumuman_upload';
$route['admin/pengumuman_list'] = 'admin/pengumuman_list';
$route['admin/pengumuman/delete/(:num)'] = 'admin/delete/$1';
$route['user/dftr_pengumuman'] = 'user/dftr_pengumuman';
$route['user/pemesanan/form_pemesanan'] = 'user/form_pemesanan';
$route['admin/pemesanan/list_pemesanan'] = 'admin/list_pesanan';



// $route['digital_marketing/posting_ig'] = 'digital_marketing/posting_ig';
// $route['digital_marketing/posting_tiktok'] = 'digital_marketing/posting_tiktok';
// $route['digital_marketing/posting_fb'] = 'digital_marketing/posting_fb';
// $route['digital_marketing/share_instagram'] = 'digital_marketing/share_instagram';
