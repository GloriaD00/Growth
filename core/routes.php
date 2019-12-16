<?php
$router=new Router();


$router->get("", "PagesController@hme");
$router->get("signup", "PagesController@signup");
$router->post('register', 'SignUpController@extract');
$router->get('login', 'PagesController@login');
$router->post('login/log', 'LoginController@extract');
$router->get('user/home','UserController@load');
$router->post('proj/add', 'UserController@Add');
$router->get('project', 'ProjectController@load');
$router->get('user/project/view', 'ProjectController@view');
$router->get('user/project/delete', 'ProjectController@delete');
$router->post('proj/share','ProjectController@Share');
$router->post('lista/add','ProjectController@Add');
$router->post('task/add','ListController@Add');
$router->get('something-went-wrong','PagesController@SWR');
$router->get('success', 'PagesController@success');
$router->post('proj/modify','ProjectController@Modify');
$router->get('profile', 'PagesController@Profile');
$router->post('change-pass','UserController@ChangePass');
$router->post('change-email','UserController@EmailChange');
$router->get('success-change', 'PagesController@SuccessChange');
$router->get('logout','UserController@logout');
$router->get('task/delete', 'TaskController@delete');
$router->post('task/move','TaskController@move');
$router->post('lista/edit','ListController@edit');
$router->get('lista/del', 'ListController@Delete');
$router->get('task/complete','TaskController@complete');
$router->get('user/delete','UserController@deleteUser');
