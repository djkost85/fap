<?php defined('SYSPATH') or die('No direct script access.');

/**
 * The PHP class for Like/Dislike vk.com api
 * @author Alexander Demyashev
 * @license OpenSource
 */

class Controller_Like extends Controller_Template
{
    /**
     * Name of basic template
     * @var string
     */
    public $template = 'ajax';

    /**
     * if user allow js and post ajax - return json data
     * else work php and redirect to index
     *
     * @return  json
     */
    public function action_index()
    {
        $uid  = (int) Arr::get($_GET, 'uid', 0);
        $vid  = (int) Arr::get($_GET, 'vid', 0);
        $ajax = (int) Arr::get($_GET, 'ajax', 0);
        $type = (string) Arr::get($_GET, 'type', '');

        $from = (string) Arr::get($_GET, 'from', '');
        $from = htmlspecialchars($from);

        # if guest like -> go fuck youself, bitch!
        if ( $uid == 0 || $vid == 0 ) {
        	$this->redirect($from);
        }
        else {
        	$Like = new Model_Like();
        	$data = $Like->like( $uid, $vid, $type, $ajax );

            if ( $ajax ) {
                $this->template->data = $data;
            }
            else $this->redirect($from);
        }

    }
}