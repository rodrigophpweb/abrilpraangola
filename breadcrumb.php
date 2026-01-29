<?php
/**
 * Breadcrumb Navigation
 */
?>
<nav class="breadcrumb" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="<?php echo esc_url(home_url('/')); ?>">Início</a>
            </li>
            <?php if (is_page()): ?>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php the_title(); ?>
                </li>
            <?php endif; ?>
        </ol>
    </div>
</nav>
