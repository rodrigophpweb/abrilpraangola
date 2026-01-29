    <footer class="site-footer">
        <div class="container">
            <!-- Redes Sociais -->
            <?php 
                $redes_sociais = get_theme_option('social_networks');
                if ($redes_sociais): 
            ?>
                <div class="footer-social">
                    <h3>Siga-nos</h3>
                    <div class="social-links">
                        <?php foreach ($redes_sociais as $rede): ?>
                            <a href="<?php echo esc_url($rede['url']); ?>" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="social-link social-<?php echo esc_attr($rede['network']); ?>"
                               title="<?php echo esc_attr($rede['label'] ?: ucfirst($rede['network'])); ?>">
                                <?php echo esc_html($rede['label'] ?: ucfirst($rede['network'])); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Informações de Contato -->
            <?php 
            $email = get_theme_option('contact_email');
            $telefone = get_theme_option('contact_phone');
            if ($email || $telefone): 
            ?>
                <address class="footer-contact">
                    <h3>Contato</h3>
                    <?php if ($email): ?>
                        <p>
                            <strong>E-mail:</strong> 
                            <a href="mailto:<?php echo esc_attr($email); ?>">
                                <?php echo esc_html($email); ?>
                            </a>
                        </p>
                    <?php endif; ?>
                    <?php if ($telefone): ?>
                        <p>
                            <strong>Telefone:</strong> 
                            <?php echo esc_html($telefone); ?>
                        </p>
                    <?php endif; ?>
                </address>
            <?php endif; ?>

            <!-- Texto Adicional do Rodapé -->
            <?php 
            $footer_text = get_theme_option('footer_text');
            if ($footer_text): 
            ?>
                <div class="footer-text">
                    <?php echo wp_kses_post($footer_text); ?>
                </div>
            <?php endif; ?>

            <!-- Copyright e Desenvolvedor -->
            <div class="footer-bottom">
                <p class="copyright">
                    <?php echo esc_html(get_theme_option('footer_copyright', '© ' . date('Y') . ' - Todos os direitos reservados')); ?>
                </p>
                
                <?php 
                $dev = get_theme_option('footer_developer');
                $dev_url = get_theme_option('footer_developer_url');
                if ($dev): 
                ?>
                    <p class="developer">
                        Desenvolvido por 
                        <?php if ($dev_url): ?>
                            <a href="<?php echo esc_url($dev_url); ?>" target="_blank" rel="noopener">
                                <?php echo esc_html($dev); ?>
                            </a>
                        <?php else: ?>
                            <strong><?php echo esc_html($dev); ?></strong>
                        <?php endif; ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>