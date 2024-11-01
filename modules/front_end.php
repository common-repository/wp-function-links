<?php

//Front end styles and javascript for function links
if ( !is_admin() ) {
  
  
  /* Get the Plugin's Options Set in the WordPress Admin for this plugin */
  $legacyLinks = get_option( 'wpfl_use_legacy_links' );
  $removeStyles = get_option( 'wpfl_remove_all_styles' );
  
  /*
  *   Add a body class to tell the javascript 
  *   whether or not to use legacy links
  */  
  function wpfl_use_legacy_links( $classes ) {
    $classes[] = 'useLegacyLinks';
    return $classes;
  }
  function wpfl_do_not_use_legacy_links( $classes ) {
    $classes[] = 'noLegacyLinks';
    return $classes;
  }
  if ( $legacyLinks ) {      
    add_filter( 'body_class','wpfl_use_legacy_links' );
  } else {
    add_filter( 'body_class','wpfl_do_not_use_legacy_links' );
  }
  
  
  //Load the javascript
  add_action( 'wp_enqueue_scripts', 'wpfl_add_scripts' );
  function wpfl_add_scripts() {
    wp_register_script( 'wpfl_script', plugins_url('../assets/js/wpfl_front_end.js', __FILE__), '', '1.0', true );
    wp_enqueue_script( 'wpfl_script' );
  }
  
  
  //Load the front end styles
  function wpfl_fe_styles() {
    
    //Variable for if the social button styles need loaded
    $load_social_button_styles = false;
    
    //Check if the social styles are needed
    if( get_option('wpfl_social_sharing_status') || get_option('wpfl_social_profile_status') ) {
      //Set the social styles to be loaded
      $load_social_button_styles = true;
    }
    
    //If both style types are needed
    if( $load_social_button_styles == true ) {
      wp_enqueue_style( 'wpfl_fe_styles', plugins_url('../assets/css/wpfl-styles-combined.css', __FILE__ ), false, '1.0.0' );
    } else { //Only standard function link styles
      wp_enqueue_style( 'wpfl_fe_styles', plugins_url('../assets/css/wpfl-styles-basic.css', __FILE__ ), false, '1.0.0' );
    }
  }
  
  add_action( 'wp_enqueue_scripts', 'wpfl_fe_styles' );
}

function addPinterestImageSharing() {

  //If the pinterest image share option is enabled
  if( get_option('wpfl_social_sharing_pinterest_image_sharing_status') ) {
    $pinterest_image_sharing_script = '';
    $pinterestImageShareRound = get_option('wpfl_social_sharing_pinterest_image_style_round');
    $pinterestImageShareLarge = get_option('wpfl_social_sharing_pinterest_image_style_large');
    $pinterestImageShareColor = get_option('wpfl_social_sharing_pinterest_image_style_color');

    if( $pinterestImageShareRound ) {
      if($pinterestImageShareLarge) {
        $pinterest_image_sharing_script = '<script async defer data-pin-hover="true" data-pin-tall="true" data-pin-round="true" src="//assets.pinterest.com/js/pinit.js"></script>';
      } else {
        $pinterest_image_sharing_script = '<script async defer data-pin-hover="true" data-pin-round="true" src="//assets.pinterest.com/js/pinit.js"></script>';
      }
    } else {

      //Get the icon color from the user settings
      $icon_color ='';
      if($pinterestImageShareColor == 'color_red' ) {
        $icon_color = 'data-pin-color="red"';
      } else if($pinterestImageShareColor == 'color_white') {
        $icon_color = 'data-pin-color="white"';
      }

      //Get the icon size from the user settings
      $size = '';
      if($pinterestImageShareLarge) {
        $size = 'data-pin-tall="true"';
      }

      //Create the script
      $pinterest_image_sharing_script = '<script async defer data-pin-hover="true" '.$icon_color.' '.$size.' src="//assets.pinterest.com/js/pinit.js"></script>'; 
    }
    echo $pinterest_image_sharing_script;
  }
}

add_action( 'wp_footer', 'addPinterestImageSharing' );

//Create front end sharing/profile button code
function wpfl_add_social_sharing_list_item($class, $label, $url, $title=false, $hide_text=false, $onclick=false ) {
  if( get_option('wpfl_social_sharing_'.$class.'_status') ) {
    if($hide_text) { $label = ''; }
    
    if($onclick) {
      $onclick = $onclick;
    } else {
      $onclick = 'sharing_destination(this)';
    }
    
    $legacyLinksEnabled = get_option( 'wpfl_use_legacy_links' );
    //If the user has not selected the "Use legacy links" option
    if( !$legacyLinksEnabled ) {
      //Display the link as a base64 encoded link
      $url = base64_encode($url);
    }
    
    $link = '<span class="ppm-wpfl no_underline  '.$class.'" data-destination="'.$url.'" data-target="_blank" title="'.$title.'" onclick="'.$onclick.'" popup_destination="active">'.$label.'</span>';
    
    return '<li>' . $link . '</li>';
  }
}

//Create the list items for social links
function wpfl_add_social_link($class, $label, $type, $title=false, $hide_text=false) {
  $url = get_option( 'wpfl_social_'.$type.'_'.$class.'_url' );
  if( $url && get_option('wpfl_social_'.$type.'_'.$class.'_status') ) {
    if($hide_text) { $label = ''; }
    
    $funtion_link = do_shortcode('[function_link url="'.$url.'" class="'.$class.'" target="_blank" title="'.$title.'" ]'.$label.'[/function_link]');
    return '<li>' . $funtion_link . '</li>';
  }
}

//Create the class for the social icons
function wpfl_get_class_options($type) {
  
  $class = '';
  
  $style =   get_option( 'wpfl_social_'.$type.'_display_style_value');
  $border =  get_option( 'wpfl_social_'.$type.'_display_border');
  $shape =   get_option( 'wpfl_social_'.$type.'_display_shape');
  $spacing = get_option( 'wpfl_social_'.$type.'_display_spacing');
  $icons =   get_option( 'wpfl_social_'.$type.'_display_icons');
  $size =    get_option( 'wpfl_social_'.$type.'_display_size');
  
  if( $style == 'style_flat' ) {
    //Do Nothing
  } else if( $style == 'style_gradient' ) {
    $class .= ' gradient';
  } else if( $style == 'style_hollow' ) {
    $class .= ' hollow';
  } else if( $style == 'style_dark' ) {
    $class .= ' dark';
  } else if( $style == 'style_light' ) {
    $class .= ' light';
  } else if( $style == 'style_sleek' ) {
    $class .= ' sleek';
  } else if( $style == 'style_sleek_white' ) {
    $class .= ' sleek-white';
  } else if( $style == 'style_sleek_black' ) {
    $class .= ' sleek-black';
  }
  
  if( $border == 'border_none' ) {
    //Do Nothing
  } else if( $border == 'border_all' ) {
    $class .= ' border';
  } else if( $border == 'border_bottom' ) {
    $class .= ' border-bottom';
  }
  
  if( $shape == 'shape_rectangle' ) {
    //Do Nothing
  } else if( $shape == 'shape_round_corners' ) {
    $class .= ' rounded';
  } else if( $shape == 'shape_pill' ) {
    $class .= ' pill';
  } else if( $shape == 'shape_circle' ) {
    $class .= ' circle';
  }
  
  if( $spacing == 'spacing_small' ) {
    $class .= ' spacing-small';
  } else if( $spacing == 'spacing_medium' ) {
    //Do Nothing
  } else if( $spacing == 'spacing_large' ) {
    $class .= ' spacing-large';
  } else if( $spacing == 'spacing_none' ) {
    $class .= ' spacing-none';
  }
  
  if( $icons == 'icons_none' ) {
    //Do Nothing
  } else if( $icons == 'icons_left' ) {
    $class .= ' icons';
  } else if( $icons == 'icons_only' ) {
    $class .= ' icons-only';
  }
  
  if( $size == 'size_small' ) {
    $class .= ' small';
  } else if( $size == 'size_medium' ) {
    //Do Nothing
  } else if( $size == 'size_large' ) {
    $class .= ' large';
  }
  
  return $class;
}

//Get the hover text for sharing buttons
function getSharingLinkHoverText($social_network_name) {
  return get_option('wpfl_social_sharing_'.$social_network_name.'_title');
}

//Get the hover text for profile buttons
function getProfileLinkHoverText($social_network_name) {
  return get_option('wpfl_social_profile_'.$social_network_name.'_title');
}

//Front End For Social Links
function add_wpfl_sharing_icons( $og_content, $no_location=false, $is_widget=false ) {
  
  if( get_option('wpfl_social_sharing_display_template_pages') && is_page() ) {
    
  } else if( get_option('wpfl_social_sharing_display_template_posts') && ( is_singular( 'post' ) ) && !is_front_page() ) {
    
  } else if( get_option('wpfl_social_sharing_display_template_archives') && is_archive() || is_home() || is_search()  ) {
    return $og_content;
    
  } else if( $is_widget ) {
    
  } else {
    return $og_content;
  }
  
  $url = get_permalink();
  $shortTitle = get_the_title();
  $media_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
  
  if( get_option( 'wpfl_social_sharing_status' ) ) {
    
    $class = wpfl_get_class_options('sharing');
    
    if( get_option( 'wpfl_social_sharing_display_icons') == 'icons_only' ) { 
      $hide_text = true;
    } else { $hide_text = false; }
    
    //If the twitter share via account is enabled
    if( get_option('wpfl_social_sharing_twitter_user_handle_status') ) {
      //get the account name from the settings page
      $twitterViaAccount = get_option('wpfl_social_sharing_twitter_user_handle_default');
    } else {
      $twitterViaAccount = false;
    }
    //If the twitter share via account is activated
    if($twitterViaAccount) {
      //Create the text for the twitter share link
      $via = 'via='.$twitterViaAccount.'&amp;';
    } else {
      $via = '';
    }
    
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$url;
    $twitterURL = 'https://twitter.com/intent/tweet?text='.$shortTitle.'&amp;url='.$url.'&amp;'.$via;
    $pinterestURL = 'http://pinterest.com/pin/create/button/?url='.$url.'&media='.$media_url;
    $linkedInURL = 'http://www.linkedin.com/shareArticle?mini=true&amp;title='.$shortTitle.'&amp;url='.$url;
    $googleURL = 'https://plus.google.com/share?url='.$url;
    $redditURL = 'http://www.reddit.com/submit?url='.$url.'&amp;title='.$shortTitle;
    $bufferURL = 'https://bufferapp.com/add?url='.$url.'&amp;text='.$shortTitle;
    $diggURL = 'http://digg.com/submit?url='.$url.'&amp;title='.$shortTitle;
    $tumblrURL = 'http://www.tumblr.com/share/link?url='.$url.'&name='.$shortTitle.'&description='.$description;
    $evernoteURL = 'http://www.evernote.com/clip.action?url='.$url.'&title='.$shortTitle;
    $wordpressURL = 'http://wordpress.com/press-this.php?u='.$url.'&t='.$shortTitle.'&s='.$description.'&i='.$media_url;
    $pocketURL = 'https://getpocket.com/save?url='.$url.'&title='.$shortTitle;
    $deliciousURL = 'http://del.icio.us/post?url='.$url.'&amp;title='.$shortTitle;
    $stumbleuponURL = 'http://www.stumbleupon.com/submit?url='.$url.'&title='.$shortTitle;
    $emailURL = 'mailto:?Subject=You%20Should%20Check%20This%20Out%20-%20'.$shortTitle.'&body='.$url;
    $printURL = 'javascript:window.print()';
    
    
    $custom_content = '<ul class="wpfl-social-links wpfl-social-sharing '.$class.'">';
    //wpfl_add_social_sharing_list_item($class, $label, $url, $hide_text=false );
    $custom_content .= wpfl_add_social_sharing_list_item('facebook', 'Facebook', $facebookURL, getSharingLinkHoverText('facebook'), $hide_text );
    $custom_content .= wpfl_add_social_sharing_list_item('twitter', 'Twitter', $twitterURL, getSharingLinkHoverText('twitter'), $hide_text );
    $custom_content .= wpfl_add_social_sharing_list_item('pinterest', 'Pinterest', $pinterestURL, getSharingLinkHoverText('pinterest'), $hide_text );
    $custom_content .= wpfl_add_social_sharing_list_item('linkedin', 'LinkedIn', $linkedInURL, getSharingLinkHoverText('linkedin'), $hide_text );
    $custom_content .= wpfl_add_social_sharing_list_item('googleplus', 'Google+', $googleURL, getSharingLinkHoverText('googleplus'), $hide_text );
    $custom_content .= wpfl_add_social_sharing_list_item('reddit', 'Reddit', $redditURL, getSharingLinkHoverText('reddit'), $hide_text );
    $custom_content .= wpfl_add_social_sharing_list_item('buffer', 'Buffer', $bufferURL, getSharingLinkHoverText('buffer'), $hide_text );
    $custom_content .= wpfl_add_social_sharing_list_item('digg', 'Digg', $diggURL, getSharingLinkHoverText('digg'), $hide_text );
    $custom_content .= wpfl_add_social_sharing_list_item('tumblr', 'Tumblr', $tumblrURL, getSharingLinkHoverText('tumblr'), $hide_text );
    $custom_content .= wpfl_add_social_sharing_list_item('evernote', 'Evernote', $evernoteURL, getSharingLinkHoverText('evernote'), $hide_text );
    $custom_content .= wpfl_add_social_sharing_list_item('wordpress', 'WordPress', $wordpressURL, getSharingLinkHoverText('wordpress'), $hide_text );
    $custom_content .= wpfl_add_social_sharing_list_item('pocket', 'Pocket', $pocketURL, getSharingLinkHoverText('pocket'), $hide_text );
    $custom_content .= wpfl_add_social_sharing_list_item('delicious', 'Delicious', $deliciousURL, getSharingLinkHoverText('delicious'), $hide_text );
    $custom_content .= wpfl_add_social_sharing_list_item('stumbleupon', 'StumbleUpon', $stumbleuponURL, getSharingLinkHoverText('stumbleupon'), $hide_text );
    $custom_content .= wpfl_add_social_sharing_list_item('print', 'Print', $printURL, getSharingLinkHoverText('print'), $hide_text, 'javascript:window.print()' );
//    $custom_content .= '<span class="ppm-wpfl no_underline print" data-target="_blank" title="'.$title.'" onclick="javascript:window.print()" popup_destination="active">Print</span>';
    $custom_content .= wpfl_add_social_sharing_list_item('email', 'Email', $emailURL, getSharingLinkHoverText('email'), $hide_text );
    $custom_content .= '</ul>';
    
    if ( !$no_location ) {
      //Filter and set the display location 
      $display_location = get_option( 'wpfl_social_sharing_display_location');
      if( $display_location === 'neither_above_nor_below_content' ) {
        $page_content = $og_content;
      } else if($display_location === 'above_content') {
        $page_content = $custom_content . $og_content;
      } else if($display_location === 'below_content') {
        $page_content = $og_content . $custom_content;
      } else if($display_location === 'above_and_below_content') {
        $page_content = $custom_content . $og_content . $custom_content;
      }
    } else {
      $page_content = $custom_content;
    }

    return $page_content;
  } else {
    return $og_content;
  }

}

//Front End For Social Links
function add_wpfl_profile_icons( $og_content=null, $no_location=false, $is_widget=false ) {

  if( get_option('wpfl_social_profile_display_template_pages') && is_page() ) {
    
  } else if( get_option('wpfl_social_profile_display_template_posts') && ( is_single() ) ) {
    
  } else if( get_option('wpfl_social_profile_display_template_archives') && is_archive() || is_home() || is_search() ) {
    
  } else if( $is_widget ) {
    
  } else {
    return $og_content;
  }
  
  $url = get_permalink();
  $shortTitle = get_the_title();
  $media_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
  
    
  //If the Social Profiles Are Enabled
  if( get_option( 'wpfl_social_profile_status' ) ) {

    //Get the class options as a variable
    $class = wpfl_get_class_options('profile');

    //If the settings are set to icons only
    //create a variable as true to hide the 
    //text using the wpfl_add_social_link function.
    if( get_option( 'wpfl_social_profile_display_icons') == 'icons_only' ) { 
      $hide_text = true;
    } else { $hide_text = false; }

    //Add the list of links/buttons to the page
    $custom_content = '<ul class="wpfl-social-links wpfl-social-profiles'.$class.'">';
    $custom_content .= wpfl_add_social_link('facebook', 'Facebook', 'profile', getProfileLinkHoverText('facebook'), $hide_text);
    $custom_content .= wpfl_add_social_link('twitter', 'Twitter', 'profile', getProfileLinkHoverText('twitter'), $hide_text);
    $custom_content .= wpfl_add_social_link('pinterest', 'Pinterest', 'profile', getProfileLinkHoverText('pinterest'), $hide_text);
    $custom_content .= wpfl_add_social_link('linkedin', 'LinkedIn', 'profile', getProfileLinkHoverText('linkedin'), $hide_text);
    $custom_content .= wpfl_add_social_link('googleplus', 'Google+', 'profile', getProfileLinkHoverText('googleplus'), $hide_text);
    $custom_content .= wpfl_add_social_link('reddit', 'Reddit', 'profile', getProfileLinkHoverText('reddit'), $hide_text);
    $custom_content .= wpfl_add_social_link('youtube', 'YouTube', 'profile', getProfileLinkHoverText('youtube'), $hide_text);
    $custom_content .= wpfl_add_social_link('vimeo', 'Vimeo', 'profile', getProfileLinkHoverText('vimeo'), $hide_text);
    $custom_content .= wpfl_add_social_link('instagram', 'Instagram', 'profile', getProfileLinkHoverText('instagram'), $hide_text);
    $custom_content .= wpfl_add_social_link('vine', 'Vine', 'profile', getProfileLinkHoverText('vine'), $hide_text);
    $custom_content .= wpfl_add_social_link('tumblr', 'Tumblr', 'profile', getProfileLinkHoverText('tumblr'), $hide_text);
    $custom_content .= wpfl_add_social_link('pocket', 'Pocket', 'profile', getProfileLinkHoverText('pocket'), $hide_text);
    $custom_content .= wpfl_add_social_link('slideshare', 'SlideShare', 'profile', getProfileLinkHoverText('slideshare'), $hide_text);
    $custom_content .= wpfl_add_social_link('skype', 'Skype', 'profile', getProfileLinkHoverText('skype'), $hide_text);
    $custom_content .= wpfl_add_social_link('trello', 'Trello', 'profile', getProfileLinkHoverText('trello'), $hide_text);
    $custom_content .= wpfl_add_social_link('rss', 'RSS', 'profile', getProfileLinkHoverText('rss'), $hide_text);
    $custom_content .= wpfl_add_social_link('steam', 'Steam', 'profile', getProfileLinkHoverText('steam'), $hide_text);
    $custom_content .= wpfl_add_social_link('stumbleupon', 'StumbleUpon', 'profile', getProfileLinkHoverText('stumbleupon'), $hide_text);
    $custom_content .= wpfl_add_social_link('digg', 'Digg', 'profile', getProfileLinkHoverText('digg'), $hide_text);
    $custom_content .= wpfl_add_social_link('buffer', 'Buffer', 'profile', getProfileLinkHoverText('buffer'), $hide_text);
    $custom_content .= wpfl_add_social_link('evernote', 'Evernote', 'profile', getProfileLinkHoverText('evernote'), $hide_text);
    $custom_content .= wpfl_add_social_link('wordpress', 'WordPress', 'profile', getProfileLinkHoverText('wordpress'), $hide_text);
    $custom_content .= wpfl_add_social_link('delicious', 'Delicious', 'profile', getProfileLinkHoverText('delicious'), $hide_text);
    $custom_content .= wpfl_add_social_link('flickr', 'Flickr', 'profile', getProfileLinkHoverText('flickr'), $hide_text);
    $custom_content .= wpfl_add_social_link('behance', 'Behance', 'profile', getProfileLinkHoverText('behance'), $hide_text);
    $custom_content .= wpfl_add_social_link('bitbucket', 'BitBucket', 'profile', getProfileLinkHoverText('bitbucket'), $hide_text);
    $custom_content .= wpfl_add_social_link('github', 'GitHub', 'profile', getProfileLinkHoverText('github'), $hide_text);
    $custom_content .= wpfl_add_social_link('codepen', 'CodePen', 'profile', getProfileLinkHoverText('codepen'), $hide_text);
    $custom_content .= wpfl_add_social_link('dribble', 'Dribble', 'profile', getProfileLinkHoverText('dribble'), $hide_text);
    $custom_content .= wpfl_add_social_link('foursquare', 'FourSquare', 'profile', getProfileLinkHoverText('foursquare'), $hide_text);
    $custom_content .= wpfl_add_social_link('twitch', 'Twitch', 'profile', getProfileLinkHoverText('twitch'), $hide_text);
    $custom_content .= wpfl_add_social_link('wikipedia', 'Wikipedia', 'profile', getProfileLinkHoverText('wikipedia'), $hide_text);
    $custom_content .= wpfl_add_social_link('soundcloud', 'SoundCloud', 'profile', getProfileLinkHoverText('soundcloud'), $hide_text);
    $custom_content .= wpfl_add_social_link('lastfm', 'LastFM', 'profile', getProfileLinkHoverText('lastfm'), $hide_text);
    $custom_content .= wpfl_add_social_link('email', 'Email', 'profile', getProfileLinkHoverText('email'), $hide_text);
    $custom_content .= '</ul>';
    
    
    if ( !$no_location ) {
      //Filter and set the display location 
      $display_location = get_option( 'wpfl_social_profile_display_location');
      if( $display_location == 'neither_above_nor_below_content' ) {
        $page_content = $og_content;
      } else if($display_location == 'above_content') {
        $page_content = $custom_content . $og_content;
      } else if($display_location == 'below_content') {
        $page_content = $og_content . $custom_content;
      } else if($display_location == 'above_and_below_content') {
        $page_content = $custom_content . $og_content . $custom_content;
      }
    } else {
      $page_content = $custom_content;
    } 
    
    return $page_content;
  } else {
    return $og_content;
  }

}

//If we are not in the backend of the site, filter the content
if( !is_admin() ) {
  add_filter( 'the_content', 'add_wpfl_sharing_icons', 10, 2 );
  add_filter( 'the_content', 'add_wpfl_profile_icons', 10, 2 );
}


if( !is_admin() ) {
  function addTrackingPixel() {
    echo get_option( 'wpfl_facebook_tracking_pixel');
  }
  add_action('wp_head', 'addTrackingPixel');
}