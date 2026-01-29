<?php
/**
 * Custom Post Types
 *
 * Register custom post types used by the theme:
 * - Banners
 * - Oficineiros
 * - Parceiros
 * - Tickets
 * - Locais
 * - Depoimentos
 *
 * All post types include support for title, editor, thumbnail and custom-fields (for ACF compatibility).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register theme custom post types.
 */
function wp_capoeira_register_cpts() {
	$cpts = array(
		array(
			'slug'      => 'banners',
			'singular'  => 'Banner',
			'plural'    => 'Banners',
			'icon'      => 'dashicons-format-image',
			'has_archive' => false,
		),
		array(
			'slug'      => 'oficineiros',
			'singular'  => 'Oficineiro',
			'plural'    => 'Oficineiros',
			'icon'      => 'dashicons-groups',
			'has_archive' => false,
		),
		array(
			'slug'      => 'parceiros',
			'singular'  => 'Parceiro',
			'plural'    => 'Parceiros',
			'icon'      => 'dashicons-businessperson',
			'has_archive' => false,
		),
		array(
			'slug'      => 'tickets',
			'singular'  => 'Ticket',
			'plural'    => 'Tickets',
			'icon'      => 'dashicons-tickets',
			'has_archive' => false,
		),
		array(
			'slug'      => 'locais',
			'singular'  => 'Local',
			'plural'    => 'Locais',
			'icon'      => 'dashicons-location-alt',
			'has_archive' => false,
		),
		array(
			'slug'      => 'depoimentos',
			'singular'  => 'Depoimento',
			'plural'    => 'Depoimentos',
			'icon'      => 'dashicons-format-quote',
			'has_archive' => false,
		),
		array(
			'slug'      => 'programacao',
			'singular'  => 'Programação',
			'plural'    => 'Programações',
			'icon'      => 'dashicons-calendar',
			'has_archive' => false,
		),
	);

	foreach ( $cpts as $cpt ) {
		$singular = $cpt['singular'];
		$plural   = $cpt['plural'];

		$labels = array(
			'name'               => $plural,
			'singular_name'      => $singular,
			'menu_name'          => $plural,
			'name_admin_bar'     => $singular,
			'add_new'            => 'Adicionar novo',
			'add_new_item'       => "Adicionar novo $singular",
			'new_item'           => "Novo $singular",
			'edit_item'          => "Editar $singular",
			'view_item'          => "Visualizar $singular",
			'all_items'          => "Todos os $plural",
			'search_items'       => "Buscar $plural",
			'parent_item_colon'  => '',
			'not_found'          => "Nenhum $singular encontrado.",
			'not_found_in_trash' => "Nenhum $singular na lixeira.",
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => $cpt['slug'], 'with_front' => false ),
			'capability_type'    => 'post',
			'has_archive'        => $cpt['has_archive'],
			'hierarchical'       => false,
			'menu_position'      => 20,
			'menu_icon'          => $cpt['icon'],
			'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' ), // custom-fields for ACF compatibility
			'show_in_rest'       => true, // enable Gutenberg / REST
		);

		register_post_type( $cpt['slug'], $args );
	}

	/**
	 * Register taxonomy 'dia' for the 'programacao' post type.
	 * - Assumption: taxonomy is non-hierarchical (like tags). If you prefer hierarchical (like categories), we can change 'hierarchical' => true.
	 */
	$tax_labels = array(
		'name'              => 'Dias',
		'singular_name'     => 'Dia',
		'search_items'      => 'Buscar Dias',
		'all_items'         => 'Todos os Dias',
		'parent_item'       => 'Dia Pai',
		'parent_item_colon' => 'Dia Pai:',
		'edit_item'         => 'Editar Dia',
		'update_item'       => 'Atualizar Dia',
		'add_new_item'      => 'Adicionar novo Dia',
		'new_item_name'     => 'Novo nome do Dia',
		'menu_name'         => 'Dias',
	);

	$tax_args = array(
		'hierarchical'      => false, // false = tag-like, true = category-like
		'labels'            => $tax_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'update_count_callback' => '',
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'dia', 'with_front' => false ),
		'show_in_rest'      => true,
	);

	register_taxonomy( 'dia', array( 'programacao' ), $tax_args );
}

add_action( 'init', 'wp_capoeira_register_cpts' );

// Mark todo items completed
// (The manage_todo_list was used earlier; subsequent status updates are manual comments here.)

