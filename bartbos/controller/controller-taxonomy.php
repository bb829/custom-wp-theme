<?php  
add_action( 'acf/init', 'register_taxonomies', 0 );
  
function register_taxonomies() {
	register_taxonomy('sizes', ['carrots'], [
		'label' => __('Sizes'),
		'hierarchical' => false,
		'rewrite' => ['slug' => 'carrot-size'],
		'show_admin_column' => true,
		'show_in_rest' => true,
		'labels' => [
			'singular_name' => __('Size'),
			'all_items' => __('All sizes'),
			'edit_item' => __('Edit size'),
			'view_item' => __('View size'),
			'update_item' => __('Update size'),
			'add_new_item' => __('Add new size'),
			'new_item_name' => __('New size Name'),
			'search_items' => __('Search sizes'),
			'popular_items' => __('Popular sizes'),
			'separate_items_with_commas' => __('Separate sizes with comma'),
			'choose_from_most_used' => __('Choose from most used sizes'),
			'not_found' => __('No sizes found'),
		]
	]); 
}