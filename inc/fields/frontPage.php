<?php
/**
 * ACF Fields - Front Page
 * Campos personalizados para a página inicial
 */

// Prevenir acesso direto
if (!defined('ABSPATH')) {
    exit;
}

// Registrar campos ACF para a página inicial
if (function_exists('acf_add_local_field_group')) {
    
    acf_add_local_field_group(array(
        'key' => 'group_front_page',
        'title' => 'Configurações da Página Inicial',
        'fields' => array(
            
            // ============================================
            // ABA: SEÇÃO MESTRE DE CAPOEIRA
            // ============================================
            array(
                'key' => 'field_tab_master_capoeira',
                'label' => 'Mestre de Capoeira',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'placement' => 'top',
            ),
            
            array(
                'key' => 'field_master_capoeira_enable',
                'label' => 'Habilitar Seção',
                'name' => 'master_capoeira_enable',
                'type' => 'true_false',
                'instructions' => 'Exibir ou ocultar a seção Mestre de Capoeira',
                'default_value' => 1,
                'ui' => 1,
            ),
            
            array(
                'key' => 'field_master_capoeira_bg_color',
                'label' => 'Cor de Fundo',
                'name' => 'master_capoeira_bg_color',
                'type' => 'color_picker',
                'instructions' => 'Escolha a cor de fundo da seção',
                'default_value' => '#F5F5F5',
                'enable_opacity' => 1,
                'return_format' => 'string',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_master_capoeira_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            
            array(
                'key' => 'field_master_capoeira_text_color',
                'label' => 'Cor do Texto',
                'name' => 'master_capoeira_text_color',
                'type' => 'color_picker',
                'instructions' => 'Escolha a cor do texto da seção',
                'default_value' => '#333333',
                'enable_opacity' => 0,
                'return_format' => 'string',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_master_capoeira_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            
            array(
                'key' => 'field_master_capoeira_title_color',
                'label' => 'Cor do Título',
                'name' => 'master_capoeira_title_color',
                'type' => 'color_picker',
                'instructions' => 'Escolha a cor do título da seção',
                'default_value' => '#1a1a1a',
                'enable_opacity' => 0,
                'return_format' => 'string',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_master_capoeira_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            
            array(
                'key' => 'field_master_capoeira_image',
                'label' => 'Imagem do Mestre',
                'name' => 'master_capoeira_image',
                'type' => 'image',
                'instructions' => 'Selecione a imagem do Mestre de Capoeira (recomendado: 800x1000px)',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_master_capoeira_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            
            array(
                'key' => 'field_master_capoeira_title',
                'label' => 'Título da Seção',
                'name' => 'master_capoeira_title',
                'type' => 'text',
                'instructions' => 'Digite o título principal da seção',
                'placeholder' => 'Ex: Mestre João da Silva',
                'maxlength' => 100,
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_master_capoeira_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            
            array(
                'key' => 'field_master_capoeira_content',
                'label' => 'Texto da Seção',
                'name' => 'master_capoeira_content',
                'type' => 'wysiwyg',
                'instructions' => 'Digite o texto descritivo sobre o Mestre de Capoeira',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 0,
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_master_capoeira_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            
            // ============================================
            // ABA: SEÇÃO ATIVIDADES
            // ============================================
            array(
                'key' => 'field_tab_activities',
                'label' => 'Atividades',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'placement' => 'top',
            ),
            
            array(
                'key' => 'field_activities_enable',
                'label' => 'Habilitar Seção',
                'name' => 'activities_enable',
                'type' => 'true_false',
                'instructions' => 'Exibir ou ocultar a seção Atividades',
                'default_value' => 1,
                'ui' => 1,
            ),
            
            array(
                'key' => 'field_activities_bg_color',
                'label' => 'Cor de Fundo',
                'name' => 'activities_bg_color',
                'type' => 'color_picker',
                'instructions' => 'Escolha a cor de fundo da seção',
                'default_value' => '#FFFFFF',
                'enable_opacity' => 1,
                'return_format' => 'string',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_activities_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            
            array(
                'key' => 'field_activities_text_color',
                'label' => 'Cor do Texto',
                'name' => 'activities_text_color',
                'type' => 'color_picker',
                'instructions' => 'Escolha a cor do texto da seção',
                'default_value' => '#333333',
                'enable_opacity' => 0,
                'return_format' => 'string',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_activities_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            
            array(
                'key' => 'field_activities_title_color',
                'label' => 'Cor do Título',
                'name' => 'activities_title_color',
                'type' => 'color_picker',
                'instructions' => 'Escolha a cor do título da seção',
                'default_value' => '#1a1a1a',
                'enable_opacity' => 0,
                'return_format' => 'string',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_activities_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            
            array(
                'key' => 'field_activities_image',
                'label' => 'Imagem das Atividades',
                'name' => 'activities_image',
                'type' => 'image',
                'instructions' => 'Selecione a imagem das Atividades (recomendado: 800x1000px)',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_activities_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            
            array(
                'key' => 'field_activities_title',
                'label' => 'Título da Seção',
                'name' => 'activities_title',
                'type' => 'text',
                'instructions' => 'Digite o título principal da seção',
                'placeholder' => 'Ex: Nossas Atividades',
                'maxlength' => 100,
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_activities_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            
            array(
                'key' => 'field_activities_content',
                'label' => 'Texto da Seção',
                'name' => 'activities_content',
                'type' => 'wysiwyg',
                'instructions' => 'Digite o texto descritivo sobre as Atividades',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 0,
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_activities_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
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
 * Função helper para pegar valores dos campos da página inicial
 * Uso: get_front_page_field('master_capoeira_title')
 */
if (!function_exists('get_front_page_field')) {
    function get_front_page_field($field_name, $default = '') {
        $front_page_id = get_option('page_on_front');
        if ($front_page_id) {
            $value = get_field($field_name, $front_page_id);
            return $value ? $value : $default;
        }
        return $default;
    }
}
