<?php get_header() ?>

 <div class="container mainContent-practice">
 	<div class="row">
 		<div class="col-md-8">
 			<h5>You are here. <a href="<?php echo site_url()?>/">Home</a> <i class="fa fa-angle-double-right"></i> Practice Area</h5>
 			<hr class = "fhr">
 			<?php if (have_posts()) : 
			while (have_posts()) : the_post(); ?>
 			<?php the_title(); ?>
 			<h4>Individual Tax Return</h4>
			<br>
			<p>Our expert staff can assist you in the preparation of all aspects of individual income tax return. We can determine you optimum tax benefits based on current legislation.</p>
			<p>If you have a rental investment property, we will assist you in getting the maximum tax benefit and maximise your negative gearing.
			<br>
			Company Income Tax Returns
			</p>
			<p>Our experts will guide you through all aspects of company income tax return whether you prepare your own financials or not.</p>
			<p>If you require our expertise in the preparation of the financial statments, we will assist your in this as well.</p>
			<br>
			<h4>Partnership Income Tax Returns</h4>
			<br>
			<p>Our experts will assist you in all aspects of this return. Wheter you are a business partnership or a family partnership, we can assist you to maximise all deductions required for a partnership return.</p>
			<br>
			<h4>Superannuation Income Tax Returns</h4>
			<br>
			<p>We have on bord a registered Auditor, who will assist in the audit requirements of a Superannuation Audit.</p>
			<br>
			<h4>Trust Income Tax Returns</h4>
			<br>
			<p>Trusts have come under lots of scrutiny from the government for a while and our expers can assist you in making sure that all aspects of this return is complied with.</p>
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
				<h2>OUR PARTNERSHIP</h2><br>
				<ul>
					<li><img src="<?php echo site_url()?>/wp-content/uploads/2015/05/stonegate-logo.gif" alt="" class="img-responsive"></li>
					<li><img src="<?php echo site_url()?>/wp-content/uploads/2015/05/accg-logo.gif" alt="" class="img-responsive"></li>
					<li><img src="<?php echo site_url()?>/wp-content/uploads/2015/05/madgwicks-logo.gif" alt="" class="img-responsive"></li>
					<li><img src="<?php echo site_url()?>/wp-content/uploads/2015/05/bc-logo.gif" alt="" class="img-responsive"></li>
				</ul>		
			</div>
	

<?php get_footer() ?>