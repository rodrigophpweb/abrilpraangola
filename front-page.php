<?php
/**
 * Template Name: Front Page
 * Página inicial do evento de capoeira
 * 
 * @package WP_Capoeira
 */

get_header();
?>

<main id="main-content" class="site-main" role="main">
    
    <?php
    /**
     * Seções da página inicial
     * Para desabilitar uma seção, comente ou remova do array
     * Para alterar ordem, reorganize os itens
     */
    $sections = [
        'hero'          => 'Seção de destaque principal',
        'about'         => 'Sobre o evento',
        'master-meinha' => 'Mestre de capoeira',
        'activities'    => 'Atividades do evento',
        'schedule'      => 'Programação',
        'speakers'      => 'Palestrantes',
        'guest'         => 'Convidados especiais',
        'tickets'       => 'Ingressos',
        'locale'        => 'Localização do evento',
        'subscribe'     => 'Inscrição/Newsletter',
        'sponsors'      => 'Patrocinadores',
    ];

    // Loop das seções
    foreach ($sections as $section => $description) {
        // Verifica se o arquivo existe antes de incluir
        $template_path = locate_template("template-parts/section-{$section}.php");
        
        if ($template_path) {
            get_template_part('template-parts/section', $section);
        } else {
            // Em desenvolvimento, mostra aviso (remover em produção)
            if (WP_DEBUG) {
                echo "<!-- Seção '{$section}' não encontrada: {$description} -->";
            }
        }
    }
    ?>

</main>

<?php
get_footer();

