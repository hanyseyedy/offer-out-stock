<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       hanyseyedy.ir
 * @since      1.0.0
 *
 * @package    Offer_Out_Stock
 * @subpackage Offer_Out_Stock/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Offer_Out_Stock
 * @subpackage Offer_Out_Stock/admin
 * @author     hanyseyedy <info@pooyeshtech.ir>
 */
class Offer_Out_Stock_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Offer_Out_Stock_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Offer_Out_Stock_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		 //---------------- MY customize --------------------


		 if ( 'settings_page_offer-out-stock' == get_current_screen() -> id ) {
             // CSS stylesheet for Color Picker
             wp_enqueue_style( 'wp-color-picker' );
             wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/offer-out-stock-admin.css', array( 'wp-color-picker' ), $this->version, 'all' );
         }

		 //end---------------- MY customize --------------------

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/offer-out-stock-admin.css', array(), $this->version, 'all' );


	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Offer_Out_Stock_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Offer_Out_Stock_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		 //---------------- MY customize --------------------
		 if ( 'settings_page_offer-out-stock' == get_current_screen() -> id ) {
            wp_enqueue_media();
            wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/offer-out-stock-admin.js', array( 'jquery', 'wp-color-picker' ), $this->version, false );
        }
		//end---------------- MY customize --------------------
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/offer-out-stock-admin.js', array( 'jquery' ), $this->version, false );

	}

	// ------------------------ MY customize ------------------------------

	/**
	*
	* class-offer-out-stock-admin.php
	*
	**/

	/**
	* Register the administration menu for this plugin into the WordPress Dashboard menu.
	*
	* @since 1.0.0
	*/

	public function add_plugin_admin_menu() {

	/*
	* Add a settings page for this plugin to the Settings menu.
	*
	* NOTE: Alternative menu locations are available via WordPress administration menu functions.
	*
	* Administration Menus: http://codex.wordpress.org/Administration_Menus
	*
	*/


	// ============================ Add Menu Setting ===================================
	/*
	add_options_page( __('Offer out stock and Base Options Functions Setup', $this->plugin_name), __('Offer out stock', $this->plugin_name), 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page')
	);
	*/

	}

	/**
	* Add settings action link to the plugins page.
	*
	* @since 1.0.0
	*/

	public function add_action_links( $links ) {
	/*
	* Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
	*/
	$settings_link = array(
	'<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
	);
	return array_merge( $settings_link, $links );

	}

	/**
	* Render the settings page for this plugin.
	*
	* @since 1.0.0
	*/

	public function display_plugin_setup_page() {
	include_once( 'partials/offer-out-stock-admin-display.php' );
	}
	public function options_update() {
	register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
	}
	public function validate($input) {
	// All checkboxes inputs
	$valid = array();

	//Cleanup
	$valid['cleanup'] = (isset($input['cleanup']) && !empty($input['cleanup'])) ? 1 : 0;
	$valid['comments_css_cleanup'] = (isset($input['comments_css_cleanup']) && !empty($input['comments_css_cleanup'])) ? 1: 0;
	$valid['gallery_css_cleanup'] = (isset($input['gallery_css_cleanup']) && !empty($input['gallery_css_cleanup'])) ? 1 : 0;
	$valid['body_class_slug'] = (isset($input['body_class_slug']) && !empty($input['body_class_slug'])) ? 1 : 0;
	$valid['jquery_cdn'] = (isset($input['jquery_cdn']) && !empty($input['jquery_cdn'])) ? 1 : 0;
	$valid['cdn_provider'] = esc_url($input['cdn_provider']);

	return $valid;
	}

	// END------------- MY customize


}

// ------------- MY customize----------

	function exist_woocommerce_plugin(){// check Activate woocommerce
		$wooplugin = 'woocommerce/woocommerce.php';
		if ( !is_plugin_active( $wooplugin ) ){
			echo '<div class="error">
			      	<p>'. __('To Display "offer out stock" Plugin ,Need To Activate Woocommerce Plugin First!', 'offer-out-stock').' </p>
			  		</div>';
		}
	}
	add_action( 'admin_notices', 'exist_woocommerce_plugin' );
	//end check Activate woocommerce


add_action( 'woocommerce_single_product_summary', function() {
	global $product;
	global $post;
	global $taxonomy;
	$prod_cat_args = array(
	'taxonomy'     => 'product_cat', //woocommerce
	'orderby'      => 'name',
	'empty'        => 0
	);

	$woo_categories = get_categories( $prod_cat_args );

	$terms = get_the_terms( $post->cat_ID , 'product_cat' );
	foreach ($terms as $term) {
			$term_id = $term->term_id;
			$term_link = get_term_link( $term, $taxonomy );
			$term_name = $term->name;
	}
	$cat_link= '<a class="offer_stock_btn" target="blank" href="' . $term_link . '">' . __("other suggestions", $this->plugin_name). '</a>';

	function my_custom_css_uri() {
    wp_register_style('my_custom_css_name', plugins_url('css/offer-out-stock-custom.css',__FILE__ ));
    wp_enqueue_style('my_custom_css_name');
    //wp_register_script( 'your_namespace', plugins_url('your_script.js',__FILE__ ));
    //wp_enqueue_script('your_namespace');
	}
	add_action('admin_init','my_custom_css_uri');

	// if is out of stock THEN:

	//if ('this_product_is_out_of_stock'):
	//if ( empty( $available_variations ) && false !== $available_variations ):
	if ( ! $product->is_in_stock() ):
	my_custom_css_uri();
	echo '
	<div class="offer_stock_box">
	<span>' . __("This product is currently out of stock. we have other suggestions for you", $this->plugin_name). '</span>

	<a class="offer_stock_btn" target="blank" href="' . $term_link . '">' . __("other suggestions", $this->plugin_name). '</a>
	</div>';
	endif;
}, 30);

// end if: is out of stock

// END ------------- MY customize --------------
