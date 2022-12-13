<?php

/** 
 * Arquivo mágico do tema. Não é um arquivo obrigatório, mas é essencial para a
 * organização do código, para ativar funcionalidades no tema como menus, thumbnails,
 * novos tamanhos de imagem, entre outros. Funciona basicamente como um plugin
 * dentro do tema, e é carregado primeiro, antes de qualquer template do tema.
 * 
 * @since Essential
 */

	/**
	 * Função de segurança para evitar que o arquivo seja lido diretamente no 
	 * navegador, o que pode expor o caminho físico do arquivo no servidor. Insira
	 * esse trecho de código em todos os arquivos do tema.
	 * 
	 * @since Standard
	 */
	if ( ! function_exists( 'add_action' ) ) {
		exit;
	}

/**
 * Hook de ação do WordPress executado sempre que uma página é carregada logo após
 * o tema ser inicializado. Utilize-o para organizar melhor seu arquivo functions.
 * 
 * @since Standard
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/after_setup_theme
 */
add_action( 'after_setup_theme', 'abrilpraangola_setup_theme' );

/**
 * abrilpraangola Setup Theme
 * 
 * Função de setup do tema, inicializa todos os hooks do tema, e realiza a chamada
 * para funções que criam algumas "features" do tema.
 * 
 * Chamada no hook after_setup_theme
 * 
 * @return void
 * @since Standard
 */
function abrilpraangola_setup_theme(){
	/**
	 * Crie funções que façam somente um procedimento, tenham somente uma lógica, 
	 * para facilitar futuras manutenções no código.
	 * 
	 * Sempre utilize prefixos nas funções criadas para evitar conflitos com outras
	 * funções já existentes.
	 * 
	 * @since Standard
	 */
	abrilpraangola_theme_supports();
	abrilpraangola_nav_menus();

	/**
	 * Assinatura de todos os hooks do WordPress. Os hooks (ganchos) são a maneira 
	 * que temos de personalizar/modificar algum comportamento padrão do WordPress
	 * sem precisar alterar seu código fonte. Existem dois tipos de hooks, os de 
	 * ação e os de filtro. Para os hooks de ação sempre utilizamos add_action() e 
	 * para os filtros utilizamos add_filter().
	 * 
	 * @since Standard
	 * @link https://codex.wordpress.org/Function_Reference/add_action
	 * @link https://codex.wordpress.org/Function_Reference/add_filter
	 */
	add_action( 'the_generator', '__return_false' ); 
	// Segurança: Remove a meta tag generator do cabeçalho
	
	include('inc/style-scripts.php');     
	// Call Functions CSS and JS

	//include('inc/acf/fields.php');
	//Include fields of Plugin ACF


	add_action( 'wp_ajax_more_posts', 'abrilpraangola_more_posts_ajax' ); 
	// Captura uma requisição ajax para usuários logados 
	
	add_action( 'wp_ajax_nopriv_more_posts', 'abrilpraangola_more_posts_ajax' ); 
	// Captura uma requisição ajax para usuários não logados

	load_theme_textdomain( 'abrilpraangola', get_template_directory() . '/languages' );
	//Carrega o arquivo .mo que contém as traduções das strings internacionalizadas dentro do tema.
}

function abrilpraangola_theme_supports(){
	$logo = [
        'height'               => 117,
        'width'                => 68,
        'flex-height'          => true,
        'flex-width'           => true,
	];
	/**
	 * Adiciona ao tema suporte à imagem destacadas
	 * 
	 * @since Essential
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', $logo );
    add_theme_support( 'title-tag' );

	/**
	 * Adiciona ao tema suporte à tags html5
	 * 
	 * @since Essential
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support
	 */
	add_theme_support( 'html5', 
		[ 
			'comment-list', 
			'comment-form', 
			'search-form', 
			'gallery', 
			'caption',
			'style',
			'script'
        ] 
	);
}

/**
 * abrilpraangola Nav Menus
 * 
 * Função do tema criada para registrar as áreas de menu. Não é chamada por nenhum
 * hook, mas pela função de setup do tema.
 * 
 * @since Standard
 */
function abrilpraangola_nav_menus(){
	/**
	 * Adiciona ao tema áreas de menu que podem ser configuradas via administração
	 * 
	 * @since Essential
	 * @link http://codex.wordpress.org/Function_Reference/register_nav_menu
	 */
	register_nav_menu( 'header', 'Menu do cabeçalho.' );
	register_nav_menu( 'footer-column-1', 'Coluna 01 Rodapé.' );
	register_nav_menu( 'footer-column-2', 'Coluna 02 Rodapé.' );
	register_nav_menu( 'footer-column-3', 'Coluna 03 Rodapé.' );
	register_nav_menu( 'footer-column-4', 'Coluna 04 Rodapé.' );

}


//Remover Versão do WordPress
function remove_version() {
	return '';
}
add_filter('the_generator', 'remove_version');

//Function wp_body_open
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}


//Disable function REST API
add_filter('rest_enabled', '__return_false');
add_filter('rest_jsonp_enabled', '__return_false');
remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'template_redirect', 'rest_output_link_header', 11 );

add_filter( 'webpc_site_root', function( $path ) {
    return 'html/wp-content/themes/senacevent/'; // your valid path to root
} );
add_filter( 'webpc_dir_name', function( $path, $directory ) {
    if ( $directory !== 'uploads' ) {
        return $path;
    }
    return 'wp-content/uploads';
}, 10, 2 );
add_filter( 'webpc_dir_name', function( $path, $directory ) {
    if ( $directory !== 'webp' ) {
        return $path;
    }
    return 'wp-content/uploads-webpc';
}, 10, 2 );
add_filter( 'webpc_uploads_prefix', function( $prefix ) {
    return '/';
} );


//Removendo os comentários
add_action( 'init', 'remove_custom_post_comment' );
function remove_custom_post_comment() {
    remove_post_type_support( 'book', 'comments' );
} 


function codeless_remove_type_attr($tag) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}

/**
 * Responsive Image Helper Function
 *
 * @param string $image_id the id of the image (from ACF or similar)
 * @param string $image_size the size of the thumbnail image or custom image size
 * @param string $max_width the max width this image will be shown to build the sizes attribute 
 */

function awesome_acf_responsive_image($image_id,$image_size,$max_width){

	// check the image ID is not blank
	if($image_id != '') {

		// set the default src image size
		$image_src = wp_get_attachment_image_url( $image_id, $image_size );

		// set the srcset with various image sizes
		$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );

		// generate the markup for the responsive image
		echo 'src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'"';

	}
}

// Options themes
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Opções de Tema',
		'menu_title'	=> 'Opções de Tema',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Configurações em Header',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Configurações em Footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Configurações em Rodapé',
		'menu_title'	=> 'Páginas Internas',
		'parent_slug'	=> 'theme-general-settings',
	));
}

//Remove emoji do WordPress

/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	
	// Remove from TinyMCE
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter out the tinymce emoji plugin.
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

// Create Post Type Mestres
function create_post_type_mestres() {
    register_post_type( 'mestres',
        array(
            'labels' => array(
                'name' => __( 'Mestres' ),
                'singular_name' => __( 'Mestres' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'mestres'),
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-groups',
        )
    );
}   
add_action( 'init', 'create_post_type_mestres' );

// Create Post Type Pacotes
function create_post_type_pacotes() {
    register_post_type( 'pacotes',
        array(
            'labels' => array(
                'name' => __( 'Pacotes' ),
                'singular_name' => __( 'Pacotes' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'pacotes'),
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-clipboard',
        )
    );
}
add_action( 'init', 'create_post_type_pacotes' );

// Create Post Type events
function create_post_type_events() {
    register_post_type( 'events',
        array(
            'labels' => array(
                'name' => __( 'Eventos' ),
                'singular_name' => __( 'Eventos' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'events'),
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-calendar-alt',
        )
    );
}   
add_action( 'init', 'create_post_type_events' );

// Create Post Type Patrocinadores
function create_post_type_patrocinadores() {
	register_post_type( 'patrocinadores',
		array(
			'labels' => array(
				'name' => __( 'Patrocinadores' ),
				'singular_name' => __( 'Patrocinadores' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'patrocinadores'),
			'supports' => array('title', 'editor', 'thumbnail'),
			'menu_icon' => 'dashicons-heart',
		)
	);
}
add_action( 'init', 'create_post_type_patrocinadores' );