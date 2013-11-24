<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Base_preDispatch extends Controller_Template {

    public $template = 'index';
    public $view     = array();

	public function before()
	{
        parent::before();

        $this->view['title']       = '';
        $this->view['from_action'] = $this->request->action();

        $uid = Cookie::get('uid', null);
        $hr  = Cookie::get('hr', null);

        if ( $uid && $hr ){
            if ( $hr != md5('owL' . $uid . 'rash2x') ){
                Cookie::delete('uid');
                Cookie::delete('hr');
            }
        }

        $user       = new Model_User();
        $this->user = $user;

        # sidebar
        $video = new Model_Video();
        $this->template->additionalClasses = array();
        $this->template->studios = $video->getStudios();
        $this->template->cats    = $video->getCats();
        $this->template->tags    = $video->getTags();

        View::set_global('user', $user);

        if ( $this->auto_render ){
            $this->template->title   = '';
            $this->template->content = '';
            $this->template->styles  = array();
            $this->template->scripts = array();
        }
	}

    public function after()
    {
        if ( $this->auto_render ){
            // $styles  = array();
            // $scripts = array(
            //     'http://code.jquery.com/jquery.min.js',
            // );
            // $this->template->styles = array_merge( $this->template->styles, $styles );
            // $this->template->scripts = array_merge( $this->template->scripts, $scripts );
        }
        parent::after();
    }

}
