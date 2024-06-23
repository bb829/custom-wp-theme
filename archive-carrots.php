<?php
$header_template = 'default'; 
if (is_front_page()) {
    $header_template = 'home';
}
get_header($header_template);

$carrots_query = new WP_Query(array('post_type' => 'carrots'));
$context['posts'] = new Timber\PostQuery($carrots_query);
$context['menu'] = Timber::get_menu('primary-menu');
$context['viewmodel'] = new CptTopListViewModel();

$templates = array( 'archive-carrots.twig' );
Timber::render( $templates, $context );

wp_footer();