<?php get_header(); ?>
<div class="container quote">
			<div class="row">
				<h2>DD Accounting<br>Services</h2>
				<div class="col-md-10">
					
					<?php $post_321 = get_post(321);
					echo get_post_field('post_content', 321);  ?>

				</div>
			</div>
			
		</div>
		<img src="<?php echo site_url()?>/wp-content/uploads/2015/05/first-img.gif" alt="" class = "img-responsive yoyo">

		<div class="container content">
			<div class="topContent">
				<div class="row">
					<div class="col-md-6 about">
						<?php $post_314 = get_post(314);
						echo get_post_field('post_content',$post_314); ?>
					</div>
					<div class="col-md-6">
						<?php $post_314 = get_post(314);
						echo get_the_post_thumbnail(314, 'full'); ?>
					</div>
				</div> 
			</div>

			<div class = "midContent">
			
				<h1>OUR SERVICES</h1>
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

	
	  </div>
			
			<div class="partners">
				<?php
				$post_285 = get_post(285); 
				$title = $post_285->post_title;
				$content = $post_285->pos_content;
				?>
				<h2><?php echo $title ?></h2><br>
				<?php echo get_post_field('post_content', $post_285); ?>
				
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
				<?php $post_269 = get_post(304);
				echo get_post_field('post_content', $post_304); ?>
			</div>


		<div class="contactU">
			<h2>Contact US</h2>
			<p>It's really easy to get in touch with us! Please fill in the form below or email us at <strong class = "dipak"><a href="mailto:dipakdevia@devia.com.au">dipakdevia@devia.com.au</a></strong> and we'll get back to you as soon as possible. Or if you want to speak to our friendly staff right now then please call (61-3) 9350-6611.</p>
			<?php echo do_shortcode( '[contact-form-7 id="133" title="my"]' ); ?>
</div>
</div>

<div class="container footer-about">
		</div>
		<?php get_footer(); ?>
	</div>
</body>
</html>