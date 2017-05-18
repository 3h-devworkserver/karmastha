@extends('backend.layouts.app')

@section ('title', 'Page Management')

@section('page-header')
<h1>
	Page Management 
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Pages
	</li>
</ol>
@endsection

@section('content')
	<!-- Main content -->
	<div class="box">
		<div class="box-header with-border">
            <h3 class="box-title">List of Pages</h3>
            <div class="box-tools pull-right">
                @include('backend.pages.includes.headerbutton')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

		<!-- /.box-header -->
		<div class="box-body">
            <div class="table-responsive">
				<table id="page-table" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Slug</th>
							<th>Status</th>
							<th>Created At</th>
							<th>Last Updated</th>
							<th>Action</th>
						</tr>
					</thead>

				</table>
			</div>
		</div>
		<!-- /.box-body -->
	</div>
@endsection
	