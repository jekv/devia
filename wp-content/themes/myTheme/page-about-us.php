<?php

get_header();

	if (have_posts()) :
		while (have_posts()) : the_post();?>
		<div class="container mainContent-about">
			
			<div class="row">
				<div class="col-md-8">
					<h5>You are here. <a href="<?php echo get_page_link(40); ?>">Home</a> <i class="fa fa-angle-double-right"></i> <?php the_title(); ?></h5>
 					<hr class = "fhr">
					<h2><?php the_title() ;?></h2>
					<?php the_post_thumbnail() ?>
					<?php the_content(); ?>

					<?php endwhile;
					endif; ?>

				</div>

	  
	 <div class="col-md-4">
					<?php include 'initconsult.php'; ?>
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