@extends('backend.layouts.app')

@section ('title', 'Products Management')

@section('page-header')
<h1>
	Products Management 
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Products
	</li>
</ol>
@endsection

@section('content')
	<!-- Main content -->
	<div class="box">
		<div class="box-header with-border">
            <h3 class="box-title">List of Products</h3>
            <div class="box-tools pull-right">
                @include('backend.products.includes.headerbutton')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

		<!-- /.box-header -->
		<div class="box-body">
            <div class="table-responsive">
				<table id="product-table" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th><input type="checkbox" class="checkAll" name="bulk_select"></th>
							<th>ID</th>
							<th>Name</th>
							<th>Slug</th>
							<th>SKU</th>
							<th>Price</th>
							<th>Created At</th>
							<th>Last Updated</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>

				</table>
			</div>
			{{Form::open(['url'=>'admin/products/bulkdelete', 'method'=>'delete'])}}
			<input type="hidden" class="ids" name="ids">
			<div class="btn-group dropup">
			    <button type="button" class="btn bnt-sm btn-primary dropdown-toggle" data-toggle="dropdown">
			    Bulk Action <span class="caret"></span></button>
			    <ul class="dropdown-menu" role="menu">
			      <li><a href="javascript:void(0);" class="submit">Delete</a></li>
			      <!-- <li><a href="javascript:void(0);" class="submit">Select All</a></li>
			      <li><a href="javascript:void(0);" class="submit">Deselect All</a></li> -->
			    </ul>
			</div>
			{{Form::close()}}
		</div>
		<!-- /.box-body -->
	</div>
@endsection
	