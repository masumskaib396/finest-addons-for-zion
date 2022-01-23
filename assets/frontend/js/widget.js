(function ($) {

    "use strict";

    // alert("hellow orld");


    $( document ).ready(function() {

    });




        var $animatedWrapper = $( '.fzb__animate-text-wraper' ),
        $settings = $animatedWrapper.data('settings')

        var $id = $settings.id

        var typed = new Typed( '#'+$id, {
            strings: $settings.type_heading,
            loop: true,
            loopCount: Infinity,
            typeSpeed: $settings.type_speed,
            backSpeed: $settings.back_type_speed,
            showCursor : $settings.show_cursor,
            loop: $settings.loop,
            fadeOut:$settings.fade_out,
        });






})(jQuery);



