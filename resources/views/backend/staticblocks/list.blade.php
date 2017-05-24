@extends('backend.layouts.app')

@section ('title', 'Static-Blocks Management')

@section('page-header')
<h1>
	{{$title}}
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Static-Blocks Management 
	</li>
	<li class="active">
		Static-Block list
	</li>
</ol>
@endsection
	
@section('content')

<div class="box">
		<div class="box-header with-border">
		<label class="control-label">Static-Blocks</label>
           <a  href="{{url('/admin/static_blocks/create')}}" class="btn btn-karm btn-sm pull-right"><span class="glyphicon glyphicon-plus">
                </span> Add Static-Block</a>
         </div>
        <br>
        <input type="hidden" id="page_id" value="{{$page_id}}" /> 
        <div class="box-body">
            <div class="table-responsive">
				<table id="static-blocks-list-table" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>S.N</th>
							<th>Title</th>
							<th>Identifier</th>
							<th>Feature Image</th>
							<th>Created_at</th>
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