# 🚀 Guia Rápido de Instalação - Opções do Tema

## ✅ Checklist de Instalação

### 1️⃣ Instalar ACF PRO
```
1. Baixe o ACF PRO de: https://www.advancedcustomfields.com/
2. Vá em: WordPress Admin → Plugins → Adicionar Novo → Upload
3. Faça upload do arquivo .zip
4. Ative o plugin
```

**💡 Importante**: É necessário a versão **PRO** (paga) para usar:
- Página de Opções (`Options Page`)
- Campos Repeater (Redes Sociais)

### 2️⃣ Verificar Arquivos Criados
```
✅ inc/fields/customize.php (Campos ACF)
✅ inc/fields/theme-snippets.php (Funções auxiliares)
✅ inc/fields/README-THEME-OPTIONS.md (Documentação)
✅ assets/css/components/footer.css (CSS do rodapé)
✅ footer.php (Atualizado com campos ACF)
✅ functions.php (Inclui os arquivos)
```

### 3️⃣ Acessar Página de Opções
```
WordPress Admin → Menu Lateral → Opções do Tema
```

### 4️⃣ Configurar Campos Essenciais
Preencha pelo menos:
- ✅ Nome do Evento
- ✅ Datas (início e fim)
- ✅ Localização
- ✅ WhatsApp
- ✅ Cores do tema
- ✅ Redes sociais

---

## 🎨 Como Usar no Código

### Função Básica
```php
<?php
// Pegar qualquer campo
$valor = get_theme_option('nome_do_campo');

// Exemplos práticos:
$cor_primaria = get_theme_option('color_primary');
$nome_evento = get_theme_option('event_name');
$whatsapp = get_theme_option('contact_whatsapp');
?>
```

### CSS Automático (Variáveis)
```css
.meu-elemento {
    background: var(--color-primary);
    color: var(--color-text-light);
}

.header {
    background: var(--color-header);
}

.footer {
    background: var(--color-footer);
}
```

### Snippets Prontos (em theme-snippets.php)
```php
<?php
// Card completo do evento
card_info_evento();

// Redes sociais com ícones
exibir_redes_sociais('horizontal');

// Botão WhatsApp flutuante
botao_whatsapp_flutuante();

// Countdown para o evento
countdown_evento();

// Logo do site
exibir_logo();
?>
```

---

## 📋 Campos Disponíveis

### 🎨 Cores
- `color_primary` - Cor primária
- `color_secondary` - Cor secundária
- `color_text` - Cor de texto
- `color_text_light` - Cor de texto claro
- `color_bg_dark` - Fundo escuro
- `color_bg_light` - Fundo claro
- `color_header` - Fundo do header
- `color_footer` - Fundo do footer
- `color_link` - Cor de links
- `color_link_hover` - Cor de links (hover)
- `color_link_visited` - Cor de links visitados

### 📅 Evento
- `event_name` - Nome do evento
- `event_date_start` - Data de início
- `event_date_end` - Data final
- `event_time_start` - Horário de início
- `event_time_end` - Horário de término
- `event_location` - Localização (endereço)
- `event_google_maps` - URL Google Maps
- `event_description` - Descrição (WYSIWYG)

### 📱 Redes Sociais
- `social_networks` - Array/Repeater com:
  - `network` - Tipo (facebook, instagram, etc)
  - `url` - Link da rede
  - `label` - Texto opcional (@usuario)

### 📞 Contato
- `contact_email` - E-mail principal
- `contact_phone` - Telefone
- `contact_whatsapp` - WhatsApp
- `whatsapp_message` - Mensagem padrão WhatsApp

### 📄 Rodapé
- `footer_copyright` - Copyright
- `footer_developer` - Desenvolvido por
- `footer_developer_url` - URL do desenvolvedor
- `footer_text` - Texto adicional (WYSIWYG)

### 📱 PWA
- `pwa_enable` - Habilitar PWA (true/false)
- `pwa_name` - Nome do app
- `pwa_short_name` - Nome curto
- `pwa_icon_512` - Ícone 512x512
- `pwa_icon_192` - Ícone 192x192
- `pwa_theme_color` - Cor do tema
- `pwa_bg_color` - Cor de fundo

### 🔍 SEO
- `site_logo` - Logo do site (array)
- `site_favicon` - Favicon
- `og_image` - Imagem Open Graph
- `google_analytics` - ID do Google Analytics
- `facebook_pixel` - ID do Facebook Pixel

### 🔧 Scripts
- `header_scripts` - Scripts no <head>
- `footer_scripts` - Scripts antes do </body>
- `custom_css` - CSS personalizado

---

## 🎯 Exemplos de Uso Rápido

### 1. Exibir Nome do Evento
```php
<h1><?php echo get_theme_option('event_name', 'Evento de Capoeira'); ?></h1>
```

### 2. Botão WhatsApp
```php
<?php
$whatsapp = get_theme_option('contact_whatsapp');
if ($whatsapp) {
    $link = 'https://wa.me/' . preg_replace('/[^0-9]/', '', $whatsapp);
    echo '<a href="' . $link . '" target="_blank">💬 WhatsApp</a>';
}
?>
```

### 3. Datas do Evento
```php
<?php
$inicio = get_theme_option('event_date_start');
$fim = get_theme_option('event_date_end');

if ($inicio && $fim) {
    echo date('d/m/Y', strtotime($inicio)) . ' até ' . date('d/m/Y', strtotime($fim));
}
?>
```

### 4. Loop de Redes Sociais
```php
<?php
$redes = get_theme_option('social_networks');
if ($redes) {
    foreach ($redes as $rede) {
        echo '<a href="' . $rede['url'] . '" target="_blank">';
        echo $rede['label'] ?: ucfirst($rede['network']);
        echo '</a>';
    }
}
?>
```

### 5. Usar Cores CSS
```css
/* Essas variáveis são geradas automaticamente */
.botao-primario {
    background: var(--color-primary);
    color: var(--color-text-light);
}

.botao-primario:hover {
    background: var(--color-secondary);
}

a {
    color: var(--color-link);
}

a:hover {
    color: var(--color-link-hover);
}
```

---

## 🔧 Troubleshooting

### Página "Opções do Tema" não aparece?
**Solução**: Instale ACF PRO (a versão free não tem Options Page)

### Campos não salvam?
**Solução**: 
1. Verifique permissões do usuário (precisa ter `edit_posts`)
2. Limpe cache do WordPress
3. Desative outros plugins de cache temporariamente

### PWA não funciona?
**Solução**:
1. Ative PWA nas opções do tema
2. Acesse: `seu-site.com/manifest.json` (deve retornar JSON)
3. Em Configurações → Links Permanentes → Salvar (flush rewrite rules)

### CSS não aparece?
**Solução**:
1. Verifique se `<?php wp_head(); ?>` está no header.php
2. Limpe cache do navegador (Ctrl+F5)
3. Desative plugins de cache

### Redes sociais não aparecem?
**Solução**:
1. Adicione pelo menos uma rede em Opções do Tema → Redes Sociais
2. Verifique se tem ACF PRO (Repeater só funciona na versão PRO)

---

## 📱 Testando PWA

1. Configure PWA em "Opções do Tema → PWA"
2. Upload de ícones 512x512 e 192x192 (PNG)
3. Acesse o site no celular (Chrome/Safari)
4. Opção "Adicionar à Tela Inicial" deve aparecer

---

## ✨ Sugestões de Melhorias Futuras

- [ ] Adicionar galeria de fotos do evento
- [ ] Campo para vídeo de destaque (YouTube/Vimeo)
- [ ] Configurar cores de gradiente
- [ ] Adicionar campo para parceiros/patrocinadores
- [ ] Campo para programação detalhada
- [ ] Integração com calendário (.ics)
- [ ] Adicionar mais opções de PWA (orientação, etc)

---

## 📞 Suporte

**Documentação completa**: `README-THEME-OPTIONS.md`
**Snippets prontos**: `theme-snippets.php`
**Arquivo principal**: `customize.php`

---

## 🎉 Pronto!

Seu tema agora tem uma página de opções completa com:
- ✅ Gerenciamento de cores
- ✅ Informações do evento
- ✅ Redes sociais
- ✅ PWA (app instalável)
- ✅ SEO básico
- ✅ Analytics integrado
- ✅ WhatsApp flutuante

**Próximo passo**: Configure os campos em "Opções do Tema" no WordPress!

---

**Desenvolvido com ❤️ para eventos de Capoeira** 🥋🇧🇷
