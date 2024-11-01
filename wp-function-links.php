<?php
/**
 * Plugin Name: WP Function Links
 * Plugin URI: http://polepositionmarketing.com
 * Description: Use a shortcode to generate clickable links that do NOT pass on link juice in order to boost the link value of the other links on the page.
 * Version: 2.0.5
 * Author: Pole Position Marketing
 * Author URI: http://polepositionmarketing.com
 * Text Domain: wp_function_links
 * License: GPL2
 */
 
 /*  Copyright 2015  Pole Position Marketing  (email : info@polepositionmarketing.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/



//If this plugin is accessed directly, die.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


//Create the submenu link in WordPress Admin Navigation
function wpFunctionLinksPluginMenu() {
  $appName = 'WP Function Links';
  $menuName = 'Function Links';
  $appID = 'wp-function-links';
  add_menu_page ( $appName, $menuName, 'administrator', $appID, 'wpFunctionLinksAdminScreen', '', null );
  add_submenu_page( $appID, $menuName .' - Use', 'How To Use', 'administrator', $appID . '-use', 'wpfl_admin_option_page_use');
  add_submenu_page( $appID, $menuName .' - Settings', 'Settings', 'administrator', $appID . '-settings', 'wpfl_admin_option_page_settings');
  add_submenu_page( $appID, $menuName .' - Social Profiles', 'Social Profiles', 'administrator', $appID . '-social-profiles', 'wpfl_admin_option_page_social_profiles');
  add_submenu_page( $appID, $menuName .' - Social Sharing', 'Social Sharing', 'administrator', $appID . '-social-sharing', 'wpfl_admin_option_page_social_sharing');
}


//Admin screen content
include_once( plugin_dir_path( __FILE__ ) . '/modules/admin_screen.php');

//Create the WordPress shortcode for users to create function links 
include_once( plugin_dir_path( __FILE__ ) . '/modules/create_shortcode.php');


if (get_option( 'wpfl_social_profile_widget_status') && get_option('wpfl_social_profile_status')) {
  //Create the widgets
  include_once( plugin_dir_path( __FILE__ ) . '/modules/create_profiles_widget.php');
}

if (get_option( 'wpfl_social_sharing_widget_status') && get_option('wpfl_social_sharing_status')) {
  //Create the widgets
  include_once( plugin_dir_path( __FILE__ ) . '/modules/create_sharing_widget.php');
}


//Plugin settings registration
function register_wpFunctionLinks_settings() {
  register_setting( 'wp_function_links_options_group', 'wpfl_use_legacy_links' );
  register_setting( 'wp_function_links_options_group', 'wpfl_remove_underline_links' );
  
  register_setting( 'wp_function_links_options_group', 'wpfl_facebook_tracking_pixel' );
}


//Create register settings for social profiles
function wpfl_register_social_profile($profile_name) {
  register_setting( 'wpfl_social_profile_options_group', 'wpfl_social_profile_'.$profile_name.'_status' );
  register_setting( 'wpfl_social_profile_options_group', 'wpfl_social_profile_'.$profile_name.'_url' );
  register_setting( 'wpfl_social_profile_options_group', 'wpfl_social_profile_'.$profile_name.'_title' );
}

//Plugin social profile settings registration
function register_wpfl_social_profile_settings() {
  //Are they enabled?
  register_setting( 'wpfl_social_profile_options_group', 'wpfl_social_profile_status' );
  //Enable Widgets
  register_setting( 'wpfl_social_profile_options_group', 'wpfl_social_profile_widget_status' );
  //Display Location
  register_setting( 'wpfl_social_profile_options_group', 'wpfl_social_profile_display_location' );
  
  register_setting( 'wpfl_social_profile_options_group', 'wpfl_social_profile_display_template_pages' );
  register_setting( 'wpfl_social_profile_options_group', 'wpfl_social_profile_display_template_posts' );
  register_setting( 'wpfl_social_profile_options_group', 'wpfl_social_profile_display_template_archives' );
  
  //Display Style
  register_setting( 'wpfl_social_profile_options_group', 'wpfl_social_profile_display_style_value' );
  
  register_setting( 'wpfl_social_profile_options_group', 'wpfl_social_profile_display_border' );
  register_setting( 'wpfl_social_profile_options_group', 'wpfl_social_profile_display_shape' );
  register_setting( 'wpfl_social_profile_options_group', 'wpfl_social_profile_display_spacing' );
  register_setting( 'wpfl_social_profile_options_group', 'wpfl_social_profile_display_icons' );
  register_setting( 'wpfl_social_profile_options_group', 'wpfl_social_profile_display_size' );
  
  
  wpfl_register_social_profile('facebook'); //Facebook
  wpfl_register_social_profile('twitter'); //Twitter
  wpfl_register_social_profile('pinterest'); //Pinterest
  wpfl_register_social_profile('linkedin'); //LinkedIn
  wpfl_register_social_profile('googleplus'); //Google+
  wpfl_register_social_profile('reddit'); //Reddit
  wpfl_register_social_profile('youtube'); //YouTube
  wpfl_register_social_profile('vimeo'); //Vimeo
  wpfl_register_social_profile('instagram'); //Instagram
  wpfl_register_social_profile('vine'); //Vine
  wpfl_register_social_profile('tumblr'); //Tumblr
  wpfl_register_social_profile('pocket'); //Pocket
  wpfl_register_social_profile('lastfm'); //LastFM
  wpfl_register_social_profile('slideshare'); //SlideShare
  wpfl_register_social_profile('skype'); //Skype
  wpfl_register_social_profile('soundcloud'); //SoundCloud
  wpfl_register_social_profile('trello'); //Trello
  wpfl_register_social_profile('rss'); //REPLACE
  wpfl_register_social_profile('steam'); //REPLACE
  
  wpfl_register_social_profile('stumbleupon'); //REPLACE
  wpfl_register_social_profile('digg'); //REPLACE
  wpfl_register_social_profile('buffer'); //REPLACE
  wpfl_register_social_profile('evernote'); //REPLACE
  wpfl_register_social_profile('wordpress'); //REPLACE
  wpfl_register_social_profile('delicious'); //REPLACE
  wpfl_register_social_profile('flickr'); //REPLACE
  wpfl_register_social_profile('behance'); //REPLACE
  wpfl_register_social_profile('bitbucket'); //REPLACE
  wpfl_register_social_profile('github'); //REPLACE
  wpfl_register_social_profile('codepen'); //REPLAC
  wpfl_register_social_profile('dribble'); //REPLACEE
  wpfl_register_social_profile('foursquare'); //REPLACE
  wpfl_register_social_profile('twitch'); //REPLACE
  wpfl_register_social_profile('wikipedia'); //REPLACE
  wpfl_register_social_profile('email'); //REPLACE
}


//Plugin social profile settings registration
function register_wpfl_social_sharing_settings() {
  //Are they enabled?
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_status' );
  //Enable the widget
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_widget_status' );
  
  //Display Styles & Location
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_display_style_value' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_display_location' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_display_border' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_display_shape' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_display_spacing' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_display_icons' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_display_size' );
  
  //Register the settings for the template locations
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_display_template_pages' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_display_template_posts' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_display_template_archives' );  
  
  
  //Facebook
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_facebook_status' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_facebook_title' );
  //Twitter
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_twitter_status' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_twitter_title' );
  //Pinterest
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_pinterest_status' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_pinterest_title' );
  //LinkedIn
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_linkedin_status' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_linkedin_title' );
  //Google+
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_googleplus_status' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_googleplus_title' );
  //Stumble Upon
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_stumble_upon_status' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_stumble_upon_title' );
  //Reddit
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_reddit_status' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_reddit_title' );
  //Digg
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_digg_status' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_digg_title' );
  //Buffer
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_buffer_status' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_buffer_title' );
  //Tumblr
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_tumblr_status' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_tumblr_title' );
  //Evernote
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_evernote_status' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_evernote_title' );
  //WordPress
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_wordpress_status' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_wordpress_title' );
  //Pocket
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_pocket_status' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_pocket_title' );
  //Delicious
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_delicious_status' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_delicious_title' );
  //StumbleUpon
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_stumbleupon_status' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_stumbleupon_title' );
  //Print
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_print_status' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_print_title' );
  //Email
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_email_status' );
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_email_title' );
  
  /*
      ** Additional Options **
  */
  
  //Twitter - Enable default twitter handle
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_twitter_user_handle_status' );
  //Twitter - Default twitter handle
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_twitter_user_handle_default' );
  
  
  //Pinterest - Enable pinterest image sharing on hover
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_pinterest_image_sharing_status' );
  //Pinterest/Styles - Round
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_pinterest_image_style_round' );
  //Pinterest/Styles - Large
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_pinterest_image_style_large' );
  //Pinterest/Styles - Color
  register_setting( 'wpfl_social_sharing_options_group', 'wpfl_social_sharing_pinterest_image_style_color' );
}


//Register the plugin
if ( is_admin() ) { // admin actions
  add_action( 'admin_menu', 'wpFunctionLinksPluginMenu');
  add_action( 'admin_init', 'register_wpFunctionLinks_settings' );
  add_action( 'admin_init', 'register_wpfl_social_profile_settings' );
  add_action( 'admin_init', 'register_wpfl_social_sharing_settings' );
}


//Create the front end styles and scripts
include_once( plugin_dir_path( __FILE__ ) . '/modules/front_end.php');


//Load the admin styles and Javascript
function wpfl_enqueue_admin_styles($hook) {
  //Only load if they are on the settings page for this plugin
  if ( 'wp-function-links' == $hook ) {
    return;
  }
  wp_register_style( 'wpfl_admin_styles', plugins_url('assets/css/wpfl_admin.css', __FILE__ ), false, '1.0.0' );
  wp_enqueue_style('wpfl_admin_styles');
  
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'wpfl_admin_script', plugins_url('assets/js/wpfl_admin.js', __FILE__), false, '1.0', true );
}
add_action( 'admin_enqueue_scripts', 'wpfl_enqueue_admin_styles' );



function myPlugin_admin_scripts() {
   if ( is_admin() ){ // for Admin Dashboard Only
      // Embed the Script on our Plugin's Option Page Only
      if ( isset($_GET['page']) && $_GET['page'] == 'wp-function-links' ) {
        wp_enqueue_script('jquery');
        wp_enqueue_script( 'jquery-form' );
      }
   }
}
add_action( 'admin_init', 'myPlugin_admin_scripts' );



add_action( 'init', 'wpfl_buttons' );
function wpfl_buttons() {
    add_filter( "mce_external_plugins", "wpfl_add_buttons" );
    add_filter( 'mce_buttons', 'wpfl_register_buttons' );
}
function wpfl_add_buttons( $plugin_array ) {
    $plugin_array['wpfl'] = plugin_dir_url(__FILE__) . "assets/js/index.js";
    return $plugin_array;
}
function wpfl_register_buttons( $buttons ) {
    array_push( $buttons, 'function_link' );
    return $buttons;
}