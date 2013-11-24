<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Video extends Controller_Base_preDispatch
{
	# default index page
	public function action_index()
    {
        $videos = new Model_Video();
        $videos = $videos->getAllVideos();

        $this->view['videos'] = $videos;

        $this->template->content = View::factory('templates/index', $this->view);
    }

    # show studio's videos
    public function action_studio()
    {
        # factory
        $this->view['videos_error'] = false;
        $this->view['videos_error_text'] = '';

        $studio = $this->request->param('studio_name', '');
        $Model = new Model_Video();

        $studio_id = $Model->getStudioIdByName($studio);

        $condition = array(
            'where' => 'studio',
            'parameter' => $studio_id
            );
        $videos = $Model->getAllVideos( $condition );

        if (!$videos) {
            $this->view['videos_error'] = true;
            $this->view['videos_error_text'] = 'Видео не найдены';
        }
        else {
            $this->view['videos'] = $videos;
            
        }

        $this->template->content = View::factory('templates/view_condition', $this->view);
    }

    # show videos by category
    public function action_category()
    {
        # factory
        $this->view['videos_error'] = false;
        $this->view['videos_error_text'] = '';

        $category = $this->request->param('category_name', '');
        $Model = new Model_Video();

        $category_id = $Model->getCategoryIdByName($category);

        $condition = array(
            'where' => 'cat',
            'parameter' => $category_id
            );
        $videos = $Model->getAllVideos( $condition );

        if (!$videos) {
            $this->view['videos_error'] = true;
            $this->view['videos_error_text'] = 'Видео не найдены';
        }
        else {
            $this->view['videos'] = $videos;
            
        }

        $this->template->content = View::factory('templates/view_condition', $this->view);
    }

    public function action_view()
    {
        $title = $this->request->param('video_title', '');

        $Model = new Model_Video();
        $video = $Model->getVideoByTitle($title);

        $Tweak = new Model_Tweak();

        $video['date']   = nl2br($Tweak->rusDate("j M Y", strtotime( $video['date'] ) ));

        $this->view['video'] = $video;

        $this->template->content = View::factory('templates/view', $this->view);
    }

    public function action_add()
    {
        if ( $this->user->id != 0) {
            $this->template->additionalClasses[] = 'mainbar_black';
            $this->template->content = View::factory('templates/add', $this->view);
        }
        else {
            $this->redirect();
        }
        
    }

}