<!-- Social Profiles -->
<div class="social_accounts_toggle active">Additional Options <span class="toggle_indicator">></span></div>
<section class="social-link-options active">
  <div class="row settings_section">
    <h4>Twitter Customization</h4>
    
    <div class="column col-6 m-12">
      <fieldset>
        <label>Show Twitter Handle On Share Messages</label>
        <p class="setting_description">Tweet shares from this site will include a "via @myusername" in the default tweet message</p>
        <input 
          type="checkbox" 
          name="wpfl_social_sharing_twitter_user_handle_status" 
          value="1" <?php checked( '1', get_option( 'wpfl_social_sharing_twitter_user_handle_status' ) ); ?> /> Add a twitter username to twitter share messages
      </fieldset>
    </div>
    
    <div class="column col-6 m-12">
      <?php //generate_fieldset('Digg','digg','sharing'); ?>
      <fieldset>
        <label>Default Twitter Username</label>
        <p class="setting_description">Enter the default twitter username to add to tweet share messages. Do not include the "@" symbol, just the username.</p>
        <input 
          type="text" 
          name="wpfl_social_sharing_twitter_user_handle_default" 
          placeholder="ie: myusername" 
          value="<?php echo esc_attr( get_option( 'wpfl_social_sharing_twitter_user_handle_default') ); ?>" />
      </fieldset>
    </div>
    
  </div>

  <div class="row settings_section">
    <h4>Pinterest Customization</h4>
    
    <div class="column col-6 m-12">
      <fieldset>
        <label>Show Pinterest Sharing Button On Images</label>
        <p class="setting_description">Show a Pinterest sharing icon when a user hovers over an image.</p>
        <input 
          type="checkbox" 
          name="wpfl_social_sharing_pinterest_image_sharing_status" 
          value="1" <?php checked( '1', get_option( 'wpfl_social_sharing_pinterest_image_sharing_status' ) ); ?> />Enable Pinterest image sharing
      </fieldset>
      
      
      
    </div>
    
    <div class="column col-6 m-12" id="additional_pinterest_styles">
      <h5>Styles</h5>
      
      <div class="row">
        <div class="column col-6 m-12">
          <fieldset id="pinterest_style_round">
            <label>Round</label>
            <input 
              type="checkbox" 
              name="wpfl_social_sharing_pinterest_image_style_round" 
              value="1" <?php checked( '1', get_option( 'wpfl_social_sharing_pinterest_image_style_round' ) ); ?> />
          </fieldset>
        </div>
        
        <div class="column col-6 m-12">
          <fieldset id="pinterest_style_large">
            <label>Large</label>
            <input 
              type="checkbox" 
              name="wpfl_social_sharing_pinterest_image_style_large" 
              value="1" <?php checked( '1', get_option( 'wpfl_social_sharing_pinterest_image_style_large' ) ); ?> /> 
          </fieldset>
        </div>
      </div>
      
      
      
      
      <fieldset id="pinterest_style_color">
        <label>Color</label>
        <p class="setting_description">Choose the background color for the sharing icon</p>
        <?php $social_sharing_pinterest_image_sharing_color = esc_attr( get_option('wpfl_social_sharing_pinterest_image_style_color') ); ?>
        <select name="wpfl_social_sharing_pinterest_image_style_color" value="<?php echo $social_sharing_pinterest_image_sharing_color; ?>">
          <option value="color_red" <?php if($social_sharing_pinterest_image_sharing_color == 'color_red') { echo 'selected'; } ?>>Red</option>
          <option value="color_grey" <?php if($social_sharing_pinterest_image_sharing_color == 'color_grey') { echo 'selected'; } ?>>Grey</option>
          <option value="color_white" <?php if($social_sharing_pinterest_image_sharing_color == 'color_white') { echo 'selected'; } ?>>White</option>
        </select>
      </fieldset>
      
    </div>
    
  </div>

</section>


<div class="clearfloat"></div>