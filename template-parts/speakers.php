<section class="speakers">
    <div class="container-full p-0 m-0">
        <div class="row p-0 m-0 ">
            <div class="col-12 py-5">
                <h2 class="text-center">Oficineiros do Evento</h2>
                <p class="text-center mb-3">Conheçam em primeira mão quem são os nossos oficineiros para a edição deste ano!</p>
            </div>
            <?php
                $args = array(
                    'post_type' => 'mestres',
                    'posts_per_page' => -1,
                    'orderby' => 'title',
                    'order' => 'ASC'
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()):
                    while ($the_query->have_posts()): $the_query->the_post(); ?>

                        <div class="card border-0 col-lg-3 m-0 p-0">
                            <?php the_post_thumbnail('full', ['class'=>'w-100 h-100'])?>
                            <div class="card-img-overlay p-0 d-flex flex-column justify-content-end">
                                <h4 class="card-title"><a href="<?php the_permalink()?>" title="Saiba mais sobre <?php the_title()?>" class="stretched-link text-warning ms-3 text-decoration-none"><?php the_title();?></a></h4>
                                <p class="card-text ms-3 text-light"><?php the_field('name_school')?></p>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata();
                endif;
            ?>                
        </div>
    </div>
</section>