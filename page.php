<?php

$header_template = 'default'; 
if (is_front_page()) {
    $header_template = 'home';
}
get_header($header_template);

$context['post'] = Timber::get_post();
$context['menu'] = Timber::get_menu('primary-menu');
$context['theme_options'] = get_fields('option');
$templates = array( 'page.twig' );
Timber::render( $templates, $context );

wp_footer();