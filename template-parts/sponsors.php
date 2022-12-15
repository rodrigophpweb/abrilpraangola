<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h3>Realização e Parceiros</h3>
    
            <?php
                // WP_Query with post_type patrocinadores
                $args = array(
                    'post_type' => 'patrocinadores',
                    'posts_per_page' => -1,
                );
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) :
                        $query->the_post(); ?>
                        
                        <div class="card" style="width: 18rem;">
                            <?php the_title();?>
                            <?php the_post_thumbnail('thumbnail');?>
                        </div>
                        
                    <?php endwhile;
                wp_reset_postdata(); endif;
            ?>
            
            </div>
        </div>
    </div>
</section>