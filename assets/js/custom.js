$('#service-block').owlCarousel({
    loop:false,
    margin:20,
	dots:false,
	autoplay:false,
	autoplayTimeout:2000,
	autoplayHoverPause:false,
    nav:true,
	navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
});

$('#client-block').owlCarousel({
    loop:true,
    margin:20,
	dots:false,
	autoplay:false,
	autoplayTimeout:2000,
	autoplayHoverPause:false,
    nav:false,
	navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:2
        }
    }
});

$("#slider1").revolution({
                sliderType:"standard",
                sliderLayout:"auto",
                delay:7000,
                startwidth:1170,
                startheight:500,
                
                navigationType:"bullet",
                navigationArrows:"0",
                navigationStyle:"preview3",

                dottedOverlay:'yes',
                
                hideTimerBar:"off",
                onHoverStop:"off",
                navigation: {
                    onHoverStop: 'off',
                    touch:{
                        touchenabled:"on"
                    },
                    arrows: {
                        style:"zeus",
                        enable:true,
                        hide_onmobile:true,
                        hide_under:820,
                        hide_onleave:true,
                        hide_delay:200,
                        hide_delay_mobile:1200,
                        tmp:'<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 15,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 15,
                            v_offset: 0
                        }
                    },
                }, 
                gridwidth: [1170],
                gridheight: [550]
            });