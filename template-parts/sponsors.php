<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h3>Realização e Parceiros</h3>
            <?php
                $args = array(
                    'post_type' => 'patrocinadores',
                    'posts_per_page' => -1,
                    'orderby' => 'title',
                    'order' => 'ASC'
                );
                $sponsors = new WP_Query($args);
                if ($sponsors->have_posts()):
                    while ($sponsors->have_posts()): ?>
                        <div class="card" style="width: 18rem;">
                            <?php the_title();?>
                            <?php the_post_thumbnail('thumbnail');?>
                        </div>
                    <?php endwhile; wp_reset_postdata();
                endif;

            ?>
            </div>
        </div>
    </div>
</section>