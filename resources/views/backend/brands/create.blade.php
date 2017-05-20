@extends('backend.layouts.app')

@section ('title', 'Brands Management')

@section('page-header')
<h1>
	Create Brand
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Brands Management 
	</li>
	<li class="active">
		Add New Brand
	</li>
</ol>
@endsection

@section('content')
{{Form::open(['url'=>'admin/brands','files'=>'true'])}}
<div class="row">
	<div class="col-md-9">
		<div class="box box-orange">
			<div class="box-header">
				<!-- <h3 class="box-title">Create Page</h3> -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">

				<div class="form-group">
					<label class="control-label">Name<em class="asterisk">*</em></label>
					{{Form::text('brand_name',null,['class'=>'form-control', 'placeholder'=>'Enter Name','required'=>'required'])}}
				</div>

				<div class="form-group">
					<label class="control-label">Logo<em class="asterisk">*</em></label>
					{{Form::file('brand_logo',array('id' => 'logo'),['class'=>'form-control','required'=>'required'])}} 
					
					<br>
					<img class="img-center" width="150" height="80" id="logo_preview" src="#" alt="logo preview">

				</div>

				<div class="form-group">
					<label class="control-label">Url<em class="asterisk">*</em></label>
					{!!Form::text('url',null,['class'=>'form-control', 'placeholder'=>'Enter Url','required'=>'required']) !!}
				</div>
			</div>
			<!-- /.box-body -->
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


		<div class="form-group">	
			{{Form::submit('Create',['class'=>'btn btn-karm'])}}
		</div>
	</div>
</div>
{{Form::close()}}


@endsection
