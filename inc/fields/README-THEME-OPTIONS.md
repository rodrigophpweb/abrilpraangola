# 📋 Documentação - Opções do Tema

## 🎯 Visão Geral

Este arquivo (`customize.php`) cria uma página completa de **Opções do Tema** no WordPress usando o **ACF (Advanced Custom Fields)**.

---

## 📦 Requisitos

- **WordPress** instalado e ativo
- **ACF PRO** (versão paga) - necessário para:
  - Página de Opções (`acf_add_options_page`)
  - Campos Repeater
  - Alguns tipos de campo específicos

> 💡 **Alternativa**: Se tiver apenas o ACF Free, algumas funcionalidades não estarão disponíveis (como o Repeater de redes sociais).

---

## 🗂️ Estrutura das Abas

### 1️⃣ **Cores** 
Personalize todas as cores do tema:
- Cor Primária e Secundária
- Cores de texto (claro/escuro)
- Fundos (escuro/claro)
- Cores do Header e Footer
- Links (normal, hover, visitado)

**CSS Automático**: As cores são automaticamente convertidas em variáveis CSS `:root`

### 2️⃣ **Informações do Evento**
- Nome do evento
- Datas (início/fim)
- Horários
- Localização completa
- Link do Google Maps
- Descrição rica (WYSIWYG)

### 3️⃣ **Redes Sociais**
Campo Repeater com opções pré-definidas:
- Facebook, Instagram, YouTube, TikTok, Twitter, LinkedIn
- WhatsApp, Telegram, Spotify
- E-mail e Website

### 4️⃣ **Contato**
- E-mail principal
- Telefone
- WhatsApp (com número no formato internacional)
- Mensagem padrão para WhatsApp

### 5️⃣ **Rodapé**
- Texto de Copyright
- Desenvolvido por (com link opcional)
- Texto adicional WYSIWYG

### 6️⃣ **PWA (Progressive Web App)**
Transforme seu site em app instalável:
- Habilitar/desabilitar PWA
- Nome e nome curto do app
- Ícones (192x192 e 512x512)
- Cores do tema
- **Manifest.json gerado automaticamente**

### 7️⃣ **SEO & Meta**
- Logo do site
- Favicon
- Imagem Open Graph (redes sociais)
- Google Analytics ID
- Facebook Pixel ID

### 8️⃣ **Scripts Personalizados**
- Scripts no `<head>`
- Scripts antes do `</body>`
- CSS personalizado

---

## 🚀 Como Usar

### 1. **Acessar as Opções**
No WordPress Admin:
```
Menu lateral → Opções do Tema
```

### 2. **No código PHP**
Use a função helper `get_theme_option()`:

```php
// Pegar cor primária
$cor_primaria = get_theme_option('color_primary');

// Pegar nome do evento
$nome_evento = get_theme_option('event_name');

// Pegar WhatsApp
$whatsapp = get_theme_option('contact_whatsapp');

// Pegar redes sociais (Repeater)
$redes_sociais = get_theme_option('social_networks');
if ($redes_sociais) {
    foreach ($redes_sociais as $rede) {
        echo $rede['network']; // Ex: 'instagram'
        echo $rede['url'];     // Ex: 'https://instagram.com/...'
        echo $rede['label'];   // Ex: '@meuperfil'
    }
}
```

### 3. **CSS Automático**
As cores ficam disponíveis como variáveis CSS:

```css
.meu-botao {
    background-color: var(--color-primary);
    color: var(--color-text-light);
}

.meu-link:hover {
    color: var(--color-link-hover);
}
```

Variáveis disponíveis:
- `--color-primary`
- `--color-secondary`
- `--color-text`
- `--color-text-light`
- `--color-bg-dark`
- `--color-bg-light`
- `--color-header`
- `--color-footer`
- `--color-link`
- `--color-link-hover`
- `--color-link-visited`

---

## 🎨 Exemplos Práticos

### Exibir informações do evento:
```php
<div class="event-info">
    <h1><?php echo get_theme_option('event_name'); ?></h1>
    
    <p>
        <strong>Data:</strong> 
        <?php 
        $data_inicio = get_theme_option('event_date_start');
        $data_fim = get_theme_option('event_date_end');
        echo date('d/m/Y', strtotime($data_inicio));
        echo ' até ';
        echo date('d/m/Y', strtotime($data_fim));
        ?>
    </p>
    
    <p>
        <strong>Horário:</strong>
        <?php echo get_theme_option('event_time_start'); ?>
        até
        <?php echo get_theme_option('event_time_end'); ?>
    </p>
    
    <p>
        <strong>Local:</strong>
        <?php echo nl2br(get_theme_option('event_location')); ?>
    </p>
    
    <a href="<?php echo get_theme_option('event_google_maps'); ?>" target="_blank">
        📍 Ver no Mapa
    </a>
</div>
```

### Exibir redes sociais:
```php
<div class="social-networks">
    <?php 
    $redes = get_theme_option('social_networks');
    if ($redes): 
        foreach ($redes as $rede): 
    ?>
        <a href="<?php echo esc_url($rede['url']); ?>" 
           target="_blank" 
           rel="noopener"
           class="social-<?php echo esc_attr($rede['network']); ?>">
            <?php if ($rede['label']): ?>
                <?php echo esc_html($rede['label']); ?>
            <?php else: ?>
                <?php echo ucfirst($rede['network']); ?>
            <?php endif; ?>
        </a>
    <?php 
        endforeach;
    endif; 
    ?>
</div>
```

### Botão WhatsApp:
```php
<?php 
$whatsapp = get_theme_option('contact_whatsapp');
$mensagem = get_theme_option('whatsapp_message');
if ($whatsapp): 
    $link = 'https://wa.me/' . $whatsapp;
    if ($mensagem) {
        $link .= '?text=' . urlencode($mensagem);
    }
?>
    <a href="<?php echo esc_url($link); ?>" 
       target="_blank" 
       class="whatsapp-button">
        💬 Fale conosco
    </a>
<?php endif; ?>
```

### Rodapé com desenvolvedor:
```php
<footer>
    <p><?php echo get_theme_option('footer_copyright'); ?></p>
    
    <?php 
    $dev = get_theme_option('footer_developer');
    $dev_url = get_theme_option('footer_developer_url');
    if ($dev): 
    ?>
        <p>
            Desenvolvido por 
            <?php if ($dev_url): ?>
                <a href="<?php echo esc_url($dev_url); ?>" target="_blank">
                    <?php echo esc_html($dev); ?>
                </a>
            <?php else: ?>
                <?php echo esc_html($dev); ?>
            <?php endif; ?>
        </p>
    <?php endif; ?>
</footer>
```

---

## ✨ Recursos Automáticos Incluídos

### 🎨 Variáveis CSS
Cores são automaticamente injetadas no `<head>` como CSS custom properties.

### 📱 PWA (Progressive Web App)
Quando habilitado:
- Gera `manifest.json` dinamicamente
- Adiciona meta tags necessárias
- Suporte a iOS (Apple Touch Icon)
- URL: `seu-site.com/manifest.json`

### 📊 Analytics
- Google Analytics 4 - código automático
- Facebook Pixel - código automático

### 🔧 Scripts Personalizados
- Header scripts injetados no `wp_head`
- Footer scripts injetados no `wp_footer`
- CSS personalizado adicionado inline

---

## 🎁 Sugestões Adicionais Implementadas

Além dos campos solicitados, adicionei:

1. **Contato Completo**: E-mail, telefone, WhatsApp com mensagem padrão
2. **PWA Completo**: Transformar site em app instalável
3. **SEO Básico**: Logo, favicon, Open Graph
4. **Analytics**: Google Analytics e Facebook Pixel
5. **Scripts Custom**: Header, footer e CSS personalizado
6. **Helper Function**: `get_theme_option()` para facilitar o uso
7. **CSS Variables**: Cores automáticas como variáveis CSS
8. **Informações Extras do Evento**: Horários, descrição completa
9. **Links com hover**: Cor separada para hover em links

---

## 🔄 Ativação

1. Certifique-se que o arquivo está sendo incluído no `functions.php`
2. Ative o plugin **ACF PRO**
3. Acesse **Opções do Tema** no menu WordPress
4. Configure todos os campos necessários
5. Use `get_theme_option('campo')` no seu código

---

## 🐛 Troubleshooting

**Página de opções não aparece?**
- Verifique se ACF PRO está ativo
- ACF Free não tem `acf_add_options_page`

**Campos não aparecem?**
- Limpe cache do WordPress
- Verifique se não há conflitos com outros plugins

**PWA não funciona?**
- Acesse `seu-site.com/manifest.json` para testar
- Certifique-se que os ícones estão no formato correto (PNG)
- Flush rewrite rules: vá em Configurações → Links Permanentes → Salvar

**CSS variables não funcionam?**
- Verifique se o hook `wp_head` está presente no seu `header.php`
- Use `<?php wp_head(); ?>` antes do `</head>`

---

## 📞 Próximos Passos

1. Instalar e ativar **ACF PRO**
2. Configurar os campos na página de opções
3. Atualizar os templates para usar `get_theme_option()`
4. Testar PWA em dispositivos móveis
5. Validar Analytics e Pixel

---

**Desenvolvido com ❤️ para eventos de Capoeira** 🥋🇧🇷
