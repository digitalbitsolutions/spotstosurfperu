<?php
/**
 * Register ACF fields for Tour Packages
 */
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_tour_packages',
	'title' => 'Detalles del Paquete Turístico',
	'fields' => array(
		array(
			'key' => 'field_location',
			'label' => 'Ubicación',
			'name' => 'ubicacion',
			'type' => 'text',
			'show_in_graphql' => true,
		),
		array(
			'key' => 'field_duration',
			'label' => 'Duración',
			'name' => 'duracion',
			'type' => 'text',
			'show_in_graphql' => true,
		),
		array(
			'key' => 'field_difficulty',
			'label' => 'Dificultad',
			'name' => 'dificultad',
			'type' => 'select',
			'choices' => array(
				'baja' => 'Baja',
				'media' => 'Media',
				'alta' => 'Alta',
			),
			'show_in_graphql' => true,
		),
		array(
			'key' => 'field_included',
			'label' => 'Incluye',
			'name' => 'incluye',
			'type' => 'textarea',
			'show_in_graphql' => true,
		),
		array(
			'key' => 'field_not_included',
			'label' => 'No Incluye',
			'name' => 'no_incluye',
			'type' => 'textarea',
			'show_in_graphql' => true,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'product',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_graphql' => true,
	'graphql_field_name' => 'detallesTour',
));

endif;
