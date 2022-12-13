<section class="speakers">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Oficineiros do Abril pra Angola</h2>
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
                        <div class="col-4">
                            <div class="card bg-transparent border-0">
                                <?php 
                                    the_post_thumbnail('thumbnail');
                                    the_title('<h4 class="text-center">', '</h4>');
                                    the_excerpt();                                    
                                ?>
                                <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" class="btn btn-primary">Saiba mais</a>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata();
                endif;
            ?>                
        </div>
    </div>
</section>