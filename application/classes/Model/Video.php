<?php defined('SYSPATH') or die('No direct script access.');

class Model_Video extends Model
{
    public function getStudios()
    {   
        $studios = Kohana::cache('studios');

        if (!$studios) {
            $q = DB::select('id', 'name')->from('studios')->execute()->as_array();

            if (!$q) return false;
            else {
                Kohana::cache('studios', $q, Date::DAY);
                return $q;
            }
        }
        else {
            return $studios;
        }
    }

    public function getCats()
    {
        $categories = Kohana::cache('categories');

        if (!$categories) {
            $q = DB::select('id', 'name')->from('cats')->execute()->as_array();

            if (!$q) return false;
            else {
                Kohana::cache('categories', $q, Date::DAY);
                return $q;
            }
        }
        else {
            return $categories;
        }
    }

    public function getTags()
    {
        $tags = Kohana::cache('tags');

        if (!$tags) {
            $q = DB::select('id', 'name')->from('tags')->execute()->as_array();

            if (!$q) return false;
            else {
                Kohana::cache('tags', $q, Date::DAY);
                return $q;
            }
        }
        else {
            return $tags;
        }
    }

    public function getActors() 
    {
        $actors = Kohana::cache('actors');

        if (!$actors) {
            $q = DB::select('id', 'name')->from('actors')->execute()->as_array();

            if (!$q) return false;
            else {
                Kohana::cache('actors', $q, Date::DAY);
                return $q;
            }
        }
        else {
            return $actors;
        }
    }

    public function getAllVideos( $condition = false )
    {
        $VideosByOneDay = Kohana::cache('VideosByOneDay');

        #if (!$VideosByOneDay) {

            if (!$condition) {
                $q = DB::select('id', 'title', 'url', 'actors', 'cat', 'likes', 'url_title', 'img_preview')
                ->from('videos')
                ->execute()
                ->as_array();
            }
            else {
                $q = DB::select('id', 'title', 'url', 'actors', 'cat', 'likes', 'url_title', 'img_preview')
                    ->from('videos')
                    ->where($condition['where'], '=', $condition['parameter'])
                    ->execute()
                    ->as_array();
            }
            
            if (!$q) return false;
            else {
                $model  = new Model_Video();
                $cats   = $model->getCats();
                $actors = $model->getActors();

                # add cat name by cat_id
                $count = 0;
                foreach ($q as $video)  {
                    foreach ($cats as $cat) {

                        if ( $video['cat'] == $cat['id'] ) {
                            $video['cat_name'] = $cat['name'];
                        }
                        
                        elseif ( $video['cat'] == '0' ) {
                            $video['cat_name'] = 'Без категории';
                        }
                    }
                    $video['actors'] = unserialize($video['actors']);
                    
                    # swap actors ids to names
                    $i = 0;
                    foreach ($actors as $actor) {
                        foreach ($video['actors'] as $q_actor) {

                            if ($actor['id'] == $q_actor) {
                                $video['actors'][$i] = $actor['name'];
                                $i++;
                            }

                        }
                    }
                    
                    # add actors name by actors_id
                    foreach ($actors as $actor) {

                        if ( $video['actors'] == $actor['id'] ) {
                            $video['actors_name'] = $actor['name'];
                        }
                        
                        elseif ( $video['actors'] == '0' ) {
                            $video['actors_name'] = '';
                        }
                    }

                    $row[$count] = $video;
                    $count++;            
                }
                Kohana::cache('VideosByOneDay', $row, Date::DAY);
                return $row;
            }

        #}
        #else {
        #    return $VideosByOneDay;
        #}

    }

    public function getVideoByTitle( $url_title = false )
    {
        $url_title = (string) $url_title;
        $url_title = htmlspecialchars($url_title);

        if (!$url_title) return false;
        else {
            $user = new Model_User();

            $q = DB::select('id', 'title', 'url', 'url_title', 'actors', 'cat', 'studio', 'likes', 'users_likes', 'date', 'tags', 'views')->from('videos')->where('url_title', '=', $url_title)->execute()->as_array();
            $q = current($q);

            $add_view = DB::update('videos')->value('views', $q['views'] + 1 )->where('id', '=', $q['id'])->execute();
            
            # add css style to like button
            $q['user_like_it_early'] = 0;
            if ($q['likes'] != 0) {
                
                $q['users_likes'] = unserialize($q['users_likes']);

                foreach ($q['users_likes'] as $u) {
                    if ( $u == $user->id ) $q['user_like_it_early'] = 1;
                }
            }
            
           
      
            $model = new Model_Video();
            $cats    = $model->getCats();
            $studios = $model->getStudios();
            $actors  = $model->getActors();
            $tags    = $model->getTags();

            foreach ($cats as $cat) {
                if ($cat['id'] == $q['cat']) {
                    $q['cat_name'] = $cat['name'];
                }
            }

            foreach ($studios as $studio) {
                if ($studio['id'] == $q['studio']) {
                    $q['studio_name'] = $studio['name'];
                }
            }

            # swap actors ids to names
            $i = 0;
            $q['actors'] = unserialize($q['actors']);
            foreach ($q['actors'] as $act) {
                foreach ($actors as $actor) {

                    if ($actor['id'] == $act) {
                        $q['actors'][$i] = $actor['name'];
                        $i++;
                    }

                }
            }

            # swap tags ids to tags name
            $i = 0;
            $q['tags'] = unserialize($q['tags']);
            foreach ($q['tags'] as $q_tag) { #zapros
                foreach ($tags as $tag) { #massiv id name

                    if ($tag['id'] == $q_tag) {
                        $q['tags'][$i] = $tag['name'];
                        $i++;
                    }

                }
            }

            if (!$q) return false;
            else return $q;
        }
        
    }

    public function getStudioIdByName($name = false)
    {
        if (!$name) {
            return false;
        }
        else {
            $name = (string) $name;
            $name = htmlspecialchars($name);

            $q = DB::select('id')->from('studios')->where('name', '=', $name)->execute()->as_array();
            $q = current($q);

            if (!$q) return false;
            else return $q['id'];
        }
        
    }

    public function getCategoryIdByName( $name = false )
    {
        if (!$name) {
            return false;
        }
        else {
            $name = (string) $name;
            $name = htmlspecialchars($name);

            $q = DB::select('id')->from('cats')->where('name', '=', $name)->execute()->as_array();
            $q = current($q);

            if (!$q) return false;
            else return $q['id'];
        }
    }
}