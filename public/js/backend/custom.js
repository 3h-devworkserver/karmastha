$(document).ready(function(){

/** --select all -- **/
$(document).on('change', '.checkAll', function(){
  $(".bulkSelect").prop('checked', $(this).prop("checked"));
  
});

/** ----- for bulk deleting ---- **/
$(document).on('change', '.bulkSelect', function(){
  //uncheck "select all", if one of the listed checkbox item is unchecked
  if(false == $(this).prop("checked")){ //if this item is unchecked
        $(".checkAll").prop('checked', false); //change "select all" checked status to false
    }
   //check "select all" if all checkbox items are checked
  if ($('.bulkSelect:checked').length == $('.bulkSelect').length ){
      $(".checkAll").prop('checked', true);
  }
});

	/**  Page table      **/
	$('#page-table').DataTable({
		"processing": true,
		"serverSide": true,
		"stateSave": true,
		"ajax": base_url + "/data/table/pages",
		columns: [
    {data: 'bulk', name: 'bulk', orderable: false, searchable: false},
		{data: 'id', name: 'id'},
		{data: 'title', name: 'title'},
		{data: 'slug', name: 'slug'},
    {data: 'created_at', name: 'created_at'},
    {data: 'updated_at', name: 'updated_at'},
		{data: 'status', name: 'status'},
		{data: 'action', name: 'action', orderable: false, searchable: false},
		],
		order: [[1, "asc"]]
	});

  /**  Product table      **/
  $('#product-table').DataTable({
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "ajax": base_url + "/data/table/products",
    columns: [
    {data: 'bulk', name: 'bulk', orderable: false, searchable: false},
    {data: 'id', name: 'id'},
    {data: 'name', name: 'name'},
    {data: 'slug', name: 'slug'},
    {data: 'sku', name: 'sku'},
    {data: 'price', name: 'price'},
    {data: 'created_at', name: 'created_at'},
    {data: 'updated_at', name: 'updated_at'},
    {data: 'status', name: 'status'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
    ],
    order: [[1, "asc"]]
  });

  /**  Member table      **/
  $('#member-table').DataTable({
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "ajax": base_url + "/data/table/members",
    columns: [
    {data: 'bulk', name: 'bulk', orderable: false, searchable: false},
    {data: 'id', name: 'id'},
    {data: 'name', name: 'name'},
    { data: 'logo', 
    name: 'logo',
    render:function(data,type,row){
      return "<img src='"+base_url+"/"+data+"'  width='100' height='50'/>";
    }
    },
    {data: 'url', name: 'url'},
    {data: 'created_at', name: 'created_at'},
    {data: 'updated_at', name: 'updated_at'},
    {data: 'status', name: 'status'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
    ],
    order: [[0, "asc"]]
  });


  /** load brand-table */

  $('#brand-table').DataTable({
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "ajax": base_url + "/data/table/brands",
    columns: [
    {data: 'bulk', name: 'bulk', orderable: false, searchable: false},
    {data: 'id', name: 'id'},
    {data: 'brand_name', name: 'brand_name'},
    { data: 'brand_logo', 
    name: 'brand_logo',
    render:function(data,type,row){
      return "<img src='"+base_url+"/"+data+"'  width='100' height='50'/>";
    }
    },
    {data: 'slug', name: 'slug'},
    {data: 'created_at', name: 'created_at'},
    {data: 'updated_at', name: 'updated_at'},
    {data: 'status', name: 'status'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
    ],
    order: [[0, "asc"]]
  });

    /**  Attribute table      **/
  $('#attribute-table').DataTable({
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "ajax": base_url + "/data/table/attributes",
    columns: [
    {data: 'bulk', name: 'bulk', orderable: false, searchable: false},
    {data: 'id', name: 'id'},
    {data: 'name', name: 'name'},
    {data: 'created_at', name: 'created_at'},
    {data: 'updated_at', name: 'updated_at'},
    {data: 'status', name: 'status'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
    ],
    order: [[1, "asc"]]
  });





//general function for submiting form using <a> tag
  $(document).on('click', 'a.bulkSubmit', function(){
    var link = $(this);
    var tmp = $(this);
    var cancel = (link.attr('data-trans-button-cancel')) ? link.attr('data-trans-button-cancel') : "Cancel";
    var confirm = (link.attr('data-trans-button-confirm')) ? link.attr('data-trans-button-confirm') : "Yes, delete";
    var title = (link.attr('data-trans-title')) ? link.attr('data-trans-title') : "Are you sure you want to delete?";
    var text = (link.attr('data-trans-text')) ? link.attr('data-trans-text') : "Are you sure you want to delete?";

    swal({
      title: title,
      type: "warning",
      showCancelButton: true,
      cancelButtonText: cancel,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: confirm,
      closeOnConfirm: true
    }, function(confirmed) {
      if (confirmed){
        var bulkChecked = $('.bulkSelect:checked').map(function() {
          return $(this).attr('data-id');
        }).get();
        $('.ids').val(bulkChecked);
      // console.log(bulkChecked);
        link.closest('form').submit();
      }
    });
  });

/**
 *	js for product
 **/

	/* ------ for product inventory -----  */
  var check = $('.manageStock').val();
  if(check == 1){
    $('.stock-block').removeClass('hide');
  }else{
    $('.stock-block').addClass('hide');
  }
  
  $(document).on('change', '.manageStock', function(){
    var check = $(this).val();
    if(check == 1){
     $('.stock-block').removeClass('hide');
   }else{
     $('.stock-block').addClass('hide');
   }
 });


  $.fn.extend({
    treed: function (o) {
      var openedClass = 'fa-folder-open-o';
      var closedClass = 'fa-folder';
      var noChild = 'fa fa-genderless';

      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
          openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
          closedClass = o.closedClass;
        }
      };

      /* initialize each of the top levels */
      var tree = $(this);
      tree.addClass("tree");


      tree.find('li').has("ul").each(function () {
        var branch = $(this);
        branch.prepend("<i class='indicator fa " + closedClass + "'></i>");
            // branch.prepend("");
            branch.addClass('branch');
            branch.on('click', function (e) {
              if (this == e.target) {
                var icon = $(this).children('i:first');
                icon.toggleClass(openedClass + " " + closedClass);
                // $(this).children().children().toggle();
                $(this).children().children().not('span').toggle();
              }
            })
            // branch.children().children().toggle();
            branch.children().children().not('span').toggle();
          });


        // //--added by yojan
        // tree.find('li').not(':has(ul)').each(function () {
        //   var branch = $(this);
        //   branch.prepend("<i class='" + noChild + "'></i>");
        // });
        // // end of addition

        /* fire event from the dynamically added icon */
        tree.find('.branch .indicator').each(function(){
          $(this).on('click', function () {
            $(this).closest('li').click();
          });
        });

        /* fire event to open branch if the li contains an anchor instead of text */
        tree.find('.branch>a').each(function () {
          $(this).on('click', function (e) {
            $(this).closest('li').click();
            e.preventDefault();
          });
        });

        /* fire event to open branch if the li contains a button instead of text */
        tree.find('.branch>button').each(function () {
          $(this).on('click', function (e) {
            $(this).closest('li').click();
            e.preventDefault();
          });
        });
      }
    });

/* Initialization of treeviews */
$('#tree1').treed();


/**   -----  selecting parent checkbox if child is selected ---- **/
$(document).on('change', 'input[type="checkbox"]', function(){
   if(this.checked) {
    var id = $(this).attr('data-parent-id');
    // alert(id);
    if(!$('#'+id).prop( "checked")){
      // $('#'+id).prop( "checked", true);
      $('#'+id).click();
      }else{
        $('#'+id).click();
        $('#'+id).click();
      }
    }
});



/**
 *  image upload in tmp and db and showing preview
 **/
  countProductImageRowAndDisplayText();

 $(document).on('click', '.uploadImageClick', function(){
  $('.uploadImageFile').click();
});

 $(document).on('change', '.uploadImageFile', function(e){
  $('.upload-image').click();
});

 $(document).on("click",".upload-image",function(e){
  $(this).parents("form").ajaxForm(options);
});

 var options = { 
  complete: function(response) 
  {
    if($.isEmptyObject(response.responseJSON.error)){
      $("input[name='title']").val('');
      var obj = jQuery.parseJSON(response.responseText);
            // alert('Image Upload Successfully.');
            $(".selectedFiles").append(obj.html);
            countProductImageRowAndDisplayText();
          }else{
            printErrorMsg(response.responseJSON.error);
          }
        }
      };

      function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
          $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
      }
//end of image upload

/**
 *  delete image uploaded in tmp and from db 
 **/
 $(document).on('click', '.deleteTmpImg', function(e){
  e.preventDefault();
  var link = $(this);
  var tmp = $(this);
  var cancel = (link.attr('data-trans-button-cancel')) ? link.attr('data-trans-button-cancel') : "Cancel";
  var confirm = (link.attr('data-trans-button-confirm')) ? link.attr('data-trans-button-confirm') : "Yes, delete";
  var title = (link.attr('data-trans-title')) ? link.attr('data-trans-title') : "Are you sure you want to delete this item?";
  var text = (link.attr('data-trans-text')) ? link.attr('data-trans-text') : "Are you sure you want to delete this item?";

  swal({
    title: title,
    type: "warning",
    showCancelButton: true,
    cancelButtonText: cancel,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: confirm,
    closeOnConfirm: true
  }, function(confirmed) {
    if (confirmed){
      // var element = link;
      tmp.next('.delSpin').show();
      var id = tmp.attr('data-id');

      $.ajax({
        url: base_url +'/admin/tmp/image/delete/'+id,
        method: 'delete',

        success:function(data){
          tmp.next('.delSpin').hide();
          if(data['stat'] === 'success'){
            tmp.closest('tr').remove();
            countProductImageRowAndDisplayText();
          }else{
          // $('.alert alert-danger').html(data['msg']);
            }
        }
      });
    }
  });
  
});

/**
 *  delete product image and from db also
 **/
$(document).on('click', '.deleteProductImg', function(e){
  e.preventDefault();
  var link = $(this);
  var tmp = $(this);
  var cancel = (link.attr('data-trans-button-cancel')) ? link.attr('data-trans-button-cancel') : "Cancel";
  var confirm = (link.attr('data-trans-button-confirm')) ? link.attr('data-trans-button-confirm') : "Yes, delete";
  var title = (link.attr('data-trans-title')) ? link.attr('data-trans-title') : "Are you sure you want to delete this item?";
  var text = (link.attr('data-trans-text')) ? link.attr('data-trans-text') : "Are you sure you want to delete this item?";

  swal({
    title: title,
    type: "warning",
    showCancelButton: true,
    cancelButtonText: cancel,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: confirm,
    closeOnConfirm: true
  }, function(confirmed) {
    if (confirmed){
      // var element = link;
      tmp.next('.delSpin').show();
      var id = tmp.attr('data-id');

      $.ajax({
        url: base_url +'/admin/products/image/delete/'+id,
        method: 'delete',

        success:function(data){
          tmp.next('.delSpin').hide();
          if(data['stat'] === 'success'){
            tmp.closest('tr').remove();
            countProductImageRowAndDisplayText();
          }else{
          // $('.alert alert-danger').html(data['msg']);
            }
        }
      });
    }
  });

});

// var inputVal = $('#productForm .inputType').val();
// var inputType = $('#productForm .inputType').closest('.attribute').find('.inputfield');
// if (inputVal == 'textfield') {
//   inputType.hide();
//   inputType.siblings('.textfield').show();
// }else if(inputVal == 'textarea'){
//   inputType.hide();
//   inputType.siblings('.textarea').show();
// }

$('#productForm .inputType').each(function(){
  var inputVal = $(this).val();
  var inputType = $(this).closest('.attribute').find('.inputfield');
  if (inputVal == 'textfield') {
    inputType.hide();
    inputType.siblings('.textfield').show();
  }else if(inputVal == 'textarea'){
    inputType.hide();
    inputType.siblings('.textarea').show();
  }else if(inputVal == 'dropdown'){
    inputType.hide();
    inputType.siblings('.dropdown').show();
  }else if(inputVal == 'number'){
    inputType.hide();
    inputType.siblings('.number').show();
  }
});

$(document).on('change', '#productForm .inputType', function(){
  var inputVal = $(this).val();
  var inputType = $(this).closest('.attribute').find('.inputfield');
  if (inputVal == 'textfield') {
    inputType.hide();
    inputType.siblings('.textfield').show();
  }else if(inputVal == 'textarea'){
    inputType.hide();
    inputType.siblings('.textarea').show();
  }else if(inputVal == 'dropdown'){
    inputType.hide();
    inputType.siblings('.dropdown').show();
  }else if(inputVal == 'number'){
    inputType.hide();
    inputType.siblings('.number').show();
  }
});



$(document).on('click', '.attributeAdd', function(){
  var html = $('.attribute-extra').html();
  $('.attribute-block').append(html);
  $('#productForm .attribute-block textarea').addClass('tinymce');

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

    
});

$(document).on('click', '.attributeRemove', function(){
  $(this).closest('.attribute').remove();
});

$.validator.setDefaults({
        errorElement: "span",
        errorClass: "help-block",
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
            var id = $(element).closest('.tab-pane').attr('id');
            var tmp = $('#myTab').find('li a i.'+id).each(function(){
              $(this).addClass('fa fa-exclamation-circle');
            });
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
            $('.tab-pane').each(function(){
              var count = $(this).has('.has-error').length;
              var id = $(this).attr('id');
              if (count == 0) {
                $('#myTab li a i.'+id).removeClass('fa fa-exclamation-circle');
              }
            });

        },
        errorPlacement: function (error, element) {
        // if (element.parent('.input-group').length || element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
        // if (element.parent('.input-group').length || element.prop('type') === 'checkbox') {
        // error.insertAfter(element.parent());
        // }else if(element.parent('.input-group').length || element.prop('type') === 'radio'){
        //  $('.radio-error').text(error.text());
        //   // error.insertAfter(element);
        // } else {

        //     // if (element.parent('.input-group').length || element.prop('type') === 'email' ) {
        //     //  error.insertAfter(element);
        //     // }
            error.insertAfter(element);
        // // element.attr("placeholder",error.text());
        // }
    }
});

$('#productForm').validate({
  ignore: [],
  rules:{
    'name': 'required',
    'sku': 'required',
    'short_desc': 'required',
    'detail': 'required',
    'return_policy': 'required',
    'featured': 'required',
    'status': 'required',
    'price': 'required',
    'manage_stock': 'required',
    'category[]': 'required',
    'attr_type[]': 'required',
    'attr_name[]': 'required',
  }
});




/**
 *	end of js for product
 **/


/**
 *  start of js for category
 **/
 $(document).on('click', '.bannerAdd', function(){
  var html = $('.categorybanner-extra').html();
  $('.categorybanner-block').append(html);
    
});

$(document).on('click', '.bannerRemove', function(){
  $(this).closest('.categorybanner').remove();
});

$('#categoryForm').validate({
  ignore: ['ignore'],
  rules:{
    'title': 'required',
    'status': 'required',
    'cat_type': 'required',
    // 'banner_title[]': 'required',
    // 'uploadBanner[]': 'required',
  }
});

/**
 *  end of js for category
 **/


 /**
 *  start of js for attributes
 **/

 $(document).on('click', '.addValueBtn', function(){
  tmp = $('.addValue').html();
  $('.valueBlock').append(tmp);
 });

  $(document).on('click', '.removeValueBtn', function(){
  tmp = $('.addValue').html();
  $(this).closest('.box').remove();
 });

  $('.attributeForm').validate({
  ignore: [],
  rules:{
    'name': 'required',
    'status': 'required',
    'attr_order': 'required',
    'value[]': 'required',
    'value_order[]': 'required',
    'value_status[]': 'required',
  }
});


 /**
 *  end of js for attributes
 **/

});


// function handleFileSelect(e) {
// 	$('.selectedFiles').html('');
// 	var files = e.target.files;
// 	var filesArr = Array.prototype.slice.call(files);
// 	filesArr.forEach(function(f, index) {          
// 		if(!f.type.match("image.*")) {
// 			return;
// 		}
//       // storedFiles.push(f);
//       var reader = new FileReader();
//       reader.onload = function (e) {
//         // var html = "<div class=\"col-md-3 col-sm-3\"><div class=\"show-img-bg\" style= \"background-image: url('"+e.target.result+"')\"></div><input type=\"radio\" name=\"default\" value=\""+f.name+"\"> Set Cover Image" + "</div>";
//       	var html = "<tr><td><img src=\""+e.target.result+"\" height=\"50\" width=\"50\"></td><td>"+index+"</td><td><input name=\"base_img[]\" type=\"checkbox\" value=\""+index+"\"></td><td><input name=\"small_img[]\" type=\"checkbox\" value=\""+index+"\"> </td><td><input name=\"thumbnail_img[]\" type=\"checkbox\" value=\""+index+"\"></td><td>Upload Remaining</td></tr>";
//       	$(".selectedFiles").append(html);

//     //       $('input').iCheck({
// 		  //   checkboxClass: 'icheckbox_square-blue',
// 		  //   radioClass: 'iradio_square-blue',
// 		  //   increaseArea: '20%' // optional
// 		  // });
// }
// reader.readAsDataURL(f); 
// });
// }


/**
 * method used to show image preview when image is selected
 */
function readURL(input, preview) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#feat-img-preview').hide();
      $(preview).css('background-image', 'url('+e.target.result+')').show();
    }

    reader.readAsDataURL(input.files[0]);
  }else{
    $(preview).hide().css('background-image', 'url(\'\')');
  }
}

/**
 * method used to show image preview when image is selected
 */
function readImageURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    

    reader.onload = function (e) {
    var tmp = $(input).closest('.form-group').find('.show-img-bg').first();
      $(tmp).css('background-image', 'url('+e.target.result+')').show();
      $(input).closest('.form-group').find('.image-preview').hide();
    }

    reader.readAsDataURL(input.files[0]);
  }else{
    var tmp = $(input).closest('.form-group').find('.show-img-bg').first();
    $(tmp).hide().css('background-image', 'url(\'\')');
  }
}

/**
 * method used to check if there is any product image, if not no image text is shown
 */
function countProductImageRowAndDisplayText(){
  var imageCount = $('.selectedFiles').find('tr').not('.noProductImage').length;
  if (imageCount == 0) {
    $('.noProductImage').show();
  }else{
    $('.noProductImage').hide();
  }
}


//------------------------------------------Members and Brand section---------------------------------------------------------------------------------



/**
   * Check File Types.
*/

function Validate(input)
{
    var ext = $(input).val().split('.').pop().toLowerCase();
   
    if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
       return false;
    }
    else{

      return true;
    }    
}

 // Give image source to preview with preview element as argument.

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
      // $(preview).css('background-image', 'url('+e.target.result+')').show();
    }

    reader.readAsDataURL(input.files[0]);
  }
}


$('#logo_preview').hide();
$('#logo').change(function(){
	getImageSrc(this,'#logo_preview');
});

if ($('#logo_edit').val()==null) {
  $('#logo_preview_edit').hide();
}

$('#logo_edit').change(function(){
  getImageSrc(this,'#logo_preview_edit');
});







function elFinderBrowser(callback, value, meta) {
        var request = base_url + 'yelfinder/tinymce4';
        tinymce.activeEditor.windowManager.open({
            title: 'admin.elfinder',
            url: request,
            width: 900,
            height: 450,
           path : '/public/files/',
            resizable: 'yes',
            
            uiOptions: {
                    toolbar : [
                        // toolbar configuration
                        ['open'],
                        ['back', 'forward'],
                        ['reload'],
                        ['home', 'up'],
                        ['mkdir', 'mkfile', 'upload'],
                        ['info'],
                        ['quicklook'],
                        ['copy', 'cut', 'paste'],
                        ['rm'],
                        ['duplicate', 'rename', 'edit'],
                        ['extract', 'archive'],
                        ['search'],
                        ['view'],
                        ['help']
                    ],
                    path : '/public/files/'
                },
                contextmenu : {
                    files  : [
                        'getfile', '|','open', '|', 'copy', 'cut', 'paste', 'duplicate', '|',
                        'rm', '|', 'edit', 'rename', '|', 'archive', 'extract', '|', 'info'
                    ]
                }
        }, {
            setUrl: function (url) {
                callback(url);
                //$('.mce-textbox').val(url.replace('files','public/files'));
               
            }
        });
        return false;
    }
    function readLogoURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#previewLogo').attr('src', e.target.result).removeClass('hide');
      $("#img-preview").hide();
    }
    reader.readAsDataURL(input.files[0]);
  }else{
    $('#previewLogo').addClass('hide').attr('src', 'url(\'\')');
  }
}

function readFaviconURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#previewFavicon').attr('src', e.target.result).removeClass('hide');
      $("#img-preview2").hide();
    }
    reader.readAsDataURL(input.files[0]);
  }else{
    $('#previewFavicon').addClass('hide').attr('src', 'url(\'\')');
  }
}



