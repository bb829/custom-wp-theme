<?php

if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug' => 'theme-options',
        'capability' => 'edit_posts',
        'redirect' => false
    ]);
}

add_filter('timber/context', 'add_to_timber_context');
function add_to_timber_context($context)
{
    $theme_options = get_fields('option');

    if ($theme_options) {
        $context['theme_options'] = $theme_options;
    }

    return $context;
}