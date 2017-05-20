@extends('backend.layouts.app')

@section('after-styles')

{{ Html::style('js/backend/plugin/farbtastic/farbtastic.css') }}

@endsection

@section ('title', 'Static-Blocks Management')

@section('page-header')
<h1>
	Create Static-Block
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
{{Form::open(['url'=>'admin/static_blocks','files'=>'true'])}}
<!-- The block to clone after add more. -->
<div class="block-staticblock">
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
						{{Form::text('url[]',null,['class'=>'form-control url', 'placeholder'=>'Enter Url','required'=>'required'])}}
					</div>
					<div class="form-group">
						<label class="control-label">Content</label>
						{{Form::textarea('content[]',null,['class'=>'form-control content', 'placeholder'=>'Enter Content'])}}
					</div>
					<div class="form-group">
						<label class="control-label">Choose Background option<em class="asterisk">*</em></label>
						<div class="row">	
							<div class="col-md-12">
								{{Form::select('BackgroundOption[]',['color'=>'Background Color','image'=>'Background Image'],null,['class'=>'form-control BackgroundOption'])}}							
							</div>
						</div>
						<br>
						<div class="col-md-12 color_select" >
							<div class="bfh-colorpicker" data-name="colorpicker1">
								<span class="input-group-addon">							
									{{Form::text('BgColor[]','#123456',['class'=>'form-control color'])}}
								</span>
								<div class="colorpicker"></div> 
							</div> 
						</div>
						<div class="col-md-12 image_select" >
							
	    						
	    						{{Form::file('Background_image[]',['class'=>'bg_image_upload','required'=>'required'])}}  
							<img class="bg_image_preview" width="700" height="370" src="#"  alt="Preview" />
						</div>
					</div>	
						
				</div>
				<!-- /.box-body -->
			</div>
			
		</div>
		<div class="col-md-3">
			<div class="row">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Selected Page<em class="asterisk">*</em></h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div><!-- /.box-tools -->
					</div><!-- /.box-header -->
					<div class="box-body">
						{{Form::select('page[]',$page,null,['class'=>'form-control page'])}}
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
						
						{{Form::file('feature_image[]',['class'=>'feature_image','required'=>'required'])}} 
						
						<img class="feature_image_preview" width="260" height="150"  src="#" alt="preview">
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
				</div>			
			</div>			
		</div>
	</div>
</div>	
<!-- The block to clone after add more. -->
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



@endsection

@section('after-scripts')
{{ Html::script('js/backend/plugin/farbtastic/farbtastic.js') }}
<script type="text/javascript">
	 $(document).ready(function() {

  $('.colorpicker').farbtastic('.color');

});
</script>
@endsection