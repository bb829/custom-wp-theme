<?php

class CptArchiveViewModel
{

    public $post;
    public function __construct()
    {
        $this->post = $this->post = get_post(get_the_ID());
    }

    public function fetchPosts()
    {
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

                $post_id = get_the_ID();
                $post_taxonomies = get_post_taxonomies($post_id);
                $taxonomy_terms = [];
    
                foreach ($post_taxonomies as $taxonomy) {
                    $terms = wp_get_post_terms($post_id, $taxonomy, ['fields' => 'all']);
                    if (!empty($terms)) {
                        // DOESNT SET THE KEY TO $TAXONOMY - DEBUG NEEDED
                        $taxonomy_terms[$taxonomy] = $terms;
                    }
                }

                $posts[] = [
                    'thumbnail' => get_the_post_thumbnail_url(),
                    'id' => get_the_ID(),
                    'title' => get_the_title(),
                    'content' => get_the_content(),
                    'permalink' => get_permalink(),
                    'terms' => $taxonomy_terms
                ];
            }
        }

        wp_reset_postdata();

        return $posts;
    }
}

$viewmodel = new CptArchiveViewModel();
