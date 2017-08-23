$(window).scroll(function(){
	var sticky = $('.navbar-fixed-top'),
	    scroll = $(window).scrollTop();

	if (scroll >= 100) sticky.addClass('fixed');
	else sticky.removeClass('fixed');
});

$(function() {

    $('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    nav:true,
    navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
    dots:false,
    startPosition:0,
    items:1,
    // responsive:{
    //     0:{
    //         items:1,
    //     },
    //     600:{
    //         items:3,
    //     },
    //     1000:{
    //         items:5,
    //     }
    // }
    }) 

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
    
});





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

    NProgress.configure({ showSpinner: false }); // removes spinner from progress

    /** ====== generic anchor tag used to submit form ===== **/
    $(document).on('click', 'a.submit', function(){
        $(this).closest('form').submit();
    });
    /** ====== end - generic anchor tag used to submit form ===== **/

    

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
        // $('#productActionForm').validate();

        // $(document).on('click', '.addToCart', function(){
        //     $('#productActionForm input[name="action"]').val('addToCart');
        //     if($('#productActionForm').valid()){
        //         $('#productActionForm').submit();
        //     }
        // });

        $('#productActionForm').validate({
            ignore: []
        });
        $(document).on('click', '.addToCart', function(){
            if($('#productActionForm').valid()){
                $('#productActionForm input[name="action"]').val('addToCart');
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
    // $('.userRegisterForm').validate({
    //     rules:{
    //         'email': 'required',
    //         'first_name': 'required',
    //         'last_name': 'required',
    //         'phone': 'required',
    //         'user_type': 'required',
    //         password: { 
    //             required: true,
    //             minlength: 6
    //         },
    //         password_confirmation: { 
    //             equalTo: ".userRegisterForm #password",
    //             minlength: 6
    //         },
    //     }
    // });

    /** ====== end - register form validation  ===== **/


    /** ====== start - product detail page  ===== **/

        /** ====== add border while clicking attributes  ===== **/
        $(document).on('click', 'label.attribute', function(){
            // alert($(this).prev().val());
            $(this).closest('div.attrParent').find('.attribute').removeClass('attributeSelected');
            
            $(this).addClass('attributeSelected');
            $(this).closest('.singleAttribute').find('.attrName').val($(this).prev().attr('data-name'));
            $(this).closest('.singleAttribute').find('.attrValue').val($(this).prev().attr('data-value'));

            // alert( $('.singleAttribute').length );
            setTimeout(function(){
                var ajaxCall = 0;
                var checkedValues;
                $('.singleAttribute').each(function(){
                    // alert($(this).find('.attrVal:checked').attr('data-value'));
                    // console.log($(this).find('.attrValue:checked'));

                    if ( $('.singleAttribute').length == $('.attrVal:checked').length ) {
                        // alert($('.attrVal:checked').length);
                        checkedValues = $('.attrVal:checked').map(function() {
                            return $(this).val();
                        }).get();
                        ajaxCall = 1;
                        // console.log(checkedValues);
                        return false;
                    }
                });
                    if(ajaxCall == 1){
                        // alert('ajax call');
                        NProgress.start();
                        $.ajax({
                            method: 'post',
                            url: base_url + '/product/getquantity',
                            headers:
                                {
                                 'X-CSRF-Token': $('input[name=_token]').val()
                                },
                            data: {productid: $('input[name=product]').val() , values: checkedValues},

                            success:function(response){
                                if (response.stat == 'success') {
                                    var manageStock = response.values[0].manage_stock;
                                    var availability = response.values[0].availability;
                                    var identifier = response.values[0].identifier;
                                    var quantity = response.values[0].quantity;
                                    if (manageStock == 1) {
                                        if (availability === 'in stock') {
                                            if (quantity == 0) {
                                                // alert('product combination not available');
                                                $('.remainingQuantity span').text('Product combination not available');
                                                $('.attrIdentifier').val('');
                                                $('.addToCart').attr('disabled', '');
                                                NProgress.done();
                                            }else{
                                                // alert('product combination available');
                                                $('.remainingQuantity span').text(quantity+' items remaining');
                                                $('.quantity').attr('max', quantity);
                                                $('.attrIdentifier').val(identifier);
                                                $('.addToCart').removeAttr('disabled');
                                                NProgress.done();
                                            }
                                        }else{
                                            // alert('product combination not available');
                                            $('.remainingQuantity span').text('Product combination not available');
                                            $('.attrIdentifier').val('');
                                            $('.addToCart').attr('disabled', '');
                                            NProgress.done();
                                        }
                                    }else{
                                        if (quantity == 0) {
                                            // alert('product combination available unlimited');
                                            $('.quantity').removeAttr('max');
                                            $('.attrIdentifier').val(identifier);
                                            $('.addToCart').removeAttr('disabled');
                                            NProgress.done();
                                        }else{
                                            // alert('product combination available');
                                            $('.remainingQuantity span').text(quantity+' items remaining');
                                            $('.quantity').attr('max', quantity);
                                            $('.attrIdentifier').val(identifier);
                                            $('.addToCart').removeAttr('disabled');
                                            NProgress.done();
                                        }
                                    }
                                }else{
                                    // alert('Not availabile');
                                    $('.remainingQuantity span').text('Product combination not available');
                                    $('.attrIdentifier').val('');
                                    $('.addToCart').attr('disabled', '');
                                    NProgress.done();
                                }
                            }
                        });
                    }
            }, 2000);

        });

    /** ====== end - product detail page  ===== **/

     /** ====== start - cart page  ===== **/

        /** ====== delete item from cart  ===== **/
        $(document).on('click', '.bagde-remove', function(){
            var hash = $(this).attr('data-hash');
            var elem = $(this).closest('.cart-review-content');
            var tmp = confirm('Are you sure want to remove item from cart.');
            if (tmp) {
                NProgress.start();
                $.ajax({
                    method: 'get',
                    url: base_url + '/cart/removeitem/'+hash,

                    success:function(response){
                        console.log(response);
                        if (response.stat == 'success') {
                            elem.remove();
                            $('.message').html(response.msg).show().delay(3000).slideUp("slow");
                            // NProgress.done();
                        }else{
                            $('.message').html(response.msg).show().delay(3000).slideUp("slow");
                        }
                            NProgress.done();
                    }

                });
            }
        });

        $('.qty-update').delay(3000).slideUp();


     /** ====== end - cart page  ===== **/





// $('.selectBox').SumoSelect();

});
