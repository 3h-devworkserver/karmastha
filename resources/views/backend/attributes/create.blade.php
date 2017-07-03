@extends('backend.layouts.app')

@section ('title', 'Members Management')

@section('page-header')
<h1>
	Create Attribute
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Attributes Management 
	</li>
	<li class="active">
		Add New Attribute
	</li>
</ol>
@endsection

@section('content')
{{Form::open(['url'=>'admin/attributes','files'=>'true'])}}
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
					{{Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Enter Name'])}}
				</div>

				<div class="form-group">
					<label class="control-label">Short Description</label>
					{{Form::text('short_desc',null,['class'=>'form-control', 'placeholder'=>'Enter Short Description'])}}
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
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Order</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
			<div class="box-body">
				{{Form::number('m_order',0,['class'=>'form-control s_order','min'=>'0'])}}
			</div><!-- /.box-body -->
		</div><!-- /.box -->


		<div class="form-group">	
			{{Form::submit('Create',['class'=>'btn btn-karm'])}}
		</div>
	</div>
</div>
{{Form::close()}}


@endsection
