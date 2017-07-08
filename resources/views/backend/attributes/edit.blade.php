@extends('backend.layouts.app')

@section ('title', 'Edit Attribute')

@section('page-header')
<h1>
	Edit Attribute
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Attributes Management 
	</li>
	<li class="active">
		Edit Attribute
	</li>
</ol>
@endsection

@section('content')
<div class="addValue hide">
	<div class="box box-orange">
		<div class="box-header">
			<!-- <h3 class="box-title">Create Page</h3> -->
			<div class="box-tools pull-right">
				<a href="javascript:void(0);" class="removeValueBtn btn btn-sm btn-danger"><i class="fa fa-trash"></i> Remove</a>
			</div><!-- /.box-tools -->
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="form-group">
				<label class="control-label">Value<em class="asterisk">*</em></label>
				{{Form::text('value[]',null,['class'=>'form-control', 'placeholder'=>'Enter Value'])}}
			</div>
			<div class="form-group">
				<label class="control-label">Value Order</label>
				{{Form::number('value_order[]',0,['class'=>'form-control','min'=>'0'])}}
			</div>
			<div class="form-group">
				<label class="control-label">Value Status</label>
				{{Form::select('value_status[]',['0' => 'Inactive', '1'=>'Active'],null,['class'=>'form-control'])}}
			</div>
		</div>
		<!-- /.box-body -->
	</div>
</div>

{{Form::model($attribute, ['url'=>'admin/attributes/'.$attribute->id,'files'=>'true', 'class'=>'attributeForm', 'method'=>'PATCH'])}}
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
		
		<div class="valueBlock">
			@if(count($attribute->attributesValuesWithOrder) > 0)
				@foreach($attribute->attributesValuesWithOrder as $val)
				<div class="box box-orange">
					<div class="box-header">
						<!-- <h3 class="box-title">Create Page</h3> -->
						<div class="box-tools pull-right">
							<a href="javascript:void(0);" class="removeValueBtn btn btn-sm btn-danger"><i class="fa fa-trash"></i> Remove</a>
						</div><!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="form-group">
							<label class="control-label">Value<em class="asterisk">*</em></label>
							{{Form::text('value[]',$val->value,['class'=>'form-control', 'placeholder'=>'Enter Value'])}}
						</div>
						<div class="form-group">
							<label class="control-label">Value Order</label>
							{{Form::number('value_order[]',$val->value_order,['class'=>'form-control','min'=>'0'])}}
						</div>
						<div class="form-group">
							<label class="control-label">Value Status</label>
							{{Form::select('value_status[]',['0' => 'Inactive', '1'=>'Active'],$val->value_status,['class'=>'form-control'])}}
						</div>
					</div>
				</div>
				@endforeach
			@endif
		</div>

		<div>
			<a href="javascript:void(0);" class="addValueBtn btn btn-primary">Add Value</a>
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
				{{Form::number('attr_order',0,['class'=>'form-control s_order','min'=>'0'])}}
			</div><!-- /.box-body -->
		</div><!-- /.box -->


		<div class="form-group">	
			{{Form::submit('Save',['class'=>'btn btn-karm'])}}
		</div>
	</div>
</div>
{{Form::close()}}


@endsection
