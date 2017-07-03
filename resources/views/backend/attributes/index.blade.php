@extends('backend.layouts.app')

@section ('title', 'Attributes Management')

@section('page-header')
<h1>
	Attributes Management 
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Attributes
	</li>
</ol>
@endsection

@section('content')
	<!-- Main content -->
	<div class="box">
		<div class="box-header with-border">
            <h3 class="box-title">List of Attributes</h3>
            <div class="box-tools pull-right">
                @include('backend.attributes.includes.headerbutton')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

		<!-- /.box-header -->
		<div class="box-body">
            <div class="table-responsive">
				<table id="attribute-table" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th><input type="checkbox" id="checkbox0" class="checkAll" name="bulk_select"><label for="checkbox0"><span></span></label></th>
							<th>ID</th>
							<th>Title</th>
							<th>Slug</th>
							<th>Created At</th>
							<th>Last Updated</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>

				</table>
			</div>
			{{-- @include('backend.includes.bulkactionform', ['url'=>'admin/pages/bulkdelete']) --}}
		</div>
		<!-- /.box-body -->
	</div>
@endsection
	