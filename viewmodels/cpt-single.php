<?php

class CptSingleViewModel {

    public $post;
    public function __construct() {
        $this->post = $this->post = get_post(get_the_ID());
    }

    public function fetchPost() {
        return [
            'thumbnail' => get_the_post_thumbnail_url(),
            'id' => get_the_ID(),
            'title' => get_the_title(),
            'content' => get_the_content(),
            'permalink' => get_permalink(),
            'excerpt' => get_the_excerpt()
        ];
    }

    public function fetchFeatured()
    {
        $args = [
            'post_type' => 'any',
            'post__in' => get_field('featured_posts_select'),
            'orderby' => 'post__in',
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
                    'permalink' => get_permalink(),
                    'archive_link' => get_post_type_archive_link(get_post_type())
                ];
            }
        }

        wp_reset_postdata();

        return $posts;

    }


    public function fetchRelated() {
        $args = [
            'post_type' => 'carrots',
            'posts_per_page' => 3,
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

$viewmodel = new CptSingleViewModel();
