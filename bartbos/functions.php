<?php
require_once 'controller/enqueue.php';
require_once 'controller/controller-post.php';
require_once 'controller/controller-blocks.php';
require_once 'controller/controller-post-type.php';
require_once 'controller/controller-taxonomy.php';

require 'autoload.php';

add_theme_support('post-thumbnails');
add_theme_support('menus');

add_action('acf/init', 'register_my_menus');
function register_my_menus()
{
    register_nav_menus(
        array(
            'primary-menu' => __('Primary Menu')
        )
    );
}