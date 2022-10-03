$(document).ready(function(){

    AOS.init();

    if( $('html').attr('dir') == 'rtl'){
        var dir = true;
    }else{
        var dir = false;
    }

    
    $('.partner img').hover(function(){
        
        $('.map text').css('display','none');
        let count = $(this).data('count');
        let id = $(this).data('id');


        $("path[data-name="+id+"]").attr('fill','#233D3B');
        $("text[data-name="+id+"]").css('display','block');
        //$('#'+id).attr('fill','#233D3B');
        //$('<textPath xlink:href="#'+id+'">'+count+'</textPath>').insertAfter($('#'+id));
        
    })

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
            var header = $('header').height();
            
            if ($(window).scrollTop() >= header && !$('body').hasClass('page-contact-us')) {
                navigatoinBar.addClass('navbar-fixed-top');
            } else{
                navigatoinBar.removeClass('navbar-fixed-top');
            }
        });
    }
    animateNavigationBar();

    $(".page-home .hero").on("wheel", function(e) {
        e.preventDefault();

        let section_id = $(this).index();
        let how_section = $('#how').index();

        
        $('body').children().each(function( index ) {

          if(index === section_id && how_section !=  section_id ){
            handle_wheel_event(e.originalEvent , index , 0);  
          }

        });

        function handle_wheel_event(e, index ,slick_is_animating) {
          

            // do not trigger a slide change if another is being animated
            if (!slick_is_animating) {
              // pick the larger of the two delta magnitudes (x or y) to determine nav direction
              var direction =
                Math.abs(e.deltaX) > Math.abs(e.deltaY) ? e.deltaX : e.deltaY;

                if (direction > 0 ) {

                    if($('.hero h1').hasClass('active')){
                        $("html, body").stop().animate({scrollTop:$('#about').offset().top}, 1);

                    }else {
                        $('.hero h1').addClass('active');
                        $('.hero h1').removeData('zoom-out-down').attr('data-aos', 'zoom-in-up');
                        let count = 1 ;
                        return false;

                    }

                }else {
                    $('.hero h1').removeClass('active');
                    let count = 0 ;
                }
              
            }
          }
  

        

    });



  

});
  

