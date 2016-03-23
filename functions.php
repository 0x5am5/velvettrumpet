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
	wp_enqueue_script('bootstrap', get_template_directory_uri(). '/js/bootstrap.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('lightbox', get_template_directory_uri(). '/js/lightbox.js', array('jquery'), '1.0.0', true);
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

/**
 * Editing 'Featured image' label
 *
*/
add_action('do_meta_boxes', 'change_image_box');
function change_image_box()
{
    remove_meta_box( 'postimagediv', 'post', 'side' );
    add_meta_box('postimagediv', __('Poster image (350x495)'), 'post_thumbnail_meta_box', 'post', 'side', 'high');
}

/**
 * Add 'Featured image' link
 *
*/
function made_fi_link_box_cb() {
	$values = get_post_custom( $post->ID );
	$text = isset( $values['featured_image_link'] ) ? esc_attr( $values['featured_image_link'][0] ) : '';
	
	// We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

	echo '<label><span class="screen-reader-text">Featured image link:</span>'; 
    echo '<select name="featured_image_link">';
		echo '<option value="">Select page</option>';
		echo '<option value="">No link</option>';

  		$pages = get_pages(); 
  		foreach ( $pages as $page ) {
  			$option = '<option value="' . get_permalink( $page->ID ) . '"'.selected( get_permalink( $page->ID ), $text).'>';
			$option .= $page->post_title;
			$option .= '</option>';
			echo $option;
		}

		$products = new WP_Query(array('post_type' => 'product'));
		while ( $products->have_posts() ) : $products->the_post();
			$option = '<option value="' . get_permalink() . '"' . selected(get_permalink(), $text) . '>';
			$option .= get_the_title();
			$option .= '</option>';
			echo $option;
		endwhile;
		wp_reset_query(); 
	
	echo '</select>';
	echo '</label>';
}

function make_fi_link_box() {
	add_meta_box( 'featured_link', 'Featured Image Link', 'made_fi_link_box_cb', 'page', 'side');
}

add_action( 'add_meta_boxes', 'make_fi_link_box' );

function save_post_cb($post_id) {
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	 
	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	 
	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;

	// Make sure your data is set before trying to save it
	if( isset( $_POST['featured_image_link'] ) )
		update_post_meta( $post_id, 'featured_image_link', $_POST['featured_image_link']);
}

add_action( 'save_post', 'save_post_cb' );

/**
	 * Output the add to cart button for variations.
	 */
	function woocommerce_single_variation_add_to_cart_button() {
		global $product;
		?>
		<div class="variations_button">
			<?php woocommerce_quantity_input( array( 
			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1,
			'class' => 'form-control') ); ?>
			<button type="submit" class="single_add_to_cart_button btn btn-primary alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
			<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->id ); ?>" />
			<input type="hidden" name="product_id" value="<?php echo absint( $product->id ); ?>" />
			<input type="hidden" name="variation_id" class="variation_id" value="" />
		</div>
		<?php
	}

?>
