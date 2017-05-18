@extends('backend.layouts.app')

@section ('title', 'Edit Category')

@section('page-header')
 <h1>
   Category Management
    <!-- <small>Lists of Pages</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Category</a></li>
    <li class="active">
      Edit Category
  </li>
  </ol>
@endsection

@section('content')
{{ Form::model($item, array('url' => "admin/category/edit/{$item->id}", 'role'=>'form', 'files'=>'true')) }}
  <div class="row">
    <div class="col-md-9"> 

		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Edit Category</h3>
				<a href="{{ url('admin/category')}}" class="btn btn-warning btn-sm pull-right">Go Back</a>
			</div><!-- /.box-header -->
			<div class="box-body">
					<div class="form-group">
						<label for="title" class="control-label">Title</label>
							{{ Form::text('title',null,array('class'=>'form-control'))}}
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
		            	<label for="url" class="control-label">URL</label>
		            		{{ Form::text('url',null,array('class'=>'form-control'))}}
		            </div>

		            <div class="form-group">
		            	<label for="url" class="control-label">Description</label>
		            		{{ Form::textarea('description',null,array('class'=>'form-control'))}}
		            </div>
		            
			</div><!-- /.box-body -->
		</div><!-- /.box -->

		<div class="box collapsed-box">
				<div class="box-header with-border">
					<h3 class="box-title">SEO Settings</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<!-- /.box-header -->
				<div class="box-body">
					<div id="seo-block">
						<div class="form-group">
							<label class="control-label">Meta Title</label>
							{{Form::text('meta_title',null,['class'=>'form-control', 'placeholder'=>'Enter Meta Title'])}}
						</div>

						<div class="form-group">
							<label class="control-label">Meta Keyword</label>
							{{Form::textarea('meta_keyword',null,['class'=>'form-control', 'rows'=>'4', 'placeholder'=>'Enter Meta Keyword'])}}
						</div>

						<div class="form-group">
							<label class="control-label">Meta Description</label>
							{{Form::textarea('meta_desc',null,['class'=>'form-control',  'rows'=>'4', 'placeholder'=>'Enter Meta Description'])}}
						</div>
					</div>
				</div>
			</div>
    </div>

    <div class="col-md-3">
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Status</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
			<div class="box-body">
				{{Form::select('status',['0' => 'Inactive', '1'=>'Active'],null,['class'=>'form-control'])}}
			</div><!-- /.box-body -->
		</div><!-- /.box -->

		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Featured Image</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="form-group">
					<span class="btn btn-primary btn-file btn-sm">
						<i class="fa fa-folder-open"></i>Upload Featured Image
						<input type="file" name="upload" class="form-control" onchange="readURL(this,'#preview');" accept="image/*">
					</span>
					@if(!empty($item->feat_img))
					<div id="feat-img-preview" >
						<div style="background-image:url({{url('images/category/'.$item->feat_img)}})" alt = "image preview" title="image preview" class="show-img-bg">
						</div>
					</div>
					<br>
					@endif
					<div id="preview" class="show-img-bg display-none" alt="Image Preview"></div>
				</div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->

	   <div class="form-group">	
		   	{{Form::submit('Save',['class'=>'btn bg-olive'])}}
	   </div>
	</div>
  </div>
{{ Form::close()}}
@include('backend.includes.tinymce')


@stop