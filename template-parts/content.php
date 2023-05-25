<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package calplus
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="border border-black mb-4 p-4 rounded">
		<div class="row">
			<div class="col-12 col-lg-6 ps-0 ps-lg-2 pe-0 pe-lg-5">
				<?php calplus_post_thumbnail(); ?>
			</div>
			<div class="col-12 col-lg-6 ps-0 ps-lg-5 pt-4 pt-lg-5 d-flex flex-column">
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) :
					?>
					<div class="entry-meta">
						<?php
						calplus_posted_on();
						calplus_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
				<?php 
				$date = get_field('datum'); // Replace 'datum' with the actual field name
				$date_start = get_field('datum_start'); // Replace 'datum' with the actual field name
				$date_end = get_field('datum_end'); // Replace 'datum' with the actual field name
				if ($date && $date_start && $date_end):?>
					<hr>
					<p class="price mb-0">
						<?php
							echo $date_start . ' - ' . $date_end;
						?>
					</p>
				<?php endif;?>
				<hr>
				<div class="entry-content">
						<?php echo get_the_excerpt(); ?>
					</div><!-- .entry-content -->
			</div>
			<div class="row mt-3">
				<div class="col px-0 px-lg-2">
					<div class="entry-content">
						<?php
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'calplus' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							)
						);

						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'calplus' ),
								'after'  => '</div>',
							)
						);
						?>
					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<?php calplus_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				</div>
			</div>
		</div>
		
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
