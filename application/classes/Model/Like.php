<?php defined('SYSPATH') or die('No direct script access.');

class Model_Like extends Model
{
    function likeVideo($uid, $vid) {
        $user = new Model_User();

        if ( !$uid || !$vid ) return false;

        $data = current( DB::select('likes', 'users_likes')->from('videos')->where('id', '=', $vid)->execute()->as_array() );

        # est' liki
        if ( $data['likes'] ) {

            $users = unserialize($data['users_likes']);

            foreach ($users as $u) {
                
                # remove like to video
                if ($u == $user->id) {
                    $num = current( array_keys($users, $user->id) );
                    

                    unset( $users[$num] );
                    $like_num = count($users);
                    $users = serialize($users);

                    var_dump($users);
                    die();

                    # laykov ne ostalos'
                    if ( !$users ) {
                        $users = '0';
                        $like_num = '0';
                    }

                    $status = DB::update('videos')->set(array(
                        'likes' => $like_num,
                        'users_likes' => $users
                    ))->where('id', '=', $vid)->execute();

                    if ($status) return true;
                    else return false;
                }
                # add like to video (users est')
                else {
                    $users[] = $uid;
                    $users = array_unique($users);
                    $users = serialize($users);
                    $like_num = count($users);

                    $status = DB::update('videos')->set(array(
                        'likes' => $like_num,
                        'users_likes' => $users
                    ))->where('id', '=', $vid)->execute();

                    if ($status) return true;
                    else return false;

                }
            }
        }
        #net likov
        else {
            $users = array( 1 => $uid);
            $users = array_unique($users);
            $users = serialize($users);

            $status = DB::update('videos')->set(array(
                'likes' => '1',
                'users_likes' => $users
            ))->where('id', '=', $vid)->execute();

            if ($status) return true;
            else return false;
        }
        

        
        

        


       
    }

}