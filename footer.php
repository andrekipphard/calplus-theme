<?php
	$logo = get_field('logo', 'options');
	$text_unter_logo = get_field('text_unter_logo', 'options');
	
?>

	<footer id="colophon" class="site-footer pt-5<?php if(!is_archive()):?> mt-5<?php endif;?>">
		<div class="bg-black">
		<div class="container">
			<div class="row pt-5 pb-3">
				<div class="col-3">
					<img src="<?= wp_get_attachment_image_url($logo, 'full');?>" class="img-fluid mb-5" alt="...">
					<p class="text-uppercase text-white"><?= $text_unter_logo; ?></p>
				</div>
				<?php if ( have_rows( 'menu', 'options' ) ) : ?>
					<?php while ( have_rows( 'menu', 'options' ) ) : the_row(); 
						$menuname = get_sub_field('menuname', 'options');?>
						<div class="col-3">
							<h6 class="text-uppercase text-secondary"><?= $menuname; ?></h6>
							<ul>
								<?php while ( have_rows( 'menupunkt', 'options' ) ) : the_row(); 
									$menupunkt = get_sub_field('menupunkt', 'options');
									$menupunkt_url = get_sub_field('menupunkt_url', 'options');?>
									<li><a href="<?= $menupunkt_url;?>" class="text-white"><?= $menupunkt; ?></a></li>
								<?php endwhile; ?>
							</ul>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="site-info text-center text-white py-3 border-top">
			Copyright © 2023 CalPlus GmbH
		</div><!-- .site-info -->
		</div>
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<!-- Dark mode Button <button class="btn btn-dark shadow" id="btnSwitch">Dark Mode on/off</button>-->
</body>
</html>


	
