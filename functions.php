<?php
$theme = wp_get_theme();
define('THEME_VERSION', $theme->Version);

require_once __DIR__ . '/vendor/autoload.php';
Timber\Timber::init();

include 'controller/scripts.php';
include 'controller/navigation.php';
include 'controller/posts.php';
include 'controller/blocks.php';
include 'controller/fields.php';
include 'controller/post-types.php';
include 'controller/taxonomies.php';
include 'controller/plugins.php';
include 'controller/theme-options.php';
include 'controller/scss.php';

include 'viewmodels/cpt-top-list.php';
include 'viewmodels/cpt-archive.php';
include 'viewmodels/cpt-single.php';

add_theme_support('post-thumbnails');
add_theme_support('menus');