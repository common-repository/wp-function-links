<?php

//Create the shortcode [function_link]
function wp_function_links_shortcode( $atts, $content = null, $class = null ) {
  
  //Set the defaults settings for the shortcode attributes
  $a = shortcode_atts( array(
    'url' => '#',
    'target' => '_self',
    'title' => '',
    'class' => '',
    'popup_destination' => ''
  ), $atts );

  if( $class ) { $class = $a['class']; } else { $class = ''; }
  
  //Get user input options from the plugin settings page
  $useLegacyLinks = get_option( 'wpfl_use_legacy_links' );
  $removeUnderlineLinks = get_option( 'wpfl_remove_underline_links' );
  
  //If the "remove link underline" setting is checked by the user
  if( $removeUnderlineLinks ) {
    $underlineLinks = 'no_underline';
  }
  
  //Create varible to be set later
  $url;
  
  //If the user has selected the "Use legacy links" option
  if( $useLegacyLinks ) {
    //Display the link as a plain URL
    $url = $a['url'];
  } else {
    //Display the link as a base64 encoded link
    $url = base64_encode($a['url']);
  }
  
  $destination = 'destination';
  if( $a['popup_destination'] == 'active' ) {
    $destination = 'sharing_destination';
  }
  
  //Return a function link
  return '<span class="ppm-wpfl '.$underlineLinks.'  '.$a['class'].'" data-destination="'.$url.'" data-target="'.$a['target'].'" title="'.$a['title'].'" onclick="'.$destination.'(this)">'.$content.'</span>';
}
add_shortcode( 'function_link', 'wp_function_links_shortcode' );



//Create the shortcode [wpfl-social-profiles]
function wpfl_social_profile_shortcode() {
  return add_wpfl_profile_icons( '', true, true );
}
add_shortcode( 'wpfl-social-profiles', 'wpfl_social_profile_shortcode' );




//Create the shortcode [wpfl-social-sharing]
function wpfl_social_sharing_shortcode() {
  //Shortcode functions go here
  return add_wpfl_sharing_icons( '', true, true );
}
add_shortcode( 'wpfl-social-sharing', 'wpfl_social_sharing_shortcode' );