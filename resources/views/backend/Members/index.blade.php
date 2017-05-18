@extends('backend.layouts.app')

@section ('title', 'Members Management')

@section('page-header')
<h1>
	Member Management
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Members Management 
	</li>
	<li class="active">
		All Members
	</li>
</ol>
@endsection

@section('content')
<!-- Main content -->
	<div class="box">
		<div class="box-header with-border">
            <h3 class="box-title">List of Members</h3>
            <div class="box-tools pull-right">
                @include('backend.Members.includes.headerbutton')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

		<!-- /.box-header -->
		<div class="box-body">
            <div class="table-responsive">
				<table id="member-table" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Logo</th>
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