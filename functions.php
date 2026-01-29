<?php
/**
 * Arquivo functions do tema. Carrega módulos do diretório inc/.
 */

// Carrega o gerenciador de estilos e scripts
if ( file_exists( get_stylesheet_directory() . '/inc/style-and-scripts.php' ) ) {
	require_once get_stylesheet_directory() . '/inc/style-and-scripts.php';
}

// Carrega os campos ACF personalizados
if ( file_exists( get_stylesheet_directory() . '/inc/fields/customize.php' ) ) {
	require_once get_stylesheet_directory() . '/inc/fields/customize.php';
}

// Carrega snippets úteis para usar no tema
if ( file_exists( get_stylesheet_directory() . '/inc/fields/theme-snippets.php' ) ) {
	require_once get_stylesheet_directory() . '/inc/fields/theme-snippets.php';
}

// Carrega configuração de Brand (logos, ícones, identidade visual)
if ( file_exists( get_stylesheet_directory() . '/inc/brand.php' ) ) {
	require_once get_stylesheet_directory() . '/inc/brand.php';
}

