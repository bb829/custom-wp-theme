<?php

class CptTopListViewModel {

    public $post;
    public function __construct() {
        $this->post = $this->post = get_post(get_the_ID());
    }

    public function fetchPosts() {
        $args = [
            'post_type' => 'carrots',
            'posts_per_page' => -1,
            'post__in' => get_field('cpt', $this->post->ID),
            'orderby' => 'post__in'    
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

$viewmodel = new CptTopListViewModel();