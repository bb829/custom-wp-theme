<?php

$header_template = 'default'; 
if (is_front_page()) {
    $header_template = 'home';
}
get_header($header_template);

$context['post'] = Timber::get_post();
$context['menu'] = Timber::get_menu('primary-menu');
$templates = array( 'cpt.twig' );
Timber::render( $templates, $context );

wp_footer();