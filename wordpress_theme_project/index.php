<?php get_header(); ?>

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
