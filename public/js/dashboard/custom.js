$( function() {

$(document).ready(function(){

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

/** ====== end-   ===== **/


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

    var zone_id = $('.cZone').val();
    if(zone_id != ''){
        $('.cDistrict option').removeClass('hide');
        $('.cDistrict option').each(function(){
            if (zone_id != $(this).attr('data-attr')) {
                $(this).addClass('hide');
            }
        });
        $('.cDistrict').val($('.cDistrict').attr('data-district'));
    }
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