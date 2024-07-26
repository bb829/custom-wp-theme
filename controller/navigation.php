<?php
add_action('acf/init', 'register_my_menus');
function register_my_menus()
{
    register_nav_menus(
        array(
            'primary-menu' => __('Primary Menu')
        )
    );
    register_nav_menus(
        array(
            'secondary-menu' => __('Secondary Menu')
        )
    );

    register_nav_menus(
        array(
            'sitemap' => __('Sitemap')
        )
    );
}