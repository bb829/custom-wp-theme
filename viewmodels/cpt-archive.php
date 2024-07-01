<?php

class CptArchiveViewModel {

    public $post;
    public function __construct() {
        $this->post = $this->post = get_post(get_the_ID());
    }

    public function fetchPosts() {
        $post_type = get_query_var('post_type');

        $args = [
            'post_type' => $post_type,
            'posts_per_page' => -1,
        ];
    
        $query = new WP_Query($args);
        $posts = [];
    
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $posts[] = [
                    'thumbnail' => get_the_post_thumbnail_url(),
                    'id' => get_the_ID(),
                    'title' => get_the_title(),
                    'content' => get_the_content(),
                    'permalink' => get_permalink()
                ];
            }
        }
    
        wp_reset_postdata(); 
    
        return $posts;
    }
}

$viewmodel = new CptArchiveViewModel();
