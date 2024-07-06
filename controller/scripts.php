<?php
function scripts()
{    
    wp_enqueue_script('bootstrapJS', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js', 1.1, true);
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/app.js', array('acf-input'), 1.1, true);
    wp_enqueue_style('main', get_template_directory_uri().'/assets/style.css', [], THEME_VERSION, 'all');
    wp_enqueue_style('options', get_template_directory_uri().'/assets/options.css', [], THEME_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'scripts');