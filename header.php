<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo('charset')?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php wp_head()?>
</head>
<body>
    <?php wp_body_open(); ?>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
                <?php
                    // Insert Custom Logo
                    the_custom_logo();                                   
                ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link text-light text-uppercase" href="<?php echo site_url('programacao');?>">Programação</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-light text-uppercase" href="<?php echo site_url('oficineiros');?>">Oficineiros</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-light text-uppercase" href="<?php echo site_url('pacotes');?>">Pacotes</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-light text-uppercase" href="<?php echo site_url('inscricao-do-evento');?>">Inscrição</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link text-light text-uppercase" href="<?php echo site_url('localizacao');?>">Localização</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-light text-uppercase" href="<?php echo site_url('contato');?>">Contato</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>
