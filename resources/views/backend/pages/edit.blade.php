@extends('backend.layouts.app')

@section ('title', 'Edit Page')

@section('page-header')
<h1>
	Edit Page
</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Pages</a></li>
		<li class="active">
			Add New Page
		</li>
	</ol>
@endsection

@section('content')
<!-- Main content -->
	<div class="row">
		{{Form::model($page,['url'=>'admin/pages/'.$page->id, 'method' =>'patch', 'files'=> 'true'])}}
		<div class="col-md-9">
			<div class="box box-orange">
				<div class="box-header">
					<!-- <h3 class="box-title">Create Page</h3> -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">

					<div class="form-group">
						<label class="control-label">Page Title<em class="asterisk">*</em></label>
						{{Form::text('title',null,['class'=>'form-control', 'placeholder'=>'Enter Title'])}}
					</div>

					<div class="form-group">
						<label class="control-label">Slug</label>
						<div class="input-group">
						  <span class="input-group-addon">{{url('/').'/'}}</span>
						  {{Form::text('slug',null,['class'=>'form-control', 'placeholder'=>'Enter Slug'])}}
						</div>
					</div>

					<div class="form-group">
						<label class="control-label">Top Content</label>
							{!!Form::textarea('top_content',null,['class'=>'form-control', 'placeholder'=>'Enter Content']) !!}
					</div>

					<div class="form-group">
						<label class="control-label">Bottom Content</label>
							{!!Form::textarea('bottom_content',null,['class'=>'form-control', 'placeholder'=>'Enter Content']) !!}
					</div>
					
				</div>
				<!-- /.box-body -->
			</div>
			
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
					<h3 class="box-title">Status<em class="asterisk">*</em></h3>
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
					<h3 class="box-title">Slider<em class="asterisk">*</em></h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="form-group">
						{{Form::select('slider',['0' => 'Disable', '1'=>'Enable'],null,['class'=>'form-control'])}}
					</div>
					<div class="form-group">
						<label class="control-label">Select Slider</label>
						{{Form::select('slider_identifier',$sliders->toArray(),null,['class'=>'form-control'])}}
					</div>
				</div><!-- /.box-body -->
			</div><!-- /.box -->

		   <div class="form-group">	
			   	{{Form::submit('Save',['class'=>'btn bg-olive'])}}
		   </div>
		</div>

   {{Form::close()}}
   </div>
     @include('backend.includes.tinymce')
   	


@endsection
