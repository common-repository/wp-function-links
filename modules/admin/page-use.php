<!-- "Use" Tab Content -->
<div class="">

  <section id="create_function_link" class="how_to_use">
    <section>
      <h3>How to Create a Function Link</h3>
      <p>To create a function link, simply use the following shortcode, replacing the highlighted text:</p>
      <div class="code">[function_link url="<span class="replace_text_highlight">DESTINATION_URL</span>"]<span class="replace_text_highlight">LINK_TEXT</span>[/function_link]</div>
      <br>
      <p>It’s that simple! Use that code in lieu of the typical "a href" code for a link and the plugin does the rest. There are additional options below that are not required, but do add flexibility when using this plugin. In addition to using the raw coded shortcode, we now have a button in the WordPress WYSIWYG editor that allows you to easily add new function links without the need to remember the shortcode in detail.</p>
    </section>

    <button class="toggle_additional_options">Hide Additonal Instructions</button>
    <section class="options active" style="display: block;">

      <section class="option_description">
        <h4>Optional: Set the link's target</h4>
        <p>The shortcode accepts a "target" attribute. This attribute controls how "link" will be opened and has a default value of "_self" to open links in the current window/tab. The following list contains the accepted attribute values.</p>
        <ul class="acceptedValues">
          <li>_blank</li>
          <li>_parent</li>
          <li>_self</li>
          <li>_top</li>
        </ul>
        <p>In order to use the target attribute, use the following shortcode setup, replacing the highlighted text:</p>
        <div class="code">[function_link url="<span class="replace_text_highlight">DESTINATION_URL</span>" target="<span class="replace_text_highlight">_blank</span>"]<span class="replace_text_highlight">LINK_TEXT</span>[/function_link]</div>
      </section>

      <section class="option_description">
        <h4>Optional: Set the link's title</h4>
        <p>The shortcode also accepts one more attribute, the "title". This title attribute will be the text that displays when a user hovers over the text. To use this attribute follow this example, replacing the highlighted text:</p>
        <div class="code">[function_link url="<span class="replace_text_highlight">DESTINATION_URL</span>" title="<span class="replace_text_highlight">LINK_TITLE</span>"]<span class="replace_text_highlight">LINK_TEXT</span>[/function_link]</div>
      </section>

    </section>
  </section>
  
  <section id="create_social_icons" class="how_to_use">
    <section>
      <h3>How to Use WPFL Social Buttons</h3>
      <p>This plugin comes bundled with an easy to use social media button generator that allows you to create beautiful social media buttons for your website. There are two types of social media buttons that this plugin can generate, social sharing buttons and social profile buttons. Both styles can be set to appear on posts and/or pages above, below, both, or neither above nor below the content of that page or post. There is a widget that you can enable for each type individually, making it easy to add these to your sidebar, footer, or anywhere else you use widgets. Additionally, there is a shortcode that you can use anywhere on your website or in your custom theme, see the following examples for the shortcodes: </p>
      <div class="code">[wpfl-social-links]</div>
      <div class="code">[wpfl-profile-links]</div>
      <p>Using these two shortcodes you can add the social media buttons anywhere you want on your website, or more simply use the widget or page placement options to control where your buttons will be displayed.</p>
    </section>

    <button class="toggle_additional_options">Hide Additonal Instructions</button>
    <section class="options active" style="display: block;">

      <section class="option_description">
        <h4>Enabling The Profiles or Sharing Buttons</h4>
        <p>Both of these social media button types are enabled individually, allowing you to have the features you want, without the additional overhead that your site doesn't need. Enabling this option allows you to use the full feature suite to customize and control your social media buttons.</p>
        
        <p>If both Social Profiles and Social Sharing buttons are disabled, the plugin will load only a single 165 byte file with the styles for the standard function links. If either of the Social Button options are enabled, the plugin will load a single ~42.4 kilobyte file with all of the styles for the social buttons and the standard function links. If you are not using the social features of this plugin, it is recommended to leave the social options unchecked.</p>
      </section>
      
      <section class="option_description">
        <h4>Enabling The Widget</h4>
        <p>To enable the widget, simply check the checkbox under the "Enable Widget" label. You will now be able to find the widget in under the Appearance >> Widgets. These are separate widgets and must be enabled individually. The names of the widgets will be "WPFL Social Profiles" or "WPFL Social Sharing", you can add this to any sidebar, footer, or other widgetized area. There is a single option for each of the widgets and that is to set the title of the widget that will appear above the social media buttons on the website.</p>
      </section>

      <section class="option_description">
        <h4>Mastering The Display Options</h4>
        <p>You can easily control where your social media buttons appear on your site by using the simple display settings. This set of settings includes two settings to control what page types your widgets will display on and where you would like the buttons to display in relation to the content.</p>
      </section>
      
      <section class="option_description">
        <h4>Button Styles</h4>
        <p>This section contains all the options to conigure what your social buttons will look like. These settings are customizable for the sharing and profile buttons separately, so you can make them match the theme location and show a visual difference for different functionality.</p>
        <ol>
          <li>
            <h5>Style</h5>
            <p>Start by choosing your style. Most people will be ok with the default flat, but if you are looking for something different, feel free to explore the other options.</p>
          </li>
          <li>
            <h5>Shape</h5>
            <p>Next you will choose the shape that you would like for your buttons.</p>
          </li>
          <li>
            <h5>Icons</h5>
            <p>You can choose to use icons or just simply use the default text. If you choose icons only, you can choose the circle in the previous shape option list.</p>
          </li>
          <li>
            <h5>Border</h5>
            <p>If you would like a border, you can choose to add a border all around or just on the bottom. Some of the style options will have their own borders, there may be conflicts so it is best to leave it off if you are not actively using it.</p>
          </li>
          <li>
            <h5>Spacing</h5>
            <p>Spacing can be configured here. Smaller square or rectangle shapes work well with no spacing, other options should consider some spacing in most cases.</p>
          </li>
          <li>
            <h5>Size</h5>
            <p>You can choose from 3 standard sizes, if you need need or would like other options, please make a request on our support page.</p>
          </li>
        </ol>
        
        
      </section>

    </section>
  </section>

</div>