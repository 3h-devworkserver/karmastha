$(window).scroll(function(){
	var sticky = $('.navbar-fixed-top'),
	    scroll = $(window).scrollTop();

	if (scroll >= 100) sticky.addClass('fixed');
	else sticky.removeClass('fixed');
});

$(function() {

// $(document).on('click','.wishlist',function(e){
//    var id = $(this).attr('data-id')
//    var name = $(this).attr('data-name')
//    var price = $(this).attr('data-price')
//    data = {
//     id : id,
//     name:name,
//     price:price
//    };
//     $.ajax({
//                 data: JSON.stringify(data),
//                 dataType: 'application/json',
//                 url: base_url + '/wishlist',
//                 type: 'POST',
//                 contentType: 'application/json; charset=utf-8',
//                 success: function (result) {
//                     alert(result);
//                 },
//                 failure: function (errMsg) {
//                     alert(errMsg);
//                 }
//             })
           

// })
    $('#slides').slidesjs({
        width: 940,
        height: 528,
        navigation: {
          effect: "fade"
        },
        pagination: {
          effect: "fade"
        },
        effect: {
          fade: {
            speed: 1800
          }
        },
        play: {
          effect: "fade",
          auto: true
        }
    });
});

 $(window).load(function() {
    $("#flexisel_slider").flexisel({
        visibleItems: 4,
        itemsToScroll: 3,
        animationSpeed: 200,
        infinite: false,
        navigationTargetSelector: null,
        autoPlay: {
            enable: false,
            interval: 5000,
            pauseOnHover: true
        },
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1,
                itemsToScroll: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 2,
                itemsToScroll: 2
            },
            tablet: { 
                changePoint:768,
                visibleItems: 3,
                itemsToScroll: 3
            }
        },
        loaded: function(object) {
            console.log('Slider loaded...');
        },
        before: function(object){
            console.log('Before transition...');
        },
        after: function(object) {
            console.log('After transition...');
        }
    });
});

$( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
    " - $" + $( "#slider-range" ).slider( "values", 1 ) );
} );


$("#slideshow > div:gt(0)").hide();

    setInterval(function() { 
      $('#slideshow > div:first')
        .fadeOut(1000)
        .next()
        .fadeIn(2000)
        .end()
        .appendTo('#slideshow');
    },  3000);


$(document).ready(function(){

    /** ====== generic anchor tag used to submit form ===== **/
    $(document).on('click', 'a.submit', function(){
        $(this).closest('form').submit();
    });
    /** ====== end - generic anchor tag used to submit form ===== **/

    $('.selectBox').SumoSelect();

/** ======== form validation default settings  ======= **/
    $.validator.setDefaults({
        errorElement: "span",
        errorClass: "help-block",
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
            
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
            

        },
        errorPlacement: function (error, element) {
            error.insertAfter($(element).closest('.form-group').children().last());
        }
    });

/** ========start-   product add to cart  ======= **/
    $('#productActionForm').validate();

    $(document).on('click', '.addToCart', function(){
        $('#productActionForm input[name="action"]').val('addToCart');
        if($('#productActionForm').valid()){
            $('#productActionForm').submit();
        }
    });
/** ========end-   product add to cart  ======= **/


    /** ====== display <a> tag to update qty in cart ===== **/
    $(document).on('change', '.qtyTextBox', function(){
        $(this).next().removeClass('hide');
    });
    /** ====== end - display <a> tag to update qty in cart ===== **/


    /** ====== register form validation  ===== **/
    $('.userRegisterForm').validate({
        rules:{
            'email': 'required',
            'first_name': 'required',
            'last_name': 'required',
            'phone': 'required',
            'user_type': 'required',
            password: { 
                required: true,
                minlength: 6
            },
            password_confirmation: { 
                equalTo: ".userRegisterForm #password",
                minlength: 6
            },
        }
    });

    /** ====== end- register form validation  ===== **/



});