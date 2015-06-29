<?php

get_header();
	if (have_posts()) :
		while (have_posts()) : the_post();?>
		<div class="container mainContent-cfb">
			<div class="row">
				<div class="col-md-8">
					<h5>You are here. <a href="<?php echo site_url()?>/">Home</a> <i class="fa fa-angle-double-right"></i> Castle Finance Brokers</h5>
 					<hr class = "fhr">
		<h2><?php the_title() ;?></h2>
		<p class = "firstp"><?php the_content(); ?></p>
		<hr>

		<?php endwhile;
	endif; ?>
	<?php query_posts('category_name='.get_the_title().'&post_status=publish,future');?>
	
	<?php if ( have_posts() ) :
		 while ( have_posts() ) : the_post(); ?>
		<div class="row">
			<div class="col-md-6">
				<!--<img src="<?php the_post_thumbnail(); ?>" alt="" class="img-responsive">-->
				<?php 

				$attr = array(

					'class' => " img-responsive",
					'alt'   => trim( strip_tags( $wp_postmeta->_wp_attachment_image_alt ) )
				);


				the_post_thumbnail( $size, $attr ); ?>  
			</div>
			<div class="col-md-6">
				<h2><?php the_title(); ?></h2>
				<p><?php the_content();?></p>
			</div>
		</div>
			<?php
			$var1 = "Motor Vehicle Finance";		
			 if (strcasecmp(get_the_title(), $var1)!=0) {?>
			<hr>
			<?php }?>
	<?php endwhile;

		else :
		echo '<p> No content found </p>' ;

	  endif; ?>
	  </div>
	 
	  <div class="col-md-4">
					<div class="reg">
						<h3>Free Initial Consultation</h3>
						<?php echo do_shortcode('[contact-form-7 id="129" title="newFrm"]'); ?>
					
					</div>
					<?php include 'cuo.php' ?>
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