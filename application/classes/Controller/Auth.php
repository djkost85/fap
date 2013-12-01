<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller_Base_preDispatch
{

    public function action_index()
    {
        # show search widget in sidebar
        $this->template->catalog = true; 
        $this->template->additionalClasses[] = 'mainbar_black';
        $this->template->content = View::factory('templates/auth', $this->view);
    }

    public function action_logout()
    {
        Cookie::delete('uid');
        Cookie::delete('hr');
        $this->redirect('');
    }


    public function action_loginVk()
    {
        $this->view['login_error']      = false;
        $this->view['login_error_text'] = '';

        $code = (string) Arr::get($_GET, 'code', false);

        $data = array(
            'client_id'     => '3980223', 
            'client_secret' => 'ltCymYO6LwMXUbYN2xHX',
            'code'          => $code,
            'redirect_uri'  => 'http://' . Arr::get($_SERVER, 'SERVER_NAME' , '') . '/login/vk',
            'scope'  => 'video,offline'
        );

        $vk = new Model_VK($data['client_id'], $data['client_secret']);
        
        if ( $data['code'] ) {
            
            $access_token = $vk->getAccessToken( $data['code'], $data['redirect_uri'] );

            $user_info = $vk->api('users.get', array(
                'uid'       => $access_token['user_id'],
                'fields'    => 'id,first_name,last_name,nickname,screen_name,sex,bdate,city,country,timezone,photo_50,photo_100,photo_200,photo_200_orig,photo_400_orig,photo_max,photo_max_orig',
                'order'     => 'name'
            ));
            #var_dump($access_token['user_id']);
            #var_dump($user_info);
            #exit();


            $data = current( $user_info['response'] );

            
            
            $data['access_token'] = $access_token['access_token'];

            #var_dump($data['access_token']);
            #exit();

            # Если в базе нет вообще, добавляем
            if ($user = $this->user->hasUniqueUsername( $data['uid'] )) {

                if ($new_user_id = $this->user->insertNewUser( $data )) {

                    $this->user->setAuthCookie($new_user_id);

                    $this->user->saveImgs($new_user_id, $data['photo_50'] );

                    $images = array(
                        'photo_50'       => $data['photo_50'],
                        'photo_200'      => $data['photo_200'],
                        'photo_200_orig' => $data['photo_200_orig'],
                        'photo_max'      => $data['photo_max'],
                        'photo_max_orig' => $data['photo_max_orig']
                        );

                    $update = $this->user->updateImg( $data['uid'], $images );

                    $this->redirect();
                }
            
            } else {

                # Обновить аву, если уже зарегистрирован
                if ( $user = $this->user->getUserForLogin($data['uid']) ){
                    $this->user->setAuthCookie($user['id']);

                    $this->user->updateToken($user['id'], $data['access_token'] );


                    $this->user->saveImgs( $user['id'], $data['photo_50'] );

                    $images = array(
                        'photo_50'       => $data['photo_50'],
                        'photo_200'      => $data['photo_200'],
                        'photo_200_orig' => $data['photo_200_orig'],
                        'photo_max'      => $data['photo_max'],
                        'photo_max_orig' => $data['photo_max_orig']
                        );

                    $update = $this->user->updateImg( $data['uid'], $images );
            
                    $this->redirect();
                } 
            
            }

        }


        if ( Arr::get($_GET, 'error') ){
            $error             = (string) Arr::get($_GET, 'error', '');
            $error_reason      = (string) Arr::get($_GET, 'error_reason', '');
            $error_description = (string) Arr::get($_GET, 'error_description', '');

            echo $error.'-'.$error_reason.'-'.$error_description;
            die();
        }
        
    }

}