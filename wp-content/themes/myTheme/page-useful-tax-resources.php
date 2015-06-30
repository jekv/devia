<?php get_header(); ?>


	<div class="container mainContent-uttr">
		<div class="row">
			<?php if ( have_posts() ) :
		 while ( have_posts() ) : $i++;  the_post(); ?>
			<div class = "col-md-8">
				<p>You are here. <a href="<?php echo site_url()?>/">Home</a> <i class="fa fa-angle-double-right"></i> Useful Tax Time Resources</p>
 					<hr class = "fhr">
					<img src="<?php the_post_thumbnail(); ?>" alt="" class="img-responsive">
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</div> 

	<?php endwhile;
//spaces
		else :
		echo '<p> No content found </p>';
	  endif; ?>
	  <div class="col-md-4">
					<?php include 'initconsult.php'; ?>
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
	</div>
	
				

<?php get_footer(); ?>