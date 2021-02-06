<DOCTYPE html>
<html>

<?php get_header(); ?>

<body>

<article class="content px-3 py-3 p-md-5">
	<?php
		if(have_posts()) {
			while(have_posts()) {
				the_post();
				get_template_part('template-parts/content', 'article');
			}
		}
	?>
</article>
</body>

</html>