<?php

function generate_fieldset($label,$name,$type) { ?>
  
  <fieldset>
    <label><?php echo $label; ?></label>
    <input 
      type="checkbox" 
      name="wpfl_social_<?php echo $type; ?>_<?php echo $name; ?>_status" 
      value="1" <?php checked( '1', get_option( 'wpfl_social_'.$type.'_'. $name. '_status' ) ); ?> />

    <?php if( $type == 'profile' ) { ?>
      <input 
        type="url" 
        name="wpfl_social_<?php echo $type; ?>_<?php echo $name; ?>_url"
        placeholder="Profile URL" 
        value="<?php echo esc_attr( get_option( 'wpfl_social_'.$type.'_'. $name.'_url') ); ?>" />    
    <?php } ?>

    <input 
      type="text" 
      name="wpfl_social_<?php echo $type; ?>_<?php echo $name; ?>_title" 
      placeholder="Hover text" 
      value="<?php echo esc_attr( get_option( 'wpfl_social_'.$type.'_'. $name.'_title') ); ?>" />
  </fieldset>
<?php } ?>



<?php

function generate_input_select($label,$name,$options) { ?>
  
  <fieldset>
    <label><?php echo $label; ?></label>
    <input 
      type="checkbox" 
      name="wpfl_social_<?php echo $type; ?>_<?php echo $name; ?>_status" 
      value="1" <?php checked( '1', get_option( 'wpfl_social_'.$type.'_'. $name. '_status' ) ); ?> />

    <?php if( $type == 'profile' ) { ?>
      <input 
        type="url" 
        name="wpfl_social_<?php echo $type; ?>_<?php echo $name; ?>_url"
        placeholder="Profile URL" 
        value="<?php echo esc_attr( get_option( 'wpfl_social_'.$type.'_'. $name.'_url') ); ?>" />    
    <?php } ?>

    <input 
      type="text" 
      name="wpfl_social_<?php echo $type; ?>_<?php echo $name; ?>_title" 
      placeholder="Hover text" 
      value="<?php echo esc_attr( get_option( 'wpfl_social_'.$type.'_'. $name.'_title') ); ?>" />
  </fieldset>
<?php } ?>