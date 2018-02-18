//APP Javascript



( function($){

    var nav = $("#masthead");
    var above = $("header").height();

    $( window ).on('scroll', function(){

        if( $( this ).scrollTop() > above){
            nav.addClass("sticky-nav");
        }else{
            nav.removeClass("sticky-nav");
        }

    });

})(jQuery);