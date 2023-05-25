<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package calplus
 */

?>

<article id="post-<?php the_ID(); ?>" class="<?= join( ' ', get_post_class() ) ?> mb-4">
	<div class="p-4 h-100 shadow rounded d-flex flex-lg-row flex-column position-relative align-items-center">
		<div class="col-12 col-lg-4">
            <div class="pe-3">
            	<a href="<?php echo get_post_permalink();?>"><?php the_post_thumbnail(); ?></a>
            </div>
        </div>
		<div class="col-12 col-lg-4">
            <div class="px-3">
            <h3 class="text-uppercase">
				<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;
				?>
			</h3>
            <h4 class="">
                <?php $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        foreach ( $categories as $category ) {
                            echo '<span class="category">' . esc_html( $category->name ) . '</span>';
                        }
                    }
                ?>
				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php
						calplus_posted_on();
						calplus_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
            </h4>
            <?php 
            $date = get_field('datum'); // Replace 'datum' with the actual field name
            $date_start = get_field('datum_start'); // Replace 'datum' with the actual field name
            $date_end = get_field('datum_end'); // Replace 'datum' with the actual field name
            if ($date && $date_start && $date_end):?>
                <hr>
                <p class="price">
                    <?php
                        echo $date_start . ' - ' . $date_end;
                    ?>
                </p>
            <?php endif;?>
            <hr>
            <a href="<?php echo get_post_permalink();?>"><button class="btn btn-secondary text-uppercase desktop-product-archive-btn" type="button">Detailansicht</button></a>
            </div>
            
        </div>
		<div class="col-12 col-lg-4">
            <div class="border-lg-left ps-3">
                <p class="text-black-50">
					<div class="entry-content">
						<?php echo get_the_excerpt(); ?>
					</div><!-- .entry-content -->
				</p>
                <a href="<?php echo get_post_permalink();?>"><button class="btn btn-secondary text-uppercase mobile-product-archive-btn" type="button">Detailansicht</button></a>
            </div>
        </div>
	</div>

	

	<footer class="entry-footer">
		<?php calplus_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
