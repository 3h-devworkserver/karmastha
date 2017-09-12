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
			<label class="control-label">Brand<em class="asterisk">*</em></label>
			{{Form::select('brand_id',$brand,null,['class'=>'form-control'])}}
		</div>

		<div class="form-group">
			<label class="control-label">Short Description<em class="asterisk">*</em></label>
			{!!Form::textarea('short_desc',null,['class'=>'form-control', 'rows'=>'8', 'placeholder'=>'Enter Short Description'])!!}
		</div>

		{{-- <div class="form-group">
			<label class="control-label">Offer</label>
			{!!Form::textarea('offer',null,['class'=>'form-control', 'rows'=>'5', 'placeholder'=>'Enter Offer Detail'])!!}
		</div>

		<div class="form-group">
			<label class="control-label">Release Note</label>
			{!!Form::textarea('release_note',null,['class'=>'form-control', 'rows'=>'5', 'placeholder'=>'Enter Release Note'])!!}
		</div>

		<div class="form-group">
			<label class="control-label">Return Policy<em class="asterisk">*</em></label>
			{!!Form::textarea('return_policy',null,['class'=>'form-control', 'rows'=>'5', 'placeholder'=>'Enter Return Policy'])!!}
		</div> --}}

		<div class="form-group">
			<label class="control-label">Product Detail<em class="asterisk">*</em></label>
			{!!Form::textarea('detail',null,['class'=>'form-control', 'rows'=>'8', 'placeholder'=>'Enter Detail'])!!}
		</div>

		{{-- <div class="form-group">
			<label class="control-label">Featured Product<em class="asterisk">*</em></label>
			{{Form::select('featured',['0' => 'No', '1'=>'Yes'],null,['class'=>'form-control'])}}
		</div>

		<div class="form-group">
			<label class="control-label">Hot Product<em class="asterisk">*</em></label>
			{{Form::select('hot',['0' => 'No', '1'=>'Yes'],null,['class'=>'form-control'])}}
		</div>

		<div class="form-group">
			<label class="control-label">Trending Product<em class="asterisk">*</em></label>
			{{Form::select('trending',['0' => 'No', '1'=>'Yes'],null,['class'=>'form-control'])}}
		</div> --}}

		<div class="form-group">
			<label class="control-label">Product Groups</label>
			{{Form::select('productGroup[]',$productGroups,$product->productGroups()->pluck('id')->toArray(),['class'=>'form-control', 'multiple'])}}
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