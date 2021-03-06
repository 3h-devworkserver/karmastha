@extends('backend.layouts.app')

@section ('title', 'Create Brand')

@section('page-header')
<h1>
	Create Brand
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Brands Management 
	</li>
	<li class="active">
		Add New Brand
	</li>
</ol>
@endsection

@section('content')
{{Form::open(['url'=>'admin/brands','files'=>'true'])}}
<div class="row">
	<div class="col-md-9">
		<div class="box box-orange">
			<div class="box-header">
				<!-- <h3 class="box-title">Create Page</h3> -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">

				<div class="form-group">
					<label class="control-label">Name<em class="asterisk">*</em></label>
					{{Form::text('brand_name',null,['class'=>'form-control', 'placeholder'=>'Enter Name','required'=>'required'])}}
				</div>

				<div class="form-group">
					<label class="control-label">Brand Logo<em class="asterisk">*</em></label>
					<br>
					<span class="btn btn-sm btn-karm btn-file">
					<i class="fa fa-folder-open"></i>Upload Brand Logo
						<input id='logo' type="file" name="brand_logo" class="form-control logo" accept="image/*" required="required">
					</span>
					<!-- <div id="logo_preview" class="show-img-bg display-none" alt="Image Preview"></div> -->
					<br><br>
					<img class="img-center" width="250" height="150" id="logo_preview" src="#" alt="logo preview">
				</div>
				
				<div class="form-group">
					<label class="control-label">Slug</label>
					<div class="input-group">
					  <span class="input-group-addon">{{url('/').'/brand/'}}</span>
					  {{Form::text('slug',null,['class'=>'form-control', 'placeholder'=>'Enter Slug','required'=>'required'])}}
					</div>
				</div>

				<div class="form-group">
					<label class="control-label">Description<em class="asterisk">*</em></label>
					{!!Form::textarea('description',null,['class'=>'form-control', 'placeholder'=>'Enter Description']) !!}
				</div>

			</div>
			<!-- /.box-body -->
		</div>

		<div class="box box-orange">
			<div class="box-header with-border">
				<h3 class="box-title">Category Associations</h3>
				<div class="box-tools pull-right">
			        {{-- @include('backend.products.includes.expandcollapsebutton') --}}
			    </div><!--box-tools pull-right-->
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<ul id="tree1">
				    @foreach($categorys as $category)
			            <li>
			                {{Form::checkbox('category[]', $category->id, null, ['id'=>'checkbox'.$category->id])}}<label for="checkbox{{$category->id}}"><span></span></label> {{ $category->title }}
			                @if(count($category->childs))
			                    @include('backend.products.create.managechild',['childs' => $category->childs, 'parentId'=>$category->id])
			                @endif
			            </li>
			        @endforeach
				</ul>
			</div>
			<!-- /.box-body -->
		</div>.
	</div>
	<div class="col-md-3">
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Status</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
			<div class="box-body">
				{{Form::select('status',['0' => 'Inactive', '1'=>'Active'],null,['class'=>'form-control'])}}
			</div><!-- /.box-body -->
		</div><!-- /.box -->
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Top Brand Option</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
			<div class="box-body">
				{{Form::select('topbrand',['0'=>'not topbrand', '1' => 'topbrand'],null,['class'=>'form-control'])}}
			</div><!-- /.box-body -->
		</div><!-- /.box -->

		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Order</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
			<div class="box-body">
				{{Form::number('b_order',0,['class'=>'form-control b_order','min'=>'0'])}}
			</div><!-- /.box-body -->
		</div><!-- /.box -->

		<div class="form-group">	
			{{Form::submit('Create',['class'=>'btn btn-karm'])}}
		</div>
	</div>
</div>
{{Form::close()}}
@include('backend.includes.tinymce')

@endsection
