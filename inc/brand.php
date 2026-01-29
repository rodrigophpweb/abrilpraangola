<?php
/**
 * Brand Configuration - Configuração de Marca do Evento
 * Upload de logos, ícones e identidade visual
 */

// Prevenir acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Adicionar suporte a logo customizado
 */
add_theme_support('custom-logo', array(
    'height'               => 100,
    'width'                => 400,
    'flex-height'          => true,
    'flex-width'           => true,
    'header-text'          => array('site-title', 'site-description'),
    'unlink-homepage-logo' => true,
));

/**
 * Adicionar suporte a site icon (favicon)
 */
add_theme_support('site-icon');

/**
 * Habilitar upload de arquivos SVG
 */
add_filter('upload_mimes', 'brand_allow_svg_upload');

function brand_allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}

/**
 * Verificar e sanitizar SVG durante upload
 */
add_filter('wp_check_filetype_and_ext', 'brand_check_svg_filetype', 10, 4);

function brand_check_svg_filetype($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype($filename, $mimes);
    
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}

/**
 * Corrigir preview de SVG na biblioteca de mídia
 */
add_filter('wp_prepare_attachment_for_js', 'brand_svg_media_preview', 10, 3);

function brand_svg_media_preview($response, $attachment, $meta) {
    if ($response['mime'] === 'image/svg+xml' && empty($response['sizes'])) {
        $svg_path = get_attached_file($attachment->ID);
        
        if (file_exists($svg_path)) {
            $svg_content = file_get_contents($svg_path);
            $svg_dimensions = brand_get_svg_dimensions($svg_content);
            
            $response['sizes'] = [
                'full' => [
                    'url' => $response['url'],
                    'width' => $svg_dimensions['width'],
                    'height' => $svg_dimensions['height'],
                    'orientation' => $svg_dimensions['width'] > $svg_dimensions['height'] ? 'landscape' : 'portrait'
                ]
            ];
        }
    }
    
    return $response;
}

/**
 * Extrair dimensões do SVG
 */
function brand_get_svg_dimensions($svg) {
    $svg = simplexml_load_string($svg);
    
    if ($svg === false) {
        return ['width' => 100, 'height' => 100];
    }
    
    $attributes = $svg->attributes();
    $width = (string) $attributes->width;
    $height = (string) $attributes->height;
    
    // Se não tiver width/height, tentar viewBox
    if (empty($width) || empty($height)) {
        $viewbox = (string) $attributes->viewBox;
        
        if (!empty($viewbox)) {
            $sizes = explode(' ', $viewbox);
            if (count($sizes) == 4) {
                $width = $sizes[2];
                $height = $sizes[3];
            }
        }
    }
    
    // Remover unidades (px, em, etc)
    $width = preg_replace('/[^0-9.]/', '', $width);
    $height = preg_replace('/[^0-9.]/', '', $height);
    
    return [
        'width' => !empty($width) ? intval($width) : 100,
        'height' => !empty($height) ? intval($height) : 100
    ];
}

/**
 * Adicionar CSS para exibir SVG corretamente no admin
 */
add_action('admin_head', 'brand_svg_admin_styles');

function brand_svg_admin_styles() {
    echo '<style>
        .attachment-266x266[src$=".svg"],
        .attachment-post-thumbnail[src$=".svg"],
        img[src$=".svg"] {
            width: 100% !important;
            height: auto !important;
        }
    </style>';
}

/**
 * Personalizar o Customizer para Brand
 */
add_action('customize_register', 'theme_brand_customizer');

function theme_brand_customizer($wp_customize) {
    
    // ========================================
    // SEÇÃO: IDENTIDADE DA MARCA
    // ========================================
    $wp_customize->add_section('brand_identity', array(
        'title'       => 'Identidade da Marca',
        'description' => 'Configure logos, ícones e identidade visual do evento',
        'priority'    => 20,
    ));

    // Logo Principal (já existe por padrão, só movemos para nossa seção)
    $wp_customize->get_control('custom_logo')->section = 'brand_identity';
    $wp_customize->get_control('custom_logo')->priority = 10;

    // Site Icon (já existe por padrão, só movemos)
    if ($wp_customize->get_control('site_icon')) {
        $wp_customize->get_control('site_icon')->section = 'brand_identity';
        $wp_customize->get_control('site_icon')->priority = 20;
    }

    // ========================================
    // LOGO ALTERNATIVO (para header escuro)
    // ========================================
    $wp_customize->add_setting('brand_logo_alt', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'brand_logo_alt', array(
        'label'       => 'Logo Alternativo',
        'description' => 'Logo para usar em fundos escuros (opcional)',
        'section'     => 'brand_identity',
        'mime_type'   => 'image',
        'priority'    => 30,
    )));

    // ========================================
    // LOGO FOOTER
    // ========================================
    $wp_customize->add_setting('brand_logo_footer', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'brand_logo_footer', array(
        'label'       => 'Logo do Rodapé',
        'description' => 'Logo específico para o rodapé (opcional)',
        'section'     => 'brand_identity',
        'mime_type'   => 'image',
        'priority'    => 40,
    )));

    // ========================================
    // ÍCONE/SÍMBOLO (versão simplificada)
    // ========================================
    $wp_customize->add_setting('brand_icon', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'brand_icon', array(
        'label'       => 'Ícone/Símbolo',
        'description' => 'Versão simplificada do logo (apenas símbolo)',
        'section'     => 'brand_identity',
        'mime_type'   => 'image',
        'priority'    => 50,
    )));

    // ========================================
    // MARCA D\'ÁGUA
    // ========================================
    $wp_customize->add_setting('brand_watermark', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'brand_watermark', array(
        'label'       => 'Marca d\'água',
        'description' => 'Marca d\'água para usar em imagens',
        'section'     => 'brand_identity',
        'mime_type'   => 'image',
        'priority'    => 60,
    )));

    // ========================================
    // TAMANHO DO LOGO (altura máxima)
    // ========================================
    $wp_customize->add_setting('brand_logo_height', array(
        'default'           => '80',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('brand_logo_height', array(
        'label'       => 'Altura Máxima do Logo (px)',
        'description' => 'Altura máxima do logo no header',
        'section'     => 'brand_identity',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 40,
            'max'  => 200,
            'step' => 5,
        ),
        'priority'    => 70,
    ));

    // ========================================
    // POSIÇÃO DO LOGO
    // ========================================
    $wp_customize->add_setting('brand_logo_position', array(
        'default'           => 'left',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('brand_logo_position', array(
        'label'    => 'Posição do Logo',
        'section'  => 'brand_identity',
        'type'     => 'select',
        'choices'  => array(
            'left'   => 'Esquerda',
            'center' => 'Centro',
            'right'  => 'Direita',
        ),
        'priority' => 80,
    ));

    // ========================================
    // EXIBIR NOME DO SITE
    // ========================================
    $wp_customize->add_setting('brand_show_site_title', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('brand_show_site_title', array(
        'label'    => 'Exibir Nome do Site',
        'section'  => 'brand_identity',
        'type'     => 'checkbox',
        'priority' => 90,
    ));

    // ========================================
    // EXIBIR TAGLINE
    // ========================================
    $wp_customize->add_setting('brand_show_tagline', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('brand_show_tagline', array(
        'label'    => 'Exibir Tagline',
        'section'  => 'brand_identity',
        'type'     => 'checkbox',
        'priority' => 100,
    ));

    // ========================================
    // SEÇÃO: OPEN GRAPH
    // ========================================
    $wp_customize->add_section('brand_og', array(
        'title'       => 'Open Graph (Redes Sociais)',
        'description' => 'Imagens para compartilhamento em redes sociais',
        'priority'    => 25,
    ));

    // Imagem OG padrão
    $wp_customize->add_setting('brand_og_image', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'brand_og_image', array(
        'label'       => 'Imagem Open Graph',
        'description' => 'Imagem padrão para compartilhamento (1200x630px recomendado)',
        'section'     => 'brand_og',
        'mime_type'   => 'image',
    )));

    // ========================================
    // SEÇÃO: ÍCONES PWA
    // ========================================
    $wp_customize->add_section('brand_pwa', array(
        'title'       => 'Ícones PWA',
        'description' => 'Ícones para Progressive Web App',
        'priority'    => 30,
    ));

    // Ícone 192x192
    $wp_customize->add_setting('brand_pwa_icon_192', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'brand_pwa_icon_192', array(
        'label'       => 'Ícone PWA 192x192',
        'description' => 'Ícone PNG 192x192px',
        'section'     => 'brand_pwa',
        'mime_type'   => 'image',
    )));

    // Ícone 512x512
    $wp_customize->add_setting('brand_pwa_icon_512', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'brand_pwa_icon_512', array(
        'label'       => 'Ícone PWA 512x512',
        'description' => 'Ícone PNG 512x512px',
        'section'     => 'brand_pwa',
        'mime_type'   => 'image',
    )));

    // Apple Touch Icon
    $wp_customize->add_setting('brand_apple_touch_icon', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'brand_apple_touch_icon', array(
        'label'       => 'Apple Touch Icon',
        'description' => 'Ícone PNG 180x180px para iOS',
        'section'     => 'brand_pwa',
        'mime_type'   => 'image',
    )));
}

/**
 * Funções helper para pegar os valores
 */
function get_brand_option($option, $default = '') {
    $value = get_theme_mod($option, $default);
    return $value ? $value : $default;
}

/**
 * Exibir logo do site
 */
function display_custom_logo($type = 'default') {
    $logo_id = null;
    $css_class = 'custom-logo';
    
    // Selecionar qual logo usar
    switch ($type) {
        case 'alt':
            $logo_id = get_brand_option('brand_logo_alt');
            $css_class = 'custom-logo custom-logo-alt';
            break;
        case 'footer':
            $logo_id = get_brand_option('brand_logo_footer');
            $css_class = 'custom-logo custom-logo-footer';
            break;
        case 'icon':
            $logo_id = get_brand_option('brand_icon');
            $css_class = 'brand-icon';
            break;
        default:
            $logo_id = get_theme_mod('custom_logo');
            break;
    }
    
    // Se não houver logo específico, usar o padrão
    if (!$logo_id && $type !== 'default') {
        $logo_id = get_theme_mod('custom_logo');
    }
    
    if ($logo_id) {
        $logo_height = get_brand_option('brand_logo_height', 80);
        $logo_position = get_brand_option('brand_logo_position', 'left');
        
        $logo_attr = array(
            'class'    => $css_class,
            'itemprop' => 'logo',
        );
        
        $image = wp_get_attachment_image($logo_id, 'full', false, $logo_attr);
        
        $wrapper_class = 'custom-logo-link logo-position-' . esc_attr($logo_position);
        
        printf(
            '<a href="%1$s" class="%2$s" rel="home" style="--logo-height: %3$dpx">%4$s</a>',
            esc_url(home_url('/')),
            esc_attr($wrapper_class),
            absint($logo_height),
            $image
        );
    } else {
        // Fallback para texto
        printf(
            '<a href="%1$s" class="site-title-link" rel="home"><h1 class="site-title">%2$s</h1></a>',
            esc_url(home_url('/')),
            esc_html(get_bloginfo('name'))
        );
    }
}

/**
 * Exibir nome do site e tagline (se configurado)
 */
function display_site_identity() {
    $show_title = get_brand_option('brand_show_site_title', true);
    $show_tagline = get_brand_option('brand_show_tagline', true);
    
    if (!$show_title && !$show_tagline) {
        return;
    }
    
    echo '<div class="site-branding-text">';
    
    if ($show_title) {
        printf(
            '<h1 class="site-title"><a href="%1$s" rel="home">%2$s</a></h1>',
            esc_url(home_url('/')),
            esc_html(get_bloginfo('name'))
        );
    }
    
    if ($show_tagline && get_bloginfo('description')) {
        printf(
            '<p class="site-description">%s</p>',
            esc_html(get_bloginfo('description'))
        );
    }
    
    echo '</div>';
}

/**
 * Adicionar meta tags para PWA e Open Graph no head
 */
add_action('wp_head', 'brand_meta_tags');

function brand_meta_tags() {
    // Open Graph
    $og_image_id = get_brand_option('brand_og_image');
    if ($og_image_id) {
        $og_image = wp_get_attachment_image_url($og_image_id, 'full');
        echo '<meta property="og:image" content="' . esc_url($og_image) . '">' . "\n";
        echo '<meta property="og:image:width" content="1200">' . "\n";
        echo '<meta property="og:image:height" content="630">' . "\n";
        echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
        echo '<meta name="twitter:image" content="' . esc_url($og_image) . '">' . "\n";
    }
    
    // Apple Touch Icon
    $apple_icon_id = get_brand_option('brand_apple_touch_icon');
    if ($apple_icon_id) {
        $apple_icon = wp_get_attachment_image_url($apple_icon_id, 'full');
        echo '<link rel="apple-touch-icon" href="' . esc_url($apple_icon) . '">' . "\n";
    }
    
    // PWA Icons
    $pwa_192_id = get_brand_option('brand_pwa_icon_192');
    $pwa_512_id = get_brand_option('brand_pwa_icon_512');
    
    if ($pwa_192_id || $pwa_512_id) {
        echo '<link rel="manifest" href="' . esc_url(home_url('/manifest.json')) . '">' . "\n";
    }
}

/**
 * Adicionar CSS inline para customizações do logo
 */
add_action('wp_head', 'brand_inline_styles');

function brand_inline_styles() {
    $logo_height = get_brand_option('brand_logo_height', 80);
    $logo_position = get_brand_option('brand_logo_position', 'left');
    
    ?>
    <style id="brand-custom-styles">
        .custom-logo-link {
            display: inline-block;
        }
        
        .custom-logo {
            max-height: var(--logo-height, <?php echo absint($logo_height); ?>px);
            width: auto;
            height: auto;
        }
        
        .logo-position-center {
            display: flex;
            justify-content: center;
        }
        
        .logo-position-right {
            display: flex;
            justify-content: flex-end;
        }
        
        <?php if (!get_brand_option('brand_show_site_title', true)): ?>
        .site-title {
            display: none;
        }
        <?php endif; ?>
        
        <?php if (!get_brand_option('brand_show_tagline', true)): ?>
        .site-description {
            display: none;
        }
        <?php endif; ?>
    </style>
    <?php
}

/**
 * Registrar tamanhos de imagem personalizados
 */
add_action('after_setup_theme', 'brand_image_sizes');

function brand_image_sizes() {
    // Logo padrão
    add_image_size('logo-default', 400, 100, false);
    
    // Logo mobile
    add_image_size('logo-mobile', 250, 80, false);
    
    // Open Graph
    add_image_size('og-image', 1200, 630, true);
    
    // PWA Icons
    add_image_size('pwa-icon-192', 192, 192, true);
    add_image_size('pwa-icon-512', 512, 512, true);
    
    // Apple Touch Icon
    add_image_size('apple-touch-icon', 180, 180, true);
}
