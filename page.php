<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package calplus
 */

get_header();
?>

	<main id="primary" class="site-main">
		
		<?php if(has_flexible('content')):
			
			the_flexible('content');
			
		endif; ?>

		<?php if (have_rows('content')):?>

		<?php else:
			while ( have_posts() ) :
				
				the_post();
				echo "<div class='container mb-5'>";
				
				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				echo "</div>";

			endwhile; // End of the loop.
		endif;
		?>

		

	</main><!-- #main -->

<?php
if (!have_rows('content')):
	// get_sidebar();
endif;
get_footer();
