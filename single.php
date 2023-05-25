<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package calplus
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container">
			<div class="row pt-4 pb-3 pb-lg-0 pt-lg-5 mb-0 mb-lg-5">
				<div class="col-12 col-lg-3 d-flex align-items-center mb-3 mb-lg-0">
					<?php woocommerce_breadcrumb();?>
				</div>
				<div class="col-12 col-lg-6 text-center">
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
						<a class="text-black" href=""><h1 class="woocommerce-products-header__title page-title">Display Category without Childs</h1></a>
					<?php endif; ?>
				</div>
				<div class="col-12 col-lg-3">

				</div>
			</div>
			<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					the_post_navigation(
						array(
							'prev_text' => '<button class="btn btn-secondary text-uppercase" type="button">' . esc_html__( 'Voriger: ', 'calplus' ) . ' %title</button>',
							'next_text' => '<button class="btn btn-secondary text-uppercase" type="button">' . esc_html__( 'Nächster: ', 'calplus' ) . '%title</button>',
						)
					);

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
			?>
		</div>
		

	</main><!-- #main -->

<?php

get_footer();
