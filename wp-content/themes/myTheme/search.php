
<?php get_header(); ?>

		<div class="container content">
			<h3>Results for: <?php the_search_query(); ?></h3>
			
	<?php  if (have_posts()) :
		while (have_posts()) : the_post();?>

			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php echo (substr(strip_tags(get_the_content()),0,300));  ?> <br> <a href="<?php the_permalink(); ?>"> [Read more].</a><br><br><br>

		<?php endwhile;

		elseif (the_search_query() > 10) :
			echo "string";
		
		else:
			echo "<h4> No results found. </h4><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	endif; ?>
</div>

<?php get_footer(); ?>