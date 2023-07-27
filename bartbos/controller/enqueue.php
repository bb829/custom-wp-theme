<?php
function scripts()
{
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/app.js', array('acf-input'), 1.1, true);
    wp_register_style('style', get_template_directory_uri() . '/assets/style.css', array(), '1.0');
    wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'scripts');