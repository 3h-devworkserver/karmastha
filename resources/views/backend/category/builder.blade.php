@extends('backend.layouts.app')

@section ('title', 'Category Management')

@section('page-header')
<h1>
   Category Management
    <!-- <small>Lists of Pages</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Category</a></li>
    <li class="active">
      Category Management
  </li>
  </ol>
@endsection

@section('content')

  <div class="row">
    <div class="col-md-8"> 

      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Category </h3>
          <a href="{{url('admin/category/create')}}" class="btn btn-info btn-xs pull-right" ><span class="glyphicon glyphicon-plus-sign"></span> Add New</a>
          {{-- <a href="#newModal" class="btn btn-info pull-right" data-toggle="modal"><span class="glyphicon glyphicon-plus-sign"></span> new category item</a> --}}
        </div><!-- /.box-header -->
        <div class="box-body">

        <div class="dd" id="nestable">
          {!! $menu !!}
        </div>

        <p id="success-indicator" style="display:none; margin-right: 10px;">
          <span class="glyphicon glyphicon-ok"></span> Categroy order has been saved
        </p>
        </div><!-- /.box-body -->
      
      </div>

    </div>
    <div class="col-md-4">
      <div class="well">
        <p>Drag items to move them in a different order</p>
      </div>
    </div>
  </div>



  <!-- Create new item Modal -->
   <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
        {{ Form::open(array('url'=>'admin/category/new','class'=>'form-horizontal','role'=>'form'))}}
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Provide details of the new category item</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="title" class="col-lg-2 control-label">Title</label>
                <div class="col-lg-10">
                  {{ Form::text('title',null,array('class'=>'form-control'))}}
                </div>
            </div>
            <?php /*  ?>
            <div class="form-group">
                <label for="label" class="col-lg-2 control-label">Label</label>
                <div class="col-lg-10">
                  {{ Form::text('label',null,array('class'=>'form-control', 'required'))}}
                </div>
            </div>
            <?php */ ?>
            <div class="form-group">
                <label for="url" class="col-lg-2 control-label">URL</label>
                <div class="col-lg-10">
                  {{ Form::text('url',null,array('class'=>'form-control'))}}
                </div>
            </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
           <button type="submit" class="btn btn-primary">Create</button>
         </div>
         {{ Form::close()}}
       </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->

  <!-- Delete item Modal -->
   <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
          {{ Form::open(array('url'=>'admin/category/delete')) }}
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><span class="text-danger">Are you sure you want to delete this category item?</span></h4>
          </div>
          <!-- <div class="modal-body">
            <p>Are you sure you want to delete this menu item?</p>
          </div> -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <input type="hidden" name="delete_id" id="postvalue" value="" />
            <input type="submit" class="btn btn-danger" value="Delete Item" />
          </div>
          {{ Form::close() }}
       </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->

@section('after-scripts')
    
    <script type="text/javascript">
  
  /**
   ** Category Management
   **/
$(function() {
  $('.dd').nestable({ 
    dropCallback: function(details) {
       
       var order = new Array();
       $("li[data-id='"+details.destId +"']").find('ol:first').children().each(function(index,elem) {
         order[index] = $(elem).attr('data-id');
       });

       if (order.length === 0){
        var rootOrder = new Array();
        $("#nestable > ol > li").each(function(index,elem) {
          rootOrder[index] = $(elem).attr('data-id');
        });
       }

       $.post('{{url("admin/category/")}}',
        { source : details.sourceId,
          destination: details.destId, 
          order:JSON.stringify(order),
          rootOrder:JSON.stringify(rootOrder)
        }, 
        function(data) {
         // console.log('data '+data); 
        })
       .done(function() { 
          $( "#success-indicator" ).fadeIn(100).delay(2000).fadeOut();
       })
       .fail(function() {  })
       .always(function() {  });
     }
   });

  $('.delete_toggle').each(function(index,elem) {
      $(elem).click(function(e){
        e.preventDefault();
        $('#postvalue').attr('value',$(elem).attr('rel'));
        $('#deleteModal').modal('toggle');
      });
  });
});
</script>

@endsection



@stop

