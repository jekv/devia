<?php get_header(); ?>

	<div class="container contactus-em">
		<?php if ( have_posts() ) : ?>
					 <?php while ( have_posts() ) : $i++;  the_post(); ?>
							<p><?php the_content();?></p>
						</div>
					 
					 <?php endwhile;
					 else :
					echo '<p> No content found </p>';
				  	endif; ?>

					 ?>

	</div>
<?php get_footer();?>
