@extends('backend.layouts.app')

@section ('title', 'Sliders Management')

@section('page-header')
<h1>
	Sliders
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Sliders Management 
	</li>
	<li class="active">
		All Sliders
	</li>
</ol>
@endsection

@section('content')
<!-- Main content -->
	<div class="box">
		<div class="box-header with-border">
           <a  href={{url('admin/sliders/create')}} class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus">
                </span> Add Slider</a>
         </div>
        <br>
        <div class="box-body">
            <div class="table-responsive">
				<table id="slider-table" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>S.N</th>
							<th>Title</th>
							<!-- <th>Created At</th>
							<th>Last updated</th> -->
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
		<!-- /.box-body -->
	</div>


@endsection