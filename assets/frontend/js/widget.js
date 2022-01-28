(function ($) {

    "use strict";

    // alert("hellow orld");


    $( document ).ready(function() {

    });



        $(function() {

            var comparisonWrapper = $( '.fzb__comparison--wraper' ),

            // if( comparisonWrapper.length === 0 )
            //     return;

            $comparison = comparisonWrapper.data('comparison')


            $("#fzb__comparison--active").twentytwenty({
                default_offset_pct: $comparison.default_offset_pct,
                orientation: $comparison.orientation,
                before_label: 'January 2017',
                after_label: 'March 2017',
                no_overlay: true,
                move_slider_on_hover: false,
                move_with_handle_only: true,
                click_to_move: true
            });

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



