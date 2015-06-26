<?php get_header() ?>

	<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="container mainContent-partners">
		<div class="row">
			<div class="col-md-8 out8">
				<h5>You are here. <a href="index.html">Home</a> <i class="fa fa-angle-double-right"></i> Partners</h5>
 				<hr class = "fhr">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			
			</div>
			<div class="col-md-4 in4 out4">
				<div class="reg">
						<h3>Free Initial Consultation</h3>
						<?php echo do_shortcode('[contact-form-7 id="129" title="newFrm"]'); ?> 
				
					</div>
					<?php include 'cuo.php' ?>
			</div>
		</div>
	</div>
	<?php endwhile; endif; ?>
<?php get_footer() ?>