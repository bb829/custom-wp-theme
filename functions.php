<?php
$theme = wp_get_theme();
define('THEME_VERSION', $theme->Version);

require_once 'autoload.php';

include 'controller/enqueue.php';
include 'controller/controller-navigation.php';
include 'controller/controller-post.php';
include 'controller/controller-blocks.php';
include 'controller/controller-fields.php';
include 'controller/controller-post-type.php';
include 'controller/controller-taxonomy.php';

add_theme_support('post-thumbnails');
add_theme_support('menus');