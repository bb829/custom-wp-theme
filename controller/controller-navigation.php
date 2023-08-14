<?php
add_action('acf/init', 'register_my_menus');
function register_my_menus()
{
    register_nav_menus(
        array(
            'primary-menu' => __('Primary Menu')
        )
    );
}