<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Like extends Controller_Base_preDispatch
{

    public function action_index()
    {
        $uid  = (int) Arr::get($_GET, 'uid', 0);
        $vid  = (int) Arr::get($_GET, 'vid', 0);
        $ajax = (int) Arr::get($_GET, 'ajax', 0);

        $from = (string) Arr::get($_GET, 'from', '');
        $from = htmlspecialchars($from);

        # if guest like -> go fuck youself, bitch!
        if ( $uid == 0 || $vid == 0 ) {
        	$this->redirect($from);
        }
        else {
        	$Like = new Model_Like();
        	$data = $Like->likeVideo( $uid, $vid, $ajax );

            if ( $data->ajax ) echo json_encode($data);
            else $this->redirect($from);
        }

    }
}