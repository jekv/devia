<?php

get_header();

	if (have_posts()) :
		while (have_posts()) : the_post();?>
		<div class="container mainContent-about">
			
			<div class="row">
				<div class="col-md-8">
					<h5>You are here. <a href="<?php echo get_page_link(40); ?>">Home</a> <i class="fa fa-angle-double-right"></i> About Us</h5>
 					<hr class = "fhr">
					<h2><?php the_title() ;?></h2>
					<?php the_post_thumbnail() ?>
					<?php the_content(); ?>

					<?php endwhile;
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
					<img src="<?php echo site_url()?>/wp-content/uploads/2015/06/imageedit_1_8718636829.png" alt="" class="img-responsive cuo">
				</div>
	 </div> 
	</div>
	<div class="partnerships">
				<h2>OUR PARTNERS</h2><br>
				<ul>
					<a href="http://www.stonegate.com.au" target = "newTab"><li><img src="<?php echo site_url()?>/wp-content/uploads/2015/05/stonegate-logo.gif" alt="" class="img-responsive"></li></a>
					<a href="http://www.acconstructions.com.au" target = "newTab"><li><img src="<?php echo site_url()?>/wp-content/uploads/2015/05/accg-logo.gif" alt="" class="img-responsive"></li></a>
					<a href="http://www.madgwicks.com.au" target = "newTab"><li><img src="<?php echo site_url()?>/wp-content/uploads/2015/05/madgwicks-logo.gif" alt="" class="img-responsive"></li></a>
					<a href="http://www.bentcougle.com.au" target = "newTab"><li><img src="<?php echo site_url()?>/wp-content/uploads/2015/05/bc-logo.gif" alt="" class="img-responsive"></li></a>
				</ul>		
			</div>

<?php get_footer(); ?>