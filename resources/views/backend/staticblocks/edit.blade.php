@extends('backend.layouts.app')

@section('after-styles')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.4.0/css/bootstrap-colorpicker.css">
@endsection

@section ('title', 'Static-Blocks Management')

@section('page-header')
<h1>
	Edit Static-Block
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Static-Blocks Management 
	</li>
	<li class="active">
		Update Static-Block
	</li>
</ol>
@endsection

@section('content')

{{Form::model($static_block,['url'=>'admin/static_blocks/'.$static_block->id,'method' =>'patch', 'files'=> 'true'])}}
<div class="block-staticblock-edit">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-orange">
				<div class="box-header">
					
				</div>
				<!-- /.box-header -->
				<div class="box-body">

					<div class="form-group">
						<label class="control-label">Title<em class="asterisk">*</em></label>
						{{Form::text('title',null,['class'=>'form-control title', 'placeholder'=>'Enter Title','required'=>'required'])}}
					</div>
					<div class="form-group">
						<label class="control-label">Identifier<em class="asterisk">*</em></label>
						{{Form::text('identifier',null,['class'=>'form-control identifier', 'placeholder'=>'Enter Identifier','required'=>'required'])}}
					</div>
					<div class="form-group">
						<label class="control-label">Url<em class="asterisk">*</em></label>
						{{Form::text('url',null,['class'=>'form-control url', 'placeholder'=>'Enter Url'])}}
					</div>
					<div class="form-group">
						<label class="control-label">Content</label>
						{{Form::textarea('content',null,['class'=>'form-control content', 'placeholder'=>'Enter Content','rows'=>'4'])}}
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
	 						<div  data-format="alias" class="input-group colorpicker-component">
								{{Form::text('BgColor',$static_block->bgcolor,['class'=>'form-control'])}}
								<span class="input-group-addon"><i></i></span> 
							</div> 
 						</div>
						<hr>
						
						<div class="col-md-12 image_select" >
							<div class="form-group">
								<span class="btn btn-sm btn-karm btn-file ">
								<i class="fa fa-folder-open"></i>Upload Background Image
									<input type="file" name="Background_image" class="form-control bg_image_upload_edit" accept="image/*">
								</span>
								<img class="bg_image_preview_edit" width="760" height="400"  src="{{url($static_block->bgimage)}}" alt="preview">
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
						<h3 class="box-title">Selected Page<em class="asterisk">*</em></h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div><!-- /.box-tools -->
					</div><!-- /.box-header -->
					<div class="box-body">
						{{Form::select('page',$page,null,['class'=>'form-control page'])}}
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
									<input type="file" name="feature_image" class="form-control feature_image_edit" accept="image/*">
								</span>
								<img class="feature_image_preview_edit" width="260" height="150"  src="{{url($static_block->feature_image)}}" alt="preview">
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
						{{Form::select('status',['0' => 'Inactive', '1'=>'Active'],null,['class'=>'form-control status'])}}
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
						{{Form::select('position',['0' => 'Top', '1'=>'Bottom'],null,['class'=>'form-control position'])}}
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
						{{Form::number('s_order',0,['class'=>'form-control s_order','min'=>'0'])}}
					</div>
				</div>	

				{{Form::submit('Update',['class'=>'btn btn-karm'])}}
		
			</div>			
		</div>
	</div>
</div>


{{Form::close()}}

@include('backend.includes.tinymce')
<div class="clearfix"></div>


@endsection

@section('after-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.4.0/js/bootstrap-colorpicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.4.0/js/bootstrap-colorpicker.min.js"></script>
@endsection