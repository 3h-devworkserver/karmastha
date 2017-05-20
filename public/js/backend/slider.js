
// load sliders table
$(document).ready(function(){

  $('#slider-table').DataTable({
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "ajax": base_url + "/data/table/sliders",
    columns: [
    {
      data: "id",
      render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
      }
    },
    {data: 'title', name: 'title'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
    ],
    order: [[0, "asc"]]
  });

});

// load slide list table
$(document).ready(function(){

  var slider_title=$('#slider-title').val();
  $('#slide-list-table').DataTable({
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "ajax":{"type":"post","url": base_url + "/data/table/slide/list","data":{"title":slider_title}},
    columns: [
    {
      data: "id",
      render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
      }
    },

    { data: 'Slider_image', name: 'Slider_image',
    render:function(data,type,row){
      return "<img src='"+base_url+"/"+data+"'  width='250' height='150'/>";
    }
  },
  {data:'caption', name:'caption'},
  {data:'link', name:'link'},
  {data: 'action', name: 'action', orderable: false, searchable: false},
  ],
  order: [[0, "asc"]]
});
});


//  js for slider section

/**
 * Validate Image Size and Preview for edit slide.
 *  
 */
function ImageSrc_edit() 
{

  var $input = $(this);

  if(Validate($input)===false){
    swal({                  
      title: "Invalid Image Type!",
      type:"error", 
      text: "Valid extensions are gif, png, jpg, jpeg",
      timer: 1000,
      showConfirmButton: false             
    });

    $($input).val('');
    $('.sdPreview_edit').hide();
    return false;
  }

  if (this.files && this.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {

      var image = new Image();
      image.src = e.target.result;
      image.onload = function () {

        var height = this.height;
        var width = this.width;

        if (height < 370 || width < 881) {
          swal({                  
            title: "Invalid Size",
            type:"warning", 
            text: "Dimension must be greater than 370*881",
            timer: 1000,
            showConfirmButton: false             
          });

          $input.val('');
          $input.next('.sdPreview_edit').hide();
          return false;
        }

        $input.next('.sdPreview_edit').attr('src', e.target.result).show();
      }

    };
    reader.readAsDataURL(this.files[0]);
  }
}


//for create section

/**
* Validate Image Size and Preview.
*  
*/
function ImageSrc() 
{

  var $input = $(this);

  if(Validate($input)===false){
    swal({                  
      title: "Invalid Image Type!",
      type:"error", 
      text: "Valid extensions are gif, png, jpg, jpeg",
      timer: 1000,
      showConfirmButton: false             
    });

    $($input).val('');
    $('.sdPreview').hide();
    return false;
  }

  if (this.files && this.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {

      var image = new Image();
      image.src = e.target.result;
      image.onload = function () {

        var height = this.height;
        var width = this.width;

        if (height < 370 || width < 881) {
          swal({                  
            title: "Invalid Size",
            type:"warning", 
            text: "Dimension must be greater than 370*881",
            timer: 1000,
            showConfirmButton: false             
          });

          $input.val('');
          $input.next('.sdPreview').hide();
          return false;
        }

        $input.next('.sdPreview').attr('src', e.target.result).show();
      }

    };
    
    reader.readAsDataURL(this.files[0]);
  }
}


$(document).ready(function(){ 

  /**
   * Add or Remove Slide Block.
   * 
   */
   var count =0;
   $('.remove-block').hide();
   $('.add-block').click(function(){
    $(".block:last").clone(true).insertAfter(".block:last").find('#Slider_image').val('');
    $(".block:last").find('.sdPreview').attr('src','');
    count++;
    $(".counter").val(count);
    $('.remove-block').show();
  });

  $('.remove-block').click(function(){
    if(count!=0){

     $('.block:last').remove();
     count--;
    
     if (count==0) {
      $(this).hide();
      }

    $(".counter").val(count);

    }

  });


   $('.sdPreview').hide();
   $('.image_upload').change(ImageSrc);

});


//  for edit section

$(document).ready(function(){ 

  /**
   * Add or Remove Slide Block.
   * 
   */
   var count =0;
   $('.remove-block-edit').hide();

   $('.add-block-edit').click(function(){
    $(".block-edit:last").clone(true).insertAfter(".block-edit:last").find('#Slider_image_edit').val('');
    $(".block-edit:last").find('.sdPreview_edit').attr('src','');
    $(".block-edit:last").find('.caption-edit').val('');
    $(".block-edit:last").find('.link-edit').val('');
      // $(".block-edit:last").find('.slide-id').val('new');
      $(".block-edit:last").find('.updateBtn').html('Create');
      $(".block-edit:last").find('.deleteBtn').hide();


      count++;
      $(".counter").val(count);
      $('.remove-block-edit').show();
    });

   $('.remove-block-edit').click(function(){
    if(count!=0){

     $('.block-edit:last').remove();
     count--;
     if (count==0) {
      $(this).hide();
    }
    $(".counter").val(count);

  }

});


   $('.sdPreview_edit').show();
   $('.image_upload_edit').change(ImageSrc_edit);


    //Update Button click Event
    $('.updateBtn').click(function(){
      var formid = $(this).val();
      $("#formSlide-"+formid).submit();
    });

  });


// ----------end of slider section



// ------js for static block section

/**
   * Check File Types.
   */

// function Validate(input)
//   {
//      var ext = $(input).val().split('.').pop().toLowerCase();

//      if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
//         return false;
//       }
//       else{

//         return true;
//       }    
//   }

/**
 * Give image source to preview with preview element as argument.
 * 
 * @param  {Element} input   [calling Element]
 * @param  {Element} preview [Preview Element]
 * @return {void}            [description]
 */
function getImageSrc(input,preview){
  
  if(Validate(input)===false){
    swal({                  
      title: "Invalid Image Type!",
      type:"error", 
      text: "Valid extensions are gif, png, jpg, jpeg",
      timer: 1000,
      showConfirmButton: false             
    });

    $(input).val('');
    $(preview).hide();
    return false;
  }

  if(input.files && input.files[0]){

    var reader = new FileReader();
    
    reader.onload = function(e){
      $(preview).attr('src',e.target.result).show();
    }

    reader.readAsDataURL(input.files[0]);
  }
}




//  --------Create static_blocks-------


$(document).ready(function(){

  //---Background Option Selection.


  $('.image_select').hide();
  $('select[name="BackgroundOption"] option[value="color"]').prop('selected',true);
  $('.BackgroundOption').on('change', function() {
    var bg_option=$('.BackgroundOption').val();
    if(bg_option === "image"){
      $('.color_select').hide();
      $('.image_select').show();  
    }else{
      $('.color_select').show();
      $('.image_select').hide();  
    }             
  });

  // --previews

  $('.bg_image_preview').hide();
  $('.bg_image_upload').change(function(){
    getImageSrc(this,'.bg_image_preview');
  });


  $('.feature_image_preview').hide();
  // $('.feature_image').change(ImageSrc_Staticblock);

  // });
  $('.feature_image').change(function(){
    getImageSrc(this,'.feature_image_preview');
  });


  /**
   * Add or Remove Slide Block.
   * 
   */
  var count =0;
  $('.remove-block-staticblock').hide();

  $('.add-block-staticblock').click(function(){

    $(".block-staticblock:last").clone(true).insertAfter(".block-staticblock:last").find('#Slider_image_edit').val('');
    $(".block-staticblock:last").find('.title').val('');
    $(".block-staticblock:last").find('.identifier').val('');
    $(".block-staticblock:last").find('.content').val('');      
    $(".block-staticblock:last").find('.BackgroundOption').val('');
    $(".block-staticblock:last").find('.color').val('');
    $(".block-staticblock:last").find('.bg_image_upload').attr('src','');
    $(".block-staticblock:last").find('.page').val('');
    $(".block-staticblock:last").find('.feature_image').attr('src','');
    $(".block-staticblock:last").find('.status').val('');
    $(".block-staticblock:last").find('.position').val('');
    $(".block-staticblock:last").find('.s_order').val('');
    $(".block-staticblock:last").find('.deleteBtn').hide();

    count++;
    $(".counter").val(count);
    $('.remove-block-staticblock').show();
  });

  $('.remove-block-staticblock').click(function(){
    if(count!=0){

      $('.block-staticblock:last').remove();
      count--;
      if (count==0) {
        $(this).hide();
       }
  
      $(".counter").val(count);

    }

  });
}); 

