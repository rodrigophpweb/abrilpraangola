<main style="background-image:url('<?php the_field('image_cover');?>'); height:100vh">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 py-5 text-light">
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
<section class="info bg-dark text-light">
    <div class="container">
        <div class="row pb-5">
            <div class="col-12 py-5">
                <h2>Abril Pra Angola</h2>
                <?php the_field('content_info');?>
            </div>
            <div class="col-3">
                <h5>Localização</h5>
                <p><?php the_field('location');?></p>
            </div>
            <div class="col-3">
                <h5>Quando</h5>
                <p><?php the_field('date_location');?></p>
            </div>
            <div class="col-6 text-right">
                <a href="" class="btn btn-warning">Oficineiros</a>
            </div>
        </div>
    </div>
</section>
<section class="meinha">
    <div class="container-full p-0 m-0">
        <div class="row p-0 m-0">
            <div class="col-6 p-0">
                <?php
                    //Insert field photo of mestre meinha
                    $image = get_field('photo_mestre_meinha');
                    if( !empty($image) ): ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'];?>" title="Mestre Meinha" class="img-fluid" />
                    <?php endif;
                ?>
            </div>
            <div class="col-6 p-5 d-flex flex-column justify-content-center">
                <h2>Mestre Meinha</h2>
                <h5>A capoeira angola em um único evento no estado de São Paulo</h5>
                <p class="mt-4"><?php the_field('curriculo_do_mestre');?></p>
            </div>
        </div>
    </div>
</section>

<section class="atividades">
    <div class="container-full p-0 m-0">
        <div class="row p-0 m-0">
            <div class="col-6 p-5 d-flex flex-column justify-content-center">
                <h2>Atividades práticas direto com os oficineiros</h2>
                <h5>Durante 4 dias muita capoeira, samba de roda, jongo, tambor de crioula, faça parte do maior evento de capoeira angola do estado de São Paulo</h5>
                <p class="mt-5"><?php the_field('content_task');?></p>
            </div>
            <div class="col-6 p-0">
            <?php
                //Insert field photo of mestre meinha
                $image = get_field('image-task');
                if( !empty($image) ): ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'];?>" class="img-fluid" />
                <?php endif;
                ?>
            </div>
        </div>
    </div>
</section>

<section class="counter">
    <div class="container">
        <div class="row py-5">
            <div class="col-12">
                <h2 class="text-center">Contagem Regressiva</h2>
                <h5 class="text-center">No ano passado, nossos pacotes venderam rápido, então não perca. Nosso evento terá início.</h5>
            </div>
        </div>
    </div>
</section>


