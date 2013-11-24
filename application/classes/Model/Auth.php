<?php defined('SYSPATH') or die('No direct script access.');

class Model_Auth extends Model
{
    function getToken( $data ) {

        $url = "https://oauth.vk.com/access_token?"
            ."client_id=".         $data['client_id']
            ."&client_secret=".    $data['client_secret']
            ."&code=".             $data['code']
            ."&redirect_uri=".     $data['redirect_uri']
            ."&";

        $user = json_decode(file_get_contents($url));
        
        return $user;
    }

    function getVKinfo( $user ) {
 
        $url = "https://api.vk.com/method/users.get?"
            . "uid=" .               $user->user_id
            . "&access_token=" .     $user->access_token
            . "&fields=id,first_name,last_name,nickname,screen_name,sex,bdate,city,country,timezone,photo_50,photo_100,photo_200,photo_200_orig,photo_400_orig,photo_max,photo_max_orig";

        $data = json_decode(file_get_contents($url));
        $data = current($data->response);

        return $data;
    }
}