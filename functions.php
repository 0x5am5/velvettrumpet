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

function load_scripts() {
	    wp_enqueue_script('themeJs', get_template_directory_uri(). '/js/main.js', array('jquery'), '1.0.0', true);
		wp_enqueue_style( 'themeCss', get_stylesheet_uri());
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );

/**
 * Add theme support
 *
*/
add_theme_support( 'woocommerce' ); 


/**
 * Remove reviews
 *
*/
add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);
function sb_woo_remove_reviews_tab($tabs) {

 unset($tabs['reviews']);

 return $tabs;
}

/**
 * Custom login logo url
 *
*/
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

/**
 * Change empty cart button url
 *
*/
// Tutorial: http://www.skyverge.com/blog/change-woocommerce-return-to-shop-button/
function skyverge_change_empty_cart_button_url() {
	// return get_site_url();
	//Can use any page instead, like return '/sample-page/';
	return get_site_url().'/productions/';
}
add_filter( 'woocommerce_return_to_shop_redirect', 'skyverge_change_empty_cart_button_url' );


function my_function_admin_bar() { 
	return false; 
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');


function login_logo() { ?>
<style type="text/css">
	.login,
	.login #loginform { background-color:#fff; }
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

/**
 * Custom login logo url
 *
*/
// function my_login_logo_url() {
//     return home_url();
// }
// add_filter( 'login_headerurl', 'my_login_logo_url' );

/**
 * Custon login link title
 *
*/
function my_login_logo_url_title() {
    return 'Velvet Trumpet Theatre Co';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/**
 * Customising menu
 *
*/
function customize_post_admin_menu_labels() {
  	// remove_menu_page( 'edit.php'); // remove posts menu
}
add_action( 'admin_menu', 'customize_post_admin_menu_labels' );
/**
 * Customising menu order
 *
*/
function wpse_73006_submenu_order( $menu_ord ) 
{

  	if (wp_get_current_user()->user_login != "admin" && wp_get_current_user()->user_login != "samuel") :
    	global $menu;

		$arr = array();
		$arr[] = $menu[2];  // Dashboard 
		$arr[] = $menu[4];  // Separator 1      
		$arr[] = $menu[5]; // Posts
		$arr[] = $menu[20]; // Pages
		$arr[] = $menu[10]; // Media
		$arr[] = $menu[59]; // Separator 2
		$arr[] = $menu["55.5"]; // WooCommerce
		$arr[] = $menu[26]; // Products - WooCommerce
		$arr[] = $menu[99]; // Separator Last
      
      	$menu = $arr;

    	return $menu_ord;

    endif;
}
add_filter( 'custom_menu_order', 'wpse_73006_submenu_order' );
?>
