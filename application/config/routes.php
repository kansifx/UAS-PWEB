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
$route['default_controller'] = 'landingpage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['save_progress\.php'] = 'progress/save';
$route['get_progress\.php'] = 'progress/get';
$route['admin/dashboard'] = 'admin/dashboard';
$route['admin/mentors'] = 'admin/mentors';
$route['admin/create_mentor'] = 'admin/create_mentor';
$route['admin/store_mentor'] = 'admin/store_mentor';
$route['admin/edit_mentor/(:num)'] = 'admin/edit_mentor/$1';
$route['admin/update_mentor/(:num)'] = 'admin/update_mentor/$1';
$route['admin/delete_mentor/(:num)'] = 'admin/delete_mentor/$1';
$route['admin/members'] = 'admin/members';
$route['admin/search_members'] = 'admin/search_members';
$route['admin/member_detail/(:num)'] = 'admin/member_detail/$1';
$route['admin/delete_member/(:num)'] = 'admin/delete_member/$1';
$route['admin/transactions'] = 'admin/transactions';
$route['admin/search_transactions'] = 'admin/search_transactions';
$route['admin/grant_premium/(:num)'] = 'admin/grant_premium/$1';
$route['admin/search_mentors'] = 'admin/search_mentors';
$route['mentor/dashboard'] = 'mentor/dashboard';
$route['mentor/modules'] = 'mentor/modules';
$route['mentor/edit_module/(:any)'] = 'mentor/edit_module/$1';
$route['mentor/update_module/(:any)'] = 'mentor/update_module/$1';
$route['mentor/add_video/(:any)'] = 'mentor/add_video/$1';
$route['mentor/delete_video/(:num)'] = 'mentor/delete_video/$1';
$route['mentor/premium_members'] = 'mentor/premium_members';
$route['mentor/premium_member_detail/(:num)'] = 'mentor/premium_member_detail/$1';
$route['mentor/change_password'] = 'mentor/change_password';
$route['mentor/update_password'] = 'mentor/update_password';
$route['mentor/chat'] = 'mentor/chat';
$route['mentor/chat/(:num)'] = 'mentor/chat/$1';
$route['mentor/chat_api/list'] = 'mentor/chat_api_list';
$route['mentor/chat_api/messages/(:num)'] = 'mentor/chat_api_messages/$1';
$route['mentor/chat_api/send'] = 'mentor/chat_api_send';
$route['mentor/chat_api/delete/(:num)'] = 'mentor/chat_api_delete/$1';
$route['mentor/chat_api/read/(:num)'] = 'mentor/chat_api_read/$1';
$route['payment'] = 'payment/index';
$route['payment/process'] = 'payment/process';
$route['settings/update_account'] = 'settings/update_account';
$route['settings/change_password'] = 'settings/change_password';
$route['settings/delete_account'] = 'settings/delete_account';
$route['certificate/download/(:any)'] = 'certificate/download/$1';
$route['chatbot/ask'] = 'chatbot/ask';
$route['chat'] = 'chat/index';
$route['chat/api/conversations'] = 'chat/api_conversations';
$route['chat/api/messages/(:num)'] = 'chat/api_messages/$1';
$route['chat/api/send'] = 'chat/api_send';
$route['chat/api/delete/(:num)'] = 'chat/api_delete/$1';
$route['chat/api/unread'] = 'chat/api_unread';
$route['codeeditor'] = 'codeeditor/index';
$route['codeeditor/run'] = 'codeeditor/run';
