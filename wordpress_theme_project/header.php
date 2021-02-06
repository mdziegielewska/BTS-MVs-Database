<DOCTYPE html>
<html>
<head>
	<title><?php the_title(); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css">	
</head>

<?php wp_head(); ?>

<body>
<nav class="header">
	<?php
	if (function_exists('the_custom_logo')) {
		$custom_logo_id = get_theme_mod('custom_logo');
		$logo = wp_get_attachment_image_src($custom_logo_id);
	} ?>
	<img class="mb-3 mx-auto logo" src="<?php echo $logo[0] ?>" alt="logo" usemap="#map1">
	<map name="map1">
		<area shape="rect" coords="0,0,57,91" alt="bts_logo" href="index.php">
	</map>
	<h1 style="margin-top: 15px; font-size: 26px; margin-left: -10px;"> <?php echo get_bloginfo('name'); ?> </h1> 
	<h2 style= "margin-top: -10px; font-size: 13px;"> <?php echo get_bloginfo('description'); ?> </h2>
</nav>

<nav class="custom-menu-class">
	<?php wp_nav_menu(array('theme_location' => 'my-custom-menu','container_class' => 'custom-menu-class')); ?> 
</nav>

</body>
</html>