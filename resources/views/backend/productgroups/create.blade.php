@extends('backend.layouts.app')

@section ('title', 'Create Product Group')

@section('page-header')
<h1>
	Add New Product Group
</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Product Groups</a></li>
		<li class="active">
			Add New Product Group
		</li>
	</ol>
@endsection

@section('content')
<!-- Main content -->
	<div class="row">
		{{Form::open(['url'=>'admin/productgroups'])}}
		<div class="col-md-9">
			<div class="box box-orange">
				<div class="box-header">
					<!-- <h3 class="box-title">Create Page</h3> -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">

					<div class="form-group">
						<label class="control-label">Product Group Title<em class="asterisk">*</em></label>
						{{Form::text('title',null,['class'=>'form-control', 'placeholder'=>'Enter Title'])}}
					</div>

					<div class="form-group">
						<label class="control-label">Short Description<em class="asterisk">*</em></label>
						{{Form::textarea('short_desc',null,['class'=>'form-control', 'placeholder'=>'Enter Title'])}}
					</div>

				</div>
				<!-- /.box-body -->
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

		   <div class="form-group">	
			   	{{Form::submit('Save',['class'=>'btn btn-karm'])}}
		   </div>
		</div>

   {{Form::close()}}
   </div>
     @include('backend.includes.tinymce')
   	


@endsection
