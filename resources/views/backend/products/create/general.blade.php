<div class="box box-orange">
	<div class="box-header with-border">
		<h3 class="box-title">General</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">

		<div class="form-group">
			<label class="control-label">Name<em class="asterisk">*</em></label>
			{{Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Enter Product Name'])}}
		</div>

		<div class="form-group">
			<label class="control-label">Slug</label>
			{{Form::text('slug',null,['class'=>'form-control', 'placeholder'=>'Enter Product Slug'])}}
		</div>

		<div class="form-group">
			<label class="control-label">SKU<em class="asterisk">*</em></label>
			{{Form::text('sku',null,['class'=>'form-control', 'placeholder'=>'Enter Product SKU'])}}
		</div>

		<div class="form-group">
			<label class="control-label">Brand</label>
			{{Form::select('brand_id',$brand,null,['class'=>'form-control'])}}
			{{-- {{Form::text('brand_id',null,['class'=>'form-control', 'placeholder'=>'Enter Product Brand Name'])}} --}}
		</div>

		<div class="form-group">
			<label class="control-label">Short Description<em class="asterisk">*</em></label>
			{!!Form::textarea('short_desc',null,['class'=>'form-control', 'rows'=>'8', 'placeholder'=>'Enter Short Description'])!!}
		</div>

		<div class="form-group">
			<label class="control-label">Detail<em class="asterisk">*</em></label>
			{!!Form::textarea('detail',null,['class'=>'form-control', 'rows'=>'8', 'placeholder'=>'Enter Detail'])!!}
		</div>

		<div class="form-group">
			<label class="control-label">Offer</label>
			{!!Form::textarea('offer',null,['class'=>'form-control', 'rows'=>'5', 'placeholder'=>'Enter Offer Detail'])!!}
		</div>

		<div class="form-group">
			<label class="control-label">Featured Product<em class="asterisk">*</em></label>
			{{Form::select('featured',['0' => 'No', '1'=>'Yes'],null,['class'=>'form-control'])}}
		</div>

		<div class="form-group">
			<label class="control-label">Tags</label>
			{{Form::text('tags',null,['class'=>'form-control', 'placeholder'=>'Enter Tags'])}}
		</div>

		<div class="form-group">
			<label class="control-label">Status<em class="asterisk">*</em></label>
			{{Form::select('status',['0' => 'Inactive', '1'=>'Active'],null,['class'=>'form-control'])}}
		</div>

	</div>
	<!-- /.box-body -->
</div>