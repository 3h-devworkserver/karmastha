$( function() {

$(document).ready(function(){
    $('.selectBox').SumoSelect(); //activate sumoselect
    // adding down arrow in sumoselect in search
    $('.SumoSelect .SelectBox label i').addClass('fa fa-angle-down');

    /** ====== generic anchor tag used to submit form ===== **/
    $(document).on('click', 'a.submit', function(){
        $(this).closest('form').submit();
    });

    //datatables for wishlist
    $('#wishlist-table').DataTable({
        "searching": false,
        "bLengthChange": false,
        // "paging":   false,
        "processing": true,
        "serverSide": true,
        "stateSave": true,
        "ajax": base_url + "/data/table/user/wishlist",
        columns: [
        // {data: 'bulk', name: 'bulk', orderable: false, searchable: false},
        // {data: 'id', name: 'id', orderable: false, searchable: false},
        // {data: 'name', name: 'name'},
        // {data: 'slug', name: 'slug'},
        // {data: 'sku', name: 'sku'},
        // {data: 'price', name: 'price'},
        {data: 'aaa', name: 'aaa'},
        {data: 'updated_at', name: 'updated_at'},
        // {data: 'status', name: 'status'},
        // {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        // order: [[1, "asc"]]
    });

    //datatables for order list
    $('#order-table').DataTable({
        // "searching": false,
        "bLengthChange": false,
        // "paging":   false,
        "processing": true,
        "serverSide": true,
        "stateSave": true,
        "ajax": base_url + "/data/table/user/order",
        columns: [
        // {data: 'bulk', name: 'bulk', orderable: false, searchable: false},
        // {data: 'id', name: 'id', orderable: false, searchable: false},
        // {data: 'name', name: 'name'},
        // {data: 'slug', name: 'slug'},
        // {data: 'sku', name: 'sku'},
        // {data: 'price', name: 'price'},
        {data: 'transaction_id', name: 'transaction_id', orderable: false},
        {data: 'order_no', name: 'order_no', orderable: false},
        {data: 'payment_type', name: 'payment_type', orderable: false},
        {data: 'total_payment', name: 'total_payment', orderable: false},
        {data: 'created_at', name: 'created_at', orderable: false},
        // {data: 'status', name: 'status'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        // order: [[1, "asc"]]
    });

	/** ====== edit form radio button action  ===== **/
$('form.profile-form').validate();
$(document).on('click',"#tested",function(){
    $('.opentext').hide()
    if($('.opentext .website_url').hasClass('required'))
    	$(this).removeClass('required')
    
})
$(document).on('click',"#have_one",function(){
    $('.opentext').show()
    $('.opentext .website_url').addClass('required')
})

/** ====== for having company or not -   ===== **/

$(document).on('click',"#represent",function(){
    if($('#job_title').hasClass('hide')){
    $('#job_title').removeClass('hide')
    $('#company_intro').removeClass('hide')
    $('#company_logo').removeClass('hide')
    }
    //$('#job_title').show()
    //$('#company_intro').show()
    //$('#company_logo').show()
    $('#business_exp').addClass('hide')
})
$(document).on('click',"#notrepresent",function(){
    $('#job_title').addClass('hide')
     $('#company_intro').addClass('hide')
    $('#company_logo').addClass('hide')
    if($('#business_exp').hasClass('hide')){
    $('#business_exp').removeClass('hide')
    }
})
/** ==============end===========**/

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
            $('select.district')[0].sumo.reload();
            // adding down arrow in sumoselect in search
            $('.SumoSelect .SelectBox label i').addClass('fa fa-angle-down');
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
        $('select.district')[0].sumo.reload();
        // adding down arrow in sumoselect in search
        $('.SumoSelect .SelectBox label i').addClass('fa fa-angle-down');
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
            $('select.cDistrict')[0].sumo.reload();
            // adding down arrow in sumoselect in search
            $('.SumoSelect .SelectBox label i').addClass('fa fa-angle-down');
        });
    });

    var zone_id = $('.cZone').val();
    if(zone_id != ''){
        $('.cDistrict option').removeClass('hide');
        $('.cDistrict option').each(function(){
            if (zone_id != $(this).attr('data-attr')) {
                $(this).addClass('hide');
            }
        });
        $('.cDistrict').val($('.cDistrict').attr('data-district'));
        $('select.cDistrict')[0].sumo.reload();
        // adding down arrow in sumoselect in search
        $('.SumoSelect .SelectBox label i').addClass('fa fa-angle-down');
    }

    // $(document).on('change', '.cZone', function(){
    //     var zone_id = $(this).val();
    //     $('.cDistrict option').removeClass('hide');
    //     $('.cDistrict option').each(function(){
    //         if (zone_id != $(this).attr('data-attr')) {
    //             $(this).addClass('hide');
    //         }
    //         $('.cDistrict option').first().removeClass('hide');
    //        $('.cDistrict').val('');
    //     });
    // });

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



})

})

function readfeatured10(input,classname) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                $('form .'+classname).css('background-image','url('+ e.target.result + ')')
                };
                $('form .'+classname).show()
                $('form .'+classname).addClass('bg-img')

                reader.readAsDataURL(input.files[0]);
            }else{
                $('form .'+classname).css('background-image','url()')
                $('form .'+classname).removeClass('bg-img')
            }
}