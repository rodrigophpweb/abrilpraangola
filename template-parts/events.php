<section class="events bg-light">
    <div class="container">
        <div class="row py-5">
            <div class="col-12">
                <h2 class="text-center text-warning fw-bold">Programação do Evento</h2>
                <p class="text-center">Confira abaixo as oficinas que serão realizadas nessses 04 de Abril Pra Angola</p>                
            </div>
        </div>
        <div class="row py-5">
            <?php
                // WP_Query arguments taxonomy days of event
                $args = array(
                    'post_type' => 'events',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                    'orderby' => 'date',                
                );
                // The Query
                $query = new WP_Query( $args );
                // The Loop
                if ( $query->have_posts() ):
                    while ( $query->have_posts() ): $query->the_post(); 
                    // print name of terms of taxonomy days of events
                    $terms = get_the_terms( $post->ID, 'days' );
                    ?>
                        <div class="col-md-6">
                            <?php foreach ( $terms as $term ):?>
                                <h3 class="text-center text-dark bg-warning p-3 rounded fw-bold"><?php echo $term->name?></h3>
                            <?php endforeach;?>
                            <h4 class="text-center mb-3"><?php the_title();?></h4>
                            <p class="text-center"><?php the_content();?></p>
                        </div>
                    <?php endwhile;
                endif;
                wp_reset_postdata();
            ?>
        </div>
    </div>
</section>