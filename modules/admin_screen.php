<?php

//Function to display what is on the screen for the main page
function wpFunctionLinksAdminScreen() {
  ?>

  <?php include_once(plugin_dir_path( __FILE__ ) . '/admin/functions.php'); ?>

  <div class="wrap">
    <div class="contentArea wpfl">
      <h2>WP Function Links - Description</h2>      

      <div class="wpfl_settings_content">
        <?php include_once(plugin_dir_path( __FILE__ ) . '/admin/page-description.php'); ?>
      </div>
      
      <?php include_once(plugin_dir_path( __FILE__ ) . '/admin/credit-author-information.php'); ?>
      
    </div>
  </div>

  <?php
}



//Function to display what is on the screen for the main page
function wpfl_admin_option_page_use() {
  ?>

  <?php include_once(plugin_dir_path( __FILE__ ) . '/admin/functions.php'); ?>

  <div class="wrap">
    <div class="contentArea wpfl">
      <h2>WP Function Links - Use</h2>      

      <!-- BEG Tab Content -->
      <div class="wpfl_settings_content">
        <?php include_once(plugin_dir_path( __FILE__ ) . '/admin/page-use.php'); ?>
      </div>
      <!-- END Tab Content -->
      
      <?php include_once(plugin_dir_path( __FILE__ ) . '/admin/credit-author-information.php'); ?>
      
    </div>
  </div>

  <?php
}



//Function to display what is on the screen for the main page
function wpfl_admin_option_page_settings() {
  ?>

  <?php include_once(plugin_dir_path( __FILE__ ) . '/admin/functions.php'); ?>

  <div class="wrap">
    <div class="contentArea wpfl">
      <h2>WP Function Links - Settings</h2>      

      <!-- BEG Tab Content -->
      <div class="wpfl_settings_content">
        <?php include_once(plugin_dir_path( __FILE__ ) . '/admin/page-plugin-settings.php'); ?>
      </div>
      <!-- END Tab Content -->
      
      <?php include_once(plugin_dir_path( __FILE__ ) . '/admin/credit-author-information.php'); ?>
      
    </div>
  </div>

  <?php
}



//Function to display what is on the screen for the main page
function wpfl_admin_option_page_social_profiles() {
  ?>

  <?php include_once(plugin_dir_path( __FILE__ ) . '/admin/functions.php'); ?>

  <div class="wrap">
    <div class="contentArea wpfl">
      <h2>WP Function Links - Social</h2>      

      <!-- Form --> 
      <form method="post" action="options.php" id="wp_function_links_social_settings">
        <?php settings_fields( 'wpfl_social_profile_options_group' ); ?>
        <?php do_settings_sections( 'wpfl_social_profile_options_group' ); ?>
        
        <!-- BEG Tab Content -->
        <div class="wpfl_settings_content">
          <?php //include_once(plugin_dir_path( __FILE__ ) . '/admin/page-social-profiles.php'); ?>
          
          <!-- "Social" Tab Content -->
          <div class="" id="social_settings" >

            <!-- Social Profiles -->
            <div id="social_profile">
              
              <!-- Display Save Result -->
              <div class="saveResult"></div>
              
              <header class="row">
                <div class="column col-6"><h3>Social Profiles</h3></div>
                <div class="column col-6"><?php submit_button('Save Profile Options'); ?></div>
              </header>
              
              <div class="row">
                <div class="column col-12">
                  <input type="checkbox" name="wpfl_social_profile_status" value="1" class="options_toggle" <?php checked( '1', get_option( 'wpfl_social_profile_status' ) ); ?> /> Enable Social Profile Buttons?

                  <p class="setting_description">Check this option to enable the social profile buttons. You will be able to customize your button settings, choose your profiles, and display the buttons on your website.</p>
                </div>
              </div>
              
              <section class="additional_options">
                <?php include_once(plugin_dir_path( __FILE__ ) . '/admin/page-social-profiles-settings.php'); ?>
                <?php include_once(plugin_dir_path( __FILE__ ) . '/admin/page-social-profiles-accounts.php'); ?>
              </section>
            </div>
            <div class="clearfloat"></div>
          </div>

        </div>
        <!-- END Tab Content -->
      
      </form>
      <script type="text/javascript">
        jQuery(document).ready(function() {
           jQuery('#wp_function_links_social_settings').submit(function() { 
              jQuery(this).ajaxSubmit({
                 success: function(){
                    jQuery('.saveResult').html("<div class='successModal saveMessage'></div>");
                    jQuery('.saveMessage').append("<p><?php echo htmlentities(__('Profile Settings Saved Successfully','wp'),ENT_QUOTES); ?></p>").show();
                 }, 
                 timeout: 7000
              }); 
              setTimeout("jQuery('.saveMessage').hide('slow');", 7000);
              return false; 
           });
        });
      </script>
      
      <?php include_once(plugin_dir_path( __FILE__ ) . '/admin/credit-author-information.php'); ?>
      
    </div>
  </div>

  <?php
}


  
  //Function to display what is on the screen for the main page
function wpfl_admin_option_page_social_sharing() {
  ?>

  <?php include_once(plugin_dir_path( __FILE__ ) . '/admin/functions.php'); ?>

  <div class="wrap">
    <div class="contentArea wpfl">
      <h2>WP Function Links - Social Sharing</h2>
      <form method="post" action="options.php" id="wpfl_social_sharing_settings">
        <?php settings_fields( 'wpfl_social_sharing_options_group' ); ?>
        <?php do_settings_sections( 'wpfl_social_sharing_options_group' ); ?>
        <div class="wpfl_settings_content">
          <!-- "Social" Tab Content -->
          <div class="" id="social_settings" >
          
            <div id="social_sharing">
              <header class="row">
                <div class="column col-6"><h3>Social Sharing Settings</h3></div>
                <div class="column col-6"><?php submit_button('Save Sharing Options'); ?></div>
              </header>

              <div class="row">
                <div class="column col-12">
                  <input type="checkbox" name="wpfl_social_sharing_status" value="1" class="options_toggle" <?php checked( '1', get_option( 'wpfl_social_sharing_status' ) ); ?> /> Enable Social Sharing Buttons?
                  <p class="setting_description">Check this option to enable the social sharing buttons. You will be able to customize your button settings, choose your social sharing options, and display the buttons on your website.</p>
                </div>
              </div>
              
              <section class="additional_options">
                <?php include_once(plugin_dir_path( __FILE__ ) . '/admin/page-social-sharing-settings.php'); ?>
                <?php include_once(plugin_dir_path( __FILE__ ) . '/admin/page-social-sharing-accounts.php'); ?>
                <?php include_once(plugin_dir_path( __FILE__ ) . '/admin/page-social-sharing-additional-options.php'); ?>
              </section>
            </div><!-- END #social_sharing -->
          </div><!-- END .social_settings -->
        </div><!-- END .wpfl_settings_content -->
      </form>
      <?php include_once(plugin_dir_path( __FILE__ ) . '/admin/credit-author-information.php'); ?>
      
    </div>
  </div>

  <?php
}



//Function to display what is on the screen for the main page
function wpfl_admin_option_page_social_sharing_test() {
  ?>

  <?php include_once(plugin_dir_path( __FILE__ ) . '/admin/functions.php'); ?>

  <div class="wrap">
    <div class="contentArea wpfl">
      <h2>WP Function Links - Social Sharing</h2>      

      <!-- Plugin Sections Tabs -->
      <figure class="tabBlock">
        
        <!-- Tab Navigation -->
        <ul class="tabBlock-tabs">
          <li class="tabBlock-tab is-active">Sharing Settings</li>
          <li class="tabBlock-tab ">Sharing Accounts</li>
        </ul>
        
        <!-- BEG Tab Content -->
        <div class="tabBlock-content">
          
          <form method="post" action="options.php" id="wpfl_social_sharing_settings">
            <?php settings_fields( 'wpfl_social_sharing_options_group' ); ?>
            <?php do_settings_sections( 'wpfl_social_sharing_options_group' ); ?>
            
            <div class="tabBlock-pane">
              <header class="row">
                <div class="column col-6"><h3>Social Sharing Settings</h3></div>
                <div class="column col-6"><?php submit_button('Save Sharing Options'); ?></div>
              </header>

              <div class="column col-12">
                <input type="checkbox" name="wpfl_social_sharing_status" value="1" class="options_toggle" <?php checked( '1', get_option( 'wpfl_social_sharing_status' ) ); ?> /> Enable Social Sharing Buttons?
              </div>
              <section class="additional_options">
                <div class="column col-12">Use the shortcode [wpfl-social-sharing] to add social sharing buttons any where you want.</div>

                <!-- Settings -->
                <div class="settings_toggle active">Social Sharing Settings <span class="toggle_indicator">></span></div>
                <section class="settings active">
                  <div class="row settings_section">
                    <h4>Widget</h4>
                    <div class="column col-6 m-12">
                      <!-- Enable Widget -->
                      <fieldset>
                        <label>Enable Widget</label>
                        <input type="checkbox" name="wpfl_social_sharing_widget_status" value="1" <?php checked( '1', get_option( 'wpfl_social_sharing_widget_status' ) ); ?> /> Enable the social sharing widget
                      </fieldset>
                    </div>
                  </div>

                  <div class="row settings_section">
                    <h4>Display Locations</h4>
                    <div class="column col-6 m-12">
                      <!-- Display Locations -->
                      <fieldset>
                        <label>Display Location</label>
                        <?php $display_location_value = esc_attr( get_option('wpfl_social_sharing_display_location') ); ?>

                        <select name="wpfl_social_sharing_display_location" value="<?php echo $display_location_value; ?>">
                          <option value="above_content" <?php if($display_location_value == 'above_content') { echo 'selected'; } ?>>Above Content</option>
                          <option value="below_content" <?php if($display_location_value == 'below_content') { echo 'selected'; } ?>>Below Content</option>
                          <option value="above_and_below_content" <?php if($display_location_value == 'above_and_below_content') { echo 'selected'; } ?>>Above & Below</option>
                          <option value="neither_above_nor_below_content" <?php if($display_location_value == 'neither_above_nor_below_content') { echo 'selected'; } ?>>None</option>
                        </select>
                      </fieldset>
                    </div>
                    <div class="column col-6 m-12">
                      <!-- Display Templates -->
                      <fieldset>
                        <label>Display On</label>
                        <input type="checkbox" name="wpfl_social_sharing_display_template_pages" value="1" <?php checked( '1', get_option( 'wpfl_social_sharing_display_template_pages' ) ); ?> /> Pages
                        <br>
                        <input type="checkbox" name="wpfl_social_sharing_display_template_posts" value="1" <?php checked( '1', get_option( 'wpfl_social_sharing_display_template_posts' ) ); ?> /> Posts
                        <br>
                        <input type="checkbox" name="wpfl_social_sharing_display_template_categories" value="1" <?php checked( '1', get_option( 'wpfl_social_sharing_display_template_categories' ) ); ?> /> Categories
                        <br>
<!--                        <input type="checkbox" name="wpfl_social_sharing_display_template_archives" value="1" <?php checked( '1', get_option( 'wpfl_social_sharing_display_template_archives' ) ); ?> /> Archives-->
<!--                        <br>-->
                        <input type="checkbox" name="wpfl_social_sharing_display_template_product_single" value="1" <?php checked( '1', get_option( 'wpfl_social_sharing_display_template_product_single' ) ); ?> /> Single Products*
                        <br>
                        <input type="checkbox" name="wpfl_social_sharing_display_template_product_categories" value="1" <?php checked( '1', get_option( 'wpfl_social_sharing_display_template_product_categories' ) ); ?> /> Product Categories*
                        <br>
                        <input type="checkbox" name="wpfl_social_sharing_display_template_product_archives" value="1" <?php checked( '1', get_option( 'wpfl_social_sharing_display_template_product_archives' ) ); ?> /> Product Archives*

                        <br>
                        <span class="disclaimer">*(WooCommerce Only, Not Compatible with all themes)</span>
                      </fieldset>
                    </div>
                  </div>

                  <div class="row settings_section">
                    <h4>Button Styles</h4>
                    <div class="column col-6 m-12">
                      <!-- Button Styles -->
                      <fieldset>
                        <label>Style</label>
                        <?php $social_sharing_display_style_value = esc_attr( get_option('wpfl_social_sharing_display_style_value') ); ?>
                        <select name="wpfl_social_sharing_display_style_value" value="<?php echo $social_sharing_display_style_value; ?>">
                          <option value="style_flat" <?php if($social_sharing_display_style_value == 'style_flat') { echo 'selected'; } ?>>Flat</option>
                          <option value="style_gradient" <?php if($social_sharing_display_style_value == 'style_gradient') { echo 'selected'; } ?>>Gradient</option>
                          <option value="style_hollow" <?php if($social_sharing_display_style_value == 'style_hollow') { echo 'selected'; } ?>>Hollow</option>
                          <option value="style_dark" <?php if($social_sharing_display_style_value == 'style_dark') { echo 'selected'; } ?>>Dark</option>
                          <option value="style_light" <?php if($social_sharing_display_style_value == 'style_light') { echo 'selected'; } ?>>Light</option>
                          <option value="style_sleek" <?php if($social_sharing_display_style_value == 'style_sleek') { echo 'selected'; } ?>>Sleek</option>
                          <option value="style_sleek_white" <?php if($social_sharing_display_style_value == 'style_sleek_white') { echo 'selected'; } ?>>Sleek White</option>
                          <option value="style_sleek_black" <?php if($social_sharing_display_style_value == 'style_sleek_black') { echo 'selected'; } ?>>Sleek Black</option>
                        </select>
                      </fieldset>

                      <!-- Shape -->
                      <fieldset>
                        <label>Shape</label>
                        <?php $display_shape_value = esc_attr( get_option('wpfl_social_sharing_display_shape') ); ?>
                        <select name="wpfl_social_sharing_display_shape" value="<?php echo $display_shape_value; ?>">
                          <option value="shape_rectangle" <?php if($display_shape_value == 'shape_rectangle') { echo 'selected'; } ?>>Rectangle</option>
                          <option value="shape_round_corners" <?php if($display_shape_value == 'shape_round_corners') { echo 'selected'; } ?>>Round Corners</option>
                          <option value="shape_pill" <?php if($display_shape_value == 'shape_pill') { echo 'selected'; } ?>>Pill</option>
                        </select>
                      </fieldset>

                      <!-- Icons -->
                      <fieldset>
                        <label>Icons</label>
                        <?php $display_icons_value = esc_attr( get_option('wpfl_social_sharing_display_icons') ); ?>
                        <select name="wpfl_social_sharing_display_icons" value="<?php echo $display_icons_value; ?>">
                          <option value="icons_none" <?php if($display_icons_value == 'icons_none') { echo 'selected'; } ?>>None</option>
                          <option value="icons_left" <?php if($display_icons_value == 'icons_left') { echo 'selected'; } ?>>Left</option>
                          <option value="icons_only" <?php if($display_icons_value == 'icons_only') { echo 'selected'; } ?>>Icons Only</option>
                        </select>
                      </fieldset>
                    </div>
                    <div class="column col-6 m-12">
                      <!-- Border -->
                      <fieldset>
                        <label>Border</label>
                        <?php $display_border_value = esc_attr( get_option('wpfl_social_sharing_display_border') ); ?>
                        <select name="wpfl_social_sharing_display_border" value="<?php echo $display_border_value; ?>">
                          <option value="border_none" <?php if($display_border_value == 'border_none') { echo 'selected'; } ?>>None</option>
                          <option value="border_all" <?php if($display_border_value == 'border_all') { echo 'selected'; } ?>>All</option>
                          <option value="border_bottom" <?php if($display_border_value == 'border_bottom') { echo 'selected'; } ?>>Bottom</option>
                        </select>
                      </fieldset>

                      <!-- Spacing -->
                      <fieldset>
                        <label>Spacing</label>
                        <?php $display_spacing_value = esc_attr( get_option('wpfl_social_sharing_display_spacing') ); ?>
                        <select name="wpfl_social_sharing_display_spacing" value="<?php echo $display_spacing_value; ?>">
                          <option value="spacing_small" <?php if($display_spacing_value == 'spacing_small') { echo 'selected'; } ?>>Small</option>
                          <option value="spacing_medium" <?php if($display_spacing_value == 'spacing_medium') { echo 'selected'; } ?>>Medium</option>
                          <option value="spacing_large" <?php if($display_spacing_value == 'spacing_large') { echo 'selected'; } ?>>Large</option>
                          <option value="spacing_none" <?php if($display_spacing_value == 'spacing_none') { echo 'selected'; } ?>>None</option>
                        </select>
                      </fieldset>

                      <!-- Size -->
                      <fieldset>
                        <label>Size</label>
                        <?php $display_size_value = esc_attr( get_option('wpfl_social_sharing_display_size') ); ?>
                        <select name="wpfl_social_sharing_display_size" value="<?php echo $display_size_value; ?>">
                          <option value="size_small" <?php if($display_size_value == 'size_small') { echo 'selected'; } ?>>Small</option>
                          <option value="size_medium" <?php if($display_size_value == 'size_medium') { echo 'selected'; } ?>>Medium</option>
                          <option value="size_large" <?php if($display_size_value == 'size_large') { echo 'selected'; } ?>>Large</option>
                        </select>
                      </fieldset>
                    </div>
                  </div>
                </section>

                <div class="clearfloat"></div>
              </section>
            </div>

            <div class="tabBlock-pane">
              <header class="row">
                <div class="column col-6"><h3>Social Sharing Accounts</h3></div>
                <div class="column col-6"><?php submit_button('Save Sharing Accounts'); ?></div>
              </header>
              
              <!-- Social Profiles -->
              <div class="settings_toggle active">Social Sharing Accounts <span class="toggle_indicator closed">></span></div>
              <section class="settings active">
                <div class="row">
                  <div class="column col-6 m-12">
                    <?php generate_fieldset('Facebook','facebook','sharing'); ?>
                    <?php generate_fieldset('Twitter','twitter','sharing'); ?>
                    <?php generate_fieldset('Pinterest','pinterest','sharing'); ?>
                    <?php generate_fieldset('LinkedIn','linkedin','sharing'); ?>
                    <?php generate_fieldset('Google+','googleplus','sharing'); ?>
                    <?php generate_fieldset('Reddit','reddit','sharing'); ?>
                    <?php generate_fieldset('StumbleUpon','stumbleupon','sharing'); ?>
                  </div>
                  <div class="column col-6 m-12">
                    <?php generate_fieldset('Digg','digg','sharing'); ?>
                    <?php generate_fieldset('Buffer','buffer','sharing'); ?>
                    <?php generate_fieldset('Tumblr','tumblr','sharing'); ?>
                    <?php generate_fieldset('Evernote','evernote','sharing'); ?>
                    <?php generate_fieldset('WordPress','wordpress','sharing'); ?>
                    <?php generate_fieldset('Pocket','pocket','sharing'); ?>
                    <?php generate_fieldset('Delicious','delicious','sharing'); ?>
                  </div>
                </div>
              </section>

              <div class="row social-link-options">

              </div>
              <div class="clearfloat"></div>
              
            </div>
            
            <div class="tabBlock-pane">
              <?php include_once( plugin_dir_path( __FILE__ ) . 'page-social-sharing-additional-options.php' ); ?>
            </div>
          </form>
        </div>
        <!-- END Tab Content -->
        
      </figure>
      
      <?php include_once(plugin_dir_path( __FILE__ ) . '/admin/credit-author-information.php'); ?>
      
    </div>
  </div>

  <?php
}