<?php
$header_template = 'default'; 
if (is_front_page()) {
    $header_template = 'home';
}
get_header($header_template);

$post_type = get_query_var('post_type');
$cpt_query = new WP_Query(array('post_type' => $post_type));

$context['posts'] = new Timber\PostQuery($cpt_query);
$context['cpt'] = $post_type;
$context['menu'] = Timber::get_menu('primary-menu');
$context['theme_options'] = get_fields('option');
$context['viewmodel'] = new CptArchiveViewModel();

$templates = array( 'archive.twig' );
Timber::render( $templates, $context );

wp_footer();