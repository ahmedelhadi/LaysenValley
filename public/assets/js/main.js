$(document).ready(function(){

    if( $('html').attr('dir') == 'rtl'){
        var dir = true;
    }else{
        var dir = false;
    }


    $('.slider').slick({
        slidesToShow: 1,
        arrows: false,
        dots: false,
        autoplay:true,
        rtl: dir,

    });


    // $('.slick-slide').SmokeEffect({

    //     color: 'white',
    //     opacity: 0.1,

    // });


    // -----------------------------------------------------------------------------
    // DESKTOP NAVIGATION BAR
    // -----------------------------------------------------------------------------
    function animateNavigationBar(){
        let navigatoinBar = $('#navbar');
        $(window).scroll(function() {
            if ($(window).scrollTop() >= 1) {
                navigatoinBar.addClass('navbar-fixed-top');
            } else{
                navigatoinBar.removeClass('navbar-fixed-top');
            }
        });
    }
    animateNavigationBar();

  
  

});
  

