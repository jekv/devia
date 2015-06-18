<?php get_header() ?>

	<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="container mainContent-partners">
		<div class="row">
			<div class="col-md-8">
				<h5>You are here. <a href="index.html">Home</a> <i class="fa fa-angle-double-right"></i> Practice Area</h5>
 				<hr class = "fhr">
				<h2><?php the_title(); ?></h2>
				<div class="row">
						<div class="col-md-6">
							<h4>Stonegate Wealth Solutions (Aust) Pty Ltd</h4>
							<img src="http://oi60.tinypic.com/akzors.jpg" alt="" class="img-responsive">
						</div>
						<div class="col-md-6">
							<div class="webXcontact">
								<h5>Website:</h5>
							<a href="http://www.stonegate.com.au">http://www.stonegate.com.au/</a>
							<h5>Contact:</h5>
							<p class = "partnersCP">Huss Saraya / Abdul Taha</p>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">	
						<div class="col-md-6">
							<h4>Bent & Cougle Pty Ltd — Insolvency Administrators</h4>
							<img src="http://oi58.tinypic.com/s2y2xi.jpg" alt="" class="img-responsive">
						</div>
						<div class="col-md-6">
							<div class="webXcontact">
							<h5>Website:</h5>
							<a href="http://www.bentcougle.com.au">http://www.bentcougle.com.au/</a>
							<h5>Contact:</h5>
							<p class = "partnersCP">Mr. Terry Finn</p>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<h4>Madgwicks Lawyers</h4>
							<img src="http://oi59.tinypic.com/2i07vpi.jpg" alt="" class="img-responsive">
						</div>
						<div class="col-md-6">
							<div class="webXcontact">
							<h5>Website:</h5>
							<a href="http://www.madgwicks.com.au">http://www.madgwicks.com.au/</a>
							<h5>Contact:</h5>
							<p class = "partnersCP">Mr. Angelo Conti</p>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<h4>A C Construction Pty Ltd</h4>
							<img src="http://oi61.tinypic.com/4sejvd.jpgf" alt="" class="img-responsive">
						</div>
						<div class="col-md-6">
							<div class="webXcontact">
							<h5>Website:</h5>
							<a href="http://www.acconstructions.com.au">http://www.acconstructions.com.au/</a>
							</div>
						</div>
					</div>
			<?php endwhile; endif; ?>
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

<?php get_footer() ?>