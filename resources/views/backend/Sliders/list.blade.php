@extends('backend.layouts.app')

@section ('title', 'Sliders Management')

@section('page-header')
<h1>
	{{$slider_title}}
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Sliders Management 
	</li>
	<li class="active">
		Slide list
	</li>
</ol>
@endsection
	
@section('content')
{{Form::open(['url'=>'admin/sliders/'.$slider_title,'method' =>'patch', 'files'=> 'true'])}}
<div class="row">
	<div class="col-md-9">
		<div class="box">
			<div class="box-body">
				<div class="form-group">
					<label class="control-label">Title</label>
					{{Form::text('title',$slider_title,['class'=>'form-control', 'placeholder'=>'Enter title'])}}
				</div>
				<div class="form-group">	
					{{Form::submit('update',['class'=>'btn btn-karm pull-right'])}}
				</div>
			</div>	
		</div>
	</div>
					
</div>
{{Form::close()}}



<div class="box">
		<div class="box-header with-border">
		<label class="control-label">Slide list</label>
           <a  href="{{url('admin/sliders/'.$slider_title.'/create')}}" class="btn btn-karm btn-sm pull-right"><span class="glyphicon glyphicon-plus">
                </span> Add Slide</a>
         </div>
        <br>
        <input type="hidden" id="slider-title" value="{{$slider_title}}" /> 
        <div class="box-body">
            <div class="table-responsive">
				<table id="slide-list-table" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>S.N</th>
							<th>Image</th>
							<th>Caption</th>
							<th>Link</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
		<!-- /.box-body -->
	</div>

@endsection