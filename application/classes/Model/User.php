<?php defined('SYSPATH') or die('No direct script access.');

class Model_User extends Model
{
    # site
    public $id          = 0;
    public $role        = '';   # 0 - user, 1 - moderator, 2 - admin
    
    # vk
    public $vk_id       = 0;
    public $first_name  = '';   # Alexander
    public $last_name   = '';   # Demyashev
    public $photo_50    = '';   # http://vk.com/images/camera_c.gif

    public function __construct($id = null)
    {
        $uid  = $id ? (int)$id : (int)Cookie::get('uid', 0);
        $user = array();

        if ( $uid ) {
            $query = DB::select()->from('users')->where('id', '=', $uid)->limit(1)->execute()->as_array();

            if ( $query ) {
                $user = current( $query );

                $this->id         = $user['id'];
                $this->role       = $user['role'];

                $this->vk_id      = $user['id_vk'];
                $this->first_name = $user['first_name'];
                $this->last_name  = $user['last_name'];
                $this->photo_50   = $user['photo_50'];   
            }
        }
    }

    public function setAuthCookie($uid = null)
    {
        $uid = (int)$uid;
        Cookie::set('uid', $uid, Date::MONTH);
        Cookie::set('hr', md5('owL' . $uid . 'rash2x'), Date::MONTH);
    }

    public function hasUniqueUsername($id_vk)
    {
        if ( !DB::select('id')->from('users')->where('id_vk', '=', $id_vk)->execute()->as_array() ) return true;
        return false;
    }

    public function deleteUser($id = NULL)
    {
        $id = (int) $id;

        if ( $id == NULL ) {
            return false;
        }
        else {
            $user = DB::delete('users')->where('id', '=', $id)->limit(1)->execute();
            return $user;
        }
    }

    public function insertNewUser($data)
    {
        if ( !$data ) return false;

        isset($data['bdate'])     ? $data['bdate'] : $data['bdate'] = '0'; 
        isset($data['nickname'] ) ? $data['nickname'] : $data['nickname'] = '';
        isset($data['sex'] )      ? $data['sex'] : $data['sex'] = 0;
        isset($data['city'] )     ? $data['city'] : $data['city'] = 0;
        isset($data['country'] )  ? $data['country'] : $data['country'] = 0;
        isset($data['timezone'] ) ? $data['timezone'] : $data['timezone'] = NULL;
        isset($data['access_token'])?$data['access_token']:$data['access_token'] = NULL;

        $fields = array('id_vk', 'nickname', 'first_name', 'last_name', 
            'screen_name', 'sex', 'bdate', 'city', 'country', 
            'timezone', 'photo_50', 'photo_200', 'photo_200_orig',
            'photo_max', 'photo_max_orig', 'access_token');

        $values = array($data['uid'], $data['nickname'], $data['first_name'], $data['last_name'], 
            $data['screen_name'], $data['sex'], $data['bdate'], $data['city'], $data['country'],
            $data['timezone'], $data['photo_50'], $data['photo_200'], $data['photo_200_orig'],
            $data['photo_max'], $data['photo_max_orig'], $data['access_token']);

        $userId = DB::insert('users', $fields)->values($values)->execute();

        if ($userId) return current($userId);
        return false;
    }

    public function getUserForLogin($vk_id)
    {
       if (!$vk_id) return null;
       $user = DB::select()->from('users')->where('id_vk', '=', $vk_id)->limit(1)->execute()->as_array();
       if ($user) return current($user);
       return null;
    }

    public function updateImg( $vk_id, $images ) {
        if (!$vk_id || !$images) return false;

        return DB::update('users')->set(array(
            'photo_50' => $images['photo_50'],
            'photo_200' => $images['photo_200'],
            'photo_200_orig' => $images['photo_200_orig'],
            'photo_max'     => $images['photo_max'],
            'photo_max_orig' => $images['photo_max_orig']
            ))->where('id_vk', '=', $vk_id);
    }

    public function saveImgs( $id, $image ) {
        $path_50  = './public/img/user/'.$id.'_50x50.jpg';
        $path_200 = './public/img/user/'.$id.'_200x200.jpg';

        $save_50  = file_put_contents($path_50, file_get_contents($image));
        $save_200 = file_put_contents($path_200, file_get_contents($image));

        if ($save_50 && $save_200) return true;
        else return false;
    }

    public function getToken() {
        $q = current( DB::select('access_token')->from('users')->where('id', '=', $this->id)->limit(1)->execute()->as_array() );
        return $q['access_token'];
    }

    public function updateToken($uid, $access_token) {
        $q = DB::update('users')->set(array('access_token' => $access_token))->where('id', '=', $uid)->execute();
    }

    /**
    *
    *   ADMIN FUNCTIONS
    *
    */
    public function getAllUsers( $order_by = 'desc') {
        $q = DB::select('id', 'id_vk', 'first_name', 'last_name', '', 'photo_50')
        ->from('users')
        ->order_by('id', $order_by )
        ->execute()
        ->as_array();

        return $q;
    }

    public function getUser( $id ) {
        $id = (int) $id;
        if (!$id) return false;

        $q = DB::select('id', 'id_vk', 'first_name', 'last_name', '', 'photo_50')
        ->from('users')
        ->where('id', '=', $id)
        ->execute()
        ->as_array();;
        return current($q);
    }

}