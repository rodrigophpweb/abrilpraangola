<main>
    <div class="container">
        <div class="row">
            <div class="col-12 py-5">
                <?php

                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            the_title('<h1 class="text-center pb-5">', '</h1>');
                            the_content();
                        endwhile;
                    endif;
                ?>
            </div>
        </div>
    </div>
</main>