<?php
/**
 * Template Part: Seção Sobre
 * Exibe informações sobre o evento com localização e datas
 */

// Buscar a página "Sobre"
$about_page = get_page_by_path('sobre');
if (!$about_page) {
    $about_page = get_page_by_title('Sobre');
}

// Se não encontrar a página, não exibe a seção
if (!$about_page) {
    return;
}

// Dados da página Sobre
$about_title = get_the_title($about_page->ID);
$about_excerpt = get_the_excerpt($about_page->ID);

// Se não houver excerpt, pegar primeiros 200 caracteres do conteúdo
if (empty($about_excerpt)) {
    $about_content = wp_strip_all_tags($about_page->post_content);
    $about_excerpt = wp_trim_words($about_content, 30, '...');
}

// Dados do evento (customize)
$event_date_start = get_theme_option('event_date_start');
$event_date_end = get_theme_option('event_date_end');
$event_location = get_theme_option('event_location');

// Formatação das datas
$date_start_obj = $event_date_start ? new DateTime($event_date_start) : null;
$date_end_obj = $event_date_end ? new DateTime($event_date_end) : null;

// Dias da semana em português
$dias_semana = [
    'Sunday' => 'Domingo',
    'Monday' => 'Segunda-feira',
    'Tuesday' => 'Terça-feira',
    'Wednesday' => 'Quarta-feira',
    'Thursday' => 'Quinta-feira',
    'Friday' => 'Sexta-feira',
    'Saturday' => 'Sábado'
];

// Meses em português
$meses = [
    'January' => 'Janeiro',
    'February' => 'Fevereiro',
    'March' => 'Março',
    'April' => 'Abril',
    'May' => 'Maio',
    'June' => 'Junho',
    'July' => 'Julho',
    'August' => 'Agosto',
    'September' => 'Setembro',
    'October' => 'Outubro',
    'November' => 'Novembro',
    'December' => 'Dezembro'
];

// Formatar dias da semana (Quinta a Domingo)
$dia_semana_inicio = $date_start_obj ? $dias_semana[$date_start_obj->format('l')] : '';
$dia_semana_fim = $date_end_obj ? $dias_semana[$date_end_obj->format('l')] : '';
$periodo_semana = $dia_semana_inicio && $dia_semana_fim ? "$dia_semana_inicio a $dia_semana_fim" : '';

// Formatar datas completas (15 à 18 de Abril de 2026)
$dia_inicio = $date_start_obj ? $date_start_obj->format('d') : '';
$dia_fim = $date_end_obj ? $date_end_obj->format('d') : '';
$mes = $date_end_obj ? $meses[$date_end_obj->format('F')] : '';
$ano = $date_end_obj ? $date_end_obj->format('Y') : '';
$periodo_completo = ($dia_inicio && $dia_fim && $mes && $ano) ? "$dia_inicio à $dia_fim de $mes de $ano" : '';

// Schema.org - formato ISO para datas
$date_start_iso = $date_start_obj ? $date_start_obj->format('c') : '';
$date_end_iso = $date_end_obj ? $date_end_obj->format('c') : '';
?>

<section 
    class="section-about" 
    id="sobre"
    itemscope 
    itemtype="https://schema.org/Event"
>
    <div class="container">
        
        <header class="section-about__header">
            <h2 class="section-about__title" itemprop="name">
                <?php echo esc_html($about_title); ?>
            </h2>
            
            <?php if ($about_excerpt): ?>
            <p class="section-about__description" itemprop="description">
                <?php echo esc_html($about_excerpt); ?>
            </p>
            <?php endif; ?>
        </header>

        <div class="section-about__content">
            
            <!-- Coluna 1: Localização -->
            <article class="section-about__column section-about__location">
                <h3 class="section-about__subtitle">Localização</h3>
                
                <?php if ($event_location): ?>
                <address 
                    class="section-about__address" 
                    itemprop="location" 
                    itemscope 
                    itemtype="https://schema.org/Place"
                >
                    <span itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                        <span itemprop="streetAddress"><?php echo nl2br(esc_html($event_location)); ?></span>
                    </span>
                    
                    <?php 
                    $google_maps = get_theme_option('event_google_maps');
                    if ($google_maps): 
                    ?>
                    <a 
                        href="<?php echo esc_url($google_maps); ?>" 
                        class="section-about__map-link"
                        target="_blank"
                        rel="noopener noreferrer"
                        itemprop="hasMap"
                    >
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        Ver no mapa
                    </a>
                    <?php endif; ?>
                </address>
                <?php else: ?>
                <address class="section-about__address">
                    <em>Local a definir</em>
                </address>
                <?php endif; ?>
            </article>

            <!-- Coluna 2: Quando -->
            <article class="section-about__column section-about__when">
                <h3 class="section-about__subtitle">Quando</h3>
                
                <?php if ($event_date_start && $event_date_end): ?>
                <ul class="section-about__dates">
                    <?php if ($periodo_semana): ?>
                    <li class="section-about__date-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <span><?php echo esc_html($periodo_semana); ?></span>
                    </li>
                    <?php endif; ?>
                    
                    <?php if ($periodo_completo): ?>
                    <li class="section-about__date-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        <span>
                            <time datetime="<?php echo esc_attr($date_start_iso); ?>" itemprop="startDate">
                                <?php echo esc_html($periodo_completo); ?>
                            </time>
                        </span>
                        <meta itemprop="endDate" content="<?php echo esc_attr($date_end_iso); ?>">
                    </li>
                    <?php endif; ?>
                </ul>
                <?php else: ?>
                <p class="section-about__dates">
                    <em>Datas a confirmar</em>
                </p>
                <?php endif; ?>
            </article>

        </div>
        
    </div>
</section>
