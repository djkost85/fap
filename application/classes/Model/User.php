<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Users methods
 * @author  Alexander Demyashev <daseemux@gmail.com>
 * @license OpenSource
 */

class Model_User extends Model
{
    /**
     * User id
     * @var integer
     */
    public $id;

    /**
     * User role
     * Example: 0 - user, 1 - moderator, 2 - admin
     * @var integer
     */
    public $role;
    
    /**
     * User's id from vk.com
     * Example: 40474063
     * @var string
     */
    public $vk_id;

    /**
     * User's firstname from vk.com
     * Example: Alexander
     * @var string
     */
    public $first_name;

    /**
     * User's lastname from vk.com
     * Example: Demyashev
     * @var string
     */
    public $last_name;

    /**
     * User profile picture from vk.com
     * Example: http://vk.com/images/camera_c.gif
     * @var string
     */
    public $photo_50;

    /**
     * Get basic information about user from db by cockie
     * @param   integer $id
     * @return  void
     */
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

    /**
     * Set auth cockie
     *
     * @param   integer $uid
     * @return  void
     */
    public function setAuthCookie($uid = null)
    {
        $uid = (int)$uid;
        Cookie::set('uid', $uid, Date::MONTH);
        Cookie::set('hr', md5('owL' . $uid . 'rash2x'), Date::MONTH);
    }

    /**
     * Check: user unique in db?
     *
     * @param   integer $id_vk
     * @return  bool
     */
    public function hasUniqueUsername($id_vk)
    {
        if ( !DB::select('id')->from('users')->where('id_vk', '=', $id_vk)->execute()->as_array() ) return true;
        return false;
    }

    /**
     * Delete user by id
     *
     * @param   integer $id
     * @return  bool
     */
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

    /**
     * Add new user
     *
     * @param   array   $data
     * @return  bool
     */
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

    /**
     * Get info about user for login
     *
     * @param   integer $vk_id
     * @return  bool
     */
    public function getUserForLogin($vk_id)
    {
       if (!$vk_id) return null;
       $user = DB::select()->from('users')->where('id_vk', '=', $vk_id)->limit(1)->execute()->as_array();
       if ($user) return current($user);
       return false;
    }

    /**
     * Update profile image
     *
     * @param   integer $vk_id
     * @param   array   $images
     * @return  bool
     */
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

    /**
     * Save profile images on server
     *
     * @param   integer $id
     * @param   array   $images
     * @return  bool
     */
    public function saveImgs( $id, $image ) {
        $path_50  = './public/img/user/'.$id.'_50x50.jpg';
        $path_200 = './public/img/user/'.$id.'_200x200.jpg';

        $save_50  = file_put_contents($path_50, file_get_contents($image['photo_50']));
        $save_200 = file_put_contents($path_200, file_get_contents($image['photo_200']));

        if ($save_50 && $save_200) return true;
        else return false;
    }

    /**
     * Get user token for VK api
     *
     * @return  mixed
     */
    public function getToken() {
        $q = current( DB::select('access_token')->from('users')->where('id', '=', $this->id)->limit(1)->execute()->as_array() );
       
        if ($q) return $q['access_token'];
        else return false;
    }

    /**
     * If user re-login, update him VK api access token 
     *
     * @param   integer $uid
     * @param   string  $access_token
     * @return  bool
     */
    public function updateToken($uid, $access_token) {
        $q = DB::update('users')->set(array('access_token' => $access_token))->where('id', '=', $uid)->execute();

        if ($q) return true;
        else return false;
    }

    /**
     * Get info about all users
     *
     * @param   string  $order_by
     * @return  array
     */
    public function getAllUsers( $order_by = 'desc') {
        $q = DB::select('id', 'id_vk', 'first_name', 'last_name', '', 'photo_50')
        ->from('users')
        ->order_by('id', $order_by )
        ->execute()
        ->as_array();

        return $q;
    }

    /**
     * Get info about single user
     *
     * @param   integer $id
     * @return  array
     */
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