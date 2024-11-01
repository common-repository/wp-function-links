/*

  *** Toggle Custom Styles Box ***

*/
function togglePluginStyles() {
  //Check if the checkbox is checked
  if( jQuery('input[name="wpfl_remove_all_styles"]').is(':checked') ) {
    //If checkbox is checked, show the custom styles input box
    jQuery('#customStylesInfo').slideDown();
    jQuery('.linkStyleOptions').slideUp();
  } else {
    //If checkbox is not checked, hide the custom styles input box
    jQuery('#customStylesInfo').slideUp();
    jQuery('.linkStyleOptions').slideDown();
  }
}
//Active the function on page load
togglePluginStyles();


/*

  *** Toggle Additional Options Boxes ***

*/
jQuery('input.options_toggle').click(function() {
  if(jQuery(this).is(':checked')) {
    jQuery(this).parent('.column').parent('.row').next('.additional_options').slideDown();
  } else {
    jQuery(this).parent('.column').parent('.row').next('.additional_options').slideUp();
  }
});

jQuery(document).ready(function() {
  //toggle_additional_options();
  jQuery('input.options_toggle').each(function() {
    if(jQuery(this).is(':checked')) {
      jQuery(this).parent('.column').parent('.row').next('.additional_options').slideDown();
    } else {
      jQuery(this).parent('.column').parent('.row').next('.additional_options').slideUp();
    }
  });
});

/*

  *** Tooltips ***

*/
jQuery( "span.wpfl_tooltip" ).hover(
  function() {
    var toolTipText = jQuery(this).attr('data-wpfl-tooltip');
    jQuery( this ).after( jQuery( "<span class='wpfl_tooltip_show''>"+toolTipText+"</span>" ) ).fadeIn("slow");
    jQuery('.wpfl_tooltip_show').fadeIn();
  }, function() {
    jQuery('.wpfl_tooltip_show').fadeOut("fast", function() {
      jQuery( "span.wpfl_tooltip_show" ).remove();
    });
  }
);


/* 

*** Tabs Plugin ***

* Original Author: John D Jameson
* Original Code URL: http://codepen.io/johndjameson/pen/ecmlu 

*/

var TabBlock = {
  s: {
    animLen: 200
  },
  
  init: function() {
    TabBlock.bindUIActions();
    TabBlock.hideInactive();
  },
  
  bindUIActions: function() {
    jQuery('.tabBlock-tabs').on('click', '.tabBlock-tab', function(){
      TabBlock.switchTab(jQuery(this));
    });
  },
  
  hideInactive: function() {
    var $tabBlocks = jQuery('.tabBlock');
    
    $tabBlocks.each(function(i) {
      var 
        $tabBlock = jQuery($tabBlocks[i]),
        $panes = $tabBlock.find('.tabBlock-pane'),
        $activeTab = $tabBlock.find('.tabBlock-tab.is-active');
      
      $panes.hide();
      jQuery($panes[$activeTab.index()]).show();
    });
  },
  
  switchTab: function($tab) {
    var $context = $tab.closest('.tabBlock');
    
    if (!$tab.hasClass('is-active')) {
      $tab.siblings().removeClass('is-active');
      $tab.addClass('is-active');
   
      TabBlock.showPane($tab.index(), $context);
    }
   },
  
  showPane: function(i, $context) {
    var $panes = $context.find('.tabBlock-pane');
   
    // Normally I'd frown at using jQuery over CSS animations, but we can't transition between unspecified variable heights, right? If you know a better way, I'd love a read it in the comments or on Twitter @johndjameson
    $panes.slideUp(TabBlock.s.animLen);
    jQuery($panes[i]).slideDown(TabBlock.s.animLen);
  }
};

jQuery(function() {
  TabBlock.init();
});

TabBlock.init();



/*

  *** Toggle Additional Options ***

*/
jQuery('.toggle_additional_options').click(function() {
  
  var toggle_button = jQuery(this);
  var options_section = toggle_button.next('section.options');
  options_section.slideToggle().toggleClass('active');
  
  if( options_section.hasClass('active') ) {
    toggle_button.text('Hide Additonal Instructions');
  } else {
    toggle_button.text('Show Additonal Instructions');
  }
});



jQuery('.settings_toggle').click(function() {
  
  var toggle_button = jQuery(this);
  var settings_section = toggle_button.next('section.settings');
  toggle_button.toggleClass('active');
  settings_section.toggleClass('active');
  
});

jQuery('.social_accounts_toggle').click(function() {
  
  var toggle_button = jQuery(this);
  var settings_section = toggle_button.next('section.social-link-options');
  toggle_button.toggleClass('active');
  settings_section.toggleClass('active');
  
});



/*

  *** Toggle Additional Pinterest Options ***

*/
function togglePintertestStyles() {
  //Check if the checkbox is checked
  if( jQuery('input[name="wpfl_social_sharing_pinterest_image_sharing_status"]').is(':checked') ) {
    jQuery('#additional_pinterest_styles').slideDown();
  } else {
    jQuery('#additional_pinterest_styles').slideUp();
  }
}
//Activate the function on page load
togglePintertestStyles();
//Activate the function on input click
jQuery('input[name="wpfl_social_sharing_pinterest_image_sharing_status"]').click( function() {
  togglePintertestStyles();
});



/*

  *** Toggle Additional Pinterest Style Options ***

*/
function togglePintertestConditionalStyles() {
  //Check if the checkbox is checked
  if( jQuery('input[name="wpfl_social_sharing_pinterest_image_style_round"]').is(':checked') ) {
    jQuery('#pinterest_style_large').slideUp();
    jQuery('#pinterest_style_color').slideUp();
  } else {
    jQuery('#pinterest_style_large').slideDown();
    jQuery('#pinterest_style_color').slideDown();
  }
}
//Activate the function on page load
togglePintertestConditionalStyles();
//Activate the function on input click
jQuery('input[name="wpfl_social_sharing_pinterest_image_style_round"]').click( function() {
  togglePintertestConditionalStyles();
});