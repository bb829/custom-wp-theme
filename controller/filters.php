<?php
// MOET NOG VERSCHILLENDE INPUT COMBINATIES OPVANGEN
function filterPosts($data)
{

	$response = '';

	$args = array(
		'post_type' => 'evenement',
		'posts_per_page' => -1,
	);

	if($_POST['locatie'] > 1 ) {
	$args = array(
		'post_type' => 'evenement',
		'posts_per_page' => -1,
		'meta_query' => array(
			array(
				'key' => 'locatie',
				'value' => $_POST['locatie'],
				'compare' => 'LIKE',
			)
		)	
	);
	}

	if(strlen($_POST['datumvan']) >= 1) {

		$date = str_replace('-', '', $_POST['datumvan']);

		$day = substr($date, 0, 2);
		$month = substr($date, 2, 2);
		$year = substr($date, 4, 4);
	
		$formatted_date = "$year$month$day";

			$args = array(
				'post_type' => 'evenement',
				'posts_per_page' => -1,
				'meta_query' => array(
					array(
						'key' => 'datum',
						'type' => 'DATE',
						'value' => $formatted_date,
						'compare' => '>='
					) 
				)	
			);

	}

	if(strlen($_POST['datumtot']) >= 1) {

		$date = str_replace('-', '', $_POST['datumtot']);

		$day = substr($date, 0, 2);
		$month = substr($date, 2, 2);
		$year = substr($date, 4, 4);
	
		$formatted_date = "$year$month$day";

		$args = array(
			'post_type' => 'evenement',
			'posts_per_page' => -1,
			'meta_query' => array(
				array(
					'key' => 'datum',
					'type' => 'DATE',
					'value' => $formatted_date,
					'compare' => '<='
				)
			)	
		);

	}

	if(strlen($_POST['datumvan']) >= 1 && strlen($_POST['datumtot']) >= 1) {
		
		$dateFrom = str_replace('-', '', $_POST['datumvan']);
		$dayFrom = substr($dateFrom, 0, 2);
		$monthFrom = substr($dateFrom, 2, 2);
		$yearFrom = substr($dateFrom, 4, 4);
		$formattedFrom = "$yearFrom$monthFrom$dayFrom";

		$dateTo = str_replace('-', '', $_POST['datumtot']);
		$dayTo = substr($dateTo, 0, 2);
		$monthTo = substr($dateTo, 2, 2);
		$yearTo = substr($dateTo, 4, 4);
	
		$formattedTo = "$yearTo$monthTo$dayTo";

		$args = array(
			'post_type' => 'evenement',
			'posts_per_page' => -1,
			'meta_query' => array(
				array(
					'key' => 'datum',
					'type' => 'DATE',
					'value' => array($formattedFrom, $formattedTo),
					'compare' => 'BETWEEN',
				) 
			)	
		);
	}

	if($_POST['minprice'] >= 1) {
		$args = array(
			'post_type' => 'evenement',
			'posts_per_page' => -1,
			'meta_query' => array(
				array(
					'key' => 'prijs',
					'value' => $_POST['minprice'],
					'type' => 'NUMERIC',
					'compare' => '>='
				)
			)	
		);
	}

	if($_POST['maxprice'] >= 1) {

		$args = array(
			'post_type' => 'evenement',
			'posts_per_page' => -1,
			'meta_query' => array(
				array(
					'key' => 'prijs',
					'value' =>  $_POST['maxprice'],
					'type' => 'NUMERIC',
					'compare' => '<=',
				)
			)	
		);
	}

	if($_POST['minprice'] >= 1 && $_POST['maxprice'] >= 1) {
		$args = array(
			'post_type' => 'evenement',
			'posts_per_page' => -1,
			'meta_query' => array(
				array(
					'key' => 'prijs',
					'value' =>  array($_POST['minprice'], $_POST['maxprice']),
					'type' => 'NUMERIC',
					'compare' => 'BETWEEN',
				)
			)	
		);
	}

	// if(strlen($_POST['locatie']) > 1 && $_POST['maxprice'] >= 1) {

	// 	$minprice = 0;

	// 	if($_POST['minprice'] >= 1) {
	// 		$minprice = $_POST['minprice'];
	// 	}


	// 	$args = array(
	// 		'post_type' => 'evenement',
	// 		'posts_per_page' => -1,
	// 		'meta_query' => array(
	// 			array(
	// 				'key' => 'locatie',
	// 				'value' => $_POST['locatie'],
	// 				'compare' => 'LIKE',
	// 			),
	// 			array(
	// 				'key' => 'prijs',
	// 				'value' => array($minprice, $_POST['maxprice']),
	// 				'type' => 'NUMERIC',
	// 				'compare' => 'BETWEEN',
	// 			)
	// 		)	
	// 	);
	// 	}


	$posts = new WP_Query($args);

	if($posts->have_posts() ) {

	while ($posts->have_posts()) {
		$posts->the_post();

		$response .= '<div class="col-12 event py-4 position-relative d-flex">';

		$response .= '<div class="col-4 eventImage"><img src="' .
		get_the_post_thumbnail_url(get_the_ID()) .
		'"/></div>';
		
		$response .= '<div class="col-8 d-flex flex-column align-items-start row-gap-3">';
		
		$response .= '<div class="d-flex">';
		
		$response .= '<strong class="m-0 px-4 primaryColor">'
		. get_the_title() .
		'</strong>';
		
		$category = get_the_terms($posts->ID, "categories");
		
		
		$response .= '<span class="primaryBG px-2 py-1 primaryBG secondaryColor smallFont">' . ($category[0]->name ? $category[0]->name : 'Geen categorie')  .'</span>';
		
		$response .= '</div>';
		
		$response .= '<div class="d-flex column-gap-4 px-4">';
		
		if(get_field('locatie')) {
			$response .= '<div class="d-flex align-items-center column-gap-2">
				<i class="fa-solid fa-location-dot primaryColor"></i> <span>' . get_field('locatie') . '</span>
				</div>';
		}
		
		if(get_field('datum')) {
			$response .= '<div class="d-flex align-items-center column-gap-2"><i class="fa-solid fa-calendar-days primaryColor"></i> <span>' . get_field('datum') . '</span>
			</div>';
		}
		
		$response .= '<div class="d-flex align-items-center column-gap-2">
		<i class="fa-solid fa-tag primaryColor"></i> <span>' . (get_field('prijs') >= 1 ? ' € ' . get_field('prijs') : "Gratis")  . '</span>
		</div></div>';
		
		$response .= '<div class="d-flex flex-column align-items-start justify-content-between m-0 p-4 pt-0 pb-0 h-100 position-relative">
		<p>' . substr(get_the_content(), 0, 380) . '</p>
		<a href="' . get_permalink() . '" role="button" class="button-primary text-center">Bekijk evenement</a>
		</div>
		</div>';
		
		$response .= '</div>';
			}

	wp_reset_postdata();
	
} else {
	$response .= 'Geen evenementen gevonden';
}

return $response;


}