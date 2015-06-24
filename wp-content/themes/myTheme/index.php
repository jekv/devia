
<?php get_header(); ?>

	
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
				<h2>OUR PARTNERS</h2><br>
				<img src="<?php echo site_url()?>/wp-content/uploads/2015/05/part1-img.gif" alt="" class="img-responsive">
				<img src="<?php echo site_url()?>/wp-content/uploads/2015/05/part2-img.gif" alt="" class="img-responsive">
				<img src="<?php echo site_url()?>/wp-content/uploads/2015/05/part3-img.gif" alt="" class="img-responsive">
				<img src="<?php echo site_url()?>/wp-content/uploads/2015/05/part4-img.gif" alt="" class="img-responsive">
			</div>

			<div class="btmContent">
				<img src="<?php echo site_url()?>/wp-content/uploads/2015/05/cont-bg-img.gif" alt="" class="img-responsive">
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