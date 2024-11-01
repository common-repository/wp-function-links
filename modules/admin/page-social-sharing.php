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
        <?php include_once( plugin_dir_path( __FILE__ ) . 'page-social-sharing-settings.php' ); ?>
      </div>

      <div class="tabBlock-pane">
        <?php include_once( plugin_dir_path( __FILE__ ) . 'page-social-sharing-accounts.php' ); ?>
      </div>
      
      <div class="tabBlock-pane">
        <?php include_once( plugin_dir_path( __FILE__ ) . 'page-social-sharing-additional-options.php' ); ?>
      </div>
    </form>
  </div>
  <!-- END Tab Content -->

</figure>