<?php

get_header();
	if (have_posts()) :
		while (have_posts()) : the_post();?>
		<div class="container mainContent-cfb">
			<div class="row">
				<div class="col-md-8">
					<h5>You are here. <a href="<?php echo site_url()?>/">Home</a> <i class="fa fa-angle-double-right"></i> Castle Finance Brokers</h5>
 					<hr class = "fhr">
		<h2><?php the_title() ;?></h2>
		<p class = "firstp"><?php the_content(); ?></p>
		<hr>

		<?php endwhile;
	endif; ?>
	<?php query_posts('category_name='.get_the_title().'&post_status=publish,future');?>
	
	<?php if ( have_posts() ) :
		 while ( have_posts() ) : the_post(); ?>
		<div class="row">
			<div class="col-md-6">
				<!--<img src="<?php the_post_thumbnail(); ?>" alt="" class="img-responsive">-->
				<?php 

				$attr = array(

					'class' => " img-responsive",
					'alt'   => trim( strip_tags( $wp_postmeta->_wp_attachment_image_alt ) )
				);


				the_post_thumbnail( $size, $attr ); ?> 
			</div>
			<div class="col-md-6">
				<h2><?php the_title(); ?></h2>
				<p><?php the_content();?></p>
			</div>
		</div>
			<?php
			$var1 = "Motor Vehicle Finance";		
			 if (strcasecmp(get_the_title(), $var1)!=0) {?>
			<hr>
			<?php }?>
	<?php endwhile;

		else :
		echo '<p> No content found </p>' ;

	  endif; ?>
	  </div>
	 
	  <div class="col-md-4">
					<div class="reg">
						<h3>Free Initial Consultation</h3>
						<?php echo do_shortcode('[contact-form-7 id="129" title="newFrm"]'); ?>
					<!-- oops -->
					<div id="underconstruction" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									
									<h4 class="modal-title">Ooooops!</h4>
								</div>
								<div class="modal-body">
									<p>Site underconstruction. Try again later.</p>
								</div>
								<div class="modal-footer">
									<button class="btn btn-error" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
					<!-- end -->
					</div>
					<img src="<?php echo site_url()?>/wp-content/uploads/2015/05/calluson-img.gif" alt="" class="img-responsive cuo">
				</div>
	 </div>
</div>
<div class="partnerships">
				<h2>OUR PARTNERSHIP</h2><br>
				<ul>
					<li><img src="<?php echo site_url()?>/wp-content/uploads/2015/05/stonegate-logo.gif" alt="" class="img-responsive"></li>
					<li><img src="<?php echo site_url()?>/wp-content/uploads/2015/05/accg-logo.gif" alt="" class="img-responsive"></li>
					<li><img src="<?php echo site_url()?>/wp-content/uploads/2015/05/madgwicks-logo.gif" alt="" class="img-responsive"></li>
					<li><img src="<?php echo site_url()?>/wp-content/uploads/2015/05/bc-logo.gif" alt="" class="img-responsive"></li>
				</ul>		
			</div>

<?php get_footer(); ?>