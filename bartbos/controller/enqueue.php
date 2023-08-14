<?php
function scripts()
{
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/app.js', array('acf-input'), 1.1, true);
    wp_enqueue_style('main', get_template_directory_uri().'/assets/style.css', [], THEME_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'scripts');