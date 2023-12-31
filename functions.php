<?php
$theme = wp_get_theme();
define('THEME_VERSION', $theme->Version);

require_once 'autoload.php';

include 'controller/scripts.php';
include 'controller/navigation.php';
include 'controller/posts.php';
include 'controller/blocks.php';
include 'controller/fields.php';
include 'controller/post-types.php';
include 'controller/taxonomies.php';

add_theme_support('post-thumbnails');
add_theme_support('menus');