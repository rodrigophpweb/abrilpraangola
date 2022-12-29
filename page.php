<?php
    get_header();
    get_template_part('template-parts/breadcrumb');

    if (have_posts()):
        while (have_posts()): the_post();?>
            <?php is_page('programacao') ? get_template_part('template-parts/events') : '';?>
            <?php if(is_page('oficineiros')):?>
                <section class="pageOficineiro bg-light py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-center text-warning fw-bold"><?php the_title();?></h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 m-0">

                            </div>
                            <div class="col-6 m-0 p-5 d-flex flex-column justify-content-center bg-warning">
                                <h3 class=""><?php the_field('title_oficineiros')?></h3>
                                <h4 class=""><?php the_field('sub_title_oficineiros')?></h4>
                                <p><?php the_field('content_oficineiros');?></p>
                            </div>
                        </div>
                    </div>
                </section>
                <?php get_template_part('template-parts/speakers');
            endif;?>
            <section>
                <div class="container">
                    <div class="row pt-5">
                        <div class="col-12">
                            <?php the_content();?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile;
    endif;?>
    <?php 
        get_template_part('template-parts/location');
        get_template_part('template-parts/sponsors');
        get_footer();