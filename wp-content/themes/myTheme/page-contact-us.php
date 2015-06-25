<?php get_header(); ?>
<div class="container mainContent-contact">
		<div class="row">
			<p class = "x">You are here. <a href="<?php echo site_url()?>/">Home</a> <i class="fa fa-angle-double-right"></i> Contact Us</p>
 			<hr class = "fhr">
			<?php if ( have_posts() ) :
		 while ( have_posts() ) : $i++;  the_post(); ?>
			<div class = "col-md-6">
					<img src="<?php the_post_thumbnail(); ?>" alt="" class="img-responsive">
					<h2><?php the_title(); ?></h2>
					<h4>It's really easy to get in touch with us! Please fill in the form below or email us at <b><a href="mailto:minadevia@devia.com.au">dipakdevia@devia.com.au</a></b> or <b><a href="mailto:minadevia@devia.com.au">minadevia@devia.com.au</a></b> and we'll get back to you as soon as possible. Or if you want to speak to our friendly staff right now then please call <b>(61-3) 9350-6611</b>.</h4>
					<div class="wrapper ff">
						<div class="fillup-form">
							<p><?php the_content();?></p>
						</div>
					</div>
				</div>

	<?php endwhile;
 
		else :
		echo '<p> No content found </p>';
	  endif; ?>
<div class="col-md-6">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3155.1622777905204!2d144.944719!3d-37.739337!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65b449d9baa19%3A0xff7c593b1480f33f!2s425+Bell+St%2C+Pascoe+Vale+South+VIC+3044%2C+Australia!5e0!3m2!1sen!2sph!4v1432532528901" width="560" height="580" frameborder="0" style="border:0"></iframe>

					<div class="contact-info wrapper">
						<img src="<?php echo site_url()?>/wp-content/uploads/2015/05/contact-info-bg.gif" alt="">
							<h2><strong>Call us on (61-3) 9350-6611</strong></h2>
							<div class="indent">
								
								<h4 class =  "not"><strong>Dipak Devia (Director) FIPA</strong></h4>
								<h4>Email: <strong><a href="mailto:dipakdevia@devia.com.au">dipakdevia@devia.com.au</a></strong></h4>
								<h4>Telephone: <strong class = "boldem">(03) 9350-6611</strong></h4>
								<h4>Fax: <strong class = "boldem">(03) 9350-6616</strong></h4><br>
								<h4 class =  "not"><strong>Mina Devia (Manager)</strong></h4>
								<h4>Email: <strong><a href="mailto:minadevia@devia.com.au">minadevia@devia.com.au</a></strong></h4>
								<h4>Telephone: <strong class = "boldem">(03) 9350-6611</strong></h4>
								<h4>Fax: <strong class = "boldem">(03) 9350-6616</strong></h4><br>
								<h4 class =  "not"><strong>Office Location</strong></h4>
								<h4>425 Bell Street, Pascoe Vale South (Corner of Springhall Parade) Victoria, 3044, Australia</h4>
								<h4 class =  "not fone"><strong>Telephone: </strong>(61-3) 9350-6611</h4>
								<h4 class =  "not"><strong>Fax: </strong>(61-3) 9350-6616</h4>
								<h4 class = "hear">We'd love to hear from you.</h4>
							</div>
							
						</div>
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
				</ul>		
			</div>


<?php get_footer(); ?>