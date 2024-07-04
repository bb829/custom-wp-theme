<?php

$header_template = 'default'; 
get_header($header_template);

$context['post'] = Timber::get_post();
$context['menu'] = Timber::get_menu('primary-menu');
$context['theme_options'] = get_fields('option');
$context['cpt_options'] = get_fields();
$context['viewmodel'] = new CptSingleViewModel();
$templates = array( 'cpt.twig' );
Timber::render( $templates, $context );

wp_footer();