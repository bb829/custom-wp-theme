<?php
function getRest()
{
	register_rest_route(
		'rest',
		'/filter',
		array(
			'methods' => 'POST',
			'callback' => 'filterPosts',
		)
	);
}
add_action('rest_api_init', 'getRest');