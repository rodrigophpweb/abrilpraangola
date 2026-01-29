<?php
/**
 * Template for displaying pages
 */

get_header(); ?>

<?php get_template_part('breadcrumb'); ?>

<main id="main" class="site-main page-content">
    
    <?php
        while (have_posts()) : the_post();
            
            // Mapeamento de páginas específicas para suas seções
            $page_sections = [
                'sobre'        => 'about',
                'about'        => 'about',
                'programacao'  => 'schedule',
                'schedule'     => 'schedule',
                'oficineiros'  => 'speakers',
                'speakers'     => 'speakers',
                'pacotes'      => 'tickets',
                'tickets'      => 'tickets',
                'inscricao'    => 'subscribe',
                'subscribe'    => 'subscribe',
                'localizacao'  => 'locale',
                'locale'       => 'locale',
                'blog'         => 'blog',
                'contato'      => 'contact',
                'contact'      => 'contact'
            ];
            
            $current_section = null;
            
            // Verifica se a página atual tem uma seção específica
            foreach ($page_sections as $page_slug => $section) {
                if (is_page($page_slug)) {
                    $current_section = $section;
                    get_template_part('template-parts/section', $section);
                    break;
                }
            }
            
            // Se não for uma página específica, exibe conteúdo padrão
            if (!$current_section) {
                ?>
                <section class="page-section">
                    <div class="container">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="page-header">
                                <h1 class="page-title"><?php the_title(); ?></h1>
                            </header>

                            <div class="page-content-wrapper">
                                <?php the_content(); ?>
                            </div>
                        </article>
                    </div>
                </section>
                <?php
            }
            
        endwhile;
    ?>

    <?php
    // Seções a serem exibidas após o conteúdo principal
    $sections = ['testimonials', 'blog', 'subscribe', 'sponsors'];
    
    // Remove a seção se ela já foi exibida como página específica
    if ($current_section && in_array($current_section, $sections)) {
        $sections = array_diff($sections, [$current_section]);
    }
    
    foreach ($sections as $section) {
        get_template_part('template-parts/section', $section);
    }
    ?>

</main>

<?php
get_footer();
