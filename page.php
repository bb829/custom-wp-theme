<?php
get_header();

$context['post'] = Timber::get_post();
$context['menu'] = Timber::get_menu('primary-menu');
$templates = array( 'page.twig' );
Timber::render( $templates, $context );

wp_footer();