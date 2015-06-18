<?php get_header(); ?>


	<div class="container mainContent-uttr">
		<div class="row">
			<?php if ( have_posts() ) :
		 while ( have_posts() ) : $i++;  the_post(); ?>
			<div class = "col-md-8">
				<p>You are here. <a href="<?php echo site_url()?>/">Home</a> <i class="fa fa-angle-double-right"></i> Useful Tax Time Resources</p>
 					<hr class = "fhr">
					<img src="<?php the_post_thumbnail(); ?>" alt="" class="img-responsive">
					<h2><?php the_title(); ?></h2>
					<p><h4>Our Tax Links provide the most up-to-date Accounting and Financial resources for all everyone visiting our web-ste. THese resources are vluable and utilised to benefit clients’ needs.</h4>

					<h4><strong>Insolvency &amp; Bankruptcy Advice</strong></h4>

					<img class=" size-full wp-image-8 aligncenter" src="<?php echo site_url()?>/wp-content/uploads/2015/05/asic-logo.gif" alt="asic-logo" width="442″ height="67″ />

					Australian Securities and Investments Commission regulates corporations and provides consumer protection in areas such as insurance and banking.

					<img class=" size-full wp-image-144 aligncenter" src="<?php echo site_url()?>/wp-content/uploads/2015/05/ipa-logo1.gif" alt="ipa-logo" width="224″ height="47″ />

					The National Institute of Accountants(NIA) is a professional organisation for accountants recognised for ther practical, hands-on skills and a broad understanding of the total business environment.

					<img class=" size-full wp-image-142 aligncenter" src="<?php echo site_url()?>/wp-content/uploads/2015/05/ato-logo1.gif" alt="ato-logo" width="270″ height="77″ />

					Australian goverment’s tax agency providing information on tax law, rulings, taxpayer rights and obligations. Download e-tax and file a tax return online.

					<img class=" size-full wp-image-143 aligncenter" src="<?php echo site_url()?>/wp-content/uploads/2015/05/ey-logo1.gif" alt="ey-logo" width="124″ height="73″ />

					Trusts have come under lots of scrutiny from the Government for a while and our experts can assist you in making sure that all aspects of this return is complied with.

					<img class=" size-full wp-image-14 aligncenter" src="<?php echo site_url()?>/wp-content/uploads/2015/05/centrelink-logo.gif" alt="centrelink-logo" width="254″ height="54″ />

					<h5>Centrelink</h5>

					Information on the Department of Social Security’s benefits. Features a discussion area and links to other health resources.</p>
				</div> 

	<?php endwhile;

		else :
		echo '<p> No content found </p>';
	  endif; ?>
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
	</div>
	
				

<?php get_footer(); ?>