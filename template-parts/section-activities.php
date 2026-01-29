<?php
/**
 * Template Part: Seção Atividades
 * Exibe informações sobre as Atividades de Capoeira
 */

// Verificar se a seção está habilitada
$enable = get_front_page_field('activities_enable', true);
if (!$enable) {
    return;
}

// Obter campos
$bg_color = get_front_page_field('activities_bg_color', '#FFFFFF');
$text_color = get_front_page_field('activities_text_color', '#333333');
$title_color = get_front_page_field('activities_title_color', '#1a1a1a');
$image = get_front_page_field('activities_image');
$title = get_front_page_field('activities_title', 'Nossas Atividades');
$content = get_front_page_field('activities_content');

// Se não houver conteúdo, não exibir a seção
if (!$image && !$title && !$content) {
    return;
}
?>

<section 
    class="Activities" 
    itemscope 
    itemtype="https://schema.org/Service"
    style="--section-bg-color: <?php echo esc_attr($bg_color); ?>; --section-text-color: <?php echo esc_attr($text_color); ?>; --section-title-color: <?php echo esc_attr($title_color); ?>;"
    aria-labelledby="activities-title"
>
    <div class="container">
        
        <article class="Activities__article">
            
            <?php if ($title) : ?>
                <h2 
                    id="activities-title" 
                    class="Activities__title"
                    itemprop="name"
                >
                    <?php echo esc_html($title); ?>
                </h2>
            <?php endif; ?>
            
            <?php if ($content) : ?>
                <div 
                    class="Activities__content"
                    itemprop="description"
                >
                    <?php echo wp_kses_post($content); ?>
                </div>
            <?php endif; ?>
            
            <meta itemprop="serviceType" content="Capoeira">
            <meta itemprop="category" content="Esportes e Artes Marciais">
            
        </article>
        
        <?php if ($image) : ?>
            <figure class="Activities__figure" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                <img 
                    src="<?php echo esc_url($image['url']); ?>" 
                    alt="<?php echo esc_attr($image['alt'] ?: $title . ' - Fotografia das Atividades de Capoeira'); ?>"
                    width="<?php echo esc_attr($image['width']); ?>"
                    height="<?php echo esc_attr($image['height']); ?>"
                    loading="lazy"
                    itemprop="contentUrl"
                >
                <meta itemprop="description" content="<?php echo esc_attr($image['alt'] ?: $title); ?>">
                <meta itemprop="name" content="<?php echo esc_attr($image['title'] ?: $title); ?>">
            </figure>
        <?php endif; ?>
        
    </div>
</section>
