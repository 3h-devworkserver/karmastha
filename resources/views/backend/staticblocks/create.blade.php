@extends('backend.layouts.app')

@section('after-styles')

<!-- {{ Html::style('js/backend/plugin/bootstrap-colorpicker.css') }}  -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.4.0/css/bootstrap-colorpicker.css">
@endsection

@section ('title', 'Static-Blocks Management')

@section('page-header')
<h1>
	Add Static-Block
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Static-Blocks Management 
	</li>
	<li class="active">
		Add New Static-Block
	</li>
</ol>
@endsection

@section('content')
<!--The block to be copied -->

<div class="copy_block">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-orange">
				<div class="box-header">
					<!-- <h3 class="box-title">Create Page</h3> -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">

					<div class="form-group">
						<label class="control-label">Title<em class="asterisk">*</em></label>
						{{Form::text('title[]',null,['class'=>'form-control title', 'placeholder'=>'Enter Title','required'=>'required'])}}
					</div>
					<div class="form-group">
						<label class="control-label">Identifier<em class="asterisk">*</em></label>
						{{Form::text('identifier[]',null,['class'=>'form-control identifier', 'placeholder'=>'Enter Identifier','required'=>'required'])}}
					</div>
					<div class="form-group">
						<label class="control-label">Url<em class="asterisk">*</em></label>
						{{Form::text('url[]',null,['class'=>'form-control url', 'placeholder'=>'Enter Url'])}}
					</div>
					<div class="form-group">
						<label class="control-label">Content</label>
						{{Form::textarea('content[]',null,['class'=>'form-control content', 'placeholder'=>'Enter Content','rows'=>'4'])}}
					</div>
					<div class="form-group">
						<label class="control-label">Choose Background option<em class="asterisk">*</em></label>
						<div class="row">	
							<div class="col-md-12">														
								<div class="btn-group btn-group-justified" role="group" aria-label="...">
  									<div class="btn-group" role="group">
    									<button type="button" class="btn btn-default colorbtn">Color</button>
  									</div>
 									<div class="btn-group" role="group">
    									<button type="button" class="btn btn-default imagebtn">Image</button>
  									</div>
  								</div>
							</div>
						</div>

						<div class="col-md-12 color_select" >
							<hr>
	 						<div  data-format="alias" class="input-group bgcolor">
								{{Form::text('BgColor[]','primary',['class'=>'form-control'])}}
								<span class="input-group-addon"><i></i></span> 
							</div> 
 						</div>
						<hr>
						<div class="col-md-12 image_select" >
							<div class="form-group">
								<span class="btn btn-sm btn-karm btn-file ">
								<i class="fa fa-folder-open"></i>Upload Background Image
									<input type="file" name="Background_image[]" class="form-control bg_image_upload" accept="image/*">
								</span>
								<img class="bg_image_preview" width="760" height="400"  src="#" alt="preview">
							</div>	
						</div>
					</div>	

				</div>
				<!-- /.box-body -->
			</div>
			
		</div>
		<div class="col-md-3">
			<div class="row pageSelect">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Select Page<em class="asterisk">*</em></h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div><!-- /.box-tools -->
					</div><!-- /.box-header -->
					<div class="box-body">
						@if($selected_page == null)
							{{Form::select('page',$page,null,['class'=>'form-control page'])}}
						@else
							{{Form::select('page',$page,$selected_page,['class'=>'form-control page','readonly'])}}
						@endif
						
					</div><!-- /.box-body -->
				</div>			
			</div>
			<div class="row">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Upload Feature Image</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div><!-- /.box-tools -->
					</div><!-- /.box-header -->
					<div class="box-body">
						<div class="form-group">
								<span class="btn btn-sm btn-karm btn-file ">
								<i class="fa fa-folder-open"></i>Upload feature Image
									<input type="file" name="feature_image[]" class="form-control feature_image" accept="image/*">
								</span>
								<img class="feature_image_preview" width="260" height="150"  src="#" alt="preview">
						</div>
						
						
					</div><!-- /.box-body -->
				</div>			
			</div>
			<div class="row">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Status</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div><!-- /.box-tools -->
					</div><!-- /.box-header -->
					<div class="box-body">
						{{Form::select('status[]',['0' => 'Inactive', '1'=>'Active'],null,['class'=>'form-control status'])}}
					</div><!-- /.box-body -->
				</div>
				
			</div>
			<div class="row">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Position</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div><!-- /.box-tools -->
					</div><!-- /.box-header -->
					<div class="box-body">
						{{Form::select('position[]',['0' => 'Top', '1'=>'Bottom'],null,['class'=>'form-control position'])}}
					</div><!-- /.box-body -->
				</div>			
			</div>
			<div class="row">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Order</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div><!-- /.box-tools -->
					</div><!-- /.box-header -->
					<div class="box-body">
						{{Form::number('s_order[]',0,['class'=>'form-control s_order','min'=>'0'])}}
					</div><!-- /.box-body -->
					{{ Form::hidden('count[]',null) }}
				</div>			
			</div>			
		</div>
	</div>
</div>
<!--end of the block to be copied -->

{{Form::open(['url'=>'admin/static_blocks','files'=>'true'])}}
<div id="mainblock"></div>

<div class="row">
	<div class=" col-md-3 ">
		<a class="btn btn-primary add-block-staticblock">Add More</a>
		<a class="btn btn-warning remove-block-staticblock">Remove</a>
		<input type="hidden" name="counter" value="0" class="counter">
	</div>
	<div class="col-md-6"></div>
	<div class="col-md-3">
		<div class="form-group">	
			{{Form::submit('Publish',['class'=>'btn btn-karm'])}}
		</div>
	</div>
</div>
{{Form::close()}}

@include('backend.includes.tinymce')
<div class="clearfix"></div>


@endsection

@section('after-scripts')
<!-- {{ Html::script('js/backend/plugin/farbtastic/farbtastic.js') }}
<script type="text/javascript">
	$(document).ready(function() {

  	$('.colorpicker').farbtastic('.color');

	});

</script> -->
<!-- {{ Html::script('js/backend/plugin/bootstrap-colorpicker.js') }}
{{ Html::script('js/backend/plugin/bootstrap-colorpicker.min.js') }}
 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.4.0/js/bootstrap-colorpicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.4.0/js/bootstrap-colorpicker.min.js"></script>
@endsection