@extends('backend.layouts.app')

@section ('title', 'Create Product')

@section('page-header')
<h1>
	Add New Product
</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Products</a></li>
		<li class="active">
			Add New Product
		</li>
	</ol>
@endsection

@section('content')

<?php 
	$part = Session::get('part');
?>
<div class="attribute-extra display-none">
	<div class="attribute">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Attribute</h3>
				<div class="box-tools pull-right">
					<a href="javascript:void(0);" class="attributeRemove btn btn-sm btn-danger"><i class="fa fa-trash"></i> Remove</a>
				</div><!-- /.box-tools -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="form-group">
					<label class="control-label">Select Type<em class="asterisk">*</em></label>
					{{Form::select('attr_type[]', ['textfield'=>'Text Field', 'textarea'=>'Text Area', 'dropdown'=>'Dropdown', 'number'=>'Number'], null, ['class' => 'form-control inputType'])}}
				</div>
				<div class="form-group">
					<label class="control-label">Name<em class="asterisk">*</em></label>
					{{Form::text('attr_name[]',null,['class'=>'form-control', 'placeholder'=>'Attribute Name'])}}
				</div>
				<div class="form-group textfield inputfield">
					<label class="control-label">Value<em class="asterisk">*</em></label>
					{{Form::text('value_text[]',null,['class'=>'form-control', 'placeholder'=>'Attribute Value'])}}
				</div>
				<div class="form-group inputfield textarea display-none">
					<label class="control-label">Value<em class="asterisk">*</em></label>
					{{Form::textarea('value_textarea[]',null,['class'=>'form-control', 'placeholder'=>'Attribute Value'])}}
				</div>
				<div class="form-group inputfield dropdown display-none">
					<label class="control-label">Values<em class="asterisk">*</em> <small>(Eg: Red,Green,Blue)</small></label>
					{{Form::text('value_dropdown[]',null,['class'=>'form-control', 'placeholder'=>'Attribute Values'])}}
				</div>
				<div class="form-group inputfield number display-none">
					<label class="control-label">Min. Value</label>
					{{Form::number('value_number_min[]',null,['class'=>'form-control', 'placeholder'=>'Attribute Min. Values', 'min'=>'0'])}}
				</div>
				<div class="form-group inputfield number display-none">
					<label class="control-label">Max. Value</label>
					{{Form::number('value_number_max[]',null,['class'=>'form-control', 'placeholder'=>'Attribute Max. Values', 'min'=>'0'])}}
				</div>
				<div class="form-group inputfield number display-none">
					<label class="control-label">Increment Value</label>
					{{Form::number('value_number_step[]',null,['class'=>'form-control', 'placeholder'=>'Increment Amount', 'step'=>'any'])}}
				</div>
				<div class="form-group">
					<label class="control-label">Ordering</label>
					{{Form::number('attr_order[]',null,['class'=>'form-control', 'placeholder'=>'Attribure Order', 'min'=>'0', 'step'=>'1'])}}
				</div>

			</div>
			<!-- /.box-body -->
		</div>
	</div>
</div>

{{Form::open(['url'=>'admin/products', 'id'=>'productForm'])}}

<?php /* ?>
<ul id="myTab" class="nav nav-tabs">
  <li class="@if(empty($part)) active @endif"><a href="#home" data-toggle="tab">General</a></li>
  <li class="@if(!empty($part) && $part == 'price') active @endif"><a href="#price" data-toggle="tab">Price</a></li>
  <li class="@if(!empty($part) && $part == 'meta') active @endif"><a href="#meta" data-toggle="tab">Meta Information</a></li>
  <li class="@if(!empty($part) && $part == 'image') active @endif"><a href="#image" data-toggle="tab">Image</a></li>
  <li class="@if(!empty($part) && $part == 'inventory') active @endif"><a href="#inventory" data-toggle="tab">Inventory</a></li>
  <li class="@if(!empty($part) && $part == 'category') active @endif"><a href="#category" data-toggle="tab">Category</a></li>
  <li class="@if(!empty($part) && $part == 'attribute') active @endif"><a href="#attribute" data-toggle="tab">Attribute</a></li>
</ul>
<div id="myTabContent" class="tab-content">

    <div class="tab-pane @if(empty($part)) active @endif" id="home">
        @include('backend.products.create.general')
    </div>

    <div class="tab-pane @if(!empty($part) && $part == 'price') active @endif" id="price">
        @include('backend.products.create.price')
    </div>

    <div class="tab-pane @if(!empty($part) && $part == 'meta') active @endif" id="meta">
        @include('backend.products.create.meta')
    </div>

    <div class="tab-pane @if(!empty($part) && $part == 'image') active @endif" id="image">
        @include('backend.products.create.image')
    </div>

    <div class="tab-pane @if(!empty($part) && $part == 'inventory') active @endif" id="inventory">
        @include('backend.products.create.inventory')
    </div>

	<div class="tab-pane @if(!empty($part) && $part == 'category') active @endif" id="category">
        @include('backend.products.create.category')
    </div>

    <div class="tab-pane @if(!empty($part) && $part == 'attribute') active @endif" id="attribute">
        @include('backend.products.create.attribute')
    </div>

    <input type="hidden" name="group_identifier" value="{{$rand}}">

</div>

<?php */ ?>

<ul id="myTab" class="nav nav-tabs">
  <li class="active"><a href="#home" data-toggle="tab" >General<i class="home pull-right text-danger" aria-hidden="true"></i></a></li>
  <li class=""><a href="#price" data-toggle="tab">Price<i class="price pull-right text-danger" aria-hidden="true"></i></a></li>
  <li class=""><a href="#meta" data-toggle="tab">Meta Information<i class="meta pull-right text-danger" aria-hidden="true"></i></a></li>
  <li class=""><a href="#image" data-toggle="tab">Image<i class="image pull-right text-danger" aria-hidden="true"></i></a></li>
  <li class=""><a href="#inventory" data-toggle="tab">Inventory<i class="inventory pull-right text-danger" aria-hidden="true"></i></a></li>
  <li class=""><a href="#category" data-toggle="tab">Category<i class="category pull-right text-danger" aria-hidden="true"></i></a></li>
  <li class=""><a href="#attribute" data-toggle="tab">Attribute<i class="attribute pull-right text-danger" aria-hidden="true"></i></a></li>
</ul>

<div id="myTabContent" class="tab-content">

    <div class="tab-pane active" id="home">
        @include('backend.products.create.general')
    </div>

    <div class="tab-pane" id="price">
        @include('backend.products.create.price')
    </div>

    <div class="tab-pane" id="meta">
        @include('backend.products.create.meta')
    </div>

    <div class="tab-pane" id="image">
        @include('backend.products.create.image')
    </div>

    <div class="tab-pane" id="inventory">
        @include('backend.products.create.inventory')
    </div>

	<div class="tab-pane" id="category">
        @include('backend.products.create.category')
    </div>

    <div class="tab-pane" id="attribute">
        @include('backend.products.create.attribute')
    </div>

    <input type="hidden" name="group_identifier" value="{{$rand}}">

</div>
{{Form::close()}}

<form action="{{ url('admin/products/image') }}" enctype="multipart/form-data" method="POST" class="imageAjaxForm">


  	<div class="alert alert-danger print-error-msg" style="display:none">

        <ul></ul>

    </div>


    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="rand" value="{{$rand}}">

	<div class="form-group display-none">
		<span class="btn btn-primary btn-file btn-sm">
			<i class="fa fa-folder-open"></i>Upload Images
			<input type="file" name="image[]" class="uploadImageFile" multiple>
		</span>
		
	</div>

    <div class="form-group">

      <button class="btn btn-success upload-image display-none" type="submit">Upload Image</button>

    </div>


  </form>







<?php /* ?>
<!-- Main content -->
	<div class="row">
		{{Form::open(['url'=>'admin/pages', 'files'=> 'true'])}}
		<div class="col-md-9">
			<div class="box box-orange">
				<div class="box-header">
					<!-- <h3 class="box-title">Create Page</h3> -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">

					<div class="form-group">
						<label class="control-label">Name</label>
						{{Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Enter Product Name'])}}
					</div>

					<div class="form-group">
						<label class="control-label">Slug</label>
						{{Form::text('slug',null,['class'=>'form-control', 'placeholder'=>'Enter Product Slug'])}}
					</div>

					<div class="form-group">
						<label class="control-label">Reference Code</label>
						{{Form::text('ref_code',null,['class'=>'form-control', 'placeholder'=>'Enter Product Reference Code'])}}
					</div>

					<div class="form-group">
						<label class="control-label">Brand Name</label>
						{{Form::text('brand_name',null,['class'=>'form-control', 'placeholder'=>'Enter Product Brand Name'])}}
					</div>

					<div class="form-group">
						<label class="control-label">Price</label>
						{!! Form::input('number', 'price',  null, ['step'=>'any', 'min'=>'0', 'placeholder'=>'Enter Price', 'class' => 'form-control']) !!}
					</div>

					<div class="form-group">
						<label class="control-label">Previous Price</label>
						{!! Form::input('number', 'prev_price',  null, ['step'=>'any', 'min'=>'0', 'placeholder'=>'Enter Previous Price', 'class' => 'form-control']) !!}
					</div>

					<div class="form-group">
						<label class="control-label">Stock Quantity</label>
						{!! Form::input('number', 'quantity',  null, ['step'=>'1', 'min'=>'0', 'placeholder'=>'Enter Stock Quantity', 'class' => 'form-control']) !!}
					</div>

					<div class="form-group">
						<label class="control-label">Detail</label>
						{{Form::textarea('detail',null,['class'=>'form-control', 'rows'=>'8', 'placeholder'=>'Enter Detail'])}}
					</div>

					<div class="form-group">
						<label class="control-label">Offer</label>
						{{Form::textarea('offer',null,['class'=>'form-control', 'rows'=>'5', 'placeholder'=>'Enter Offer Detail'])}}
					</div>

				</div>
				<!-- /.box-body -->
			</div>

			<div class="box collapsed-box">
				<div class="box-header with-border">
					<h3 class="box-title">Product Images</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group">
						<span class="btn btn-primary btn-file btn-sm">
							<i class="fa fa-folder-open"></i>Upload Images
							<input type="file" id="files" name="files[]" multiple>
						</span>
						<div id="selectedFiles" class="row">
							
						</div>
					</div>
				</div>
			</div>
			
			<div class="box collapsed-box">
				<div class="box-header with-border">
					<h3 class="box-title">Associated Category and Attributes</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<!-- /.box-header -->
				<div class="box-body">
					<div id="seo-block">
						<div class="form-group">
							<label class="control-label">Meta Title</label>
							{{Form::text('meta_title',null,['class'=>'form-control', 'placeholder'=>'Enter Meta Title'])}}
						</div>

						<div class="form-group">
							<label class="control-label">Meta Keyword</label>
							{{Form::textarea('meta_keyword',null,['class'=>'form-control', 'rows'=>'4', 'placeholder'=>'Enter Meta Keyword'])}}
						</div>

						<div class="form-group">
							<label class="control-label">Meta Description</label>
							{{Form::textarea('meta_desc',null,['class'=>'form-control',  'rows'=>'4', 'placeholder'=>'Enter Meta Description'])}}
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="col-md-3">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Featured Product</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body">
					{{Form::select('status',['0' => 'No', '1'=>'Yes'],null,['class'=>'form-control'])}}
				</div><!-- /.box-body -->
			</div><!-- /.box -->

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
					<h3 class="box-title">Keywords</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body">
					{{Form::text('keywords',null,['class'=>'form-control', 'placeholder'=>'Enter Keywords'])}}
				</div><!-- /.box-body -->
			</div><!-- /.box -->

		   <div class="form-group">	
			   	{{Form::submit('Save',['class'=>'btn bg-olive'])}}
		   </div>
		</div>

   		{{Form::close()}}
   </div>
     @include('backend.includes.tinymce')
   	
<?php */ ?>

    @include('backend.includes.tinymce')
@endsection
