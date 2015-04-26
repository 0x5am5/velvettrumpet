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
function load_scripts() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		// load the local copy of jQuery in the footer
		wp_register_script('jquery', '/wp-includes/js/jquery/jquery.js', false, '1.11.1');
		wp_enqueue_script('jquery');
	        wp_enqueue_script('themeJs', get_template_directory_uri(). '/js/main.js', array('jquery'), '1');
		wp_enqueue_style( 'themeCss', get_stylesheet_uri());
		//wp_enqueue_style( 'wooCommerceCss', get_template_directory_uri(). '/css/woocommerce.css');
		wp_register_script('lightbox', get_template_directory_uri(). '/js/lightbox.min.js', array('jquery'));
		wp_enqueue_script('lightbox');

	}
}
function my_function_admin_bar() { return false; }

add_action( 'widgets_init', 'arphabet_widgets_init' );
if (!is_admin()) { add_action( 'wp_enqueue_scripts', 'load_scripts' ); }
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

function login_logo() { ?>
    <style type="text/css">
.login,
.login #loginform { background-color:#fff; }
.login label {  }
        .login #login h1 a {
            background-image: url( <?php echo bloginfo('template_directory').'/images/VTlogo.png'; ?> );
height: 150px;
        }
.login.wp-core-ui .button-primary {
background: #631b1b;
border-color: #521515;
-webkit-box-shadow: inset 0 1px 0 rgba(128,58,48,.5),0 1px 0 rgba(0,0,0,.15);
box-shadow: inset 0 1px 0 rgba(128,58,48,.5),0 1px 0 rgba(0,0,0,.15);
}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'login_logo' );

// Remove Woocommerce style
//add_filter( 'woocommerce_enqueue_styles', '__return_false' ); 

?>