@extends('backend.layouts.app')

@section ('title', 'Members Management')

@section('page-header')
<h1>
	Create Member
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Members Management 
	</li>
	<li class="active">
		Add New Member
	</li>
</ol>
@endsection

@section('content')
{{Form::open(['url'=>'admin/members','files'=>'true'])}}
<div class="row">
	<div class="col-md-9">
		<div class="box box-orange">
			<div class="box-header">
				<!-- <h3 class="box-title">Create Page</h3> -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">

				<div class="form-group">
					<label class="control-label">Name</label>
					{{Form::text('Name',null,['class'=>'form-control', 'placeholder'=>'Enter Name'])}}
				</div>

				<div class="form-group">
					<label class="control-label">Logo</label>
					{{Form::file('logo',array('id' => 'logo'),['class'=>'form-control'])}} 
					
					<br>
					<img class="img-center" width="150" height="80" id="logo_preview" src="#" alt="logo preview">

				</div>

				<div class="form-group">
					<label class="control-label">Url</label>
					{!!Form::text('url',null,['class'=>'form-control', 'placeholder'=>'Enter Url']) !!}
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
			{{Form::submit('Save',['class'=>'btn bg-olive'])}}
		</div>
	</div>
</div>
{{Form::close()}}


@endsection
