<?php
/**
 * Template Part: Hero Section
 * Seção principal de destaque com imagem de fundo
 */

// Pegar cor de fundo via ACF (se não tiver, usa padrão)
$hero_bg_color = get_field('hero_bg_color') ?: 'var(--color-bg-dark)';

// Imagem de fundo (prioridade: ACF > Imagem Destacada)
$hero_image = get_field('hero_background_image');
if (!$hero_image && has_post_thumbnail()) {
    $hero_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
} elseif (is_array($hero_image)) {
    $hero_image = $hero_image['url'];
}

// Logo do evento (prioridade: ACF > Brand Icon > Logo Padrão)
$hero_logo = get_field('hero_logo');
if (!$hero_logo) {
    $logo_id = get_brand_option('brand_icon') ?: get_theme_mod('custom_logo');
    if ($logo_id) {
        $hero_logo = wp_get_attachment_image_url($logo_id, 'full');
    }
} elseif (is_array($hero_logo)) {
    $hero_logo = $hero_logo['url'];
}

// Textos
$site_name = get_bloginfo('name');
$site_description = get_bloginfo('description');
?>

<section class="hero section-dark" style="--hero-bg-color: <?php echo esc_attr($hero_bg_color); ?>;">
    
    <?php if ($hero_image): ?>
        <figure class="hero__background">
            <img src="<?php echo esc_url($hero_image); ?>" 
                 alt="<?php echo esc_attr($site_name); ?>" 
                 loading="eager">
            <div class="hero__overlay"></div>
        </figure>
    <?php endif; ?>
    
    <div class="hero__content">
        <div class="container">
            
            <?php if ($hero_logo): ?>
                <div class="hero__logo" data-aos="fade-down" data-aos-duration="1000">
                    <img src="<?php echo esc_url($hero_logo); ?>" 
                         alt="Logo <?php echo esc_attr($site_name); ?>">
                </div>
            <?php endif; ?>
            
            <h1 class="hero__title" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                Seja Bem-Vindo ao<br>
                <span class="hero__title-highlight"><?php echo esc_html($site_name); ?></span>
            </h1>
            
            <?php if ($site_description): ?>
                <p class="hero__subtitle" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                    <?php echo esc_html($site_description); ?>
                </p>
            <?php endif; ?>
            
            <?php 
            // Botões de ação (opcional)
            $hero_button_text = get_field('hero_button_text');
            $hero_button_link = get_field('hero_button_link');
            
            if ($hero_button_text && $hero_button_link): 
            ?>
                <div class="hero__actions" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                    <a href="<?php echo esc_url($hero_button_link); ?>" class="hero__button">
                        <?php echo esc_html($hero_button_text); ?>
                    </a>
                </div>
            <?php endif; ?>
            
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="hero__scroll" data-aos="fade" data-aos-delay="1000">
        <span class="hero__scroll-text">Role para baixo</span>
        <svg class="hero__scroll-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="6 9 12 15 18 9"></polyline>
        </svg>
    </div>
    
</section>
