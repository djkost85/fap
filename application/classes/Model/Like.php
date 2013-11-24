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
                if ($u == (int) $user->id) {
                    $num = current( array_keys($users, $user->id) );
                    

                    unset( $users[$num] );
                    $like_num = $data['likes'] - 1;
                    $users = serialize($users);

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
                
            }

            # add like to video (users est')
            # a ego tam net
            $users[] = $uid;
            $users = array_unique($users);
            $users = serialize($users);
            $like_num = $data['likes'] + 1;

            $status = DB::update('videos')->set(array(
                'likes' => $like_num,
                'users_likes' => $users
            ))->where('id', '=', $vid)->execute();

            if ($status) return true;
            else return false;
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