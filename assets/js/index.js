(function() {
    tinymce.create('tinymce.plugins.Wpfl', {
        init : function(ed, url) {
            ed.addButton('function_link', {
                title : 'Funtion Link',
                cmd : 'function_link',
                image :  '../wp-content/plugins/wp-function-links/assets/img/function-link-wysiwyg-icon.png',
            });
            
            ed.addCommand('function_link', function() {
                
                selected = tinyMCE.activeEditor.selection.getContent();
                //If text is selected when button is clicked
                if( selected ){
                    content =  selected;
                } else {
                    content =  '';
                }
              
              
                ed.windowManager.open( {
                    title: 'Bootstrap Panel Shortcode',
                    body: [
                        {//add Anchor Text input
                            type: 'textbox',
                            name: 'anchor_text',
                            label: 'Link Text',
                            value: content,
                            tooltip: 'Add the link text here'
                        },
                        {//add URL input
                            type: 'textbox',
                            name: 'link_url',
                            label: 'URL',
                            value: 'http://',
                            tooltip: 'Add the link url here'
                        },
                        {//add Link Title input
                            type: 'textbox',
                            name: 'link_title',
                            label: 'Link Title',
                            value: '',
                            tooltip: 'Set the title for the link (hover text). Can be left blank.'
                        },
                        {//add Target Type select
                            type: 'listbox',
                            name: 'target_type',
                            label: 'Target',
                            value: '_blank',
                            'values': [
                                {text: 'Current Tab', value: '_self'},
                                {text: 'New Tab', value: '_blank'},
                            ],
                            tooltip: 'Choose where the link will open.'
                        }
                        
                    ],
                    onsubmit: function( e ) { //when the ok button is clicked
                        e.data.link_title
                        
                        //start the shortcode tag
                        var shortcode_str = '[function_link url="'+e.data.link_url+'" title="'+e.data.link_title+'" target="'+e.data.target_type+'"]'+e.data.anchor_text+'[/function_link]';

                        //insert shortcode to TinyMCE
                        ed.insertContent( shortcode_str);
                    }
                });
            });
            
        },
        // ... Hidden code
    });
    // Register plugin
    tinymce.PluginManager.add( 'wpfl', tinymce.plugins.Wpfl );
})();