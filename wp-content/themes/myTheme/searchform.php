<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label for="s" class = "lblSrch" style="color:#6c030b;">Search
		
		<input type="search" class="search-field" placeholder="<?php the_search_query(); ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
	</label>
	<button type="submit" class="btn btn-sm"><i class="fa fa-search"></i></button>
</form>