<div class="box box-orange">
	<div class="box-header with-border">
		<h3 class="box-title">Inventory Management</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div class="form-group">
			<label class="control-label">Manage Stock<em class="asterisk">*</em></label>
			{{Form::select('manage_stock',['0' => 'No', '1'=>'Yes'],$product->productInventory->manage_stock,['class'=>'form-control manageStock'])}}
		</div>

		<div class="stock-block hide">
			<div class="form-group">
				<label class="control-label">Stock Quantity</label>
				{!! Form::input('number', 'quantity', $product->productInventory->quantity, ['step'=>'1', 'min'=>'0', 'placeholder'=>'Enter Stock Quantity', 'class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				<label class="control-label">Stock Availablity</label>
				{{Form::select('availability',['in stock' => 'In Stock', 'out of stock'=>'Out of Stock'], $product->productInventory->availability,['class'=>'form-control'])}}
			</div>
		</div>
	</div>
	<!-- /.box-body -->
</div>