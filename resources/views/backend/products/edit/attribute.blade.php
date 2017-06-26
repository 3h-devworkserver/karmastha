<?php 
	$attributes = $product->productAttributesWithOrder;
?>			
<div class="attribute-block">
	@if(count($attributes)> 0)
		<?php $i = 0; ?>
		@foreach($attributes as $attribute)
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
							{{Form::select('attr_type[]', ['dropdown'=>'Dropdown'], $attribute->attr_type, ['class' => 'form-control inputType'])}}
						</div>
						<div class="form-group">
							<label class="control-label">Name<em class="asterisk">*</em></label>
							{{Form::text('attr_name[]',$attribute->attr_name,['class'=>'form-control', 'placeholder'=>'Attribute Name'])}}
						</div>
						<div class="form-group textfield inputfield">
							<label class="control-label">Value<em class="asterisk">*</em></label>
							{{Form::text('value_text[]',$attribute->value_text,['class'=>'form-control', 'placeholder'=>'Attribute Value'])}}
						</div>
						<div class="form-group inputfield textarea display-none">
							<label class="control-label">Value<em class="asterisk">*</em></label>
							{{Form::textarea('value_textarea[]',$attribute->value_textarea,['class'=>'form-control tinymce', 'placeholder'=>'Attribute Value'])}}
						</div>
						<div class="form-group inputfield dropdown display-none">
							<label class="control-label">Values<em class="asterisk">*</em> <small>(Eg: Red,Green,Blue)</small></label>
							{{Form::text('value_dropdown[]',$attribute->value_dropdown,['class'=>'form-control', 'placeholder'=>'Attribute Values'])}}
						</div>
						<div class="form-group inputfield number display-none">
							<label class="control-label">Min. Value</label>
							{{Form::number('value_number_min[]',$attribute->value_number_min,['class'=>'form-control', 'placeholder'=>'Attribute Min. Values', 'min'=>'0'])}}
						</div>
						<div class="form-group inputfield number display-none">
							<label class="control-label">Max. Value</label>
							{{Form::number('value_number_max[]',$attribute->value_number_max,['class'=>'form-control', 'placeholder'=>'Attribute Max. Values', 'min'=>'0'])}}
						</div>
						<div class="form-group inputfield number display-none">
							<label class="control-label">Increment Value</label>
							{{Form::number('value_number_step[]',$attribute->value_number_step,['class'=>'form-control', 'placeholder'=>'Increment Amount', 'step'=>'any'])}}
						</div>
						<div class="form-group">
							<label class="control-label">Ordering</label>
							{{Form::number('attr_order[]',$attribute->attr_order,['class'=>'form-control', 'placeholder'=>'Attribure Order', 'min'=>'0', 'step'=>'1'])}}
						</div>

					</div>
					<!-- /.box-body -->
				</div>
			</div>
			<?php $i++; ?>
		@endforeach
	@endif
</div>
		<div class="form-group">
			<a href="javascript:void(0);" class="attributeAdd btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add more</a>
		</div>

		<div class="form-group">
			{{Form::submit('Save',['class'=>'btn btn-karm', 'placeholder'=>'Enter Tags'])}}
		</div>

