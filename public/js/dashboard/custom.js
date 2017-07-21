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