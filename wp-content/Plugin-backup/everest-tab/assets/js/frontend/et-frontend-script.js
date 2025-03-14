/*
 * Frontend JS Script Version 1.1.2
 */
(function ($) {
    $(function () {

       var maps = [];
       var markers = [];
       var woocommerce_enabled = etab_params.check_woocommerce_enabled;

       $('.etab-group-wrap').each(function() {
        $(this).children('.etab-label').wrapAll("<div class='etab-header-wrap clearfix'><ul class='etab-title-tabs'></ul></div>");
       });
       if(woocommerce_enabled == "true"){
         $('.everest-tab-main-wrapper').each(function(){
          $(this).addClass('woocommerce');
         });
       }

    $( window ).resize(function() {
       if($(window).width() >= 570){
          $('.everest-tab-main-wrapper').each(function(){
            if($(this).hasClass('etab-top-compact-position') || $(this).hasClass('etab-bottom-compact-position')){
              var num = $(this).find('.etab-header-wrap .etab-title-tabs li').length;
              var eachwidth = 100 / parseInt(num);
              $(this).find('.etab-header-wrap .etab-label').css({
                width: eachwidth + '%'
              });
            }

          });
       }

      $('.everest-tab-main-wrapper').each(function(){
        var trigger_type = $(this).attr('data-tab_trigger_type');
         $(this).find('.etab-label .etab-content-section').hide();
           if($(window).width() <= 767){
              var accordion_check = $(this).attr('data-accordion');
              if(trigger_type == "on_hover"){
               $(this).removeClass('etab-trigger-on_hover').addClass('etab-trigger-on_click');
              }
              if(accordion_check){
                $(this).find('.etab-content-wrap').hide();
                $(this).find('.etab-label.etab-active-show .etab-content-section.etab-active-content').show();
              }else{
               $(this).find('.etab-content-wrap').show();
               $(this).find('.etab-label .etab-content-section').hide();
              }

          }else{
               if(trigger_type == "on_hover"){
                $(this).removeClass('etab-trigger-on_click').addClass('etab-trigger-on_hover');
               }
               $(this).find('.etab-content-wrap').show();
               $(this).find('.etab-label .etab-content-section').hide();
          }
       });
  }).resize();

      $('.etab-label').each(function() {
        if( $(this).hasClass('etab-active-show')){
        var unique_id = $(this).parent().attr('data-id');
         var id= $(this).attr('id');
        $(this).closest('.etab-sc-main-wrapper').find('.'+unique_id+'.'+id).addClass("etab-active-content");
        }
       });


      /*
       * Tab Click Event
      */
     $(".etab-trigger-on_click").on('click', '.etab-title-tabs > .etab-label.etab-prelink', function(e){
      e.preventDefault();
       var deeplinkingcheck = $(this).parent('.etab-title-tabs').attr('data-deeplinking');
        var accordioncheck = $(this).parent('.etab-title-tabs').attr('data-accordion');
        if(deeplinkingcheck){
            var hashvalue = $(this).find('a').attr('href');
            var tabtype = $(this).find('a').attr('data-tabtype');
            if(tabtype == "component_type"){
             var tab_id = $(this).attr('id');
             var tab_parent_id = $(this).parent().data('id');
             var animation = $(this).closest('.etab-sc-main-wrapper').find('.'+tab_id).data('animation');
           /*  if($(this).parent().data('deeplinking')){
                 var hash = '#' + $(this).data('link');
                 $(this).find('a').attr('href',hash);
                 window.location.hash = hashvalue;
             }*/
         if(accordioncheck && $(window).width() < 768){
            if(window.location.hash != hashvalue){
             if($(this).hasClass('etab-active-show')){
               $(this).siblings().removeClass("etab-active-show");
               $(this).closest('.etab-sc-main-wrapper').find('.etab-content-section').removeClass('etab-active-content');
               $(this).closest('.etab-sc-main-wrapper').find('.etab-content-section.'+tab_parent_id).removeClass('etab-active-content');
            }else{
              $(this).siblings().removeClass("etab-active-show");
              $(this).addClass("etab-active-show");
              $(this).closest('.etab-sc-main-wrapper').find('.etab-content-section.'+tab_parent_id).removeClass('etab-active-content');
              $(this).closest('.etab-sc-main-wrapper').find('.'+tab_id).addClass("etab-active-content").addClass(animation);
            }
           }
         }else{
             $(this).siblings().removeClass("etab-active-show");
             $(this).addClass("etab-active-show");
             $(this).closest('.etab-sc-main-wrapper').find('.etab-content-section.'+tab_parent_id).removeClass('etab-active-content');
             $(this).closest('.etab-sc-main-wrapper').find('.'+tab_id).addClass("etab-active-content").addClass(animation);
            }
          if($('.'+tab_id).find('.etab-google-map').length > 0){
               setTimeout(function () {
                initMap();
               }, 1500);
            }
         }
         window.location.hash = hashvalue;
       }else{
            var tabtype = $(this).find('a').attr('data-tabtype');
            if(tabtype == "component_type"){
            var tab_id = $(this).attr('id');
            var tab_parent_id = $(this).parent().data('id');
            var animation = $(this).closest('.etab-sc-main-wrapper').find('.'+tab_id).data('animation');
            if(accordioncheck && $(window).width() < 768){
             if(!$(this).hasClass('etab-active-show')){
                $('.etab-label').removeClass("etab-active-show");
                $(this).addClass("etab-active-show");
                $(this).closest('.etab-sc-main-wrapper').find('.etab-content-section.'+tab_parent_id).removeClass('etab-active-content');
                $(this).closest('.etab-sc-main-wrapper').find('.'+tab_id).addClass("etab-active-content").addClass(animation);
             }else{
              $('.etab-label').removeClass("etab-active-show");
              $(this).closest('.etab-sc-main-wrapper').find('.etab-content-section.'+tab_parent_id).removeClass('etab-active-content');
             }
           }else{
            if(!$(this).hasClass('etab-active-show')){
                $('.etab-label').removeClass("etab-active-show");
                $(this).addClass("etab-active-show");
                $(this).closest('.etab-sc-main-wrapper').find('.etab-content-section.'+tab_parent_id).removeClass('etab-active-content');
                $(this).closest('.etab-sc-main-wrapper').find('.'+tab_id).addClass("etab-active-content").addClass(animation);

             }else{
             }

           }

            if($('.'+tab_id).find('.etab-google-map').length > 0){
               setTimeout(function () {
                initMap();
               }, 1500);
              }
             }
           /* }
            else{
            var tab_parent_id = $(this).parent().data('id');
              $(this).removeClass("etab-active-show");
              $(this).closest('.etab-sc-main-wrapper').find('.etab-content-section.'+tab_parent_id).removeClass('etab-active-content');
            } */
        }
     }).on('click', 'div.etab-content-section', function(e) {
      // clicked on descendant div
      //e.stopPropagation();
    });

      $('.etab-label.etab-prelink').each(function(){
        //var hash = '#' + $(this).find('a').attr('href');
        var hash = $(this).find('a').attr('href');
        if(hash == window.location.hash){
             $(this).click();
             var top = ($('a[href='+hash+']').offset() || { "top": NaN }).top;
              $('html, body').animate({
                scrollTop: (top)
              }, 2000);
        }
      });

      $(window).on('hashchange', function(){
          /*var hash =  $('.etab-label.etab-prelink').find('a[href="'+location.hash+'"]');
          var locationhash = location.hash;
          $(hash).click();*/
        var hash = $.trim(window.location.hash);
        var $link =  $('.etab-label.etab-prelink').find('a[href="'+hash+'"]');
        if (!$link.parent().hasClass('.etab-active-show')) {
          $link.trigger('click'); // Pass the flow to onclick handler
        }
       });

       /*
       * On Hover Tab
       */
      $('.etab-trigger-on_hover').on('mouseenter mouseleave','.etab-label.etab-prelink',function(e) {
        e.preventDefault();
           if(!$(this).hasClass('etab-active-show')){
            var tabtype = $(this).find('a').attr('data-tabtype');
            if(tabtype == "component_type"){
            var tab_id = $(this).attr('id');
            var tab_parent_id = $(this).parent().data('id');
            var animation = $(this).closest('.etab-sc-main-wrapper').find('.'+tab_id).data('animation');
            $(this).siblings().removeClass('etab-active-show');
            $(this).addClass("etab-active-show");
            $(this).closest('.etab-sc-main-wrapper').find('.etab-content-section.'+tab_parent_id).removeClass('etab-active-content');
            $(this).closest('.etab-sc-main-wrapper').find('.'+tab_id).addClass("etab-active-content").addClass(animation);;
            if($('.'+tab_id).find('.etab-google-map').length > 0){
               setTimeout(function () {
                initMap();
               }, 1500);
            }
            }
           }
        });


        function initMap(var_lati,var_long) {
            var $maps = $('.etab-google-map');
            $.each($maps, function (i, value) {
                var zoom_level = parseInt($(value).data('zoomlevel'));
                var varlocation = { lat: parseFloat($(value).data('latitude')), lng: parseFloat($(value).data('longitude')) };

                var mapDivId = $(value).attr('id');

                maps[mapDivId] = new google.maps.Map(document.getElementById(mapDivId), {
                    zoom: zoom_level,
                    center: varlocation
                });

                markers[mapDivId] = new google.maps.Marker({
                    position: varlocation,
                    map: maps[mapDivId]
                });
            });
        }
        initMap();
    }); /** Function ends */

}(jQuery));


