<?php
/*
Plugin Name: Related Post
Plugin URI: 
Description: Display Related Post under post by tags and category.
Version: 1.2
Author: paratheme
Author URI: http://paratheme.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

define('related_post_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('related_post_plugin_dir', plugin_dir_path( __FILE__ ) );
define('related_post_wp_url', 'http://wordpress.org/plugins/related-post/' );
define('related_post_pro_url', '' );
define('related_post_demo_url', '' );
define('related_post_conatct_url', 'http://paratheme.com/contact' );
define('related_post_qa_url', 'http://paratheme.com/qa' );
define('related_post_plugin_name', 'Related Post' );
define('related_post_share_url', 'http://wordpress.org/plugins/related-post/' );


require_once( plugin_dir_path( __FILE__ ) . 'includes/related-post-functions.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/related-post-shortcodes.php');


//Themes php files
require_once( plugin_dir_path( __FILE__ ) . 'themes/text/index.php');
require_once( plugin_dir_path( __FILE__ ) . 'themes/flat/index.php');



function related_post_init_scripts()
	{
		wp_enqueue_script('jquery');
		wp_enqueue_script('related_post_js', plugins_url( '/js/related-post-scripts.js' , __FILE__ ) , array( 'jquery' ));	
		
		wp_localize_script('related_post_js', 'related_post_ajax', array( 'related_post_ajaxurl' => admin_url( 'admin-ajax.php')));

		wp_enqueue_style('related-post-style', related_post_plugin_url.'css/style.css');
		
		//ParaAdmin framwork
		wp_enqueue_style('ParaAdmin', related_post_plugin_url.'ParaAdmin/css/ParaAdmin.css');	
		wp_enqueue_script('ParaAdmin', plugins_url( 'ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));	
		
		// Color Picker
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'related-post-color-picker', plugins_url('/js/related-post-color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );

		
		// Style for themes
		wp_enqueue_style('related-post-style-text', related_post_plugin_url.'themes/text/style.css');
		wp_enqueue_style('related-post-style-flat', related_post_plugin_url.'themes/flat/style.css');


		
	}
add_action("init","related_post_init_scripts");




register_activation_hook(__FILE__, 'related_post_activation');
register_deactivation_hook(__FILE__, 'related_post_deactivation');

function related_post_activation()
	{
		$related_post_version= "1.2";
		update_option('related_post_version', $related_post_version); //update plugin version.
		
		$related_post_customer_type= "free"; //customer_type "free"
		update_option('related_post_customer_type', $related_post_customer_type); //update plugin version.
		
		

		
		
	}


function related_post_deactivation()
	{
		
		


		
	}


add_action('admin_menu', 'related_post_menu_init');



function related_post_menu_settings(){
	include('related-post-settings.php');	
}

function related_post_menu_init()
	{
		add_menu_page(__('related-post','related-post'), __('Related Post','author_box'), 'manage_options', 'related_post_menu_settings', 'related_post_menu_settings');

	}





?>