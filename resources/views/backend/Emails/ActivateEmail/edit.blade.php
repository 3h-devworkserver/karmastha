@extends('backend.layouts.app')

@section ('title', 'Activate Email')

@section('page-header')
<h1>
	Activate Email
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Activate Email 
	</li>
	<li class="active">
		edit 
	</li>
</ol>
@endsection

@section('content')

{!! Form::open(['url'=>'admin/email/activate', 'id'=>'package-form']) !!}

<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
			</div>
			<div class="box-body">
				<div class="form-group">
					<label class="control-label">Email Template</label>
					{!! Form::textarea('content',$content,['class'=>'form-control', 'placeholder'=>'Enter Content']) !!}
				</div>
				<div class="form-group">
					{!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
				</div>
			</div> 
		</div>
		</div>
		<!-- col-md-12 -->


</div>
{!! Form::close() !!}
@include('backend.includes.tinymce')
<div class="clearfix"></div>





@endsection