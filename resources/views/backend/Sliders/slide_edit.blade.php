@extends('backend.layouts.app')

@section ('title', 'Sliders Management')

@section('page-header')
<h1>
	Edit Slide
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Sliders Management 
	</li>
	<li class="active">
		Edit Slide
	</li>
</ol>
@endsection

@section('content')

{{Form::open(['url'=>'admin/slide/'.$slide->id,'method' =>'patch', 'files'=> 'true','id'=>'formSlide-'.$slide->id])}}

<!-- The block to clone after add more. -->

<div class="block-edit">
	<div class="row">
		<div class="col-md-9">
			<div class="box">
				<div class="box-body">
					{{ Form::hidden('title',$slide->title) }}
					<div class="form-group">
						<label class="control-label">Caption</label>
						{!!Form::textarea('caption',$slide->caption,['class'=>'form-control caption-edit', 'rows'=>'3','placeholder'=>'Enter Caption']) !!}
					</div>
					<div class="form-group">
						<label class="control-label">Slider Image</label>
						<input type="file" name="Slider_image" id="Slider_image_edit" accept="image/*" 
						alt="Slide_image" class="image_upload_edit"  >
						<img  class="sdPreview_edit" src="{{url($slide->Slider_image)}}"  width="675"  height="300" alt="" />						
					</div>
				</div>
			</div>			
		</div>
		<div class="col-md-3">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Add link</h3>
				</div>

				<div class="box-body">
					{{Form::text('link',$slide->link,['class'=>'form-control link-edit','placeholder'=>'Enter link'])}}
				</div>
				
			</div>
		</div>
	</div>

<!-- The block to clone after add more. -->
{{Form::close()}}
		<div class="row">
			<div class='col-md-9'></div>
			<div class="col-md-3">
				<div class="form-group">									
					<button type="submit" class="btn btn-karm btn-sm updateBtn" value="{{$slide->id}}">Update Slide</button>
				</div>
			</div>
		</div>

</div>		

@endsection