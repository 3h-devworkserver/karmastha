@extends('backend.layouts.app')

@section ('title', 'Edit Product')

@section('page-header')
<h1>
	Edit Product
</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Products</a></li>
		<li class="active">
			Edit Product
		</li>
	</ol>
@endsection

@section('content')

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

{{Form::model($product, ['url'=>'admin/products/'.$product->id, 'method'=>'patch', 'id'=>'productForm'])}}

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
        @include('backend.products.edit.general')
    </div>

    <div class="tab-pane" id="price">
        @include('backend.products.edit.price')
    </div>

    <div class="tab-pane" id="meta">
        @include('backend.products.edit.meta')
    </div>

    <div class="tab-pane" id="image">
        @include('backend.products.edit.image')
    </div>

    <div class="tab-pane" id="inventory">
        @include('backend.products.edit.inventory')
    </div>

	<div class="tab-pane" id="category">
        @include('backend.products.edit.category')
    </div>

    <div class="tab-pane" id="attribute">
        @include('backend.products.edit.attribute')
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

    @include('backend.includes.tinymce')
@endsection
