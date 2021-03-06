(function($) {

    function overflow(){
        $('#hamburger').click(function(){
            $('body').toggleClass('toggle-overflow');
        });
        $('.closebtn').click(function(){
            $('body').removeClass('toggle-overflow');
        });
    }

    function headSearch() { 

        $('a[href="#toggle-search"], .bootsnipp-search .input-group-btn > .btn[type="reset"]').on('click', function(event) {
        event.preventDefault();
            $('.bootsnipp-search .input-group > input').val('');
            $('.bootsnipp-search').toggleClass('open');
            $('a[href="#toggle-search"]').closest('a').toggleClass('active');

            if ($('.bootsnipp-search').hasClass('open')) {
              /* I think .focus dosen't like css animations, set timeout to make sure input gets focus */
              setTimeout(function() { 
                $('.bootsnipp-search .form-control').focus();
              }, 100);
            }     
        });

      $(document).on('keyup', function(event) {
        if (event.which == 27 && $('.bootsnipp-search').hasClass('open')) {
          $('a[href="#toggle-search"]').trigger('click');
        }
      });
        
    };

    function slideheader(){
        $("button.dropdown-toggle").click(function(){
            $("topslide-header").slideToggle();
        });
    };
    
    function homeBanner(){
        $('.banner-wrapper .owl-carousel').owlCarousel({
            items: 1,
            loop: true,
            dots:false,
            margin:0,
            nav: true,
            navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],                
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            
        });
    }

    function productCarousel(){
        $('.four-col .owl-carousel').owlCarousel({
            stagePadding: 50,
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
                    // items:4
                    items:3
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
        // $('.brands-wrapper .owl-carousel').owlCarousel({
        $('.aaaa').owlCarousel({
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

    // function cart(){
    //     //-- Click on QUANTITY
    //         $(".btn-minus").on("click",function(){
    //             var now = $(".qty-section > div > input").val();
    //             if ($.isNumeric(now)){
    //                 if (parseInt(now) -1 > 0){ now--;}
    //                 $(".qty-section > div > input").val(now);
    //             }else{
    //                 $(".qty-section > div > input").val("1");
    //             }
    //         })            
    //         $(".btn-plus").on("click",function(){
    //             var now = $(".qty-section > div > input").val();
    //             if ($.isNumeric(now)){
    //                 $(".qty-section > div > input").val(parseInt(now)+1);
    //             }else{
    //                 $(".qty-section > div > input").val("1");
    //             }
    //         });       
    // }

//start -- method modified for quantity validation -- yojan
    function cart(){
        //-- Click on QUANTITY
            $(".btn-minus").on("click",function(){
                // alert('minus');
                var elem = $(this).next();
                var min =elem.attr('min');
                var max =elem.attr('max');
                var now = elem.val();
                if ($.isNumeric(now)){
                    if (parseInt(now) > min){ 
                        now--;
                        // $('.QtyValidation span').addClass('hide');
                        elem.closest('.qty-section').find('.QtyValidation span').addClass('hide');
                    }else{
                        //console.log(elem.closest('div.cart-review-content').find('.QtyValidation span'))
                        elem.closest('.qty-section').find('.QtyValidation span').text('Minimum quantity selected.').removeClass('hide');
                        // $('.QtyValidation span').text('Minimum quantity selected.').removeClass('hide');
                    }
                    elem.val(now);
                }else{
                    elem.val(min);
                }
                if (elem.closest('.cart-qty').find('.update-qty').length == 1) {
                    elem.closest('.cart-qty').find('.update-qty').removeClass('hide');
                }

            })            
            $(".btn-plus").on("click",function(){
                // alert('plus');
                var elem = $(this).prev();
                var min =elem.attr('min');
                var max =elem.attr('max');
                var now = elem.val();
                if ($.isNumeric(now)){
                    if (parseInt(now) < max) { 
                        now++;
                        elem.closest('.qty-section').find('.QtyValidation span').addClass('hide');
                    }else{
                        elem.closest('.qty-section').find('.QtyValidation span').text('Maximum quatity selected.').removeClass('hide');
                    }
                    elem.val(now);
                }else{
                    elem.val(min);
                }
                if (elem.closest('.cart-qty').find('.update-qty').length == 1) {
                    elem.closest('.cart-qty').find('.update-qty').removeClass('hide');
                }
            });       
    }
    //end --- method modified for quantity validation -- yojan

    function menuslidedown(){

        $(".switch .total-calculate").click(function(){
        $("#billingopt").slideToggle();
    }); 
    }
    
    $(document).ready(function() {
       overflow();
       headSearch();
       slideheader();
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
