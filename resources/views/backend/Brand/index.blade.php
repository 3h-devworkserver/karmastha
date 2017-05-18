@extends('backend.layouts.app')

@section ('title', 'Brands Management')

@section('page-header')
<h1>
	Brand Management
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Brands Management 
	</li>
	<li class="active">
		All Brands
	</li>
</ol>
@endsection

@section('content')
<!-- Main content -->
	<div class="box">
		<div class="box-header with-border">
            <h3 class="box-title">List of Brands</h3>
            <div class="box-tools pull-right">
                @include('backend.Brand.includes.headerbutton')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

		<!-- /.box-header -->
		<div class="box-body">
            <div class="table-responsive">
				<table id="brand-table" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Brand Name</th>
							<th>Brand Logo</th>
							<th>Url</th>
							<th>Created At</th>
							<th>Last Updated</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
		<!-- /.box-body -->
	</div>


@endsection