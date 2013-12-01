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
            $this->view['videos_error_text'] = 'В этом разделе пока пусто, нам тоже от этого очень грустно..';
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
            $this->view['videos_error_text'] = 'В этом разделе пока пусто, нам тоже от этого очень грустно..';
        }
        else {
            $this->view['videos'] = $videos;
            
        }

        $this->template->content = View::factory('templates/view_condition', $this->view);
    }

    public function action_view()
    {
        $this->view['videos_error'] = false;
        $this->view['videos_error_text'] = '';

        # show search widget in sidebar
        $this->template->catalog = true;

        $title = $this->request->param('video_title', '');

        $Model = new Model_Video();
        $video = $Model->getVideoByTitle($title);

        if (!$video) {
            $this->view['videos_error'] = true;
            $this->view['videos_error_text'] = 'Видео не найдено';
        }
        else {
            $Tweak = new Model_Tweak();

            $video['date']   = nl2br($Tweak->rusDate("j M Y", strtotime( $video['date'] ) ));
            $this->view['video'] = $video;
            
        }
        $this->template->content = View::factory('templates/view', $this->view);

        
    }

    public function action_add()
    {
        # show search widget in sidebar
        $this->template->catalog = true;

        if ( $this->user->id != 0) {
            $this->template->additionalClasses[] = 'mainbar_black';

            $this->view['cats']    = $this->template->cats;
            $this->view['studios'] = $this->template->studios;

            # template
            $this->view['video']['title'] = '';
            $this->view['video']['url'] = '';
            $this->view['video']['preview']='';
            $this->view['video']['actors'] = '';
            $this->view['video']['tags']='';
            $this->view['video']['duration']='';
            $this->view['video']['method'] = false;

            # vk api
            $data['client_id'] = '3980223';
            $data['client_secret'] = 'ltCymYO6LwMXUbYN2xHX';

            $url = (string) Arr::get($_POST, 'url', '');
            $url = htmlspecialchars($url);

            $csrf   = (string) Arr::get($_POST, 'csrf', '');
            $title  = (string) Arr::get($_POST, 'title', '');
            $studio = (int)    Arr::get($_POST, 'studio', '');
            $cat    = (int)    Arr::get($_POST, 'cat', '');
            $actors = (string) Arr::get($_POST, 'actors', '');
            $tags   = (string) Arr::get($_POST, 'tags', '');
            #$ajax   = (bool) Arr::get($_POST, 'ajax', false);
            $img_preview = (string) Arr::get($_POST, 'img_preview', '');
            $method = (string) Arr::get($_POST, 'method', '');
            $duration = (string)    Arr::get($_POST, 'duration', '');

            

            if ( $method == 'save' && Security::check( $csrf ) ) {
                $actors = explode(',', $actors);
                $tags   = explode(',', $tags);

                $url_title = URL::title($title);

                $video = new Model_Video();
                $status = $video->save($url, $title, $url_title, $studio, $cat, $actors, $tags, $img_preview, $duration);

                if ($status) $this->redirect();
                else die('add_error');
            }



            # user add video by url
            if ($url) {

                if ( Security::check( $csrf ) ) {

                    $url_title = URL::title( $title );

                    # check url
                    $pattern_iframe = '/http(s?):\/\/vk.com\/[A-Za-z_.?]*oid=([-\d]*)?&id=([\d]*)?(&hash=[A-Za-z\d]*)?(&hd=[\d])?/';
                    $pattern_normal = '/http(s?):\/\/vk.com\/[\S\d]*video([-\d]*)?_([\d]*)?/';
                    
                    $pattern_iframe = htmlspecialchars($pattern_iframe);
                    $pattern_normal = htmlspecialchars($pattern_normal);

                    $status = preg_match($pattern_iframe, $url, $matches);
                    
                    if ( $status ) {

                        # auto form array from parameters
                        $count  = count($matches);

                        $i = 0;
                        while ( $i < $count - 1 ) {
                            if ( isset($matches[$i])   ) $data['url'] = $matches[$i];
                            if ( isset($matches[++$i]) ) $data['ssh'] = $matches[$i];
                            if ( isset($matches[++$i]) ) $data['uid'] = $matches[$i];
                            if ( isset($matches[++$i]) ) $data['vid'] = $matches[$i];
                            if ( isset($matches[++$i]) ) $data['hash']= preg_replace('/&amp;hash=/', '', $matches[$i]);
                            if ( isset($matches[++$i]) ) $data['hd']  = preg_replace('/&amp;hd=/', '', $matches[$i]);
                        }

                        $user = new Model_User();
                        $vk = new Model_VK( $data['client_id'], $data['client_secret'], $user->getToken() );
                        
                        $video_info = $vk->api('video.get', array(
                            'owner_id'   => $data['uid'],
                            'videos'     => $data['uid'].'_'.$data['vid'],
                        ));


                        if ( $method == 'checkUrl' ) {
                            $data = json_encode($video_info['response'][1]);
                            echo $data;
                            exit();
                        }
                        else {
                            # go to /add page and put info in fields
                            $this->view['video']['url'] = $video_info['response'][1]['player'];
                            $this->view['video']['title'] = $video_info['response'][1]['title'];
                            $this->view['video']['preview'] = $video_info['response'][1]['image_medium'];

                            if ($video_info['response'][1]['duration'] != '0') {
                                $this->view['video']['duration'] = sprintf("%02d:%02d:%02d", (int)($video_info['response'][1]['duration'] / 3600), (int)(($video_info['response'][1]['duration'] % 3600) / 60), $video_info['response'][1]['duration'] % 60);
                            }
                            else {
                                $video_info['response'][1]['duration'] = '0';
                            }

                            #$this->view['video']['duration'] = $video_info['response'][1]['duration'];
                            $this->view['video']['actors'] = $actors;
                            $this->view['video']['tags'] = $tags;

                            $this->view['video']['method'] = 'save';

                            $this->template->content = View::factory('templates/add', $this->view);

                            return;
                        }

                    }


                    $status = preg_match($pattern_normal, $url, $matches);

                    if ( $status ) {

                        # auto form array from parameters
                        $count  = count($matches);

                        $i = 0;
                        while ( $i < $count - 1 ) {
                            if ( isset($matches[$i])   ) $data['url'] = $matches[$i];
                            if ( isset($matches[++$i]) ) $data['ssh'] = $matches[$i];
                            if ( isset($matches[++$i]) ) $data['uid'] = $matches[$i];
                            if ( isset($matches[++$i]) ) $data['vid'] = $matches[$i];
                        }

                        $user = new Model_User();
                        $vk = new Model_VK( $data['client_id'], $data['client_secret'], $user->getToken() );
                        
                        $video_info = $vk->api('video.get', array(
                            'owner_id'   => $data['uid'],
                            'videos'     => $data['uid'].'_'.$data['vid'],
                        ));

                        if ( $method == 'checkUrl' ) {
                            $data = json_encode($video_info['response'][1]);
                            echo $data;
                            exit();
                        }
                        else {
                            # go to /add page and put info in fields
                            $this->view['video']['url'] = $video_info['response'][1]['player'];
                            $this->view['video']['title'] = $video_info['response'][1]['title'];
                            $this->view['video']['preview'] = $video_info['response'][1]['image_medium'];
                            #$this->view['video']['duration'] = $video_info['response'][1]['duration'];
                            
                            if ($video_info['response'][1]['duration'] != '0') {
                                $this->view['video']['duration'] = sprintf("%02d:%02d:%02d", (int)($video_info['response'][1]['duration'] / 3600), (int)(($video_info['response'][1]['duration'] % 3600) / 60), $video_info['response'][1]['duration'] % 60);
                            }
                            else {
                                $video_info['response'][1]['duration'] = '0';
                            }

                            $this->view['video']['actors'] = $actors;
                            $this->view['video']['tags'] = $tags;

                            $this->view['video']['method'] = 'save';
                            $this->template->content = View::factory('templates/add', $this->view);
                            
                            return;
                        }                    
                    }

                    

                }
            }
            
            $this->template->content = View::factory('templates/add', $this->view);
        }
        else {
            $this->redirect();
        }
        
    }

}