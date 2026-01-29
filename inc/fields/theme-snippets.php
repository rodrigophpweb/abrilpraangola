<?php
/**
 * SNIPPETS ÚTEIS - Exemplos de uso dos campos ACF
 * 
 * Copie e cole esses snippets nos seus templates conforme necessário
 */

// ==================================================
// 1. INFORMAÇÕES DO EVENTO
// ==================================================

/**
 * Exibir datas do evento formatadas
 */
function exibir_datas_evento() {
    $data_inicio = get_theme_option('event_date_start');
    $data_fim = get_theme_option('event_date_end');
    
    if ($data_inicio && $data_fim) {
        // Converter para timestamp
        $inicio = strtotime($data_inicio);
        $fim = strtotime($data_fim);
        
        // Formatar datas
        $inicio_formatado = date('d/m/Y', $inicio);
        $fim_formatado = date('d/m/Y', $fim);
        
        echo "De {$inicio_formatado} até {$fim_formatado}";
    } elseif ($data_inicio) {
        echo date('d/m/Y', strtotime($data_inicio));
    }
}

/**
 * Exibir horários do evento
 */
function exibir_horarios_evento() {
    $hora_inicio = get_theme_option('event_time_start');
    $hora_fim = get_theme_option('event_time_end');
    
    if ($hora_inicio && $hora_fim) {
        echo "Das {$hora_inicio} às {$hora_fim}";
    } elseif ($hora_inicio) {
        echo "Início: {$hora_inicio}";
    }
}

/**
 * Card completo de informações do evento
 */
function card_info_evento() {
    ?>
    <div class="event-info-card">
        <h2><?php echo esc_html(get_theme_option('event_name', 'Evento de Capoeira')); ?></h2>
        
        <div class="event-meta">
            <!-- Data -->
            <div class="meta-item">
                <span class="icon">📅</span>
                <span class="label">Data:</span>
                <span class="value"><?php exibir_datas_evento(); ?></span>
            </div>
            
            <!-- Horário -->
            <?php if (get_theme_option('event_time_start')): ?>
                <div class="meta-item">
                    <span class="icon">🕐</span>
                    <span class="label">Horário:</span>
                    <span class="value"><?php exibir_horarios_evento(); ?></span>
                </div>
            <?php endif; ?>
            
            <!-- Local -->
            <?php if (get_theme_option('event_location')): ?>
                <div class="meta-item">
                    <span class="icon">📍</span>
                    <span class="label">Local:</span>
                    <span class="value"><?php echo nl2br(esc_html(get_theme_option('event_location'))); ?></span>
                </div>
            <?php endif; ?>
            
            <!-- Botão Google Maps -->
            <?php if (get_theme_option('event_google_maps')): ?>
                <a href="<?php echo esc_url(get_theme_option('event_google_maps')); ?>" 
                   target="_blank" 
                   class="btn btn-maps">
                    🗺️ Ver no Google Maps
                </a>
            <?php endif; ?>
        </div>
        
        <!-- Descrição -->
        <?php if (get_theme_option('event_description')): ?>
            <div class="event-description">
                <?php echo wp_kses_post(get_theme_option('event_description')); ?>
            </div>
        <?php endif; ?>
    </div>
    <?php
}

// ==================================================
// 2. REDES SOCIAIS
// ==================================================

/**
 * Exibir redes sociais com ícones
 * Requer Font Awesome ou ícones SVG
 */
function exibir_redes_sociais($estilo = 'horizontal') {
    $redes = get_theme_option('social_networks');
    
    if (!$redes) return;
    
    $class = 'social-networks social-' . esc_attr($estilo);
    ?>
    <div class="<?php echo $class; ?>">
        <?php foreach ($redes as $rede): ?>
            <?php
            // Mapear ícones (Font Awesome)
            $icones = array(
                'facebook' => 'fab fa-facebook',
                'instagram' => 'fab fa-instagram',
                'youtube' => 'fab fa-youtube',
                'tiktok' => 'fab fa-tiktok',
                'twitter' => 'fab fa-twitter',
                'linkedin' => 'fab fa-linkedin',
                'whatsapp' => 'fab fa-whatsapp',
                'telegram' => 'fab fa-telegram',
                'spotify' => 'fab fa-spotify',
                'email' => 'fas fa-envelope',
                'website' => 'fas fa-globe',
            );
            
            $icone = isset($icones[$rede['network']]) ? $icones[$rede['network']] : 'fas fa-link';
            $label = $rede['label'] ?: ucfirst($rede['network']);
            ?>
            
            <a href="<?php echo esc_url($rede['url']); ?>" 
               target="_blank" 
               rel="noopener noreferrer"
               class="social-link social-<?php echo esc_attr($rede['network']); ?>"
               title="<?php echo esc_attr($label); ?>"
               aria-label="<?php echo esc_attr($label); ?>">
                <i class="<?php echo esc_attr($icone); ?>"></i>
                <span class="social-label"><?php echo esc_html($label); ?></span>
            </a>
        <?php endforeach; ?>
    </div>
    <?php
}

/**
 * Redes sociais - apenas ícones (sem texto)
 */
function exibir_redes_sociais_icones() {
    $redes = get_theme_option('social_networks');
    
    if (!$redes) return;
    
    // Emojis como alternativa a Font Awesome
    $emojis = array(
        'facebook' => '📘',
        'instagram' => '📷',
        'youtube' => '▶️',
        'tiktok' => '🎵',
        'twitter' => '🐦',
        'linkedin' => '💼',
        'whatsapp' => '💬',
        'telegram' => '✈️',
        'spotify' => '🎧',
        'email' => '📧',
        'website' => '🌐',
    );
    ?>
    <div class="social-icons">
        <?php foreach ($redes as $rede): ?>
            <?php 
            $emoji = isset($emojis[$rede['network']]) ? $emojis[$rede['network']] : '🔗';
            $label = $rede['label'] ?: ucfirst($rede['network']);
            ?>
            <a href="<?php echo esc_url($rede['url']); ?>" 
               target="_blank" 
               title="<?php echo esc_attr($label); ?>"
               class="social-icon social-<?php echo esc_attr($rede['network']); ?>">
                <?php echo $emoji; ?>
            </a>
        <?php endforeach; ?>
    </div>
    <?php
}

// ==================================================
// 3. WHATSAPP
// ==================================================

/**
 * Botão WhatsApp flutuante
 */
function botao_whatsapp_flutuante() {
    $whatsapp = get_theme_option('contact_whatsapp');
    
    if (!$whatsapp) return;
    
    $mensagem = get_theme_option('whatsapp_message', 'Olá! Gostaria de mais informações.');
    $link = 'https://wa.me/' . preg_replace('/[^0-9]/', '', $whatsapp);
    
    if ($mensagem) {
        $link .= '?text=' . urlencode($mensagem);
    }
    ?>
    <a href="<?php echo esc_url($link); ?>" 
       target="_blank" 
       rel="noopener"
       class="whatsapp-float"
       aria-label="Contato via WhatsApp">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 0C8.954 0 0 8.954 0 20c0 3.531.923 6.848 2.538 9.723L.887 36.765l7.269-1.61A19.867 19.867 0 0020 40c11.046 0 20-8.954 20-20S31.046 0 20 0zm0 36.667c-3.077 0-6.026-.831-8.533-2.274l-.61-.362-6.322 1.4 1.425-6.123-.398-.633A16.535 16.535 0 013.333 20c0-9.205 7.462-16.667 16.667-16.667S36.667 10.795 36.667 20 29.205 36.667 20 36.667z" fill="currentColor"/>
            <path d="M14.667 11.733c-.333-.742-.683-.757-1-.772-.27-.013-.578-.012-.887-.012-.308 0-.81.116-1.233.578-.423.462-1.614 1.578-1.614 3.847s1.653 4.462 1.883 4.77c.231.309 3.195 5.03 7.844 6.912 3.861 1.563 4.65 1.251 5.489 1.173.838-.077 2.705-1.106 3.086-2.174.38-1.067.38-1.983.267-2.174-.115-.192-.423-.308-.885-.539-.462-.23-2.731-1.348-3.154-1.502-.423-.154-.731-.231-1.039.231-.308.462-1.193 1.502-1.462 1.81-.27.31-.539.347-1 .116-.462-.231-1.95-.72-3.715-2.295-1.373-1.227-2.3-2.742-2.569-3.204-.27-.462-.029-.712.202-.942.207-.206.462-.539.693-.808.23-.27.308-.463.462-.771.154-.308.077-.578-.039-.808-.115-.231-1.027-2.515-1.423-3.435z" fill="currentColor"/>
        </svg>
        <span class="whatsapp-text">WhatsApp</span>
    </a>
    <?php
}

/**
 * Botão WhatsApp inline (para usar em qualquer lugar)
 */
function botao_whatsapp_inline($texto = 'Fale Conosco', $class = 'btn-whatsapp') {
    $whatsapp = get_theme_option('contact_whatsapp');
    
    if (!$whatsapp) return;
    
    $mensagem = get_theme_option('whatsapp_message');
    $link = 'https://wa.me/' . preg_replace('/[^0-9]/', '', $whatsapp);
    
    if ($mensagem) {
        $link .= '?text=' . urlencode($mensagem);
    }
    ?>
    <a href="<?php echo esc_url($link); ?>" 
       target="_blank" 
       rel="noopener"
       class="<?php echo esc_attr($class); ?>">
        💬 <?php echo esc_html($texto); ?>
    </a>
    <?php
}

// ==================================================
// 4. LOGO E FAVICON
// ==================================================

/**
 * Exibir logo do site
 */
function exibir_logo($class = 'site-logo') {
    $logo = get_theme_option('site_logo');
    $site_name = get_bloginfo('name');
    
    if ($logo && isset($logo['url'])) {
        ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="<?php echo esc_attr($class); ?>">
            <img src="<?php echo esc_url($logo['url']); ?>" 
                 alt="<?php echo esc_attr($site_name); ?>"
                 width="<?php echo esc_attr($logo['width']); ?>"
                 height="<?php echo esc_attr($logo['height']); ?>">
        </a>
        <?php
    } else {
        ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="<?php echo esc_attr($class); ?>">
            <h1><?php echo esc_html($site_name); ?></h1>
        </a>
        <?php
    }
}

// ==================================================
// 5. COUNTDOWN PARA O EVENTO
// ==================================================

/**
 * Contador regressivo para o evento
 * Requer JavaScript
 */
function countdown_evento() {
    $data_inicio = get_theme_option('event_date_start');
    
    if (!$data_inicio) return;
    
    $timestamp = strtotime($data_inicio);
    $data_js = date('Y-m-d', $timestamp);
    
    $hora_inicio = get_theme_option('event_time_start', '09:00');
    ?>
    <div class="countdown-wrapper">
        <h3>Faltam apenas:</h3>
        <div id="countdown" 
             class="countdown" 
             data-date="<?php echo esc_attr($data_js); ?>"
             data-time="<?php echo esc_attr($hora_inicio); ?>">
            <div class="countdown-item">
                <span class="countdown-number" id="days">00</span>
                <span class="countdown-label">Dias</span>
            </div>
            <div class="countdown-item">
                <span class="countdown-number" id="hours">00</span>
                <span class="countdown-label">Horas</span>
            </div>
            <div class="countdown-item">
                <span class="countdown-number" id="minutes">00</span>
                <span class="countdown-label">Minutos</span>
            </div>
            <div class="countdown-item">
                <span class="countdown-number" id="seconds">00</span>
                <span class="countdown-label">Segundos</span>
            </div>
        </div>
    </div>
    
    <script>
    (function() {
        const countdown = document.getElementById('countdown');
        if (!countdown) return;
        
        const eventDate = countdown.dataset.date;
        const eventTime = countdown.dataset.time || '09:00';
        const targetDate = new Date(`${eventDate}T${eventTime}`).getTime();
        
        function updateCountdown() {
            const now = new Date().getTime();
            const distance = targetDate - now;
            
            if (distance < 0) {
                countdown.innerHTML = '<p class="event-started">O evento já começou!</p>';
                return;
            }
            
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            document.getElementById('days').textContent = String(days).padStart(2, '0');
            document.getElementById('hours').textContent = String(hours).padStart(2, '0');
            document.getElementById('minutes').textContent = String(minutes).padStart(2, '0');
            document.getElementById('seconds').textContent = String(seconds).padStart(2, '0');
        }
        
        updateCountdown();
        setInterval(updateCountdown, 1000);
    })();
    </script>
    <?php
}

// ==================================================
// 6. SCHEMA.ORG - EVENT (SEO)
// ==================================================

/**
 * Adicionar JSON-LD Schema para evento
 * Melhora SEO e aparência no Google
 */
function schema_evento() {
    $nome = get_theme_option('event_name');
    $data_inicio = get_theme_option('event_date_start');
    $data_fim = get_theme_option('event_date_end');
    $hora_inicio = get_theme_option('event_time_start');
    $local = get_theme_option('event_location');
    $descricao = get_theme_option('event_description');
    $imagem = get_theme_option('og_image');
    
    if (!$nome || !$data_inicio) return;
    
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'Event',
        'name' => $nome,
        'startDate' => $data_inicio . ($hora_inicio ? 'T' . $hora_inicio : ''),
        'eventStatus' => 'https://schema.org/EventScheduled',
        'eventAttendanceMode' => 'https://schema.org/OfflineEventAttendanceMode',
    );
    
    if ($data_fim) {
        $schema['endDate'] = $data_fim;
    }
    
    if ($local) {
        $schema['location'] = array(
            '@type' => 'Place',
            'name' => $local,
            'address' => $local
        );
    }
    
    if ($descricao) {
        $schema['description'] = wp_strip_all_tags($descricao);
    }
    
    if ($imagem) {
        $schema['image'] = $imagem;
    }
    
    echo '<script type="application/ld+json">' . wp_json_encode($schema) . '</script>';
}

// Adicionar automaticamente no head
add_action('wp_head', 'schema_evento');

// ==================================================
// 7. VERIFICAR SE CAMPOS ESTÃO PREENCHIDOS
// ==================================================

/**
 * Verificar se informações essenciais estão configuradas
 * Útil para exibir avisos no admin
 */
function verificar_configuracoes_tema() {
    $campos_obrigatorios = array(
        'event_name' => 'Nome do Evento',
        'event_date_start' => 'Data de Início',
        'event_location' => 'Localização',
        'contact_whatsapp' => 'WhatsApp',
    );
    
    $faltando = array();
    
    foreach ($campos_obrigatorios as $campo => $label) {
        if (!get_theme_option($campo)) {
            $faltando[] = $label;
        }
    }
    
    if (!empty($faltando) && current_user_can('edit_posts')) {
        add_action('admin_notices', function() use ($faltando) {
            ?>
            <div class="notice notice-warning is-dismissible">
                <p><strong>⚠️ Configurações do Tema Incompletas</strong></p>
                <p>Os seguintes campos estão vazios:</p>
                <ul>
                    <?php foreach ($faltando as $item): ?>
                        <li><?php echo esc_html($item); ?></li>
                    <?php endforeach; ?>
                </ul>
                <p>
                    <a href="<?php echo admin_url('admin.php?page=theme-settings'); ?>">
                        Configurar Agora
                    </a>
                </p>
            </div>
            <?php
        });
    }
}
add_action('admin_init', 'verificar_configuracoes_tema');
