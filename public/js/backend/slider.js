
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
// 
// 
// load staticblocks table
$(document).ready(function(){

  $('#static-blocks-table').DataTable({
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "ajax": base_url + "/data/table/staticblocks",
    columns: [
    {
      data: "id",
      render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
      }
    },
    {data: 'page', name: 'title'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
    ],
    order: [[0, "asc"]]
  });

});



// load static-blocks-table
$(document).ready(function(){

   var page_id=$('#page_id').val();
  $('#static-blocks-list-table').DataTable({
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "ajax":{"type":"post","url": base_url + "/data/table/static_blocks/list","data":{"page_id":page_id}},
    columns: [
        {
          data: "id",
          render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {data:'title', name:'title'},
        {data:'identifier', name:'identifier'},
        { data: 'feature_image', name: 'feature_image',
            render:function(data,type,row){
            return "<img src='"+base_url+"/"+data+"'  width='250' height='150'/>";
            }
        },
        {data:'created_at', name:'created_at'},
        {data:'updated_at', name:'updated_at'},
        {data:'status', name:'status'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
  ],
  order: [[0, "asc"]]
});
});



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

  $('.copy_block').hide();
  $(".copy_block").clone(true).insertAfter('#mainblock').addClass('block-staticblock').removeClass('copy_block').show();
  $(".block-staticblock:last").find('.content').addClass('tinymce');
  $(".block-staticblock:last").find('.bgcolor').addClass('colorpicker-component');
   
      //Color picker plugins.

  $(function() { $('.colorpicker-component').colorpicker({ colorSelectors: { 'black': '#000000', 'white': '#ffffff', 'red': '#FF0000',
      'default': '#777777','primary': '#337ab7', 'success': '#5cb85c', 'info': '#5bc0de', 'warning': '#f0ad4e',
      'danger': '#d9534f' } }); 
    });
    

  
  tinymce.init({
        selector: ".tinymce",
        theme: "modern",
        mode : "exact",
        // added elements --yojan
        // elements : ["content","short_desc","statcontent", "long_desc", "description", "content_it"],
        // elements : ["content","short_desc","statcontent"],
        menubar : false,
        relative_urls: false,
        
        forced_root_block: false, // Start tinyMCE without any paragraph tag
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars media nonbreaking",
            "table contextmenu directionality paste textcolor code localautosave"
        ],
        toolbar1: "localautosave | bold italic underline hr | link unlink image media | styleselect forecolor backcolor paste | bullist numlist outdent indent | code preview ",
        entity_encoding: "raw",
        file_picker_callback : elFinderBrowser
    });

   

  //---Background Option Selection.

  $('.image_select').hide();
  
  $('.colorbtn').on('click',function(){
    $('.color_select').show();
    $('.image_select').hide();
  });
  $('.imagebtn').on('click',function(){
    $('.color_select').hide();
    $('.image_select').show();
  });


  // --previews

  $('.bg_image_preview').hide();
  $('.bg_image_upload').change(function(){
    var preview=$(this).parent().next('.bg_image_preview');
    getImageSrc(this,preview);
  });


  $('.feature_image_preview').hide();
  
  $('.feature_image').change(function(){
    var preview=$(this).parent().next('.feature_image_preview');
    getImageSrc(this,preview);
  });


  /**
   * Add or Remove Slide Block.
   * 
   */
  var count =0;

  $('.remove-block-staticblock').hide();

  $('.add-block-staticblock').click(function(){

      $(".copy_block").clone(true).insertAfter('.block-staticblock:last').addClass('block-staticblock').removeClass('copy_block').show();
      $(".block-staticblock:last").find('.content').addClass('tinymce');
      $(".block-staticblock:last").find('.bgcolor').addClass('colorpicker-component');
      $(".block-staticblock:last").find('.bg_image_upload').attr('src','').val('');
      $(".block-staticblock:last").find('.bg_image_preview').attr('src','').hide();  
      $(".block-staticblock:last").find('.feature_image').attr('src','').val('');
      $(".block-staticblock:last").find('.feature_image_preview').attr('src','').hide();
      
      // tinymce for selecting by class
       tinymce.init({
          selector: ".tinymce",
          theme: "modern",
          mode : "exact",
          // added elements --yojan
          // elements : ["content","short_desc","statcontent", "long_desc", "description", "content_it"],
          // elements : ["content","short_desc","statcontent"],
          menubar : false,
          relative_urls: false,
          
          forced_root_block: false, // Start tinyMCE without any paragraph tag
          plugins: [
              "advlist autolink link image lists charmap print preview hr anchor pagebreak",
              "searchreplace wordcount visualblocks visualchars media nonbreaking",
              "table contextmenu directionality paste textcolor code localautosave"
          ],
          toolbar1: "localautosave | bold italic underline hr | link unlink image media | styleselect forecolor backcolor paste | bullist numlist outdent indent | code preview ",
          entity_encoding: "raw",
          file_picker_callback : elFinderBrowser
      });
      
        //Color picker plugins.
      $(function() { $('.colorpicker-component').colorpicker({ colorSelectors: { 'black': '#000000', 'white': '#ffffff', 'red': '#FF0000',
        'default': '#777777','primary': '#337ab7', 'success': '#5cb85c', 'info': '#5bc0de', 'warning': '#f0ad4e',
        'danger': '#d9534f' } }); 
      });
     
      $(".block-staticblock:last").find('.deleteBtn').hide();
      $(".block-staticblock:last").find('.pageSelect').remove();

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



