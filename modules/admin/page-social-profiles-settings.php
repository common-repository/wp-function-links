<!-- Settings -->
<div class="settings_toggle active">Social Profile Settings <span class="toggle_indicator closed">></span></div>
<section class="settings active">
  <div class="row settings_section">
    <div class="column col-6 m-12">
      <h4>Widget</h4>
      <!-- Enable Widget -->
      <fieldset>
        <label>Enable Widget</label>
        <p class="setting_description">Enabling this option will create a widget that you can use. Go to <i>Appearance > Widgets</i> and find the widget named <strong>WPFL Social Profiles</strong>.</p>
        <input type="checkbox" name="wpfl_social_profile_widget_status" value="1" <?php checked( '1', get_option( 'wpfl_social_profile_widget_status' ) ); ?> /> Enable the social profile widget
      </fieldset>
    </div>
    <div class="column col-6 m-12">
      <h4>Shortcode</h4>
      <fieldset>
        <label>Using The Shortcode In Your Content</label>
        <p class="setting_description">Use the shortcode <strong>[wpfl-social-profiles]</strong> to add social profile buttons any where you want in your content.</p>
      </fieldset>
      
      <fieldset>
        <label>Using The Shortcode In Your Theme</label>
        <p class="setting_description">Use the following PHP code to add social profile buttons any where you want in your theme.</p>
        <p><code>do_shortcode('[wpfl-social-profiles]');</code></p>
      </fieldset>
    </div>
  </div>

  <div class="row  settings_section">
    <h4>Display Locations</h4>
    <div class="column col-6 m-12">
      <!-- Display Locations -->
      <fieldset>
        <label>Position Relative To Content</label>
        <p class="setting_description">Choose where you would like your social buttons to display relative to the primary content on the page.</p>
        <?php $display_location_value = esc_attr( get_option('wpfl_social_profile_display_location') ); ?>

        <select name="wpfl_social_profile_display_location" value="<?php echo $display_location_value; ?>">
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
         <p class="setting_description">Choose where you would like your social buttons to display on your website.</p>
        <input type="checkbox" name="wpfl_social_profile_display_template_pages" value="1" <?php checked( '1', get_option( 'wpfl_social_profile_display_template_pages' ) ); ?> /> Pages
        <br>
        <input type="checkbox" name="wpfl_social_profile_display_template_posts" value="1" <?php checked( '1', get_option( 'wpfl_social_profile_display_template_posts' ) ); ?> /> Posts
        <br>
        <input type="checkbox" name="wpfl_social_profile_display_template_archives" value="1" <?php checked( '1', get_option( 'wpfl_social_profile_display_template_archives' ) ); ?> /> Archives/Categories
      </fieldset>
    </div>

  </div>

  <div class="row  settings_section">
    <h4>Button Styles</h4>
    <div class="column col-6 m-12">

      <!-- Button Styles -->
      <fieldset>
        <label>Style</label>
        <p class="setting_description">Choose the visual style of your social media buttons.</p>
        <?php $social_profile_display_style_value = esc_attr( get_option('wpfl_social_profile_display_style_value') ); ?>

        <select name="wpfl_social_profile_display_style_value" value="<?php echo $social_profile_display_style_value; ?>">
          <option value="style_flat" <?php if($social_profile_display_style_value == 'style_flat') { echo 'selected'; } ?>>Flat</option>
          <option value="style_gradient" <?php if($social_profile_display_style_value == 'style_gradient') { echo 'selected'; } ?>>Gradient</option>
          <option value="style_hollow" <?php if($social_profile_display_style_value == 'style_hollow') { echo 'selected'; } ?>>Hollow</option>
          <option value="style_dark" <?php if($social_profile_display_style_value == 'style_dark') { echo 'selected'; } ?>>Dark</option>
          <option value="style_light" <?php if($social_profile_display_style_value == 'style_light') { echo 'selected'; } ?>>Light</option>
          <option value="style_sleek" <?php if($social_profile_display_style_value == 'style_sleek') { echo 'selected'; } ?>>Sleek</option>
          <option value="style_sleek_white" <?php if($social_profile_display_style_value == 'style_sleek_white') { echo 'selected'; } ?>>Sleek White</option>
          <option value="style_sleek_black" <?php if($social_profile_display_style_value == 'style_sleek_black') { echo 'selected'; } ?>>Sleek Black</option>
        </select>
      </fieldset>

      <!-- Shape -->
      <fieldset>
        <label>Shape</label>
        <p class="setting_description">Choose the shape you would like for your buttons.</p>
        <?php $display_shape_value = esc_attr( get_option('wpfl_social_profile_display_shape') ); ?>
        <select name="wpfl_social_profile_display_shape" value="<?php echo $display_shape_value; ?>">
          <option value="shape_rectangle" <?php if($display_shape_value == 'shape_rectangle') { echo 'selected'; } ?>>Rectangle</option>
          <option value="shape_round_corners" <?php if($display_shape_value == 'shape_round_corners') { echo 'selected'; } ?>>Round Corners</option>
          <option value="shape_pill" <?php if($display_shape_value == 'shape_pill') { echo 'selected'; } ?>>Pill</option>
        </select>
      </fieldset>

      <!-- Icons -->
      <fieldset>
        <label>Icons</label>
        <p class="setting_description">Choose where you would like the icons displayed in your buttons. By default they are disabled and the buttons only use text to reduce the number of http requests and keep the plugin fast.</p>
        <?php $display_icons_value = esc_attr( get_option('wpfl_social_profile_display_icons') ); ?>
        <select name="wpfl_social_profile_display_icons" value="<?php echo $display_icons_value; ?>">
          <option value="icons_none" <?php if($display_icons_value == 'icons_none') { echo 'selected'; } ?>>None</option>
          <option value="icons_left" <?php if($display_icons_value == 'icons_left') { echo 'selected'; } ?>>Icons Left</option>
          <option value="icons_only" <?php if($display_icons_value == 'icons_only') { echo 'selected'; } ?>>Icons Only</option>
        </select>
      </fieldset>
    </div>


    <div class="column col-6 m-12">

      <!-- Border -->
      <fieldset>
        <label>Border</label>
        <p class="setting_description">Choose your preferred border style for the social buttons.</p>
        <?php $display_border_value = esc_attr( get_option('wpfl_social_profile_display_border') ); ?>
        <select name="wpfl_social_profile_display_border" value="<?php echo $display_border_value; ?>">
          <option value="border_none" <?php if($display_border_value == 'border_none') { echo 'selected'; } ?>>None</option>
          <option value="border_all" <?php if($display_border_value == 'border_all') { echo 'selected'; } ?>>All</option>
          <option value="border_bottom" <?php if($display_border_value == 'border_bottom') { echo 'selected'; } ?>>Bottom</option>
        </select>
      </fieldset>

      <!-- Spacing -->
      <fieldset>
        <label>Spacing</label>
        <p class="setting_description">Adjust the spacing between the buttons.</p>
        <?php $display_profile_spacing_value = esc_attr( get_option('wpfl_social_profile_display_spacing') ); ?>
        <select name="wpfl_social_profile_display_spacing" value="<?php echo $display_profile_spacing_value; ?>">
          <option value="spacing_small" <?php if($display_profile_spacing_value == 'spacing_small') { echo 'selected'; } ?>>Small</option>
          <option value="spacing_medium" <?php if($display_profile_spacing_value == 'spacing_medium') { echo 'selected'; } ?>>Medium</option>
          <option value="spacing_large" <?php if($display_profile_spacing_value == 'spacing_large') { echo 'selected'; } ?>>Large</option>
          <option value="spacing_none" <?php if($display_profile_spacing_value == 'spacing_none') { echo 'selected'; } ?>>None</option>
        </select>
      </fieldset>

      <!-- Size -->
      <fieldset>
        <label>Size</label>
        <p class="setting_description">Choose your preferred size for the social buttons.</p>
        <?php $display_size_value = esc_attr( get_option('wpfl_social_profile_display_size') ); ?>
        <select name="wpfl_social_profile_display_size" value="<?php echo $display_size_value; ?>">
          <option value="size_small" <?php if($display_size_value == 'size_small') { echo 'selected'; } ?>>Small</option>
          <option value="size_medium" <?php if($display_size_value == 'size_medium') { echo 'selected'; } ?>>Medium</option>
          <option value="size_large" <?php if($display_size_value == 'size_large') { echo 'selected'; } ?>>Large</option>
        </select>
      </fieldset>
    </div>
  </div>
</section>

<div class="clearfloat"></div>