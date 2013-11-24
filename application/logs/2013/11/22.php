<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-11-22 04:20:45 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_Parser' not found ~ APPPATH\classes\Controller\Video.php [ 13 ] in file:line
2013-11-22 04:20:45 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-22 04:30:13 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: video ~ APPPATH\views\templates\view.php [ 3 ] in D:\xampp\htdocs\application\views\templates\view.php:3
2013-11-22 04:30:13 --- DEBUG: #0 D:\xampp\htdocs\application\views\templates\view.php(3): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\xampp\htdocs...', 3, Array)
#1 D:\xampp\htdocs\system\classes\Kohana\View.php(61): include('D:\xampp\htdocs...')
#2 D:\xampp\htdocs\system\classes\Kohana\View.php(348): Kohana_View::capture('D:\xampp\htdocs...', Array)
#3 D:\xampp\htdocs\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 D:\xampp\htdocs\application\views\index.php(61): Kohana_View->__toString()
#5 D:\xampp\htdocs\system\classes\Kohana\View.php(61): include('D:\xampp\htdocs...')
#6 D:\xampp\htdocs\system\classes\Kohana\View.php(348): Kohana_View::capture('D:\xampp\htdocs...', Array)
#7 D:\xampp\htdocs\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 D:\xampp\htdocs\application\classes\Controller\Base\preDispatch.php(54): Kohana_Controller_Template->after()
#9 D:\xampp\htdocs\system\classes\Kohana\Controller.php(87): Controller_Base_preDispatch->after()
#10 [internal function]: Kohana_Controller->execute()
#11 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Video))
#12 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#15 {main} in D:\xampp\htdocs\application\views\templates\view.php:3
2013-11-22 04:30:32 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: videos ~ APPPATH\views\templates\index.php [ 21 ] in D:\xampp\htdocs\application\views\templates\index.php:21
2013-11-22 04:30:32 --- DEBUG: #0 D:\xampp\htdocs\application\views\templates\index.php(21): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\xampp\htdocs...', 21, Array)
#1 D:\xampp\htdocs\system\classes\Kohana\View.php(61): include('D:\xampp\htdocs...')
#2 D:\xampp\htdocs\system\classes\Kohana\View.php(348): Kohana_View::capture('D:\xampp\htdocs...', Array)
#3 D:\xampp\htdocs\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 D:\xampp\htdocs\application\views\index.php(61): Kohana_View->__toString()
#5 D:\xampp\htdocs\system\classes\Kohana\View.php(61): include('D:\xampp\htdocs...')
#6 D:\xampp\htdocs\system\classes\Kohana\View.php(348): Kohana_View::capture('D:\xampp\htdocs...', Array)
#7 D:\xampp\htdocs\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 D:\xampp\htdocs\application\classes\Controller\Base\preDispatch.php(54): Kohana_Controller_Template->after()
#9 D:\xampp\htdocs\system\classes\Kohana\Controller.php(87): Controller_Base_preDispatch->after()
#10 [internal function]: Kohana_Controller->execute()
#11 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Video))
#12 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#15 {main} in D:\xampp\htdocs\application\views\templates\index.php:21
2013-11-22 04:42:00 --- CRITICAL: ErrorException [ 1 ]: Allowed memory size of 134217728 bytes exhausted (tried to allocate 131596288 bytes) ~ APPPATH\classes\Controller\Video.php [ 103 ] in file:line
2013-11-22 04:42:00 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-22 04:51:35 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH\classes\Controller\Video.php [ 102 ] in D:\xampp\htdocs\application\classes\Controller\Video.php:102
2013-11-22 04:51:35 --- DEBUG: #0 D:\xampp\htdocs\application\classes\Controller\Video.php(102): Kohana_Core::error_handler(8, 'Trying to get p...', 'D:\xampp\htdocs...', 102, Array)
#1 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Video->action_grab()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Video))
#4 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#7 {main} in D:\xampp\htdocs\application\classes\Controller\Video.php:102
2013-11-22 04:51:46 --- CRITICAL: ErrorException [ 1 ]: Allowed memory size of 134217728 bytes exhausted (tried to allocate 57547862 bytes) ~ SYSPATH\classes\Kohana\Debug.php [ 173 ] in file:line
2013-11-22 04:51:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-22 04:52:54 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH\classes\Controller\Video.php [ 102 ] in D:\xampp\htdocs\application\classes\Controller\Video.php:102
2013-11-22 04:52:54 --- DEBUG: #0 D:\xampp\htdocs\application\classes\Controller\Video.php(102): Kohana_Core::error_handler(8, 'Trying to get p...', 'D:\xampp\htdocs...', 102, Array)
#1 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Video->action_grab()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Video))
#4 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#7 {main} in D:\xampp\htdocs\application\classes\Controller\Video.php:102
2013-11-22 04:53:03 --- CRITICAL: ErrorException [ 1 ]: Allowed memory size of 134217728 bytes exhausted (tried to allocate 57547862 bytes) ~ SYSPATH\classes\Kohana\Debug.php [ 173 ] in file:line
2013-11-22 04:53:03 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-22 05:17:28 --- CRITICAL: ErrorException [ 1 ]: Call to a member function find() on a non-object ~ APPPATH\classes\Controller\Video.php [ 185 ] in file:line
2013-11-22 05:17:28 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line