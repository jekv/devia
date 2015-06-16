<?php
get_header(); ?>

	<div class="container quote">
			<div class="row">
				<h2>DD Accounting<br>Services</h2>
				<div class="col-md-10">
					
					<h3>NEED ACCOUNTANT? OR TAX AGENTS?</h3>
					<p>We are accredited via AFG to assist you in all forms of finance requirements. Hence we can place your loan with all major lenders in the market place depending on your individual needs.</p>
					<button type = "button" class="btn" data-toggle="modal" data-target="#underconstruction">Get a Quote!</button>
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
			</div>
			
		</div>
	<?php

	$attr = array(

		'class' => " yoyo",
		'alt'   => trim( strip_tags( $wp_postmeta->_wp_attachment_image_alt ) )
	);

	 the_post_thumbnail($size,$attr); ?>


		<div class="container content">
			<div class="topContent">
				<div class="row">
					<div class="col-md-6 about">
						<h1>About Us</h1>
						<p>DD Accounting Services provide Public Accountants and Registered Tax Agents.</p>
						<p>DD Accounting Services is committed to fulfilling client satisfaction to the extent that our service is appreciated and referrals encouraged.</p>
						<a href="about.html">View More</a>
					</div>
					<div class="col-md-6">
						<img src="http://localhost/wordpress/wp-content/uploads/2015/05/aboutus-img.gif" alt="" class="img-responsive">
					</div>
				</div>
			</div>
		
		
		<div class = "midContent">
			

		<?php query_posts('category_name='.get_the_title().'&post_status=publish,future');?>
	<div class = "row">
	<?php if ( have_posts() ) :
		 while ( have_posts() ) : $i++;  the_post(); ?>
				<div class = "col-md-4">
				<img src="<?php the_post_thumbnail(); ?>" alt="" class="img-responsive">
				<h4><?php the_title(); ?></h4>
				<p><?php the_content();?></p>
			</div>
		</div>

	<?php endwhile;

		else :
		echo '<p> No content found </p>';
	  endif; ?>
	  </div>
 	
 	<div class="partners">
				<h2>OUR PARTNERSHIP</h2><br>
				<img src="images/part1-img.gif" alt="" class="img-responsive">
				<img src="images/part2-img.gif" alt="" class="img-responsive">
				<img src="images/part3-img.gif" alt="" class="img-responsive">
				<img src="images/part4-img.gif" alt="" class="img-responsive">
			</div>

			<div class="btmContent">
				<img src="images/cont-bg-img.gif" alt="" class="img-responsive">
				<strong class="news">newsletter</strong>
				<p>Sign up to get <strong>EXCLUSIVE</strong> offers & to be well up in the news.</p>
				<input type="text" placeholder = "Subscribe Now"><button type="button" class="btn"><i class="fa fa-paper-plane"></i></button>
			</div>


				<h2>Contact US</h2>
					<p>It's really easy to get in touch with us! Please fill in the form below or email us at dipakdevia@devia.com.au and we'll get back to you as soon as possible. Or if you want to speak to our friendly staff right now then please call (61-3) 9350-6611.</p>
					<?php  if (have_posts()) :
					while (have_posts()) : the_post();?>
					<div class="contactU">
					<h2>Contact US</h2>
					<p>It's really easy to get in touch with us! Please fill in the form below or email us at dipakdevia@devia.com.au and we'll get back to you as soon as possible. Or if you want to speak to our friendly staff right now then please call (61-3) 9350-6611.</p>
					<?php the_content(); ?>

					<?php endwhile;
					endif; ?>
					</div>
<?php get_footer(); ?>