@extends('backend.layouts.app')

@section ('title', 'Members Management')

@section('page-header')
<h1>
	Members
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Members Management 
	</li>
	<li class="active">
		Edit Member
	</li>
</ol>
@endsection

@section('content')
{{Form::model($member,['url'=>'admin/members/'.$member->id,'method' =>'patch', 'files'=> 'true'])}}
<div class="row">
	<div class="col-md-9">
		<div class="box box-orange">
			<div class="box-header">
				
			</div>
			<!-- /.box-header -->
			<div class="box-body">

				<div class="form-group">
					<label class="control-label">Name</label>
					{{ Form::text('Name',null,['class'=>'form-control', 'placeholder'=>'Enter Name']) }}
				</div>

				<div class="form-group">
					<label class="control-label">Logo</label>
					<br>
					<span class="btn btn-sm btn-karm btn-file">
					<i class="fa fa-folder-open"></i>Upload Member Logo
						<input id='logo_edit' type="file" name="logo" class="form-control logo_edit" accept="image/*">
					</span> 
					<br><br>
					<img class="img-center" width="250" height="150" id="logo_preview_edit" src="{{url($member->logo)}}" alt="logo preview">

				</div>

				<div class="form-group">
					<label class="control-label">Url</label>
					{{Form::text('url',null,['class'=>'form-control', 'placeholder'=>'Enter Url']) }}
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
				{{Form::number('m_order',null,['class'=>'form-control s_order','min'=>'0'])}}
			</div><!-- /.box-body -->
		</div><!-- /.box -->

		<div class="form-group">	
			{{Form::submit('Update',['class'=>'btn btn-karm'])}}
		</div>
	</div>
</div>
{{Form::close()}}
@endsection