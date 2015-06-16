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
		<img src="http://oi60.tinypic.com/15x9br.jpg" alt="" class = "img-responsive yoyo">

		<div class="container content">
			<div class="topContent">
				<div class="row">
					<div class="col-md-6 about">
						<h1>About Us</h1>
						<p>DD Accounting Services provide Public Accountants and Registered Tax Agents.</p>
						<p>DD Accounting Services is committed to fulfilling client satisfaction to the extent that our service is appreciated and referrals encouraged.</p>
						<a href="http://localhost/wordpress/about-us/">View More</a>
					</div>
					<div class="col-md-6">
						<img src="http://oi61.tinypic.com/4tps1j.jpg" alt="" class="img-responsive">
					</div>
				</div>
			</div>

			<div class = "midContent">
			

		<?php query_posts('category_name='.get_the_title().'&post_status=publish,future');?>
			
			<div class = "row">
				<?php if ( have_posts() ) : ?>
					 <?php while ( have_posts() ) : $i++;  the_post(); ?>
					 
					 	<div class = "col-md-4">
							<?php the_post_thumbnail(); ?>
							<h4><?php the_title(); ?></h4>
							<p><?php the_content();?></p>
						</div>
					 
					 <?php endwhile;?>

					
			</div>
			
				
				<?php
					else :
					echo '<p> No content found </p>';
				  endif; ?>

		<?php} ?>

	
	  </div>
			
			<div class="partners">
				<h2>OUR PARTNERSHIP</h2><br>
				<img src="http://localhost/wordpress/wp-content/uploads/2015/05/part1-img.gif" alt="" class="img-responsive">
				<img src="http://localhost/wordpress/wp-content/uploads/2015/05/part2-img.gif" alt="" class="img-responsive">
				<img src="http://localhost/wordpress/wp-content/uploads/2015/05/part3-img.gif" alt="" class="img-responsive">
				<img src="http://localhost/wordpress/wp-content/uploads/2015/05/part4-img.gif" alt="" class="img-responsive">
			</div>

			<!-- Newsletter -->

			<script type="text/javascript">
			//<![CDATA[
			if (typeof newsletter_check !== "function") {
			window.newsletter_check = function (f) {
			    var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
			    if (!re.test(f.elements["ne"].value)) {
			        alert("The email is not correct");
			        return false;
			    }
			    for (var i=1; i<20; i++) {
			    if (f.elements["np" + i] && f.elements["np" + i].value == "") {
			        alert("");
			        return false;
			    }
			    }
			    if (f.elements["ny"] && !f.elements["ny"].checked) {
			        alert("You must accept the privacy statement");
			        return false;
			    }
			    return true;
			}
			}
			//]]>
			</script>
			<div class="btmContent">
				<img src="http://oi59.tinypic.com/2czl2g.jpg" alt="" class="img-responsive">
				<form method="post" action="http://localhost/wordpress/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">
					
					<strong class="news">newsletter</strong>
					<p>Sign up to get <strong>EXCLUSIVE</strong> offers & to be well up in the news.</p>
					<input type="text" placeholder = "Subscribe Now" required><button type="button" class="btn"><i class="fa fa-paper-plane"></i></button>
				</form>
			</div>

		<div class="contactU">
			<h2>Contact US</h2>
			<p>It's really easy to get in touch with us! Please fill in the form below or email us at dipakdevia@devia.com.au and we'll get back to you as soon as possible. Or if you want to speak to our friendly staff right now then please call (61-3) 9350-6611.</p>
			<?php echo do_shortcode( '[contact-form-7 id="133" title="my"]' ); ?>
</div>
</div>

<div class="container footer-about" style="position: relative;">
			<?php get_footer(); ?>
	</div>
	
</body>
</html>