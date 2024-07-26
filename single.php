<?php

$header_template = 'default'; 
get_header($header_template);

$post_type = get_query_var('post_type');

$context['post'] = Timber::get_post();
$context['cpt'] = $post_type;
$context['menu'] = Timber::get_menu('primary-menu');
$context['menuSecondary'] = Timber::get_menu('secondary-menu');
$context['sitemap'] = Timber::get_menu('sitemap');
$context['theme_options'] = get_fields('option');
$context['cpt_options'] = get_fields();
$context['viewmodel'] = new CptSingleViewModel();
$templates = array( 'cpt.twig' );
Timber::render( $templates, $context );

wp_footer();