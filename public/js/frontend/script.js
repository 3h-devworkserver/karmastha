(function($) {

    function overflow(){
        $('#hamburger').click(function(){
            $('body').toggleClass('toggle-overflow');
        });
        $('.closebtn').click(function(){
            $('body').removeClass('toggle-overflow');
        });
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
            margin:15,
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
        $('.five-col .owl-carousel').owlCarousel({
            loop:true,
            margin:15,
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
                    items:5
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
                    items:6
                }
            }
        })
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

    function menuslidedown(){

        $(".total-calculate").click(function(){
        $("#billingopt").slideToggle();
    }); 
    }
    
    $(document).ready(function() {
       overflow();
       homeBanner();
       productCarousel();
       businessMemberCarousel();
       trendingCarousel();
       cart();
       menuslidedown();
    });
    $(window).resize(function() {
    });
    $(window).scroll(function() {
    });
    $(window).load(function() {
    });
})(window.jQuery);
