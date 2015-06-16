<?php print _wp_relative_upload_path( 'wp-content/uploads/2015/05/part1-img.gif' );exit; ?>
<?php get_header(); ?>

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
	<img src="http://localhost/wordpress/wp-content/uploads/2015/05/first-img.gif" alt="" class = "img-responsive yoyo">

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

		<?php 

		$countRow=0;
		while($countRow!=2){?>
			
			<div class = "row">
				<?php if ( have_posts() ) :
					 while ( have_posts() ) : $i++;  the_post(); 
					 $countCol=0;
					 while ( $countCol != 3) { ?>
					 	<div class = "col-md-4">
						<img src="<?php the_post_thumbnail(); ?>" alt="" class="img-responsive">
						<h4><?php the_title(); ?></h4>
						<p><?php the_content();?></p>
					</div>
					 <?php } ?>
					 
					
			</div>
			
				<?php endwhile;

					else :
					echo '<p> No content found </p>';
				  endif; ?>

		<?php $countRow++; } ?>

	
	  </div>
 	
 	<div class="partners">
				<h2>OUR PARTNERSHIP</h2><br>
				<img src="http://localhost/wordpress/wp-content/uploads/2015/05/part1-img.gif" alt="" class="img-responsive">
				<img src="http://localhost/wordpress/wp-content/uploads/2015/05/part2-img.gif" alt="" class="img-responsive">
				<img src="http://localhost/wordpress/wp-content/uploads/2015/05/part3-img.gif" alt="" class="img-responsive">
				<img src="http://localhost/wordpress/wp-content/uploads/2015/05/part4-img.gif" alt="" class="img-responsive">
			</div>

			<div class="btmContent">
				<img src="http://localhost/wordpress/wp-content/uploads/2015/05/cont-bg-img.gif" alt="" class="img-responsive">
				<strong class="news">newsletter</strong>
				<p>Sign up to get <strong>EXCLUSIVE</strong> offers & to be well up in the news.</p>
				<input type="text" placeholder = "Subscribe Now"><button type="button" class="btn"><i class="fa fa-paper-plane"></i></button>
			</div>

			<div class="contactU">
				<form action="contact.php" method="post">
				<h2>Contact US</h2>
					<p>It's really easy to get in touch with us! Please fill in the form below or email us at dipakdevia@devia.com.au and we'll get back to you as soon as possible. Or if you want to speak to our friendly staff right now then please call (61-3) 9350-6611.</p>
					<input type="text" name="name" placeholder="NAME" class="n">
					<input type="text" name="email" placeholder ="E-MAIL" class="e"><br>
					<textarea name="txtA" name="message" id="" cols="30" rows="10" placeholder="MESSAGE"></textarea>
					<button class="btn">SEND</button>
				</form>
			</div>

			<!--aye-->
			
			
		</div>
</div>
<?php get_footer(); ?>