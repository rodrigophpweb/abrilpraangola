<?php
/**
 * Section Schedule
 * Displays the event schedule grouped by days (taxonomy 'dia')
 * with programming items (post type 'programacao')
 */

// Get all terms from 'dia' taxonomy
$dias = get_terms( array(
	'taxonomy'   => 'dia',
	'hide_empty' => true,
	'orderby'    => 'term_id',
	'order'      => 'ASC',
) );

if ( ! is_wp_error( $dias ) && ! empty( $dias ) ) :
?>
<section class="schedule" id="programacao" itemscope itemtype="https://schema.org/Schedule">
	<div class="container">
		<header class="schedule__header">
			<h2 class="schedule__title">Programação</h2>
			<p class="schedule__subtitle">Confira a programação completa do evento</p>
		</header>

		<div class="schedule__content">
			<?php foreach ( $dias as $dia ) :
				// Query programacao posts for this specific day
				$args = array(
					'post_type'      => 'programacao',
					'posts_per_page' => -1,
					'orderby'        => 'menu_order',
					'order'          => 'ASC',
					'tax_query'      => array(
						array(
							'taxonomy' => 'dia',
							'field'    => 'term_id',
							'terms'    => $dia->term_id,
						),
					),
				);

				$programacao_query = new WP_Query( $args );

				if ( $programacao_query->have_posts() ) :
			?>
			<article class="schedule__day" itemscope itemtype="https://schema.org/Event">
				<header class="schedule__day-header">
					<h3 class="schedule__day-title" itemprop="name"><?php echo esc_html( $dia->name ); ?></h3>
					<?php if ( ! empty( $dia->description ) ) : ?>
						<p class="schedule__day-description" itemprop="description"><?php echo esc_html( $dia->description ); ?></p>
					<?php endif; ?>
				</header>

				<div class="schedule__events">
					<?php while ( $programacao_query->have_posts() ) : $programacao_query->the_post(); ?>
					<div class="schedule__event" itemscope itemtype="https://schema.org/EventSchedule">
						<h4 class="schedule__event-title" itemprop="name"><?php the_title(); ?></h4>
						
						<div class="schedule__event-content" itemprop="description">
							<?php the_content(); ?>
						</div>

						<?php if ( has_post_thumbnail() ) : ?>
						<figure class="schedule__event-image">
							<?php the_post_thumbnail( 'medium', array( 'itemprop' => 'image' ) ); ?>
						</figure>
						<?php endif; ?>
					</div>
					<?php endwhile; ?>
				</div>
			</article>
			<?php
				endif;
				wp_reset_postdata();
			endforeach;
			?>
		</div>
	</div>
</section>
<?php endif; ?>

