<?php

class CptTopListViewModel
{

    public $post;
    public function __construct()
    {
        $this->post = $this->post = get_post(get_the_ID());
    }

    public function fetchFeatured()
    {
        if (get_field('relationship_type') == 'cpt_select') {
            $args = [
                'post_type' => 'any',
                'post__in' => get_field('cpt_select'),
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
                        'archive_link' => get_post_type_archive_link(get_post_type()),
                        'button_text' => 'View ' . get_the_title()
                    ];
                }
            }

            wp_reset_postdata();

            return $posts;

        }

        if (get_field('relationship_type') == 'cpt_taxonomy') {
            $taxonomy = get_field('taxonomy_select');
            $term_names = get_field('terms_select');
            $args = [
                'taxonomy' => $taxonomy,
                'name' => $term_names,
                'hide_empty' => false,
            ];
            
            $queried_terms = get_terms($args);
            
            $taxonomy_object = get_taxonomy($taxonomy);
            $associated_post_types = $taxonomy_object->object_type;

            foreach($queried_terms as $term) {
                $term_meta = get_term_meta($term->term_id);

                $meta[] = [
                    'thumbnail' => wp_get_attachment_url($term_meta['taxonomy_image'][0]),
                    'title' => $term->name,
                    'content' => wpautop($term_meta['taxonomy_content'][0]),
                    'archive_link' =>  get_post_type_archive_link($associated_post_types[0]),
                    'button_text' => 'View ' . $term->name
                ];
            }

            return $meta;

        }

    }
}

$viewmodel = new CptTopListViewModel();
