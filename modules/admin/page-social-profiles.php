<!-- "Social" Tab Content -->
<div class="" id="social_settings" >
  
  <!-- Social Profiles -->
  <div id="social_profile">
    
    <!-- Display Save Result -->
    <div class="saveResult"></div>
    
    <!-- Form --> 
    <form method="post" action="options.php" id="wp_function_links_social_settings">
      <?php settings_fields( 'wpfl_social_profile_options_group' ); ?>
      <?php do_settings_sections( 'wpfl_social_profile_options_group' ); ?>
      
      <header class="row">
        <div class="column col-6"><h3>Social Profiles</h3></div>
        <div class="column col-6"><?php submit_button('Save Profile Options'); ?></div>
      </header>
      
      
      
      <div class="row">
        <div class="column col-12">
          <input type="checkbox" name="wpfl_social_profile_status" value="1" class="options_toggle" <?php checked( '1', get_option( 'wpfl_social_profile_status' ) ); ?> /> Enable Social Profile Buttons?

          <p>If both Social Profiles and Social Sharing buttons are disabled, the plugin will load only a single 165 byte file with the styles for the standard function links. If either of the Social Button options are enabled, the plugin will load a single ~42.4 kilobyte file with all of the styles for the social buttons and the standard function links.</p>
        </div>
      </div>
      
      
      <section class="additional_options">
        
        <!-- Settings -->
        <?php include_once( plugin_dir_path( __FILE__ ) . 'page-social-profiles-settings.php' ); ?>
        
        <!-- Social Profile Options -->
        <?php include_once( plugin_dir_path( __FILE__ ) . 'page-social-profiles-accounts.php' ); ?>
          
        <div class="clearfloat"></div>
      </section>
    </form>
    <script type="text/javascript">
    jQuery(document).ready(function() {
       jQuery('#wp_function_links_social_settings').submit(function() { 
          jQuery(this).ajaxSubmit({
             success: function(){
                jQuery('#social_profile .saveResult').html("<div class='successModal saveMessage'></div>");
                jQuery('#social_profile .saveMessage').append("<p><?php echo htmlentities(__('Profile Settings Saved Successfully','wp'),ENT_QUOTES); ?></p>").show();
             }, 
             timeout: 7000
          }); 
          setTimeout("jQuery('#social_profile .saveMessage').hide('slow');", 7000);
          return false; 
       });
    });
    </script>
  </div>
  <div class="clearfloat"></div>
</div>