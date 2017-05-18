@extends('backend.layouts.app')

@section ('title', 'Sliders Management')

@section('page-header')
<h1>
	Edit Slider
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Sliders Management 
	</li>
	<li class="active">
		Edit Slider
	</li>
</ol>
@endsection

@section('content')


<!-- Main content -->



{{Form::open(['url'=>'admin/sliders/'.$slider->id,'method' =>'patch', 'files'=> 'true'])}}
<div class="row">
	<div class="col-md-9">
		<div class="box">
			<div class="box-body">
				<div class="form-group">
					<label class="control-label">Title</label>
					{{Form::text('title',$slider->title,['class'=>'form-control', 'placeholder'=>'Enter title'])}}
				</div>
				<div class="form-group">	
					{{Form::submit('update',['class'=>'btn btn-karm pull-right'])}}
				</div>
			</div>	
		</div>
	</div>
					
</div>
{{Form::close()}}



@foreach($slides as $slide)

{{Form::open(['url'=>'admin/slide/'.$slide->id,'method' =>'patch', 'files'=> 'true','id'=>'formSlide-'.$slide->id])}}

<!-- The block to clone after add more. -->

<div class="block-edit">
	<div class="row">
		<div class="col-md-9">
			<div class="box">
				<div class="box-body">
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
					{{ Form::hidden('count',$slide->count) }}
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
					{{Form::text('link',$slide->link,['class'=>'form-control link-edit','placeholder'=>'Enter link'])}}
				</div>
				
			</div>
		</div>
	</div>

	{{Form::hidden('slider_title',$slider->title,['class'=>'slide-title'])}}

	{{Form::hidden('slide_id',$slide->id,['class'=>'slide-id'])}}

<!-- The block to clone after add more. -->
{{Form::close()}}

		<div class="row">
			<div class='col-md-9'></div>
			<div class="col-md-3">
				<div class="form-group">									
					<!-- {{Form::submit('Update',['class'=>'btn bg-olive'])}} -->
					<button type="submit"  class="btn btn-karm btn-sm updateBtn" value="{{$slide->id}}"  >Update Slide</button>

					<a href="{{ route('admin.slides.destroy', $slide->id) }}" name="delete_item" data-method="delete" class="btn btn-danger deleteBtn"><i class="fa fa-trash-o"></i>Delete</a>
					<!-- <button type="submit" class="btn btn-danger deleteBtn" value="{{$slide->id}}"> Delete Slide</button> -->
				</div>
			</div>
		</div>

</div>		

@endforeach

<div class="row">
	<div class=" col-md-3 ">
		<a class="btn btn-primary add-block-edit">Add More</a>
		<a class="btn btn-warning remove-block-edit">Remove</a>
		<input type="hidden" name="counter" value="0" class="counter" />
	</div>
</div>

@endsection