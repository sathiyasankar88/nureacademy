/* 
 * Admin JS Script
 */
(function ($) {
    $(document).ready(function () {
        // var EDITOR = $('.hidden-editor-container').contents();

        /* 
         * Configuration Tab Settings
         */
        $('ul.et-main-tabs li a').click(function () {
            var tab_id = $(this).attr('data-tab');
            $('ul.et-main-tabs li').removeClass('current');
            $('.et-tab-main-content').hide().removeClass('current');
            $(this).parent().addClass('current');
            $("#" + tab_id).fadeIn('300').addClass('current');
            if (tab_id == "howtouse") {
                $('.et-form-actions-wrap').hide();
            } else {
                $('.et-form-actions-wrap').show();
            }
        });

        /* 
         * Custom Metabox General Tab Settings
         */
        $('ul.et-nav-tabs li').click(function () {
            var tab_id = $(this).attr('data-id');
            $('ul.et-nav-tabs li').removeClass('et-active');
            $('.et-tab-content').hide().removeClass('et-tab-content-active');
            $(this).addClass('et-active');
            $("#" + tab_id).fadeIn('300').addClass('et-tab-content-active');
            
        });

        $('.et-color-picker').wpColorPicker();

        /*
         * Change another selectbox options according to selected first select box options 
         */
       /* $("#et_orientation_type").change(function () {
            if ($(this).data('options') === undefined) {
                Taking an array of all options-2 and kind of embedding it on the select1
                $(this).data('options', $('#et_tab_position option').clone());
            }
            var datatype = $(this).val();
            var options = $(this).data('options').filter('[data-type=' + datatype + ']');
            $('#et_tab_position').html(options);
        }); */

          $("#et_orientation_type").change(function () {
           var orient_type  = $(this).val();
             if(orient_type == "horizontal"){
                 $("#et_tab_position option[data-type='vertical']").attr('disabled',true);
                 $("#et_tab_position option[data-type='horizontal']").attr('disabled',false);
            }else{
               $("#et_tab_position option[data-type='horizontal']").attr('disabled',true);
               $("#et_tab_position option[data-type='vertical']").attr('disabled',false);
            }
           });
             var orient_type  = $('#et_orientation_type option:selected').val();
             if(orient_type == "horizontal"){
                $("#et_tab_position option[data-type='vertical']").attr('disabled',true);
                $("#et_tab_position option[data-type='horizontal']").attr('disabled',false);
            }else{
                $("#et_tab_position option[data-type='horizontal']").attr('disabled',true);
                $("#et_tab_position option[data-type='vertical']").attr('disabled',false);
            }

        /*
         * Display Tab Templates
         */
        $('#et_template_type').on('change', function () {
            var tid = $(this).val();
            $('.et_listtemplate').hide();
            $('#' + tid).show();
            if(tid == 'template14' || tid == 'template15'){
              $('.etab-bg-image').show();
            }else{
              $('.etab-bg-image').hide();
            }
            if(tid == 'template14'){
                $('#etab-template14-disable').hide();
            }else{
                $('#etab-template14-disable').show();
            }
            if(tid == 'template2' || tid == 'template10'){
                 $('#etab-template2-option').show();
            }else{
                $('#etab-template2-option').hide();
            }
            if(tid == 'template17' || tid == 'template18'){
                $('#etab-template14-disable').hide();
                $('#etab-template17-option').show();
            }else{
                $('#etab-template14-disable').show();
                $('#etab-template17-option').hide();
            }
             if(tid == 'template3'){
                 $('#etab-template3-option').show();
            }else{
                $('#etab-template3-option').hide();
            }
        });

     var tempid = $('#et_template_type option:selected').val();
           if(tempid == 'template14'){
                $('#etab-template14-disable').hide();
            }else{
                $('#etab-template14-disable').show();
            }
              if(tempid == 'template17' || tempid == 'template18'){
                $('#etab-template14-disable').hide();
                $('#etab-template17-option').show();
            }else{
                $('#etab-template14-disable').show();
                $('#etab-template17-option').hide();
            }
            if(tempid == 'template2' || tempid == 'template10'){
                 $('#etab-template2-option').show();
            }else{
                $('#etab-template2-option').hide();
            }
             if(tempid == 'template3'){
                 $('#etab-template3-option').show();
            }else{
                $('#etab-template3-option').hide();
            }


        var ajaxurl = et_admin_params.ajax_url,
                ajaxnonce = et_admin_params.ajax_nonce,
                delete_confirm = et_admin_params.delete_confirm,
                $container = $('.et-tab-settings-wrapper');
        $('.et-icon-picker').iconPicker();
        /*
         * Add Tab using ajax only
         */
        $container.on('click', '.et-add-tabs-button', function (e) {
            var append_div = $container.find('.et_tab_append_wrapper');
            if ($container.find('.et-count-tab-wrap').length <= 100) {
                var perfom_action = 'add_tab';
                var data = {
                    action: 'et_append_tab_html',
                    _action: perfom_action,
                    _wpnonce: ajaxnonce
                };
                $.ajax({
                    type: 'post',
                    url: ajaxurl,
                    data: data,
                    beforeSend: function (xhr) {
                        $('.et-loader-image').show();
                    },
                    success: function (res) {
                        append_div.append(res);
                        $('.et-loader-image').hide();
                        $('.et-icon-picker').iconPicker();
                        alterColumnsIndex();
                        var response = $(res);
                        var key = response.find('.et_key_unique').val();
                        var key1 = "et-html-text";
                        var key21 = "et-html-text-" + key;
                        //init tinymce
                        // $('.et-html'+key).append( EDITOR );
                        // tinymce.execCommand( 'mceRemoveEditor', false, key1 );
                       // tinymce.execCommand('mceAddEditor', false, key21);

                        tinymce.execCommand('mceRemoveEditor', false, key1);
                        tinymce.execCommand('mceAddEditor', false, key21);
                        quicktags({id: key21});
                        tinymce.init({
                            selector: key21,
                            formats: {
                                alignleft: [
                                    {selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li', styles: {textAlign: 'left'}},
                                    {selector: 'img,table,dl.wp-caption', classes: 'alignleft'}
                                ],
                                aligncenter: [
                                    {selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li', styles: {textAlign: 'center'}},
                                    {selector: 'img,table,dl.wp-caption', classes: 'aligncenter'}
                                ],
                                alignright: [
                                    {selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li', styles: {textAlign: 'right'}},
                                    {selector: 'img,table,dl.wp-caption', classes: 'alignright'}
                                ],
                                strikethrough: {inline: 'del'}
                            },
                            relative_urls: false,
                            remove_script_host: false,
                            convert_urls: false,
                            browser_spellcheck: true,
                            fix_list_elements: true,
                            entities: "38,amp,60,lt,62,gt",
                            entity_encoding: "raw",
                            keep_styles: false,
                            paste_webkit_styles: "font-weight font-style color",
                            preview_styles: "font-family font-size font-weight font-style text-decoration text-transform",
                            wpeditimage_disable_captions: false,
                            wpeditimage_html5_captions: true,
                            plugins: "charmap,hr,media,paste,tabfocus,textcolor,fullscreen,wordpress,wpeditimage,wpgallery,wplink,wpdialogs,wpview",
                            // selector:"#" + fullId,
                            resize: "vertical",
                            menubar: false,
                            wpautop: true,
                            indent: false,
                            toolbar1: "bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,wp_more,spellchecker,fullscreen,wp_adv", toolbar2: "formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help",
                            toolbar3: "",
                            toolbar4: "",
                            tabfocus_elements: ":prev,:next",
                            body_class: "id post-type-post post-status-publish post-format-standard"
                        });
                       // $this.prop('disabled', false);
                        // tinymce.init({
                        //     selector: key21,
                        //     relative_urls: false,
                        //     remove_script_host: false,
                        //     convert_urls: false,
                        //     browser_spellcheck: true,
                        //     fix_list_elements: true,
                        //     entities: "38,amp,60,lt,62,gt",
                        //     entity_encoding: "raw",
                        //     keep_styles: false,
                        //     paste_webkit_styles: "font-weight font-style color",
                        //     preview_styles: "font-family font-size font-weight font-style text-decoration text-transform",
                        //     wpeditimage_disable_captions: false,
                        //     wpeditimage_html5_captions: true,
                        //     plugins: "charmap,hr,media,paste,tabfocus,textcolor,fullscreen,wordpress,wpeditimage,wpgallery,wplink,wpdialogs,wpview",
                        //     resize: "vertical",
                        //     menubar: false,
                        //     wpautop: true,
                        //     indent: false,
                        //     toolbar1: "bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,wp_more,spellchecker,fullscreen,wp_adv", toolbar2: "formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help",
                        //     toolbar3: "",
                        //     toolbar4: "",
                        //     tabfocus_elements: ":prev,:next",
                        //     body_class: "id post-type-post post-status-publish post-format-standard",

                        // });
                        $('.et-color-picker').wpColorPicker();
                    }
                });
                e.preventDefault();
            } else {
                alert('Maximum Tab Addition Reached.');
            }
        });

        $container.on('click', '.et-item-header-title,.et-tab-hide-show', function () {
            $(this).closest('.et-tab-item-inner').find('.et-tab-item-options').slideToggle('slow', function () {
                $(this).closest('.et-tab-item-inner').find('.et-tab-hide-show').toggleClass('et-active', $(this).is(':visible'));
                $(this).closest('.et-each-tab-column').toggleClass('et-active-column');
            });
        });

        $container.on('click', '.et-tab-delete', function (e) {
            var $this = $(this);
            if (confirm(delete_confirm)) {
                $this.closest('.et-each-tab-column').remove();
                alterColumnsIndex();
                e.preventDefault();
            } else {
                e.preventDefault();
            }
        });

        $container.on('change', '.et-tab_components-type', function () {
            var comp_type = $(this).val();
            var id = $(this).attr('id');
            var splitid = id.split('_');
            $(this).closest('.et-tab-cbody').find('.et_compontents_wrapper .et_tab_comp').hide();
            if (comp_type == "editor") {
                $('#wpeditor_' + splitid[1]).slideDown('slow');
            } else if (comp_type == "recent_posts") {
                $('#recent_posts_' + splitid[1]).slideDown('slow');
            } else if (comp_type == "custom_link") {
                $('#clink_' + splitid[1]).slideDown('slow');
            } else if (comp_type == "social_feeds") {
                $('#social_feeds_' + splitid[1]).slideDown('slow');
            } else if (comp_type == "contact_form") {
                $('#contact_form_' + splitid[1]).slideDown('slow');
            } else if (comp_type == "shortcode") {
                $('#shortcode_' + splitid[1]).slideDown('slow');
            }
        });

        /*
         * On Change Social Feeds Type
         */
        $container.on('change', '.et-social-feeds-type', function () {
            var feeds_type = $(this).val();
            if (feeds_type == "facebook-feeds") {
                $(this).closest('.et_social_feeds_wrapper').find('.et-fb-feeds-type-wrap').slideDown('slow');
                $(this).closest('.et_social_feeds_wrapper').find('.et-twitter-feeds-type-wrap').hide();
                $(this).closest('.et_social_feeds_wrapper').find('.et-rss-feeds-type-wrap').hide();
            } else if (feeds_type == "twitter-feeds") {
                $(this).closest('.et_social_feeds_wrapper').find('.et-twitter-feeds-type-wrap').slideDown('slow');
                $(this).closest('.et_social_feeds_wrapper').find('.et-fb-feeds-type-wrap').hide();
                $(this).closest('.et_social_feeds_wrapper').find('.et-rss-feeds-type-wrap').hide();
            } else if (feeds_type == "rss-feeds") {
                $(this).closest('.et_social_feeds_wrapper').find('.et-fb-feeds-type-wrap').hide();
                $(this).closest('.et_social_feeds_wrapper').find('.et-twitter-feeds-type-wrap').hide();
                $(this).closest('.et_social_feeds_wrapper').find('.et-rss-feeds-type-wrap').slideDown('slow');
            } else {
                $(this).closest('.et_social_feeds_wrapper').find('.et-fb-feeds-type-wrap').hide();
                $(this).closest('.et_social_feeds_wrapper').find('.et-twitter-feeds-type-wrap').hide();
                $(this).closest('.et_social_feeds_wrapper').find('.et-rss-feeds-type-wrap').hide();
            }
        });

        var textareaID;
        $('.et_tab_append_wrapper').sortable({
            items: '.et-each-tab-column',
            containment: 'parent',
            handle: '.et-tab-sort',
            tolerance: 'pointer',
            cursor: "move",
           /* start: function(event, ui) { // turn TinyMCE off while sorting (if not, it won't work when resorted)
                 textareaID = $(ui.item).find('textarea.wp-editor-area').attr('id');
                 //var unique_id = $(ui.item).find('.et_key_unique').val();
                // var textareaID = "et-html-text-" + unique_id;
               // console.log(unique_id);
                console.log(textareaID);
                try { tinyMCE.execCommand('mceRemoveControl', false, textareaID); } catch(e){}
            },
            stop: function(event, ui) { // re-initialize TinyMCE when sort is completed
                // var unique_id =$(ui.item).find('textarea.wp-editor-area').attr('id');
                // var textareaID1 = "et-html-text-" + unique_id;
                //  console.log("kee1=="+textareaID1);
                 console.log("kee=="+textareaID);
                //try { tinyMCE.execCommand('mceAddControl', false, textareaID); } catch(e){}
                 tinymce.init({
                        selector: textareaID
                    });
            },*/
            update: function () {
                alterColumnsIndex();

                 var unique_id = $(this).closest('.et-each-tab-column').find('.et_key_unique').val();
                    var key21 = "et-html-text-" + unique_id;
                    
                      // var key1 = "et-html-text";
                      // var key21 = "et-html-text-" + unique_id;
                        //init tinymce
                        // tinymce.execCommand('mceRemoveEditor', false, key1);
                        // tinymce.execCommand('mceAddEditor', false, key21);
                        // quicktags({id: key21});

                    tinymce.init({
                        selector: key21
                    });
            }
        });

        function alterColumnsIndex() {
            var outer_wrapper = $container.find('.et_tab_append_wrapper'),
                    tabcolumns = outer_wrapper.find('.et-each-tab-column');
            for (var i = 0; i < tabcolumns.length; i++) {
                var current_column = tabcolumns.eq(i);
                var inputs = current_column.find('[name*="tab_items"]'),
                        random_string = randomString(10);
                for (var j = 0; j < inputs.length; j++) {
                    var current_input = inputs[j];
                    if (current_input.type !== undefined) {
                        current_input.setAttribute('name', current_input.getAttribute('name').replace(/item\[([a-zA-Z0-9]+)?\]/g, 'tab_items[' + random_string + ']'));
                    }
                }

                
                var labeltext = current_column.find('.et-tab-title').val();
                if(labeltext != ''){
                    current_column.find('.etab_title_text_disp').html(labeltext);
                }else{
                    current_column.find('.etab_title_text_disp').html('Tab ' + (i + 1));
                }
                current_column.find('.et-item-header-title').attr('data-count',(i + 1));
            }
        }
        /*
         * Random number generator
         */
        function randomString(len, charSet) {
            charSet = charSet || 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var randomString = '';
            for (var i = 0; i < len; i++) {
                var randomPoz = Math.floor(Math.random() * charSet.length);
                randomString += charSet.substring(randomPoz, randomPoz + 1);
            }
            return randomString;
        }

        $container.on('change', '.et-tab_icon-type', function () {
            var icon_type = $(this).val();
            if (icon_type == 'available_icon') {
                $(this).closest('.et-tab-cbody').find('.et_selection_icontype_wrapper .et_available_icon').fadeIn();
                $(this).closest('.et-tab-cbody').find('.et_selection_icontype_wrapper .et_upload_own_icon').fadeOut();
            } else if (icon_type == 'upload_own') {
                $(this).closest('.et-tab-cbody').find('.et_selection_icontype_wrapper .et_upload_own_icon').fadeIn();
                $(this).closest('.et-tab-cbody').find('.et_selection_icontype_wrapper .et_available_icon').fadeOut();
            } else {
                $(this).closest('.et-tab-cbody').find('.et_selection_icontype_wrapper .et_upload_own_icon').fadeOut();
                $(this).closest('.et-tab-cbody').find('.et_selection_icontype_wrapper .et_available_icon').fadeOut();
            }
        });

        $container.on('click', '.et-upload-icon-btn', function (e) {
            e.preventDefault();
            var $this = $(this);
            var image = wp.media({
                title: 'Upload Icon',
                multiple: false
            }).open()
                    .on('select', function (e) {
                        var uploaded_icon = image.state().get('selection').first();
                        var img_url = uploaded_icon.toJSON().url;
                        $($this).closest('.et-field-wrap').find('.et-image-url').val(img_url);
                        $($this).closest('.et-field-wrap').find('.et-iconpreview img').attr('src', img_url);
                    });
        });

        /*
         * Recent Posts call to action options
         */
        $container.on('change', '.et_show_ctaction', function () {
            if ($(this).prop('checked') == true) {
                $(this).closest('.et-recent-posts-comp-wrap').find('.et_show_call_to_action_options').slideDown('slow');
            } else {
                $(this).closest('.et-recent-posts-comp-wrap').find('.et_show_call_to_action_options').slideUp('slow');
            }
        });

         /*
         * Enable Tab Description 
         */
        $container.on('change', '.etab-show-description', function () {
            if ($(this).prop('checked') == true) {
                $(this).closest('.et-tab-cbody').find('.etab-enable-description-options').slideDown('slow');
            } else {
                $(this).closest('.et-tab-cbody').find('.etab-enable-description-options').slideUp('slow');
            }
        });

        /*
         * Show Date Format
         */
        $container.on('change', '.etab-showdate-options', function () {
            if ($(this).prop('checked') == true) {
                $(this).closest('.etab-separation-wrap').find('.etab-show-date-wrapper').slideDown('slow');
            } else {
                $(this).closest('.etab-separation-wrap').find('.etab-show-date-wrapper').slideUp('slow');
            }
        });


        $container.on('change', '.et_change_posts_type', function () {
            if ($(this).val() == 'product') {
                $(this).closest('.et_recent_posts_wrapper').find('.et-products-comp-wrap').slideDown('slow');
                $(this).closest('.et_recent_posts_wrapper').find('.et-recent-posts-comp-wrap').hide();
            } else {
                $(this).closest('.et_recent_posts_wrapper').find('.et-products-comp-wrap').hide();
                $(this).closest('.et_recent_posts_wrapper').find('.et-recent-posts-comp-wrap').slideDown('slow');
            }
        });
        /*
         * Google Map & Cform accordion 
         */
        $container.on('click','.et_cform_options',function (e) {
            if ($(this).next('.et-accordion').css('display') != 'block') {
                $(this).addClass('et-acc-active');
                $('.et-accordion-active').prev().removeClass('et-acc-active');
                $('.et-accordion-active').slideUp('fast').removeClass('et-accordion-active');
                $(this).next('.et-accordion').addClass('et-accordion-active').slideDown('slow');
            } else {
                $('.et-accordion-active').slideUp('fast').removeClass('et-accordion-active');
                $(this).removeClass('et-acc-active');
            }
        });

        $container.on('keyup', '.et-tab-title', function (e) {
            if($(this).val() == ''){
                var count = $(this).closest('.et-tab-item-inner').find('.et-item-header-title').attr('data-count');
                $(this).closest('.et-tab-item-inner').find('.etab_title_text_disp').text('Tab '+count);
            }else{
                $(this).closest('.et-tab-item-inner').find('.etab_title_text_disp').text($(this).val());
           } 
        });

        /*
         * Shortcode auto copy
         */
        $('.etab-usage-trigger').click(function () {
            $('.etab-usage-trigger').removeClass('etab-active');
            $(this).addClass('etab-active');
            var active_tab_key = $('.etab-usage-trigger.etab-active').data('usage');
            $('.etab-usage-post').hide();
            $('.etab-usage-post[data-usage-ref="' + active_tab_key + '"]').show();
        });

        $('.et-short-code,.et-short-code2').click(function () {
            if ($(this).attr('id') == "sc") {
                $(this).focus();
                $(this).select();
                document.execCommand('copy');
                $(this).siblings('.et-copied-info').show().delay(1000).fadeOut();
            } else {
                $(this).focus();
                $(this).select();
                document.execCommand('copy');
                $(this).siblings('.et-copied-info2').show().delay(1000).fadeOut();
            }
        });

        $('.egpr-shortcode-display-value').click(function () {
            $(this).focus();
            $(this).select();
            document.execCommand('copy');
            $(this).siblings('.et-copied-info').show().delay(1000).fadeOut();
        });


        $('.etab-show-feeds-btn').on('change', function () {
            if ($(this).prop('checked') == true) {
                $(this).closest('.et-fb-feeds-type-wrap').find('.etab-show-feeds').slideDown('slow');
            } else {
                $(this).closest('.et-fb-feeds-type-wrap').find('.etab-show-feeds').slideUp('slow');
            }
        });

        //Clear Cache
        var cache_message = et_admin_params.clear_cache_msg;
        $('#et-clear-cache-btn').click(function () {
            $.ajax({
                url: ajaxurl,
                type: 'post',
                dataType: 'html',
                data: {
                    action: 'etab_clear_cache',
                    nonce: ajaxnonce,
                },
                beforeSend: function () {
                    $('.etab-ajax-loader').show('slow');
                },
                complete: function () {
                    $('.etab-ajax-loader').hide('slow');
                },
                success: function (resp) {
                    if (resp == "success") {
                        $('#etab-reset-message').html(cache_message).delay(2000).fadeOut();
                    } else {
                        $('#etab-reset-message').html(resp).delay(2000).fadeOut();
                    }
                }
            });
        });


        $('#et-background-image').on('click', '.et-upload-bgimage-btn', function (e) {
            e.preventDefault();
            var $this = $(this);
            var image = wp.media({
                title: 'Upload Background Image',
                multiple: false,
                //  library: {
                //  type: [ 'video']
                // },
            }).open()
                    .on('select', function (e) {
                        var uploaded_icon = image.state().get('selection').first();
                        var img_url = uploaded_icon.toJSON().url;
                        $($this).closest('.et-field-wrap').find('.et-bgimage-url').val(img_url);
                        $($this).closest('.et-field-wrap').find('.et-bgpreview img').attr('src', img_url);
                    });
        });


      $(".etaborientation").change(function() {
        if ($(this).data('options') === undefined) {
          /*Taking an array of all options-2 and kind of embedding it on the select1*/
          $(this).data('options', $('#etab_tabpositionn option').clone());
        }
        var datatype = $(this).val();
      //  alert(datatype);
        var options = $(this).data('options').filter('[data-type=' + datatype + ']');
        $('#etab_tabpositionn').html(options);
      });


    });//$(function () end
}(jQuery));
var j,k;
 function create_randomString(len, charSet) {
        charSet = charSet || 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var randomString = '';
        for (var i = 0; i < len; i++) {
            var randomPoz = Math.floor(Math.random() * charSet.length);
            randomString += charSet.substring(randomPoz,randomPoz+1);
        }
        return randomString;
 }
/*
* Generate Shortcode Feature
*/
function insert_gsc_editor($=jQuery){

         var total_tab = $('#etab_total_tab').val();
         var template = ($(".etab_templates option:selected").val() != '')?$(".etab_templates option:selected").val() :'template1';
         var orientation = ($(".etaborientation option:selected").val() != '')?$(".etaborientation option:selected").val() :'horizontal';
         var column = ($(".etab_column option:selected").val() != '')?$(".etab_column option:selected").val() :'6';
         var animation = ($(".et_tab_animations option:selected").val() != '')?$(".et_tab_animations option:selected").val() :'';
         if(orientation == "horizontal"){
            var position = ($(".etab_position option:selected").val() != '')?$(".etab_position option:selected").val() :'top-left';
           }else{
             var position = ($(".etab_position option:selected").val() != '')?$(".etab_position option:selected").val() :'vertical-top-left';
          }
          var icon_position = ($(".etab_icon_position option:selected").val() != '')?$(".etab_icon_position option:selected").val() :'left';
          var event_trigger = ($(".etab_event_trigger option:selected").val() != '')?$(".etab_event_trigger option:selected").val() :'left';
          var random_string = create_randomString(10);
          var etab = "[everest_tabs_wrap orientation='"+orientation+"' template='"+template+"' column='"+column+"' position='"+position+"' icon_position='"+icon_position+"' event_trigger='"+event_trigger+"']";
          etab += "[everest_tab_title_wrap tab_id='etab-"+random_string+"']";
      for (j = 1; j<=total_tab; j++) {
        if(j == 1){
          etab += "[everest_tab id='tab"+j+random_string+"' title='Title"+j+"' active='1'][/everest_tab]";
        }else{
          etab += "[everest_tab id='tab"+j+random_string+"' title='Title"+j+"'][/everest_tab]";
        }
      }
      etab += "[/everest_tab_title_wrap][everest_tab_content_wrap]";
      for (k = 1; k<=total_tab;k++) {
       if(animation != ''){
            etab += "[everest_tab_content trigger='tab"+k+random_string+"' tab_id='etab-"+random_string+"' animation='"+animation+"'] Content"+k+" [/everest_tab_content]";
       }else{
            etab += "[everest_tab_content trigger='tab"+k+random_string+"' tab_id='etab-"+random_string+"'] Content"+k+" [/everest_tab_content]";
       }
      }
      etab += "[/everest_tab_content_wrap]";
      etab += "[/everest_tabs_wrap]";  
      $('.etab-generated-shortcode').text('');
      $('.etab-generated-shortcode').text(etab);
}

function etabFbinit(data) {
    var el = document.querySelector('#etab-fetch-facebook-wrap');
    if (!el)
        return;
    var fbConnectBtn = el.querySelector('#etab_fb_connect');
    WPacFastjs.on(fbConnectBtn, 'click', function() {
        etabfb_connect(el, data);
        return false;
    });
}

function etabfb_popup(url, width, height, cb) {
    var top = top || (screen.height / 2) - (height / 2),
            left = left || (screen.width / 2) - (width / 2),
            win = window.open(url, '', 'location=1,status=1,resizable=yes,width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);
    function check() {
        if (!win || win.closed != false) {
            cb();
        } else {
            setTimeout(check, 100);
        }
    }
    setTimeout(check, 100);
}

function etabfb_connect(el, data) {

    etabfb_popup('https://app.widgetpack.com/auth/fbrev?scope=manage_pages,pages_show_list,pages_read_engagement,pages_read_user_content', 670, 520, function() {
        WPacXDM.get('https://embed.widgetpack.com', 'https://app.widgetpack.com/widget/facebook/accesstoken', {}, function(res) {
            WPacFastjs.jsonp('https://graph.facebook.com/me/accounts', {access_token: res.accessToken, limit: 250}, function(res) {

                var pagesEl = el.querySelector('.etab-fb-pages'),
                        idEl = el.querySelector('.etab-fb-profile-id'),
                        nameEl = el.querySelector('.etab-fb-profile-name'),
                        tokenEl = el.querySelector('.etab-fb-access-token'),
                        businessPhoto = el.querySelector('.etab-business-photo'),
                        businessPhotoImg = el.querySelector('.etab-business-photo-img');

                WPacFastjs.each(res.data, function(page) {

                    var pageEL = WPacFastjs.create('div', 'etab-fb-page');
                    pageEL.innerHTML = '<img src="https://graph.facebook.com/' + page.id + '/picture" class="et-page-photo">' +
                            '<div class="etab-fb-profile-name">' + page.name + '</div>';
                    pagesEl.appendChild(pageEL);
                    WPacFastjs.on(pageEL, 'click', function() {
                        idEl.value = page.id;
                        nameEl.value = page.name;
                        tokenEl.value = page.access_token;
                        jQuery(tokenEl).change();
                        if (businessPhoto)
                        {
                            businessPhoto.value = '';
                            businessPhotoImg.src = 'https://graph.facebook.com/' + page.id + '/picture';
                            WPacFastjs.show2(businessPhotoImg);
                        }

                        WPacFastjs.remcl(pagesEl.querySelector('.active'), 'active');
                        WPacFastjs.addcl(pageEL, 'active');
                        data.cb && data.cb();
                        return false;
                    });
                });
            });
        });
    }
    );
    return false;
}