<?php get_header() ?>


	<div class="container mainContent-partners">
		<div class="row">
			<div class="col-md-8 out8">
				<h5>You are here. <a href="index.html">Home</a> <i class="fa fa-angle-double-right"></i> Partners</h5>
 				<hr class = "fhr">
				<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
				<h2><?php the_title(); ?></h2>
				<div class="row">
						<div class="col-md-8">
							<h4><?php the_title(); ?></h4>
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="col-md-4 in4">
							<div class="webXcontact">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
					<?php endwhile; endif; ?>
			</div>
			<div class="col-md-4 in4 out4">
				<div class="reg">
						<h3>Free Initial Consultation</h3>
						<?php echo do_shortcode('[contact-form-7 id="129" title="newFrm"]'); ?> 
			
					</div>
					<img src="<?php echo site_url()?>/wp-content/uploads/2015/06/imageedit_1_8718636829.png" alt="" class="img-responsive cuo">
			</div>
		</div>
	</div>
<?php get_footer() ?>