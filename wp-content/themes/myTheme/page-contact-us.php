<?php get_header(); ?>
<div class="container mainContent-contact">
		<div class="row">
			<p class = "x">You are here. <a href="<?php echo site_url()?>/">Home</a> <i class="fa fa-angle-double-right"></i>  <?php the_title(); ?></p>
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
					<?php $post_298 = get_post(298);
					echo get_post_field('post_content', $post_298);
					 ?>
					
					</div>
			</div>
		</div>
		
			<div class="partnerships">
				<?php
				$post_291 = get_post(291); 
				$title = $post_291->post_title;
				$content = $post_291->pos_content;
				?>
				<h2><?php echo $title ?></h2><br>
				<?php echo get_post_field('post_content', $post_291); ?>	
			</div>


<?php get_footer(); ?>