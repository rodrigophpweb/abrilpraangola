<section class="bg-light">
    <div class="container">
        <div class="row pb-5">
            <div class="col-12 py-5">
                <h3>Realização e Parceiros</h3>
            </div>
            <?php
                // WP_Query with post_type patrocinadores
                $args = array(
                    'post_type' => 'patrocinadores',
                    'posts_per_page' => -1,
                    'orderby' => 'title',
                );
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) :
                        $query->the_post(); ?>
                        
                        <div class="col-lg-2 text-center d-flex align-items-center">
                            <?php the_post_thumbnail('thumbnail');?>
                        </div>
                        
                    <?php endwhile;
                wp_reset_postdata(); endif;
            ?>
        </div>
    </div>
</section>