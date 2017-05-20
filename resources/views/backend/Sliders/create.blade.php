@extends('backend.layouts.app')

@section ('title', 'Sliders Management')

@section('page-header')
<h1>
	@if ($slider_title == null)	
			Create Slider
		@else
			Add Slide
		@endif
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Sliders Management 
	</li>
	<li class="active">
		@if ($slider_title == null)	
			Create Slider
		@else
			Add Slide
		@endif
	</li>
</ol>
@endsection

@section('content')
<!-- Main content -->
{{Form::open(['url'=>'admin/sliders','files'=>'true'])}}

<div class="row">
	<div class="col-md-9">
		<div class="box">
			<div class="box-body">
				<div class="form-group">
					<label class="control-label">Title<em class="asterisk">*</em></label>
					@if ($slider_title == null)	
						{{Form::text('title',null,['class'=>'form-control', 'placeholder'=>'Enter title','required'=>'required'])}}
					@else
						{{Form::text('title',$slider_title,['class'=>'form-control', 'placeholder'=>'Enter title','required'=>'required','readonly'])}}
					@endif	
				</div>
			</div>	
		</div>
	</div>				
</div>
<!-- The block to clone after add more. -->
<div class="block">
	<div class="row">
		<div class="col-md-9">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						<label class="control-label">Caption</label>
						{!!Form::textarea('caption[]',null,['class'=>'form-control','rows'=>'3', 'placeholder'=>'Enter Caption']) !!}
					</div>
					<div class="form-group">
						<label class="control-label">Slider Image<em class="asterisk">*</em></label>
						<input type="file" name="Slider_image[]" id="Slider_image" accept="image/*" 
								alt="Slide_image" class="image_upload"  required="required">

								<img  class="sdPreview" src="#"  width="675"  height="300" alt="" />
							
					</div>
						{{ Form::hidden('count[]',null) }}
				</div>
				<!-- /.box-body -->
			</div>			
		</div>
		<div class="col-md-3">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Add link</h3>
				</div>

				<div class="box-body">
					{{Form::text('link[]',null,['class'=>'form-control','placeholder'=>'Enter link'])}}
				</div>
				<!-- /.box-body -->
			</div>	
		</div>
	</div>

</div>
<!-- The block to clone after add more. -->

<div class="row">
	<div class=" col-md-3 ">
		<a class="btn btn-primary add-block">Add More</a>
		<a class="btn btn-warning remove-block">Remove</a>
		<input type="hidden" name="counter" value="0" class="counter">
	</div>
	<div class="col-md-6"></div>
	<div class="col-md-3">
		<div class="form-group">	
			{{Form::submit('Publish Slider',['class'=>'btn btn-karm'])}}
		</div>
	</div>
</div>
{{Form::close()}}


@endsection