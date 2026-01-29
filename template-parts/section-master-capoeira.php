<?php
/**
 * Template Part: Seção Mestre de Capoeira
 * Exibe informações sobre o Mestre de Capoeira
 */

// Verificar se a seção está habilitada
$enable = get_front_page_field('master_capoeira_enable', true);
if (!$enable) {
    return;
}

// Obter campos
$bg_color = get_front_page_field('master_capoeira_bg_color', '#F5F5F5');
$text_color = get_front_page_field('master_capoeira_text_color', '#333333');
$title_color = get_front_page_field('master_capoeira_title_color', '#1a1a1a');
$image = get_front_page_field('master_capoeira_image');
$title = get_front_page_field('master_capoeira_title', 'Mestre de Capoeira');
$content = get_front_page_field('master_capoeira_content');

// Se não houver conteúdo, não exibir a seção
if (!$image && !$title && !$content) {
    return;
}
?>

<section 
    class="MasterCapoeira" 
    itemscope 
    itemtype="https://schema.org/Person"
    style="--section-bg-color: <?php echo esc_attr($bg_color); ?>; --section-text-color: <?php echo esc_attr($text_color); ?>; --section-title-color: <?php echo esc_attr($title_color); ?>;"
    aria-labelledby="master-capoeira-title"
>
    <div class="container">
        
        <?php if ($image) : ?>
            <figure class="MasterCapoeira__figure" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                <img 
                    src="<?php echo esc_url($image['url']); ?>" 
                    alt="<?php echo esc_attr($image['alt'] ?: $title . ' - Fotografia do Mestre de Capoeira'); ?>"
                    width="<?php echo esc_attr($image['width']); ?>"
                    height="<?php echo esc_attr($image['height']); ?>"
                    loading="lazy"
                    itemprop="contentUrl"
                >
                <meta itemprop="description" content="<?php echo esc_attr($image['alt'] ?: $title); ?>">
                <meta itemprop="name" content="<?php echo esc_attr($image['title'] ?: $title); ?>">
            </figure>
        <?php endif; ?>

        <article class="MasterCapoeira__article">
            
            <?php if ($title) : ?>
                <h2 
                    id="master-capoeira-title" 
                    class="MasterCapoeira__title"
                    itemprop="name"
                >
                    <?php echo esc_html($title); ?>
                </h2>
            <?php endif; ?>
            
            <?php if ($content) : ?>
                <div 
                    class="MasterCapoeira__content"
                    itemprop="description"
                >
                    <?php echo wp_kses_post($content); ?>
                </div>
            <?php endif; ?>
            
            <meta itemprop="jobTitle" content="Mestre de Capoeira">
            <meta itemprop="knowsAbout" content="Capoeira">
            
        </article>
        
    </div>
</section>
