
(function($) {
    "use strict";

/* ********************************************  
    Offset for Main Navigation
******************************************** */
    /*$('header').affix({
        offset: {
            top: 1
        }
    });*/


  /* ********************************************
    Tooltip 
  ******************************************** */
    $('[data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'top',
        container: 'body'
    });

  

  /* ********************************************
    Elevate Zoom active 
  ******************************************** */    
    $("#zoom_03").elevateZoom({
        constrainType: "height",
        zoomType: "lens",
        containLensZoom: true,
        gallery: 'gallery_01',
        cursor: 'pointer',
        galleryActiveClass: "active"
    });

    //pass the images to Fancybox
    $("#zoom_03").on("click", function(e) {
        var ez = $('#zoom_03').data('elevateZoom');
        $.fancybox(ez.getGalleryList());
        return false;
    });

  /* ********************************************
    single-product-zoom-image carousel
  ******************************************** */ 
    $('.carousel-btn').slick({
        speed: 700,
        arrows: true,
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="arrow-prev"><i class="fa fa-long-arrow-left"></i></button>',
        nextArrow: '<button type="button" class="arrow-next"><i class="fa fa-long-arrow-right"></i></button>',
        responsive: [
            { breakpoint: 991, settings: { slidesToShow: 3 }  },
            { breakpoint: 767, settings: { slidesToShow: 3 }  },
            { breakpoint: 479, settings: { slidesToShow: 3 }  }
        ]
    });

  /* ********************************************
    Cart Plus Minus Button
  ******************************************** */
    // $(".cart-plus-minus").prepend('<div class="dec qtybutton">-</div>');
    // $(".cart-plus-minus").append('<div class="inc qtybutton">+</div>');
    // $(".qtybutton").on("click", function() {
    //     var $button = $(this);
    //     var oldValue = $button.parent().find("input").val();
    //     if ($button.text() == "+") {
    //         var newVal = parseFloat(oldValue) + 1;
    //     } 
    //     else {
    //         // Don't allow decrementing below zero
    //         if (oldValue > 0) {
    //             var newVal = parseFloat(oldValue) - 1;
    //         } 
    //         else {
    //             newVal = 0;
    //         }
    //     }
    //     $button.parent().find("input").val(newVal);
    // });

    //-- modified by yojan
    $(".cart-plus-minus").prepend('<div class="dec qtybutton">-</div>');
    $(".cart-plus-minus").append('<div class="inc qtybutton">+</div>');
    $(".qtybutton").on("click", function() {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        
        var minValue = $button.parent().find("input").attr('min');
        var maxValue = $button.parent().find("input").attr('max');
        if(!minValue) minValue = 1;
        if(!maxValue) maxValue = 9999999999999;

        if ($button.text() == "+") {
            if (oldValue < maxValue) {
                var newVal = parseFloat(oldValue) + 1;
            } 
            else {
                newVal = maxValue;
            }
        } 
        else {
            // Don't allow decrementing below zero
            if (oldValue > minValue) {
                var newVal = parseFloat(oldValue) - 1;
            } 
            else {
                newVal = minValue;
            }
        }
        $button.parent().find("input").val(newVal);
    });

 



})(jQuery);
