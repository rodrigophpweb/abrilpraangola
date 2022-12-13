<?php
    get_header();
    get_template_part('template-parts/breadcrumb');

    if (have_posts()):
        while (have_posts()): the_post();?>
            <main>
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <?php the_title('<h2 class="pt-5 pb-2">', '</h2>');?>
                            </div>
                            <div class="col-4">
                                Estr. dos Botelhos, 1944 - Jardim Petropolis, Itapecerica da Serra - SP, 06873-000
                            </div>
                            <div class="col-4">
                                <a class="text-decoration-none" href="http://www.alvoradacamp.com.br/" title="AlvoradaCamp" target="blank">http://www.alvoradacamp.com.br/</a>
                            </div>
                            <div class="col-4">
                                <a class="text-decoration-none" href="tel:+5511971662662" title="Telefone AlvoradaCamp" target="">11 971662662</a>
                            </div>
                        </div>
                    </div>

                    <div class="container-full m-0 p-0">
                        <div class="row m-0 p-0">
                            <div class="col-12 m-0 p-0">
                                <?php
                                    if(is_page('localizacao')):?>
                                       <div class="ratio ratio-21x9">
                                           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.9999999999995!2d13.204444444444444!3d-8.836666666666667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTHCsDQ2JzIyLjkiTiA3N8KwMjUnMjMuOSJF!5e0!3m2!1spt-BR!2sbr!4v1554821000000!5m2!1spt-BR!2sbr" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                       </div>
                                    <?php endif;
                                        the_content();
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

        <?php endwhile;
    endif;
    get_footer();