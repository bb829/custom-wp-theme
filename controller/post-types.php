<?php
function register_carrots() {
    $args = array(
        'label'              => 'Carrots',
        'public'             => true,
        'publicly_queryable' => true,
        'menu_icon'          => 'dashicons-carrot',
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => [ 'slug' => 'carrots' ],
        'has_archive'        => true,
        'hierarchical'       => false,
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type( 'carrots', $args );
}
add_action( 'acf/init', 'register_carrots' );