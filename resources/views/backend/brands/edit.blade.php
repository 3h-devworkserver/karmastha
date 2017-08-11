@extends('backend.layouts.app')

@section ('title', 'Brands Management')

@section('page-header')
<h1>
	Brands
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Brands Management 
	</li>
	<li class="active">
		Edit Brand
	</li>
</ol>
@endsection

@section('content')
{{Form::model($brand,['url'=>'admin/brands/'.$brand->id,'method' =>'patch', 'files'=> 'true'])}}
<div class="row">
	<div class="col-md-9">
		<div class="box box-orange">
			<div class="box-header">
				
			</div>
			<!-- /.box-header -->
			<div class="box-body">

				<div class="form-group">
					<label class="control-label">Name</label>
					{{ Form::text('brand_name',null,['class'=>'form-control', 'placeholder'=>'Enter Name']) }}
				</div>

				<div class="form-group">
					<label class="control-label">Logo</label>
					<br>
					<span class="btn btn-sm btn-karm btn-file">
					<i class="fa fa-folder-open"></i>Upload Brand Logo
						<input id='logo_edit' type="file" name="brand_logo" class="form-control logo_edit" accept="image/*" >
					</span>
					<br><br>
					<img class="img-center" width="250" height="150" id="logo_preview_edit" src="{{url($brand->brand_logo)}}" alt="logo preview">

				</div>

				<div class="form-group">
					<label class="control-label">Slug</label>
					{{Form::text('slug',null,['class'=>'form-control', 'placeholder'=>'Enter slug']) }}
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
	            <li >
	            @if(in_array($category->id, $catSelected->toArray()))
	                {{Form::checkbox('category[]', $category->id, true, ['id'=>'checkbox'.$category->id])}}<label for="checkbox{{$category->id}}"><span></span></label> {{ $category->title }}
	            @else
	                {{Form::checkbox('category[]', $category->id, null, ['id'=>'checkbox'.$category->id])}}<label for="checkbox{{$category->id}}"><span></span></label> {{ $category->title }}
	            @endif

	                @if(count($category->childs))
	                    @include('backend.products.edit.managechild',['childs' => $category->childs, 'parentId'=>$category->id])
	                @endif
	            </li>
	        @endforeach
		</ul>
	</div>
	<!-- /.box-body -->
</div>
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
				{{Form::number('b_order',null,['class'=>'form-control b_order','min'=>'0'])}}
			</div><!-- /.box-body -->
		</div><!-- /.box -->


		<div class="form-group">	
			{{Form::submit('Update',['class'=>'btn btn-karm'])}}
		</div>
	</div>
</div>
{{Form::close()}}
@include('backend.includes.tinymce')
@endsection