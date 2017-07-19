(function($) {
    function menuslidedown(){
        $(".navigation-items li").hover(
            function() {
              $('.submenu-container', this).stop( true, true ).slideDown("fast");
              $(this).toggleClass('open');
            },
            function() {
              $('.submenu-container', this).stop( true, true ).slideUp("fast");
              $(this).toggleClass('open');
            }
          );
    }
    function homeBanner(){
        $('.banner-wrapper .owl-carousel').owlCarousel({
            items: 1,
            loop: true,
            dots:true,
            margin:0,
            nav: true,
            navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],                
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true
            
        });
    }

    function productCarousel(){
        $('.four-col .owl-carousel').owlCarousel({
            loop:true,
            margin:30,
            dots:false,
            nav:true,
            navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
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
        })
    }

    function trendingCarousel(){
        $('.three-col .owl-carousel').owlCarousel({
            loop:true,
            margin:30,
            dots:false,
            nav:true,
            navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        })
    }
    
    function businessMemberCarousel(){
        $('.brands-wrapper .owl-carousel').owlCarousel({
            loop:true,
            margin:30,
            dots:false,
            nav:true,
            navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    }

    function filterProducts(){
       jQuery( "#range-search-slider" ).slider({
            range: true,
            values: [ 99, 9000 ],
            min: 99,
            max: 9000,
            slide: function( event, ui ) {
            jQuery( "#min-price" ).val( ui.values[ 0 ] );
            jQuery( "#max-price" ).val( ui.values[ 1 ] );
            jQuery( ".comp_est_year_num" ).text( ui.value );
            },
            stop: function() {
            jQuery('#companies_current_page').val('1');
            }  
            });
            jQuery( "#advance-search-slider" ).slider({
            range: "min",
            value: 100,
            min: 1,
            max: 1000,
            slide: function( event, ui ) {
            jQuery( "#geo-radius" ).val( ui.value );
            jQuery( "#geo-radius-search" ).val( ui.value );
            }
            });
            jQuery( "#geo-radius" ).val( jQuery( "#advance-search-slider" ).slider( "value" ) );
            jQuery( "#geo-radius-search" ).val( jQuery( "#advance-search-slider" ).slider( "value" ) );
    }

    function cart(){
        //-- Click on QUANTITY
            $(".btn-minus").on("click",function(){
                var now = $(".qty-section > div > input").val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1 > 0){ now--;}
                    $(".qty-section > div > input").val(now);
                }else{
                    $(".qty-section > div > input").val("1");
                }
            })            
            $(".btn-plus").on("click",function(){
                var now = $(".qty-section > div > input").val();
                if ($.isNumeric(now)){
                    $(".qty-section > div > input").val(parseInt(now)+1);
                }else{
                    $(".qty-section > div > input").val("1");
                }
            });       
    }
    
    
    $(document).ready(function() {
       menuslidedown(); 
       homeBanner();
       productCarousel();
       businessMemberCarousel();
       trendingCarousel();
       filterProducts();
       cart();
    });
    $(window).resize(function() {
    });
    $(window).scroll(function() {
    });
    $(window).load(function() {
    });
})(window.jQuery);
