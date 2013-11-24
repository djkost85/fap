<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-11-23 22:09:10 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: additional ~ APPPATH\views\index.php [ 71 ] in D:\xampp\htdocs\application\views\index.php:71
2013-11-23 22:09:10 --- DEBUG: #0 D:\xampp\htdocs\application\views\index.php(71): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\xampp\htdocs...', 71, Array)
#1 D:\xampp\htdocs\system\classes\Kohana\View.php(61): include('D:\xampp\htdocs...')
#2 D:\xampp\htdocs\system\classes\Kohana\View.php(348): Kohana_View::capture('D:\xampp\htdocs...', Array)
#3 D:\xampp\htdocs\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#4 D:\xampp\htdocs\application\classes\Controller\Base\preDispatch.php(54): Kohana_Controller_Template->after()
#5 D:\xampp\htdocs\system\classes\Kohana\Controller.php(87): Controller_Base_preDispatch->after()
#6 [internal function]: Kohana_Controller->execute()
#7 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#8 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#11 {main} in D:\xampp\htdocs\application\views\index.php:71
2013-11-23 22:15:38 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\views\index.php [ 71 ] in file:line
2013-11-23 22:15:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-23 22:15:49 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'foreach' (T_FOREACH) ~ APPPATH\views\index.php [ 71 ] in file:line
2013-11-23 22:15:49 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-23 22:16:03 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'foreach' (T_FOREACH) ~ APPPATH\views\index.php [ 71 ] in file:line
2013-11-23 22:16:03 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line