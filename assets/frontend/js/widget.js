(function ($) {

    "use strict";

    // alert("hellow orld");


    $( document ).ready(function() {

    });



        $("#container1").twentytwenty({
              default_offset_pct: 0.7,
              orientation: 'vertical',
              before_label: 'January 2017',
              after_label: 'March 2017',
              no_overlay: true,
              move_slider_on_hover: false,
              move_with_handle_only: true,
              click_to_move: true
          });


          $(function() {
            var animatedWrapper = $( '.fzb__animate-text-wraper' ),
                settings = animatedWrapper.data('settings')

            $("#fzb-animate-text-id").typed({

                strings:settings.type_heading,
                typeSpeed: settings.type_speed,
                backSpeed: settings.back_type_speed,
                showCursor : settings.show_cursor,
                loop: settings.loop,
            });
          });







})(jQuery);



