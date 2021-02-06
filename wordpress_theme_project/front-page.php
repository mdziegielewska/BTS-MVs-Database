<?php get_header(); ?>

<nav class = "content">
	<form id="searchform" action = "<?php bloginfo( 'url' ); ?>/" method = "GET">
		<input class = "input" type = "text" name="s" id="s" value="<?php the_search_query(); ?>" placeholder = "Search"/>
		<input class = "search" type = "submit" value = "Search"/>
	</form>
</nav>

<article class="content px-3 py-3 p-md-5">
	<?php
		if(have_posts()) {
			while(have_posts()) {
				the_post();
				the_content();
			}
		}
	?>
</article>
