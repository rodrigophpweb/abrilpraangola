<?php
/**
 * Arquivo functions do tema. Carrega módulos do diretório inc/.
 */

/**
 * Array com os arquivos a serem carregados
 * Adicione novos arquivos aqui para facilitar a manutenção
 */
$theme_includes = array(
	'/inc/style-and-scripts.php',      // Gerenciador de estilos e scripts
	'/inc/fields/customize.php',       // Campos ACF de customização do tema
	'/inc/fields/frontPage.php',       // Campos ACF da página inicial
	'/inc/fields/theme-snippets.php',  // Snippets úteis para o tema
	'/inc/brand.php',                  // Configuração de Brand (logos, ícones)
	// Adicione novos arquivos aqui conforme necessário
);

/**
 * Loop para carregar os arquivos
 * Verifica se o arquivo existe antes de incluí-lo
 */
foreach ( $theme_includes as $file ) {
	$filepath = get_stylesheet_directory() . $file;
	
	if ( file_exists( $filepath ) ) {
		require_once $filepath;
	} else {
		// Log de erro para debug (opcional - pode comentar em produção)
		error_log( sprintf( 
			'Arquivo do tema não encontrado: %s', 
			$file 
		) );
	}
}

