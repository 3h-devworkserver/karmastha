<div class="box box-orange">
	<div class="box-header with-border">
		<h3 class="box-title">Price</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div class="form-group">
			<label class="control-label">Price<em class="asterisk">*</em></label>
			{{ Form::input('number', 'price',  null, ['step'=>'any', 'min'=>'0', 'placeholder'=>'Enter Price', 'class' => 'form-control']) }}
		</div>

		<div class="form-group">
			<label class="control-label">Special Price</label>
			{{ Form::input('number', 'special_price',  null, ['step'=>'any', 'min'=>'0', 'placeholder'=>'Enter Special Price', 'class' => 'form-control']) }}
		</div>
	</div>
	<!-- /.box-body -->
</div>