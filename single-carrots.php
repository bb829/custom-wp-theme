<?php
header();

$context['post'] = new Timber\Post();
$context['fields'] = get_fields();
$templates = array( 'cpt.twig' );
Timber::render( $templates, $context );

wp_footer();