<?php
function theme_support() {
	add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'theme_support');

function wpb_custom_new_menu() {
  register_nav_menus(
    array(
      'my-custom-menu' => __('My Custom Menu'),
      'extra-menu' => __('Extra Menu')
    )
  );
}
add_action('init', 'wpb_custom_new_menu');
?>