# 🥋 Abril pra Angola - WordPress Theme

Tema WordPress desenvolvido para eventos de capoeira, com foco em apresentação de programação, oficineiros, pacotes de inscrição e informações do evento.

## 📋 Índice

- [Sobre o Projeto](#sobre-o-projeto)
- [Funcionalidades](#funcionalidades)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Estrutura do Projeto](#estrutura-do-projeto)
- [Instalação](#instalação)
- [Páginas Especiais](#páginas-especiais)
- [Customização](#customização)
- [Contribuindo](#contribuindo)

## 🎯 Sobre o Projeto

Tema WordPress customizado para eventos de capoeira, oferecendo uma experiência completa para divulgação e gerenciamento de informações do evento, incluindo programação, palestrantes, inscrições e muito mais.

## ✨ Funcionalidades

- 📅 **Programação de Eventos** - Exibição completa da agenda do evento
- 👥 **Oficineiros/Palestrantes** - Perfis detalhados dos mestres e convidados
- 🎫 **Pacotes de Inscrição** - Apresentação de diferentes opções de tickets
- 📍 **Localização** - Informações sobre o local do evento
- 📝 **Blog** - Sistema de posts para notícias e atualizações
- 💬 **Depoimentos** - Seção de testemunhos de participantes
- 📧 **Newsletter** - Sistema de inscrição para receber novidades
- 🤝 **Patrocinadores** - Exibição de apoiadores do evento
- 📱 **WhatsApp Button** - Botão flutuante para contato direto
- 🍞 **Breadcrumb** - Navegação estruturada

## 🛠 Tecnologias Utilizadas

- **WordPress** - CMS
- **PHP** - Backend
- **HTML5** - Estrutura
- **CSS3** - Estilização
- **JavaScript** - Interatividade
- **Custom Post Types** - Tipos de conteúdo personalizados

## 📁 Estrutura do Projeto

```
wp-capoeira/
├── assets/
│   ├── css/
│   │   ├── variables.css
│   │   ├── components/
│   │   │   ├── footer.css
│   │   │   ├── header.css
│   │   │   ├── sectionAbout.css
│   │   │   ├── sectionActivities.css
│   │   │   ├── sectionBlog.css
│   │   │   ├── sectionGuest.css
│   │   │   ├── sectionHero.css
│   │   │   ├── sectionLocale.css
│   │   │   ├── sectionSchedule.css
│   │   │   ├── sectionSpeakers.css
│   │   │   ├── sectionSponsors.css
│   │   │   ├── sectionTickets.css
│   │   │   └── whatsapp.css
│   │   └── pages/
│   │       ├── category.css
│   │       ├── front-page.css
│   │       ├── index.css
│   │       ├── page.css
│   │       └── single.css
│   ├── icons/
│   ├── images/
│   └── js/
│       └── app.js
├── inc/
│   ├── brand.php
│   ├── cpt.php
│   ├── style-and-scripts.php
│   └── fields/
│       ├── customize.php
│       ├── frontPage.php
│       ├── pageAbout.php
│       └── theme-snippets.php
├── template-parts/
│   ├── section-about.php
│   ├── section-activities.php
│   ├── section-blog.php
│   ├── section-contact.php
│   ├── section-guest.php
│   ├── section-hero.php
│   ├── section-locale.php
│   ├── section-master-capoeira.php
│   ├── section-schedule.php
│   ├── section-speakers.php
│   ├── section-sponsors.php
│   ├── section-subscribe.php
│   ├── section-testimonials.php
│   ├── section-tickets.php
│   └── section-whatsapp.php
├── breadcrumb.php
├── button-whatsapp.php
├── category.php
├── footer.php
├── front-page.php
├── functions.php
├── header.php
├── index.php
├── page.php
├── single.php
└── style.css
```

## 🚀 Instalação

1. **Clone o repositório**
```bash
git clone https://github.com/rodrigophpweb/abrilpraangola.git
```

2. **Copie para a pasta de temas do WordPress**
```bash
cp -r abrilpraangola /caminho/para/wordpress/wp-content/themes/
```

3. **Ative o tema no WordPress**
   - Acesse o painel administrativo do WordPress
   - Vá em **Aparência → Temas**
   - Ative o tema "Abril pra Angola"

4. **Configure as páginas**
   - Crie as páginas necessárias (ver seção [Páginas Especiais](#páginas-especiais))
   - Configure o menu de navegação

## 📄 Páginas Especiais

O tema possui páginas com templates específicos:

| Página | Slug | Template |
|--------|------|----------|
| Sobre | `sobre` ou `about` | `section-about.php` |
| Programação | `programacao` ou `schedule` | `section-schedule.php` |
| Oficineiros | `oficineiros` ou `speakers` | `section-speakers.php` |
| Pacotes | `pacotes` ou `tickets` | `section-tickets.php` |
| Inscrição | `inscricao` ou `subscribe` | `section-subscribe.php` |
| Localização | `localizacao` ou `locale` | `section-locale.php` |
| Blog | `blog` | `section-blog.php` |
| Contato | `contato` ou `contact` | `section-contact.php` |

### Lógica de Exibição

Cada página exibe automaticamente:
- **Conteúdo principal** da página específica
- **Seções complementares**: Depoimentos, Blog, Newsletter e Patrocinadores
- **Regra importante**: Se a página for Blog, Localização ou Inscrição, a respectiva seção NÃO aparece duplicada nas seções complementares

## 🎨 Customização

### Variáveis CSS

As cores e estilos podem ser customizados no arquivo `assets/css/variables.css`.

### Custom Fields

O tema utiliza campos personalizados para configurações específicas. Consulte os arquivos em `inc/fields/` para mais detalhes.

### Custom Post Types

Post types personalizados são registrados em `inc/cpt.php`.

## 🤝 Contribuindo

Contribuições são bem-vindas! Para contribuir:

1. Faça um Fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/NovaFuncionalidade`)
3. Commit suas mudanças (`git commit -m 'Adiciona nova funcionalidade'`)
4. Push para a branch (`git push origin feature/NovaFuncionalidade`)
5. Abra um Pull Request

## 📝 Licença

Este projeto é de código aberto e está disponível sob a licença MIT.

## 👨‍💻 Autor

**Rodrigo Silva**
- GitHub: [@rodrigophpweb](https://github.com/rodrigophpweb)

## 📞 Suporte

Para suporte, entre em contato através das issues do GitHub.

---

⭐ Se este projeto foi útil para você, considere dar uma estrela no repositório!
