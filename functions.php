<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */

function arphabet_widgets_init() {

	register_sidebar( array(
		'name' => 'Home right sidebar',
		'id' => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );

function my_function_admin_bar() { return false; }
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

 ?>