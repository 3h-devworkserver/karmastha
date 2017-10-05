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
    $('.selectBox').SumoSelect(); //activate sumoselect
    shipping(); // for cart page
    NProgress.configure({ showSpinner: false }); // removes spinner from progress

    $('#paymentSuccessModal').modal('show');

    // adding down arrow in sumoselect in search
    $('.SumoSelect .SelectBox label i').addClass('fa fa-angle-down');

    /** ====== generic anchor tag used to submit form ===== **/
    $(document).on('click', 'a.submit', function(){
        $(this).closest('form').submit();
    });

    $(document).on('click', 'a.submitConfirm', function(){
        var check = confirm('Are you sure want to remove item from cart !! ');
        if (check) {
            $(this).closest('form').submit();
        }
        return false;
    });
    /** ====== end - generic anchor tag used to submit form ===== **/

    /** ======== start - autocomplete search in header  ======= **/
    $( function() {
        $( "#autosuggest" ).autocomplete({
            source : function(request, response) {
                $.ajax({
                    url: base_url+'/autocomplete/search',
                    data: { 
                        searchCategoryId: $('.catId').val(),
                        searchText: $( "#autosuggest" ).val()
                    },
                    dataType: "json",
                    type: "get",
                    success: function(data) { 
                        // alert(data);
                        // console.log(data);
                        response($.map(data, function(obj) {
                            return {
                                label: obj.title,
                                value: obj.url,
                                parent: obj.parent
                            };
                        }));
                    }
                });
            },
            select: function( event, ui ) {
                event.preventDefault();
                $( "#autosuggest" ).val(ui.item.label);
                window.location.href = ui.item.value;
            }
        })
        .autocomplete( "instance" )._renderItem = function( ul, item ) {
            return $( "<li>" )
                // .append( "<div>" + item.label + "<br>" + item.url + "</div>" )
                .append( "<div><span>" + item.label + "</span>"+ item.parent +"</div>" )
                .appendTo( ul );
        };

        $( "#autosuggest2" ).autocomplete({
            source : function(request, response) {
                $.ajax({
                    url: base_url+'/autocomplete/search',
                    data: { 
                        searchCategoryId: $('select[name="cat_id"]').val(),
                        searchText: $( "#autosuggest2" ).val()
                    },
                    dataType: "json",
                    type: "get",
                    success: function(data) { 
                        // alert(data);
                        // console.log(data);
                        response($.map(data, function(obj) {
                            return {
                                label: obj.title,
                                value: obj.url,
                                parent: obj.parent
                            };
                        }));
                    }
                });
            },
            select: function( event, ui ) {
                event.preventDefault();
                $( "#autosuggest2" ).val(ui.item.label);
                window.location.href = ui.item.value;
            }
        })
        .autocomplete( "instance" )._renderItem = function( ul, item ) {
            return $( "<li>" )
                // .append( "<div>" + item.label + "<br>" + item.url + "</div>" )
                .append( "<div><span>" + item.label + "</span>"+ item.parent +"</div>" )
                .appendTo( ul );
        };

    });

    /** ======== end - autocomplete search in header  ======= **/


    /** ======== start-   home page  ======= **/
    $(document).on('click', '.catChild', function(){
        var id = $(this).attr('data-id');
        $(this).closest('ul').find('.catChild').removeClass('active');
        $(this).addClass('active');        
        // var tmps = $(this).closest('.products-wrapper');
        // tmps.find('li.catChild.active').not(this).removeClass('active');
        // $(this).addClass('active');
        //alert(id);
        var tmp = $(this).closest('.products-wrapper');
        tmp.find('.catSelect').hide();
        $('.'+id).show();
    });

    /** ======== end-   home page  ======= **/
    

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
                                                $('.QtyValidation span').addClass('hide');
                                                $('.addToCart').attr('disabled', '');
                                                NProgress.done();
                                            }else{
                                                // alert('product combination available');
                                                $('.remainingQuantity span').text(quantity+' items remaining');
                                                $('.quantity').attr('max', quantity);
                                                $('.attrIdentifier').val(identifier);
                                                $('.quantity').val($('.quantity').attr('min'));
                                                $('.QtyValidation span').addClass('hide');
                                                $('.addToCart').removeAttr('disabled');
                                                NProgress.done();
                                            }
                                        }else{
                                            // alert('product combination not available');
                                            $('.remainingQuantity span').text('Product combination not available');
                                            $('.attrIdentifier').val('');
                                            $('.QtyValidation span').addClass('hide');
                                            $('.addToCart').attr('disabled', '');
                                            NProgress.done();
                                        }
                                    }else{
                                        if (quantity == 0) {
                                            // alert('product combination available unlimited');
                                            $('.quantity').attr('max', 99999999);
                                            $('.attrIdentifier').val(identifier);
                                            $('.QtyValidation span').addClass('hide');
                                            $('.addToCart').removeAttr('disabled');
                                            NProgress.done();
                                        }else{
                                            // alert('product combination available');
                                            $('.remainingQuantity span').text(quantity+' items remaining');
                                            $('.quantity').attr('max', quantity);
                                            $('.attrIdentifier').val(identifier);
                                            $('.quantity').val($('.quantity').attr('min'));
                                            $('.QtyValidation span').addClass('hide');
                                            $('.addToCart').removeAttr('disabled');
                                            NProgress.done();
                                        }
                                    }
                                }else{
                                    // alert('Not availabile');
                                    $('.remainingQuantity span').text('Product combination not available');
                                    $('.attrIdentifier').val('');
                                    $('.QtyValidation span').addClass('hide');
                                    $('.addToCart').attr('disabled', '');
                                    NProgress.done();
                                }
                            },

                            error:function(response){
                                $('.remainingQuantity span').text('Error, please try in a while.');
                                $('.attrIdentifier').val('');
                                $('.QtyValidation span').addClass('hide');
                                $('.addToCart').attr('disabled', '');
                                NProgress.done();
                            }
                        });
                    }
            }, 2000);

        });

    /** ====== end - product detail page  ===== **/

    /** ====== start - cart page  ===== **/

        $('.qty-update').delay(3000).slideUp();
        $('.message').delay(3000).slideUp();

        $('.outOfStock').each(function(){
            $(this).closest('.cart-remark').addClass('stockout');
        });

        $(document).on('change', '#shipping', function(){
            shipping();
        });

        $(document).on('click', '.checkoutBtn2', function(){
            $('.checkoutBtn').click();
        });

        /** ====== delete item from cart  ===== **/
        // $(document).on('click', '.bagde-remove', function(){
        //     var hash = $(this).attr('data-hash');
        //     var elem = $(this).closest('.cart-review-content');
        //     var tmp = confirm('Are you sure want to remove item from cart.');
        //     if (tmp) {
        //         NProgress.start();
        //         $.ajax({
        //             method: 'get',
        //             url: base_url + '/cart/removeitem/'+hash,

        //             success:function(response){
        //                 // console.log(response);
        //                 if (response.stat == 'success') {
        //                     elem.remove();
        //                     $('.message').html(response.msg).show().delay(3000).slideUp("slow");
        //                     // NProgress.done();
        //                 }else{
        //                     $('.message').html(response.msg).show().delay(3000).slideUp("slow");
        //                 }
        //                     NProgress.done();
        //             },
        //             error:function(response){
        //                 $('.message').html('<div class="alert alert-danger"><span>'+ '<i class="fa fa-times-circle" aria-hidden="true"></i> Error occurred.' +'</span></div>').show().delay(3000).slideUp("slow");
        //                 NProgress.done();

        //             }

        //         });
        //     }
        // });

    /** ====== end - cart page  ===== **/


    /** ====== start - subcategory page  ===== **/

       // price range slider 
    var filter_url = '';
    var ids = [];
    // var min_price = parseFloat('100');
    var min_price = parseFloat($('#price-from').attr('data-min'));
    // var max_price = parseFloat('2000');
    var max_price = parseFloat($('#price-to').attr('data-max'));
    var step = parseFloat($('#price-to').attr('data-step'));
    var current_min_price = parseFloat($('#price-from').val());
    var current_max_price = parseFloat($('#price-to').val());

    $('#slider-price').slider({
        range   : true,
        min     : min_price,
        max     : max_price,
        step    : step,
        values  : [ current_min_price, current_max_price ],
        slide   : function (event, ui) {
            $('#price-from').val(ui.values[0]);
            $('#price-to').val(ui.values[1]);
            current_min_price = ui.values[0];
            current_max_price = ui.values[1];
        },
        stop    : function (event, ui) {
            filter_url = $('.price-url').val();
            filter_url += '&price=' + current_min_price + ',' + current_max_price;

            $('.criteriaPrice a').remove();
            $('.criteriaPrice').removeClass('hide');
            $('.criteriaPrice').append('<a>NPR '+current_min_price+' - NPR '+current_max_price+'<span class="sortingRemove"></span></a>');
            $('.sortingProcess').click();
            // oclayerednavigationajax.filter(filter_url);
        }
    });

    $('.a-filter').click(function () {
        var id = $(this).attr('name');
        var filter_ids = '';
        filter_url = $('.filter-url').val();
        if($(this).hasClass('add-filter') == true) {
            ids.push(id);
        } else if($(this).hasClass('remove-filter') == true) {
            ids = $.grep(ids, function (value) {
                return value != id;
            });
        }
        filter_ids = ids.join(',');
        filter_url += '&filter=' + filter_ids;
        // oclayerednavigationajax.filter(filter_url);
    });

    $('.clear-filter').click(function () {
        ids = [];
    });

    $(document).ajaxComplete(function () {
        var current_min_price = parseFloat($('#price-from').val());
        var current_max_price = parseFloat($('#price-to').val());

        $('#slider-price').slider({
            range   : true,
            min     : min_price,
            max     : max_price,
            step    : step,
            values  : [ current_min_price, current_max_price ],
            slide   : function (event, ui) {
                $('#price-from').val(ui.values[0]);
                $('#price-to').val(ui.values[1]);
                current_min_price = ui.values[0];
                current_max_price = ui.values[1];
            },
            stop    : function (event, ui) {
                filter_url = $('.price-url').val();
                filter_url += '&price=' + current_min_price + ',' + current_max_price;

                $('.criteriaPrice a').remove();
                $('.criteriaPrice').removeClass('hide');
                $('.criteriaPrice').append('<a>NPR '+current_min_price+' - NPR '+current_max_price+'<span class="sortingRemove"></span></a>');
                $('.sortingProcess').click();
                // oclayerednavigationajax.filter(filter_url);
            }
        });
        $('.a-filter').click(function () {
            var id = $(this).attr('name');
            var filter_ids = '';
            filter_url = $('.filter-url').val();

            if($(this).hasClass('add-filter') == true) {
                ids.push(id);
            } else if($(this).hasClass('remove-filter') == true) {
                ids = $.grep(ids, function (value) {
                    return value != id;
                });
            }
            filter_ids = ids.join(',');
            filter_url += '&filter=' + filter_ids;
            // oclayerednavigationajax.filter(filter_url);
        });

        $('.clear-filter').click(function () {
            ids = [];
        });
    });
    $('.layered .filter-attribute-container label').click(function(){
        $(this).next().slideToggle();
    });

    $(document).on('click', '.left-category-list .catViewAll', function(){
        $(this).closest('.left-category-list').find('ul li.hide').removeClass('hide');
        $(this).hide();
    });

    $(document).on('click', '.viewAll', function(){
        $(this).closest('.parent').find('.child.hide').removeClass('hide');
        $(this).hide();
    });


    // $(document).on('click', '.ui-slider-handle', function(){
    //     alert('her');
    //     // var tmp = $('input[name="pricerange"]').val();
    //     // var items = tmp.split(',');
    //     // // alert(items[0]);
    //     // $('input[name="minprice"]').val(items[0]);
    //     // $('input[name="maxprice"]').val(items[1]);
    //     $('.sortingProcess').click();
    // });

    // $(document).on('change', 'input[name="minprice"]', function(){
    //     var tmp = $('input[name="minprice"]').val();
    //     var items = tmp.split(',');
    //     // alert(items[0]);
    //     $('input[name="minprice"]').val(items[0]);
    //     $('input[name="maxprice"]').val(items[1]);
    //     $('.sortingProcess').click();
    // });

    $(document).on('change', '.sortChange', function(){
        $('.sortingProcess').click();
    });

    $(document).on("click",".sortingProcess",function(e){
        NProgress.start();
        $(this).parents("form").ajaxForm(options);
    });

    var options = { 
      complete: function(response) 
        {
          if($.isEmptyObject(response.responseJSON.error)){
            // $("input[name='title']").val('');
            // console.log(response.responseText);
            // alert('sucess');
            var obj = jQuery.parseJSON(response.responseText);
            $(".brands-list").html(obj.html);

            //populating sorting criteria
            var checkedBrandIds = $('input[name="brand[]"]:checked').map(function() {
                return $(this).val();
            }).get();
            if (checkedBrandIds.length == 0) {
                $('.criteriaBrand').addClass('hide');
            }
            var checkedBrandNames = $('input[name="brand[]"]:checked').map(function() {
                return $(this).attr('data-name');
            }).get();
            // console.log(checkedBrandIds);
            // console.log(checkedBrandNames);
            $('.criteriaBrand a').remove();
            $.each(checkedBrandIds, function( key, value ) {
                $('.criteriaBrand').removeClass('hide');
                $('.criteriaBrand').append('<a>'+checkedBrandNames[key]+'<span data-id="'+value+'" class="sortingRemove"></span></a>');
            });

            //end of sorting criteria

            // console.log(obj.html);
            NProgress.done();
          }else{
            alert('error');
            NProgress.done();
            // printErrorMsg(response.responseJSON.error);
          }
        }
    };

    $(document).on('click', '.criteriaBrand .sortingRemove', function(){
        var tmp = $(this).attr('data-id');
        $('.brand-'+tmp).attr('checked', false);
        $('.sortingProcess').click();
        $(this).closest('a').remove();
        if ($('.criteriaBrand a').length == 0) {
            $('.criteriaBrand').addClass('hide');
        }
    });

    $(document).on('click', '.criteriaPrice .sortingRemove', function(){
        $('.criteriaPrice a').remove();
        $('.criteriaPrice').addClass('hide');
        $('#price-from').val($('#price-from').attr('data-min'));
        $('#price-to').val($('#price-to').attr('data-max'));
        $('.sortingProcess').click();
    });

    $(document).on('click', '.sortingCriteria .sortingCriterion a', function(){
        $(this).find('.sortingRemove').click();
    });
 

    /** ====== end - subcategory page ===== **/

        $('#billingDetail').validate({
            rules:{
                'fname': 'required',
                'lname': 'required',
                'zone': 'required',
                'district': 'required',
                'city': 'required',
                'st_address': 'required',
                'phone': 'required',
                email: {
                  required: true,
                  email: true
                }
            }
        });

        $('#shippingDetail').validate({
            rules:{
                'ship_fname': 'required',
                'ship_lname': 'required',
                'ship_zone': 'required',
                'ship_district': 'required',
                'ship_city': 'required',
                'ship_st_address': 'required',
                'ship_phone': 'required',
                ship_email: {
                  required: true,
                  email: true
                }
            }
        });

    /** ====== start - checkout page ===== **/

    /** ==== Display district according to zone ==== **/
    $(document).on('change', '.zone', function(){
        var zone_id = $(this).val();
        $('.district option').removeClass('hide');
        $('.district option').each(function(){
            if (zone_id != $(this).attr('data-attr')) {
                $(this).addClass('hide');
            }
            $('.district option').first().removeClass('hide');
           $('.district').val('');
        });
    });

    var zone_id = $('.zone').val();
    if(zone_id != ''){
        $('.district option').removeClass('hide');
        $('.district option').each(function(){
            if (zone_id != $(this).attr('data-attr')) {
                $(this).addClass('hide');
            }
        });
        $('.district').val($('.district').attr('data-district'));
    }

    $(document).on('change', '.cZone', function(){
        var zone_id = $(this).val();
        $('.cDistrict option').removeClass('hide');
        $('.cDistrict option').each(function(){
            if (zone_id != $(this).attr('data-attr')) {
                $(this).addClass('hide');
            }
            $('.cDistrict option').first().removeClass('hide');
           $('.cDistrict').val('');
        });
    });

    // var zone_id = $('.cZone').val();
    // if(zone_id != ''){
    //     $('.cDistrict option').removeClass('hide');
    //     $('.cDistrict option').each(function(){
    //         if (zone_id != $(this).attr('data-attr')) {
    //             $(this).addClass('hide');
    //         }
    //     });
    //     $('.cDistrict').val($('.cDistrict').attr('data-district'));
    // }
/** ==== end - Display district according to zone ==== **/

    //showing only products that are in stock
    $('.cart-review-content').each(function(){
        if($(this).find('span.outOfStock').length == 0){
            $(this).removeClass('hide');
        }
    });

    $(document).on('click','.billingBtn',function(){
        if ( $('#billingDetail').valid() ) {
            $('.total-calculate').removeAttr('disabled');
            $('.pannel-payment-option').addClass('showOptions');
            $('input[name="payment_method"]').removeAttr('disabled');
            $('.placeOrder').removeClass('disabled');
        }
    });
    $(document).on('click','.shippingBtn',function(){
        if ( $('#shippingDetail').valid() ) {
            // alert('shipvalid');
            $('.pannel-payment-option').addClass('showOptions');
            $('input[name="payment_method"]').removeAttr('disabled');
            $('.placeOrder').removeClass('disabled');
        }else{
            // alert('shipinvalid');
            $('.pannel-payment-option').removeClass('showOptions');
            $('input[name="payment_method"]').attr('disabled', '');
            $('.placeOrder').addClass('disabled');
        }
    });

    $(document).on('change','.total-calculate',function(){
        // alert($(this).is(":checked"));
            // $('.pannel-payment-option').toggleClass('showOptions');
        if($(this).is(":checked")){
                // alert('no');
            $('.pannel-payment-option').removeClass('showOptions');
            $('.placeOrder').addClass('disabled');
        }else{
                // alert('yes');
            $('.pannel-payment-option').addClass('showOptions');
            $('.placeOrder').removeClass('disabled');
        }
    });

    $(document).on('change', 'input[name="payment_method"]',function(){
        $('.placeOrder').removeClass('disabled');
    });

     $(document).on('click', '.placeOrder',function(){
        // alert('submit');
        
        // alert($('#billingDetail').serialize());
        // alert($(this).is(":checked"));
        $.ajax({
            type: 'post',
            // dataType: "json",
            url: base_url + '/checkoutdetails',
            headers:
                {
                 'X-CSRF-Token': $('#billingDetail input[name=_token]').val()
                },
            data: {
                billingDetail: $('#billingDetail').serialize(),
                anotherShipping: $('.total-calculate').is(":checked"),
                shippingDetail: $('#shippingDetail').serialize(),
                paymentSelectionForm: $('#paymentSelectionForm').serialize()
            },
            success:function(response){
                // alert(response);
                // console.log(response);

                if (response.stat == 'success') {
                    // alert('sucess');
                    var form = $('#form-'+response.method);
                    form.find('input[name="OrderNo"]').val(response.orderno);
                    form.find('input[name="customer_email"]').val(response.email);
                    form.find('input[name="Session_Key"]').val(response.sessionkey);
                    form.submit();
                }else{
                    alert('error1');
                }
            },
            error:function(data){
                // alert(data);
                alert('error2');
            }
        });

        // alert($('#shippingDetail').serialize());
        // alert($('#paymentSelectionForm').serialize());
    });

    /** ====== end - checkout page ===== **/

    

});

//calculate shipping charge and generate total price
function shipping(){
    var value = $('#shipping').val();
    var subTotal = parseFloat($('span.subTotal').attr('data-subtotal'));
    var delivery = 100;
    if (value == 'ktm-in') {
        delivery = 50;
        $('.cost').text(delivery);
        // $('span.total em').text((subTotal + 50).toFixed(12));
        $('span.total em').text((+((+subTotal) + (+delivery)).toFixed(12)));
    }else if (value == 'ktm-out') {
        delivery = 100;
        $('.cost').text(delivery);
        $('span.total em').text((+((+subTotal) + (+delivery)).toFixed(12)));
    }else if (value == 'ltp-in') {
        delivery = 50;
        $('.cost').text(delivery);
        $('span.total em').text((+((+subTotal) + (+delivery)).toFixed(12)));
    }else if (value == 'ltp-out') {
        delivery = 100;
        $('.cost').text(delivery);
        $('span.total em').text((+((+subTotal) + (+delivery)).toFixed(12)));
    }else if (value == 'bkp') {
        delivery = 100;
        $('.cost').text('100');
        $('span.total em').text((+((+subTotal) + (+delivery)).toFixed(12)));
    }else{
        delivery = 100;
        $('.cost').text('100');
        $('span.total em').text((+((+subTotal) + (+delivery)).toFixed(12)));
    }
    $('.deliveryCharge').val(delivery);
    $('.grandTotal').val(+((+subTotal) + (+delivery)).toFixed(12));
}
