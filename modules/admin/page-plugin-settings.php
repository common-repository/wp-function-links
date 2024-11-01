<!-- "Plugin Settings" Tab Content -->


<form method="post" action="options.php" id="wp_function_links_settings">
  <?php settings_fields( 'wp_function_links_options_group' ); ?>
  <?php do_settings_sections( 'wp_function_links_options_group' ); ?>
  <div class="saveResult"></div>
  <div  class="col-6">

    <h2>Function Link Settings</h2>
    
    <h3>Link Settings</h3>

    <fieldset>
      <input type="checkbox" name="wpfl_use_legacy_links" value="1" <?php checked( '1', get_option( 'wpfl_use_legacy_links' ) ); ?> /> Use legacy links <span class="wpfl_tooltip" data-wpfl-tooltip="Checking this option will output the actual destination URL instead of the base64 code that is used to help prevent search bots from recognizing the link. This option is only recommended for those who must support IE versions 9 and before.">?</span>
    </fieldset>

    <h3>Link Styles</h3>
    <section class="basicCustomStyles">
      <fieldset class="linkStyleOptions">
        <input type="checkbox" name="wpfl_remove_underline_links" value="1" <?php checked( '1', get_option( 'wpfl_remove_underline_links' ) ); ?> /> Remove underline from function links?
      </fieldset>
    </section>

  </div>

  <div class="col-6">
    <h2>Social Settings</h2>
    
    <section class="">
      <h3>Add Facebook tracking pixel</h3>
      <fieldset class="linkStyleOptions">
        <textarea name="wpfl_facebook_tracking_pixel" style="width: 100%; height: 120px;"><?php echo esc_attr( get_option( 'wpfl_facebook_tracking_pixel') ); ?></textarea>
      </fieldset>
    </section>

  </div>

  <?php submit_button(); ?>
  <div class="clearfloat"></div>
</form>
<script type="text/javascript">
  jQuery(document).ready(function() {
     jQuery('#wp_function_links_settings').submit(function() { 
        jQuery(this).ajaxSubmit({
           success: function(){
              jQuery('#wp_function_links_settings .saveResult').html("<div class='successModal saveMessage'></div>");
              jQuery('#wp_function_links_settings .saveMessage').append("<p><?php echo htmlentities(__('Plugin Settings Saved Successfully','wp'),ENT_QUOTES); ?></p>").show();
           },
           timeout: 7000
        }); 
        setTimeout("jQuery('#social_sharing .saveMessage').hide('slow');", 7000);
        return false; 
     });
  });
  </script>