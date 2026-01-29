<?php
/**
 * ACF Theme Options Page
 * Página de Opções do Tema com ACF
 */

// Prevenir acesso direto
if (!defined('ABSPATH')) {
    exit;
}

// Registrar página de opções do tema
if (function_exists('acf_add_options_page')) {
    
    acf_add_options_page(array(
        'page_title'    => 'Configurações do Tema',
        'menu_title'    => 'Opções do Tema',
        'menu_slug'     => 'theme-settings',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-admin-settings',
        'redirect'      => false,
        'position'      => 2
    ));
}

// Registrar campos ACF
if (function_exists('acf_add_local_field_group')) {
    
    acf_add_local_field_group(array(
        'key' => 'group_theme_options',
        'title' => 'Configurações do Tema',
        'fields' => array(
            
            // ============================================
            // ABA: CORES
            // ============================================
            array(
                'key' => 'field_tab_colors',
                'label' => 'Cores',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'placement' => 'top',
            ),
            
            array(
                'key' => 'field_color_primary',
                'label' => 'Cor Primária',
                'name' => 'color_primary',
                'type' => 'color_picker',
                'instructions' => 'Cor principal do tema (botões, destaques)',
                'default_value' => '#FFD700',
                'enable_opacity' => 0,
                'return_format' => 'string',
            ),
            
            array(
                'key' => 'field_color_secondary',
                'label' => 'Cor Secundária',
                'name' => 'color_secondary',
                'type' => 'color_picker',
                'instructions' => 'Cor secundária do tema',
                'default_value' => '#228B22',
                'enable_opacity' => 0,
                'return_format' => 'string',
            ),
            
            array(
                'key' => 'field_color_text',
                'label' => 'Cor de Texto',
                'name' => 'color_text',
                'type' => 'color_picker',
                'instructions' => 'Cor padrão para textos',
                'default_value' => '#333333',
                'enable_opacity' => 0,
                'return_format' => 'string',
            ),
            
            array(
                'key' => 'field_color_text_light',
                'label' => 'Cor de Texto Claro',
                'name' => 'color_text_light',
                'type' => 'color_picker',
                'instructions' => 'Cor de texto para fundos escuros',
                'default_value' => '#FFFFFF',
                'enable_opacity' => 0,
                'return_format' => 'string',
            ),
            
            array(
                'key' => 'field_color_bg_dark',
                'label' => 'Cor de Fundo Escuro',
                'name' => 'color_bg_dark',
                'type' => 'color_picker',
                'instructions' => 'Cor de fundo escuro',
                'default_value' => '#1a1a1a',
                'enable_opacity' => 0,
                'return_format' => 'string',
            ),
            
            array(
                'key' => 'field_color_bg_light',
                'label' => 'Cor de Fundo Claro',
                'name' => 'color_bg_light',
                'type' => 'color_picker',
                'instructions' => 'Cor de fundo claro',
                'default_value' => '#F5F5F5',
                'enable_opacity' => 0,
                'return_format' => 'string',
            ),
            
            array(
                'key' => 'field_color_header',
                'label' => 'Cor de Fundo do Cabeçalho',
                'name' => 'color_header',
                'type' => 'color_picker',
                'instructions' => 'Cor de fundo do header',
                'default_value' => '#FFFFFF',
                'enable_opacity' => 1,
                'return_format' => 'string',
            ),
            
            array(
                'key' => 'field_color_footer',
                'label' => 'Cor de Fundo do Rodapé',
                'name' => 'color_footer',
                'type' => 'color_picker',
                'instructions' => 'Cor de fundo do footer',
                'default_value' => '#1a1a1a',
                'enable_opacity' => 0,
                'return_format' => 'string',
            ),
            
            array(
                'key' => 'field_color_link',
                'label' => 'Cor de Links',
                'name' => 'color_link',
                'type' => 'color_picker',
                'instructions' => 'Cor padrão dos links',
                'default_value' => '#0066CC',
                'enable_opacity' => 0,
                'return_format' => 'string',
            ),
            
            array(
                'key' => 'field_color_link_hover',
                'label' => 'Cor de Links (Hover)',
                'name' => 'color_link_hover',
                'type' => 'color_picker',
                'instructions' => 'Cor dos links ao passar o mouse',
                'default_value' => '#004499',
                'enable_opacity' => 0,
                'return_format' => 'string',
            ),
            
            array(
                'key' => 'field_color_link_visited',
                'label' => 'Cor de Links Visitados',
                'name' => 'color_link_visited',
                'type' => 'color_picker',
                'instructions' => 'Cor dos links já visitados',
                'default_value' => '#551A8B',
                'enable_opacity' => 0,
                'return_format' => 'string',
            ),
            
            // ============================================
            // ABA: INFORMAÇÕES DO EVENTO
            // ============================================
            array(
                'key' => 'field_tab_event',
                'label' => 'Informações do Evento',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'placement' => 'top',
            ),
            
            array(
                'key' => 'field_event_name',
                'label' => 'Nome do Evento',
                'name' => 'event_name',
                'type' => 'text',
                'instructions' => 'Nome oficial do evento',
                'placeholder' => 'Ex: Batizado e Troca de Cordas 2026',
            ),
            
            array(
                'key' => 'field_event_date_start',
                'label' => 'Data de Início do Evento',
                'name' => 'event_date_start',
                'type' => 'date_picker',
                'instructions' => 'Selecione a data de início',
                'display_format' => 'd/m/Y',
                'return_format' => 'Y-m-d',
                'first_day' => 0,
            ),
            
            array(
                'key' => 'field_event_date_end',
                'label' => 'Data Final do Evento',
                'name' => 'event_date_end',
                'type' => 'date_picker',
                'instructions' => 'Selecione a data final',
                'display_format' => 'd/m/Y',
                'return_format' => 'Y-m-d',
                'first_day' => 0,
            ),
            
            array(
                'key' => 'field_event_time_start',
                'label' => 'Horário de Início',
                'name' => 'event_time_start',
                'type' => 'time_picker',
                'instructions' => 'Horário de início do evento',
                'display_format' => 'H:i',
                'return_format' => 'H:i',
            ),
            
            array(
                'key' => 'field_event_time_end',
                'label' => 'Horário de Término',
                'name' => 'event_time_end',
                'type' => 'time_picker',
                'instructions' => 'Horário de término do evento',
                'display_format' => 'H:i',
                'return_format' => 'H:i',
            ),
            
            array(
                'key' => 'field_event_location',
                'label' => 'Localização do Evento',
                'name' => 'event_location',
                'type' => 'textarea',
                'instructions' => 'Endereço completo do evento',
                'rows' => 3,
                'placeholder' => 'Rua, número, bairro, cidade - Estado, CEP',
            ),
            
            array(
                'key' => 'field_event_google_maps',
                'label' => 'URL Google Maps',
                'name' => 'event_google_maps',
                'type' => 'url',
                'instructions' => 'Link do Google Maps do local do evento',
                'placeholder' => 'https://goo.gl/maps/...',
            ),
            
            array(
                'key' => 'field_event_description',
                'label' => 'Descrição do Evento',
                'name' => 'event_description',
                'type' => 'wysiwyg',
                'instructions' => 'Descrição completa do evento',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
            ),
            
            // ============================================
            // ABA: REDES SOCIAIS
            // ============================================
            array(
                'key' => 'field_tab_social',
                'label' => 'Redes Sociais',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'placement' => 'top',
            ),
            
            array(
                'key' => 'field_social_networks',
                'label' => 'Redes Sociais',
                'name' => 'social_networks',
                'type' => 'repeater',
                'instructions' => 'Adicione suas redes sociais',
                'layout' => 'table',
                'button_label' => 'Adicionar Rede Social',
                'sub_fields' => array(
                    array(
                        'key' => 'field_social_network',
                        'label' => 'Rede Social',
                        'name' => 'network',
                        'type' => 'select',
                        'choices' => array(
                            'facebook' => 'Facebook',
                            'instagram' => 'Instagram',
                            'youtube' => 'YouTube',
                            'tiktok' => 'TikTok',
                            'twitter' => 'Twitter (X)',
                            'linkedin' => 'LinkedIn',
                            'whatsapp' => 'WhatsApp',
                            'telegram' => 'Telegram',
                            'spotify' => 'Spotify',
                            'email' => 'E-mail',
                            'website' => 'Website',
                        ),
                        'default_value' => 'instagram',
                        'allow_null' => 0,
                        'return_format' => 'value',
                    ),
                    array(
                        'key' => 'field_social_url',
                        'label' => 'URL',
                        'name' => 'url',
                        'type' => 'url',
                        'placeholder' => 'https://...',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_social_label',
                        'label' => 'Texto (Opcional)',
                        'name' => 'label',
                        'type' => 'text',
                        'placeholder' => '@usuario ou texto personalizado',
                    ),
                ),
            ),
            
            // ============================================
            // ABA: CONTATO
            // ============================================
            array(
                'key' => 'field_tab_contact',
                'label' => 'Contato',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'placement' => 'top',
            ),
            
            array(
                'key' => 'field_contact_email',
                'label' => 'E-mail Principal',
                'name' => 'contact_email',
                'type' => 'email',
                'instructions' => 'E-mail para contato',
                'placeholder' => 'contato@exemplo.com',
            ),
            
            array(
                'key' => 'field_contact_phone',
                'label' => 'Telefone',
                'name' => 'contact_phone',
                'type' => 'text',
                'instructions' => 'Telefone com DDD',
                'placeholder' => '(11) 99999-9999',
            ),
            
            array(
                'key' => 'field_contact_whatsapp',
                'label' => 'WhatsApp',
                'name' => 'contact_whatsapp',
                'type' => 'text',
                'instructions' => 'Número do WhatsApp (apenas números com DDD e DDI)',
                'placeholder' => '5511999999999',
            ),
            
            array(
                'key' => 'field_whatsapp_message',
                'label' => 'Mensagem Padrão WhatsApp',
                'name' => 'whatsapp_message',
                'type' => 'textarea',
                'instructions' => 'Mensagem que será pré-preenchida ao clicar no botão WhatsApp',
                'rows' => 3,
                'placeholder' => 'Olá! Gostaria de mais informações sobre o evento.',
            ),
            
            // ============================================
            // ABA: RODAPÉ
            // ============================================
            array(
                'key' => 'field_tab_footer',
                'label' => 'Rodapé',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'placement' => 'top',
            ),
            
            array(
                'key' => 'field_footer_copyright',
                'label' => 'Copyright',
                'name' => 'footer_copyright',
                'type' => 'text',
                'instructions' => 'Texto de copyright/direitos autorais',
                'default_value' => '© ' . date('Y') . ' - Todos os direitos reservados',
                'placeholder' => '© 2026 - Todos os direitos reservados',
            ),
            
            array(
                'key' => 'field_footer_developer',
                'label' => 'Desenvolvido Por',
                'name' => 'footer_developer',
                'type' => 'text',
                'instructions' => 'Nome da empresa/pessoa que desenvolveu',
                'placeholder' => 'Seu Nome ou Empresa',
            ),
            
            array(
                'key' => 'field_footer_developer_url',
                'label' => 'URL do Desenvolvedor',
                'name' => 'footer_developer_url',
                'type' => 'url',
                'instructions' => 'Site do desenvolvedor (opcional)',
                'placeholder' => 'https://seusite.com',
            ),
            
            array(
                'key' => 'field_footer_text',
                'label' => 'Texto Adicional do Rodapé',
                'name' => 'footer_text',
                'type' => 'wysiwyg',
                'instructions' => 'Texto ou informações adicionais para o rodapé',
                'tabs' => 'visual',
                'toolbar' => 'basic',
                'media_upload' => 0,
            ),
            
            // ============================================
            // ABA: PWA (Progressive Web App)
            // ============================================
            array(
                'key' => 'field_tab_pwa',
                'label' => 'PWA',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'placement' => 'top',
            ),
            
            array(
                'key' => 'field_pwa_enable',
                'label' => 'Habilitar PWA',
                'name' => 'pwa_enable',
                'type' => 'true_false',
                'instructions' => 'Ativar funcionalidade Progressive Web App',
                'default_value' => 0,
                'ui' => 1,
            ),
            
            array(
                'key' => 'field_pwa_name',
                'label' => 'Nome do App',
                'name' => 'pwa_name',
                'type' => 'text',
                'instructions' => 'Nome completo do aplicativo',
                'placeholder' => 'Evento de Capoeira',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_pwa_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            
            array(
                'key' => 'field_pwa_short_name',
                'label' => 'Nome Curto',
                'name' => 'pwa_short_name',
                'type' => 'text',
                'instructions' => 'Nome curto do app (máx. 12 caracteres)',
                'maxlength' => 12,
                'placeholder' => 'Capoeira',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_pwa_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            
            array(
                'key' => 'field_pwa_icon_512',
                'label' => 'Ícone 512x512',
                'name' => 'pwa_icon_512',
                'type' => 'image',
                'instructions' => 'Upload do ícone 512x512px (PNG)',
                'return_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_pwa_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            
            array(
                'key' => 'field_pwa_icon_192',
                'label' => 'Ícone 192x192',
                'name' => 'pwa_icon_192',
                'type' => 'image',
                'instructions' => 'Upload do ícone 192x192px (PNG)',
                'return_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_pwa_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            
            array(
                'key' => 'field_pwa_theme_color',
                'label' => 'Cor do Tema (PWA)',
                'name' => 'pwa_theme_color',
                'type' => 'color_picker',
                'instructions' => 'Cor da barra de status do app',
                'default_value' => '#FFD700',
                'enable_opacity' => 0,
                'return_format' => 'string',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_pwa_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            
            array(
                'key' => 'field_pwa_bg_color',
                'label' => 'Cor de Fundo (PWA)',
                'name' => 'pwa_bg_color',
                'type' => 'color_picker',
                'instructions' => 'Cor de fundo da splash screen',
                'default_value' => '#FFFFFF',
                'enable_opacity' => 0,
                'return_format' => 'string',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_pwa_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            
            // ============================================
            // ABA: SEO & META
            // ============================================
            array(
                'key' => 'field_tab_seo',
                'label' => 'SEO & Meta',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'placement' => 'top',
            ),
            
            array(
                'key' => 'field_site_logo',
                'label' => 'Logo do Site',
                'name' => 'site_logo',
                'type' => 'image',
                'instructions' => 'Logo principal do site',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            
            array(
                'key' => 'field_site_favicon',
                'label' => 'Favicon',
                'name' => 'site_favicon',
                'type' => 'image',
                'instructions' => 'Favicon do site (32x32px)',
                'return_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            
            array(
                'key' => 'field_og_image',
                'label' => 'Imagem Open Graph',
                'name' => 'og_image',
                'type' => 'image',
                'instructions' => 'Imagem padrão para compartilhamento em redes sociais (1200x630px)',
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            
            array(
                'key' => 'field_google_analytics',
                'label' => 'Google Analytics ID',
                'name' => 'google_analytics',
                'type' => 'text',
                'instructions' => 'ID do Google Analytics (G-XXXXXXXXXX)',
                'placeholder' => 'G-XXXXXXXXXX',
            ),
            
            array(
                'key' => 'field_facebook_pixel',
                'label' => 'Facebook Pixel ID',
                'name' => 'facebook_pixel',
                'type' => 'text',
                'instructions' => 'ID do Facebook Pixel',
                'placeholder' => 'XXXXXXXXXXXXXXX',
            ),
            
            // ============================================
            // ABA: SCRIPTS PERSONALIZADOS
            // ============================================
            array(
                'key' => 'field_tab_scripts',
                'label' => 'Scripts',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'placement' => 'top',
            ),
            
            array(
                'key' => 'field_header_scripts',
                'label' => 'Scripts no <head>',
                'name' => 'header_scripts',
                'type' => 'textarea',
                'instructions' => 'Scripts ou meta tags adicionais para o <head>',
                'rows' => 6,
                'placeholder' => '<script>...</script> ou <meta ...>',
            ),
            
            array(
                'key' => 'field_footer_scripts',
                'label' => 'Scripts antes do </body>',
                'name' => 'footer_scripts',
                'type' => 'textarea',
                'instructions' => 'Scripts adicionais antes do fechamento do body',
                'rows' => 6,
                'placeholder' => '<script>...</script>',
            ),
            
            array(
                'key' => 'field_custom_css',
                'label' => 'CSS Personalizado',
                'name' => 'custom_css',
                'type' => 'textarea',
                'instructions' => 'CSS adicional (sem tags <style>)',
                'rows' => 10,
                'placeholder' => '.minha-classe { color: red; }',
            ),
            
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-settings',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'seamless',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => true,
    ));
}

/**
 * Função helper para pegar valores das opções do tema
 * Uso: get_theme_option('color_primary')
 */
if (!function_exists('get_theme_option')) {
    function get_theme_option($field_name, $default = '') {
        $value = get_field($field_name, 'option');
        return $value ? $value : $default;
    }
}

/**
 * Gerar variáveis CSS automaticamente baseadas nas cores
 */
add_action('wp_head', 'theme_custom_css_variables', 100);
function theme_custom_css_variables() {
    ?>
    <style id="theme-custom-variables">
        :root {
            --color-primary: <?php echo get_theme_option('color_primary', '#FFD700'); ?>;
            --color-secondary: <?php echo get_theme_option('color_secondary', '#228B22'); ?>;
            --color-text: <?php echo get_theme_option('color_text', '#333333'); ?>;
            --color-text-light: <?php echo get_theme_option('color_text_light', '#FFFFFF'); ?>;
            --color-bg-dark: <?php echo get_theme_option('color_bg_dark', '#1a1a1a'); ?>;
            --color-bg-light: <?php echo get_theme_option('color_bg_light', '#F5F5F5'); ?>;
            --color-header: <?php echo get_theme_option('color_header', '#FFFFFF'); ?>;
            --color-footer: <?php echo get_theme_option('color_footer', '#1a1a1a'); ?>;
            --color-link: <?php echo get_theme_option('color_link', '#0066CC'); ?>;
            --color-link-hover: <?php echo get_theme_option('color_link_hover', '#004499'); ?>;
            --color-link-visited: <?php echo get_theme_option('color_link_visited', '#551A8B'); ?>;
        }
        
        <?php 
        // CSS Personalizado do usuário
        $custom_css = get_theme_option('custom_css');
        if ($custom_css) {
            echo $custom_css;
        }
        ?>
    </style>
    <?php
    
    // Scripts personalizados no header
    $header_scripts = get_theme_option('header_scripts');
    if ($header_scripts) {
        echo $header_scripts;
    }
}

/**
 * Scripts personalizados no footer
 */
add_action('wp_footer', 'theme_custom_footer_scripts', 100);
function theme_custom_footer_scripts() {
    $footer_scripts = get_theme_option('footer_scripts');
    if ($footer_scripts) {
        echo $footer_scripts;
    }
}

/**
 * Adicionar Google Analytics
 */
add_action('wp_head', 'theme_google_analytics', 10);
function theme_google_analytics() {
    $ga_id = get_theme_option('google_analytics');
    if ($ga_id) {
        ?>
        <!-- Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($ga_id); ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '<?php echo esc_js($ga_id); ?>');
        </script>
        <?php
    }
}

/**
 * Adicionar Facebook Pixel
 */
add_action('wp_head', 'theme_facebook_pixel', 10);
function theme_facebook_pixel() {
    $fb_pixel = get_theme_option('facebook_pixel');
    if ($fb_pixel) {
        ?>
        <!-- Facebook Pixel -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '<?php echo esc_js($fb_pixel); ?>');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none"
                src="https://www.facebook.com/tr?id=<?php echo esc_attr($fb_pixel); ?>&ev=PageView&noscript=1"/>
        </noscript>
        <?php
    }
}

/**
 * Gerar manifest.json para PWA
 */
add_action('wp_head', 'theme_pwa_manifest');
function theme_pwa_manifest() {
    if (get_theme_option('pwa_enable')) {
        ?>
        <link rel="manifest" href="<?php echo home_url('/manifest.json'); ?>">
        <meta name="theme-color" content="<?php echo get_theme_option('pwa_theme_color', '#FFD700'); ?>">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">
        <meta name="apple-mobile-web-app-title" content="<?php echo get_theme_option('pwa_short_name', get_bloginfo('name')); ?>">
        <?php
        $icon_192 = get_theme_option('pwa_icon_192');
        if ($icon_192) {
            echo '<link rel="apple-touch-icon" href="' . esc_url($icon_192) . '">';
        }
    }
}

/**
 * Criar arquivo manifest.json dinamicamente
 */
add_action('init', 'theme_pwa_manifest_endpoint');
function theme_pwa_manifest_endpoint() {
    add_rewrite_rule('^manifest\.json$', 'index.php?manifest=1', 'top');
}

add_filter('query_vars', 'theme_pwa_query_vars');
function theme_pwa_query_vars($vars) {
    $vars[] = 'manifest';
    return $vars;
}

add_action('template_redirect', 'theme_pwa_manifest_template');
function theme_pwa_manifest_template() {
    if (get_query_var('manifest')) {
        header('Content-Type: application/json');
        
        $manifest = array(
            'name' => get_theme_option('pwa_name', get_bloginfo('name')),
            'short_name' => get_theme_option('pwa_short_name', get_bloginfo('name')),
            'description' => get_bloginfo('description'),
            'start_url' => home_url('/'),
            'display' => 'standalone',
            'background_color' => get_theme_option('pwa_bg_color', '#FFFFFF'),
            'theme_color' => get_theme_option('pwa_theme_color', '#FFD700'),
            'icons' => array()
        );
        
        $icon_192 = get_theme_option('pwa_icon_192');
        $icon_512 = get_theme_option('pwa_icon_512');
        
        if ($icon_192) {
            $manifest['icons'][] = array(
                'src' => $icon_192,
                'sizes' => '192x192',
                'type' => 'image/png'
            );
        }
        
        if ($icon_512) {
            $manifest['icons'][] = array(
                'src' => $icon_512,
                'sizes' => '512x512',
                'type' => 'image/png'
            );
        }
        
        echo json_encode($manifest);
        exit;
    }
}

// Flush rewrite rules on theme activation
add_action('after_switch_theme', 'theme_pwa_flush_rewrite');
function theme_pwa_flush_rewrite() {
    theme_pwa_manifest_endpoint();
    flush_rewrite_rules();
}
