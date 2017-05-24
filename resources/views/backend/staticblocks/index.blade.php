@extends('backend.layouts.app')

@section ('title', 'Static-Blocks Management')

@section('page-header')
<h1>
	Static-Block Management
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Static-Blocks Management 
	</li>
	<li class="active">
		All Static-Blocks
	</li>
</ol>
@endsection

@section('content')
<!-- Main content -->
	<div class="box">
		<div class="box-header with-border">
            <h3 class="box-title">List of Static-Blocks</h3>
             <a  href={{url('admin/static_blocks/create')}} class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus">
                </span> Add Static-Block</a>
        </div><!-- /.box-header -->

		<!-- /.box-header -->
		<div class="box-body">
            <div class="table-responsive">
				<table id="static-blocks-table" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>S.N</th>
							<th>Page</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
		<!-- /.box-body -->
	</div>


@endsection