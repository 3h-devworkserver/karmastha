@extends('backend.layouts.app')

@section ('title', 'Ads Management')

@section('page-header')
<h1>
	Ad Management
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Ads Management 
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
            <h3 class="box-title">List of Ads</h3>
            <div class="box-tools pull-right">
                @include('backend.ads.includes.headerbutton')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

		<!-- /.box-header -->
		<div class="box-body">
            <div class="table-responsive">
				<table id="ads-table" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th><input type="checkbox" id="checkbox0" class="checkAll" name="bulk_select"><label for="checkbox0"><span></span></label></th>
							<th>ID</th>
							<th>Slider Ad</th>
							<th>First Ad</th>
							<th>Second Ad</th>
							<th>Third Ad</th>
							<th>Fourth Ad</th>
							<th>Fifth Ad</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
			@include('backend.includes.bulkactionform', ['url'=>'admin/ads/bulkdelete'])
		</div>
		<!-- /.box-body -->
	</div>


@endsection