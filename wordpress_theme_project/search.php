<!DOCTYPE html>
<html>
<?php
	get_header();
?>


<body>
<article class="content px-3 py-3 p-md-5">
<p class="results">You searched for " <?php echo esc_html( get_search_query( false ) ); ?> ". Here are the results:</p>

<?php
	if(have_posts()) {
		while(have_posts()) {				
			the_post();
			get_template_part('template-parts/content');
		}
	}
?>
</article>
</body>

</html>