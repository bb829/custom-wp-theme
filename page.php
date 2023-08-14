<?php
get_header();

$context['post'] = new Timber\Post();
$context['menu'] = new \Timber\Menu( 'primary-menu' );
$templates = array( 'page.twig' );
Timber::render( $templates, $context );

wp_footer();