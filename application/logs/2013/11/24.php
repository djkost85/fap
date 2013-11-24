<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-11-24 00:46:38 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '(' ~ APPPATH\classes\Controller\Like.php [ 8 ] in file:line
2013-11-24 00:46:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-24 00:46:52 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '(' ~ APPPATH\classes\Controller\Like.php [ 8 ] in file:line
2013-11-24 00:46:52 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-24 01:09:50 --- CRITICAL: ErrorException [ 1 ]: Class 'Like' not found ~ APPPATH\classes\Controller\Like.php [ 18 ] in file:line
2013-11-24 01:09:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-24 01:19:10 --- CRITICAL: ErrorException [ 8 ]: Undefined index: likes ~ APPPATH\classes\Model\Like.php [ 11 ] in D:\xampp\htdocs\application\classes\Model\Like.php:11
2013-11-24 01:19:10 --- DEBUG: #0 D:\xampp\htdocs\application\classes\Model\Like.php(11): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\xampp\htdocs...', 11, Array)
#1 D:\xampp\htdocs\application\classes\Controller\Like.php(19): Model_Like->likeVideo(0, 1)
#2 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Like->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Like))
#5 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#8 {main} in D:\xampp\htdocs\application\classes\Model\Like.php:11
2013-11-24 01:19:44 --- CRITICAL: ErrorException [ 8 ]: Undefined index: likes ~ APPPATH\classes\Model\Like.php [ 11 ] in D:\xampp\htdocs\application\classes\Model\Like.php:11
2013-11-24 01:19:44 --- DEBUG: #0 D:\xampp\htdocs\application\classes\Model\Like.php(11): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\xampp\htdocs...', 11, Array)
#1 D:\xampp\htdocs\application\classes\Controller\Like.php(19): Model_Like->likeVideo(0, 1)
#2 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Like->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Like))
#5 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#8 {main} in D:\xampp\htdocs\application\classes\Model\Like.php:11
2013-11-24 01:19:58 --- CRITICAL: ErrorException [ 8 ]: Undefined index: likes ~ APPPATH\classes\Model\Like.php [ 11 ] in D:\xampp\htdocs\application\classes\Model\Like.php:11
2013-11-24 01:19:58 --- DEBUG: #0 D:\xampp\htdocs\application\classes\Model\Like.php(11): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\xampp\htdocs...', 11, Array)
#1 D:\xampp\htdocs\application\classes\Controller\Like.php(19): Model_Like->likeVideo(0, 1)
#2 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Like->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Like))
#5 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#8 {main} in D:\xampp\htdocs\application\classes\Model\Like.php:11
2013-11-24 01:20:00 --- CRITICAL: ErrorException [ 8 ]: Undefined index: likes ~ APPPATH\classes\Model\Like.php [ 11 ] in D:\xampp\htdocs\application\classes\Model\Like.php:11
2013-11-24 01:20:00 --- DEBUG: #0 D:\xampp\htdocs\application\classes\Model\Like.php(11): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\xampp\htdocs...', 11, Array)
#1 D:\xampp\htdocs\application\classes\Controller\Like.php(19): Model_Like->likeVideo(0, 1)
#2 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Like->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Like))
#5 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#8 {main} in D:\xampp\htdocs\application\classes\Model\Like.php:11
2013-11-24 01:20:41 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: user ~ APPPATH\classes\Model\Like.php [ 23 ] in D:\xampp\htdocs\application\classes\Model\Like.php:23
2013-11-24 01:20:41 --- DEBUG: #0 D:\xampp\htdocs\application\classes\Model\Like.php(23): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\xampp\htdocs...', 23, Array)
#1 D:\xampp\htdocs\application\classes\Controller\Like.php(19): Model_Like->likeVideo(0, 1)
#2 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Like->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Like))
#5 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#8 {main} in D:\xampp\htdocs\application\classes\Model\Like.php:23
2013-11-24 01:24:35 --- CRITICAL: ErrorException [ 2 ]: mysqli_report() expects exactly 1 parameter, 0 given ~ APPPATH\classes\Model\Like.php [ 29 ] in file:line
2013-11-24 01:24:35 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'mysqli_report()...', 'D:\xampp\htdocs...', 29, Array)
#1 D:\xampp\htdocs\application\classes\Model\Like.php(29): mysqli_report()
#2 D:\xampp\htdocs\application\classes\Controller\Like.php(19): Model_Like->likeVideo(0, 1)
#3 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Like->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Like))
#6 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2013-11-24 01:32:40 --- CRITICAL: ErrorException [ 8 ]: Undefined index: id ~ APPPATH\classes\Model\Like.php [ 31 ] in D:\xampp\htdocs\application\classes\Model\Like.php:31
2013-11-24 01:32:40 --- DEBUG: #0 D:\xampp\htdocs\application\classes\Model\Like.php(31): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\xampp\htdocs...', 31, Array)
#1 D:\xampp\htdocs\application\classes\Controller\Like.php(19): Model_Like->likeVideo(0, 1)
#2 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Like->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Like))
#5 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#8 {main} in D:\xampp\htdocs\application\classes\Model\Like.php:31
2013-11-24 01:35:32 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'users_likes' in 'field list' [ SELECT `likes`, `users_likes` FROM `videos` WHERE `id` = 1 ] ~ MODPATH\database\classes\Database\MySQLi.php [ 172 ] in D:\xampp\htdocs\modules\database\classes\Kohana\Database\Query.php:251
2013-11-24 01:35:32 --- DEBUG: #0 D:\xampp\htdocs\modules\database\classes\Kohana\Database\Query.php(251): Database_MySQLi->query(1, 'SELECT `likes`,...', false, Array)
#1 D:\xampp\htdocs\application\classes\Model\Like.php(10): Kohana_Database_Query->execute()
#2 D:\xampp\htdocs\application\classes\Controller\Like.php(19): Model_Like->likeVideo(0, 1)
#3 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Like->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Like))
#6 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#9 {main} in D:\xampp\htdocs\modules\database\classes\Kohana\Database\Query.php:251
2013-11-24 01:39:46 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'status' (T_STRING), expecting variable (T_VARIABLE) or '$' ~ APPPATH\classes\Model\Like.php [ 34 ] in file:line
2013-11-24 01:39:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-24 01:53:25 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: users_who_like ~ APPPATH\classes\Model\Like.php [ 22 ] in D:\xampp\htdocs\application\classes\Model\Like.php:22
2013-11-24 01:53:25 --- DEBUG: #0 D:\xampp\htdocs\application\classes\Model\Like.php(22): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\xampp\htdocs...', 22, Array)
#1 D:\xampp\htdocs\application\classes\Controller\Like.php(19): Model_Like->likeVideo(0, 1)
#2 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Like->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Like))
#5 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#8 {main} in D:\xampp\htdocs\application\classes\Model\Like.php:22
2013-11-24 02:04:36 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH\classes\Model\Video.php [ 172 ] in D:\xampp\htdocs\application\classes\Model\Video.php:172
2013-11-24 02:04:36 --- DEBUG: #0 D:\xampp\htdocs\application\classes\Model\Video.php(172): Kohana_Core::error_handler(8, 'Trying to get p...', 'D:\xampp\htdocs...', 172, Array)
#1 D:\xampp\htdocs\application\classes\Controller\Video.php(81): Model_Video->getVideoByTitle('hysterical-lite...')
#2 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Video->action_view()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Video))
#5 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#8 {main} in D:\xampp\htdocs\application\classes\Model\Video.php:172
2013-11-24 02:05:35 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: user ~ APPPATH\classes\Model\Video.php [ 172 ] in D:\xampp\htdocs\application\classes\Model\Video.php:172
2013-11-24 02:05:35 --- DEBUG: #0 D:\xampp\htdocs\application\classes\Model\Video.php(172): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\xampp\htdocs...', 172, Array)
#1 D:\xampp\htdocs\application\classes\Controller\Video.php(81): Model_Video->getVideoByTitle('hysterical-lite...')
#2 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Video->action_view()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Video))
#5 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#8 {main} in D:\xampp\htdocs\application\classes\Model\Video.php:172
2013-11-24 02:05:45 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Model_Video::$user ~ APPPATH\classes\Model\Video.php [ 172 ] in D:\xampp\htdocs\application\classes\Model\Video.php:172
2013-11-24 02:05:45 --- DEBUG: #0 D:\xampp\htdocs\application\classes\Model\Video.php(172): Kohana_Core::error_handler(8, 'Undefined prope...', 'D:\xampp\htdocs...', 172, Array)
#1 D:\xampp\htdocs\application\classes\Controller\Video.php(81): Model_Video->getVideoByTitle('hysterical-lite...')
#2 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Video->action_view()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Video))
#5 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#8 {main} in D:\xampp\htdocs\application\classes\Model\Video.php:172
2013-11-24 02:19:27 --- CRITICAL: ErrorException [ 2 ]: Illegal offset type in unset ~ APPPATH\classes\Model\Like.php [ 20 ] in D:\xampp\htdocs\application\classes\Model\Like.php:20
2013-11-24 02:19:27 --- DEBUG: #0 D:\xampp\htdocs\application\classes\Model\Like.php(20): Kohana_Core::error_handler(2, 'Illegal offset ...', 'D:\xampp\htdocs...', 20, Array)
#1 D:\xampp\htdocs\application\classes\Controller\Like.php(19): Model_Like->likeVideo(0, 1)
#2 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Like->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Like))
#5 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#8 {main} in D:\xampp\htdocs\application\classes\Model\Like.php:20
2013-11-24 02:20:46 --- CRITICAL: ErrorException [ 2 ]: Illegal offset type ~ APPPATH\classes\Model\Like.php [ 23 ] in D:\xampp\htdocs\application\classes\Model\Like.php:23
2013-11-24 02:20:46 --- DEBUG: #0 D:\xampp\htdocs\application\classes\Model\Like.php(23): Kohana_Core::error_handler(2, 'Illegal offset ...', 'D:\xampp\htdocs...', 23, Array)
#1 D:\xampp\htdocs\application\classes\Controller\Like.php(19): Model_Like->likeVideo(0, 1)
#2 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Like->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Like))
#5 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#8 {main} in D:\xampp\htdocs\application\classes\Model\Like.php:23
2013-11-24 02:21:37 --- CRITICAL: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') WHERE `id` = 1' at line 1 [ UPDATE `videos` SET `likes` = 25, `users_likes` = () WHERE `id` = 1 ] ~ MODPATH\database\classes\Database\MySQLi.php [ 172 ] in D:\xampp\htdocs\modules\database\classes\Kohana\Database\Query.php:251
2013-11-24 02:21:37 --- DEBUG: #0 D:\xampp\htdocs\modules\database\classes\Kohana\Database\Query.php(251): Database_MySQLi->query(3, 'UPDATE `videos`...', false, Array)
#1 D:\xampp\htdocs\application\classes\Model\Like.php(29): Kohana_Database_Query->execute()
#2 D:\xampp\htdocs\application\classes\Controller\Like.php(19): Model_Like->likeVideo(0, 1)
#3 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Like->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Like))
#6 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#9 {main} in D:\xampp\htdocs\modules\database\classes\Kohana\Database\Query.php:251
2013-11-24 02:22:59 --- CRITICAL: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') WHERE `id` = 1' at line 1 [ UPDATE `videos` SET `likes` = 25, `users_likes` = () WHERE `id` = 1 ] ~ MODPATH\database\classes\Database\MySQLi.php [ 172 ] in D:\xampp\htdocs\modules\database\classes\Kohana\Database\Query.php:251
2013-11-24 02:22:59 --- DEBUG: #0 D:\xampp\htdocs\modules\database\classes\Kohana\Database\Query.php(251): Database_MySQLi->query(3, 'UPDATE `videos`...', false, Array)
#1 D:\xampp\htdocs\application\classes\Model\Like.php(31): Kohana_Database_Query->execute()
#2 D:\xampp\htdocs\application\classes\Controller\Like.php(19): Model_Like->likeVideo(0, 1)
#3 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Like->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Like))
#6 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#9 {main} in D:\xampp\htdocs\modules\database\classes\Kohana\Database\Query.php:251
2013-11-24 02:23:01 --- CRITICAL: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') WHERE `id` = 1' at line 1 [ UPDATE `videos` SET `likes` = 25, `users_likes` = () WHERE `id` = 1 ] ~ MODPATH\database\classes\Database\MySQLi.php [ 172 ] in D:\xampp\htdocs\modules\database\classes\Kohana\Database\Query.php:251
2013-11-24 02:23:01 --- DEBUG: #0 D:\xampp\htdocs\modules\database\classes\Kohana\Database\Query.php(251): Database_MySQLi->query(3, 'UPDATE `videos`...', false, Array)
#1 D:\xampp\htdocs\application\classes\Model\Like.php(31): Kohana_Database_Query->execute()
#2 D:\xampp\htdocs\application\classes\Controller\Like.php(19): Model_Like->likeVideo(0, 1)
#3 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Like->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Like))
#6 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#9 {main} in D:\xampp\htdocs\modules\database\classes\Kohana\Database\Query.php:251
2013-11-24 02:23:02 --- CRITICAL: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') WHERE `id` = 1' at line 1 [ UPDATE `videos` SET `likes` = 25, `users_likes` = () WHERE `id` = 1 ] ~ MODPATH\database\classes\Database\MySQLi.php [ 172 ] in D:\xampp\htdocs\modules\database\classes\Kohana\Database\Query.php:251
2013-11-24 02:23:02 --- DEBUG: #0 D:\xampp\htdocs\modules\database\classes\Kohana\Database\Query.php(251): Database_MySQLi->query(3, 'UPDATE `videos`...', false, Array)
#1 D:\xampp\htdocs\application\classes\Model\Like.php(31): Kohana_Database_Query->execute()
#2 D:\xampp\htdocs\application\classes\Controller\Like.php(19): Model_Like->likeVideo(0, 1)
#3 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Like->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Like))
#6 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#9 {main} in D:\xampp\htdocs\modules\database\classes\Kohana\Database\Query.php:251
2013-11-24 02:25:53 --- CRITICAL: ErrorException [ 8 ]: unserialize(): Error at offset 0 of 1 bytes ~ APPPATH\classes\Model\Video.php [ 172 ] in file:line
2013-11-24 02:25:53 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'unserialize(): ...', 'D:\xampp\htdocs...', 172, Array)
#1 D:\xampp\htdocs\application\classes\Model\Video.php(172): unserialize('0')
#2 D:\xampp\htdocs\application\classes\Controller\Video.php(81): Model_Video->getVideoByTitle('hysterical-lite...')
#3 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Video->action_view()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Video))
#6 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2013-11-24 02:26:47 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Model\Video.php [ 176 ] in D:\xampp\htdocs\application\classes\Model\Video.php:176
2013-11-24 02:26:47 --- DEBUG: #0 D:\xampp\htdocs\application\classes\Model\Video.php(176): Kohana_Core::error_handler(2, 'Invalid argumen...', 'D:\xampp\htdocs...', 176, Array)
#1 D:\xampp\htdocs\application\classes\Controller\Video.php(81): Model_Video->getVideoByTitle('hysterical-lite...')
#2 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Video->action_view()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Video))
#5 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#8 {main} in D:\xampp\htdocs\application\classes\Model\Video.php:176
2013-11-24 02:27:14 --- CRITICAL: ErrorException [ 8 ]: Undefined index: user_like_it_early ~ APPPATH\views\templates\view.php [ 29 ] in D:\xampp\htdocs\application\views\templates\view.php:29
2013-11-24 02:27:14 --- DEBUG: #0 D:\xampp\htdocs\application\views\templates\view.php(29): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\xampp\htdocs...', 29, Array)
#1 D:\xampp\htdocs\system\classes\Kohana\View.php(61): include('D:\xampp\htdocs...')
#2 D:\xampp\htdocs\system\classes\Kohana\View.php(348): Kohana_View::capture('D:\xampp\htdocs...', Array)
#3 D:\xampp\htdocs\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 D:\xampp\htdocs\application\views\index.php(72): Kohana_View->__toString()
#5 D:\xampp\htdocs\system\classes\Kohana\View.php(61): include('D:\xampp\htdocs...')
#6 D:\xampp\htdocs\system\classes\Kohana\View.php(348): Kohana_View::capture('D:\xampp\htdocs...', Array)
#7 D:\xampp\htdocs\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 D:\xampp\htdocs\application\classes\Controller\Base\preDispatch.php(55): Kohana_Controller_Template->after()
#9 D:\xampp\htdocs\system\classes\Kohana\Controller.php(87): Controller_Base_preDispatch->after()
#10 [internal function]: Kohana_Controller->execute()
#11 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Video))
#12 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#15 {main} in D:\xampp\htdocs\application\views\templates\view.php:29
2013-11-24 02:27:43 --- CRITICAL: ErrorException [ 8 ]: unserialize(): Error at offset 0 of 1 bytes ~ APPPATH\classes\Model\Like.php [ 12 ] in file:line
2013-11-24 02:27:43 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'unserialize(): ...', 'D:\xampp\htdocs...', 12, Array)
#1 D:\xampp\htdocs\application\classes\Model\Like.php(12): unserialize('0')
#2 D:\xampp\htdocs\application\classes\Controller\Like.php(19): Model_Like->likeVideo(0, 1)
#3 D:\xampp\htdocs\system\classes\Kohana\Controller.php(84): Controller_Like->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\xampp\htdocs\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Like))
#6 D:\xampp\htdocs\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\xampp\htdocs\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 D:\xampp\htdocs\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2013-11-24 14:16:52 --- CRITICAL: ErrorException [ 1 ]: Access to undeclared static property: Request::$is_ajax ~ APPPATH\classes\Controller\Base\preDispatch.php [ 35 ] in file:line
2013-11-24 14:16:52 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line