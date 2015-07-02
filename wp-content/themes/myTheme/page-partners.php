<?php get_header() ?>

	<?php query_posts('category_name='.get_the_title().'&post_status=publish,future');?>
	
	<div class="container mainContent-partners">
		<div class="row">
			<div class="col-md-8 out8">
				<h5>You are here. <a href="index.html">Home</a> <i class="fa fa-angle-double-right"></i>  <?php the_title(); ?></h5>
 				<hr class = "fhr">
				<h2><?php the_title(); ?></h2>
				<?php if ( have_posts() ) :
				 while ( have_posts() ) : the_post(); ?>
				<div class="row">
						<div class="col-md-8">
							<h4><?php the_title(); ?></h4>
							<?php 

							$attr = array(

								'class' => " img-responsive",
								'alt'   => trim( strip_tags( $wp_postmeta->_wp_attachment_image_alt ) )
							);


							the_post_thumbnail( $size, $attr ); ?>  
						</div>
						<div class="col-md-4 in4">
							<div class="webXcontact">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
					<hr>
			<?php endwhile; endif; ?>
			
			</div>
			<div class="col-md-4 in4 out4">
				<?php include 'initconsult.php'; ?>
			</div>
		</div>
	</div>
	
<?php get_footer() ?>