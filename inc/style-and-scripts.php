<?php
/**
 * Gerencia enfileiramento de scripts e estilos do tema.
 * Carrega CSS por página, Google Fonts (Syne) e o script app.js com otimizações para pagespeed.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // evita acesso direto
}

function wp_capoeira_enqueue_assets() {
	$dir = get_stylesheet_directory();
	$uri = get_stylesheet_directory_uri();

	// Main style (style.css do tema)
	$main_style_file = $dir . '/style.css';
	$main_version = file_exists( $main_style_file ) ? filemtime( $main_style_file ) : wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'wp_capoeira_main', get_stylesheet_uri(), array(), $main_version );

	// Google Fonts: Syne family (toda a família de pesos)
	$fonts_url = 'https://fonts.googleapis.com/css2?family=Syne:wght@100;200;300;400;500;600;700;800;900&display=swap';
	wp_enqueue_style( 'wp_capoeira_fonts', $fonts_url, array(), null );

	// CSS específicos por página (assets/css/pages/*.css)
	$pages_dir = $dir . '/assets/css/pages';
	$pages_uri = $uri . '/assets/css/pages';
	$file_to_enqueue = '';

	// Prioridade de verificação: front, blog index, single, category, page (slug-specific > generic)
	if ( function_exists( 'is_front_page' ) && is_front_page() && file_exists( $pages_dir . '/front-page.css' ) ) {
		$file_to_enqueue = 'front-page.css';
	} elseif ( function_exists( 'is_home' ) && is_home() && file_exists( $pages_dir . '/index.css' ) ) {
		$file_to_enqueue = 'index.css';
	} elseif ( function_exists( 'is_single' ) && is_single() && file_exists( $pages_dir . '/single.css' ) ) {
		$file_to_enqueue = 'single.css';
	} elseif ( function_exists( 'is_category' ) && is_category() && file_exists( $pages_dir . '/category.css' ) ) {
		$file_to_enqueue = 'category.css';
	} elseif ( function_exists( 'is_page' ) && is_page() ) {
		$post = get_post();
		if ( $post ) {
			$slug = $post->post_name;
			// Se houver um CSS com nome do slug (ex: assets/css/pages/sobre.css), carregar esse
			if ( file_exists( $pages_dir . '/' . $slug . '.css' ) ) {
				$file_to_enqueue = $slug . '.css';
			} elseif ( file_exists( $pages_dir . '/page.css' ) ) {
				// fallback genérico para páginas
				$file_to_enqueue = 'page.css';
			}
		}
	}

	if ( $file_to_enqueue ) {
		$file_path = $pages_dir . '/' . $file_to_enqueue;
		$ver = file_exists( $file_path ) ? filemtime( $file_path ) : null;
		wp_enqueue_style( 'wp_capoeira_page_css', $pages_uri . '/' . $file_to_enqueue, array(), $ver );
	}

	// Enfileirar o script app.js no footer e com versão baseada em filemtime
	$js_file = $dir . '/assets/js/app.js';
	if ( file_exists( $js_file ) ) {
		$js_ver = filemtime( $js_file );
		wp_enqueue_script( 'wp_capoeira_app', $uri . '/assets/js/app.js', array(), $js_ver, true );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_capoeira_enqueue_assets', 10 );

/**
 * Adiciona resource hints para Google Fonts (preconnect) para melhorar LCP/TTFB
 */
function wp_capoeira_add_resource_hints() {
	echo "<link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">\n";
	echo "<link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>\n";
}
add_action( 'wp_head', 'wp_capoeira_add_resource_hints', 1 );

/**
 * Adiciona atributo defer ao nosso script principal para não bloquear o parser.
 */
function wp_capoeira_script_loader_defer( $tag, $handle ) {
	if ( 'wp_capoeira_app' === $handle ) {
		// se já tiver defer evita duplicar
		if ( false === strpos( $tag, ' defer' ) ) {
			return str_replace( '<script ', '<script defer ', $tag );
		}
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'wp_capoeira_script_loader_defer', 10, 2 );

