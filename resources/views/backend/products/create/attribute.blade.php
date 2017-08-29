<div class="attribute-block">
	{{-- <div class="attribute">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Attribute</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="form-group">
					<div class="row">
						<div class="col-sm-5">
							<label class="control-label">Select Attribute<em class="asterisk">*</em></label>
							{{Form::select('attribute[]', $attributes, null, ['class' => 'form-control attributeSelect', 'placeholder'=>'-- Select Attribute --'])}}
						</div>
						<div class="col-sm-5">
							<label class="control-label">Select Attribute Values<em class="asterisk">*</em></label>
							<select name="attr_value[]" class="form-control attrValSelect">
								<option value="">-- Select Attribute Value --</option>
								@foreach($attributeValues as $val)
								<option class="hide" value="{{$val->id}}" data-attr= "{{$val->attribute_id}}">{{$val->value}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-sm-2">
							<a href="javascript:void(0);" class="attrSelect btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add</a>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-sm-10">
							<label class="control-label">Combination<em class="asterisk">*</em></label>
							{{Form::select('attribute_select[0][]', [], null,['class'=>'form-control attrValue', 'multiple'])}}
						</div>
						<div class="col-sm-2">
							<a href="javascript:void(0);" class="attrRemove btn btn-sm btn-danger"><i class="fa fa-minus"></i> Delete</a>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label">Identifier<em class="asterisk">*</em></label>
					{{Form::text('identifier[]',null,['class'=>'form-control', 'placeholder'=>'Identifier'])}}
				</div>	

				<div class="form-group">
					<label class="control-label">Quantity<em class="asterisk">*</em></label>
					{{Form::number('comb_quantity[]',0,['class'=>'form-control', 'placeholder'=>'Quantity', 'step'=>'1', 'min'=>'0'])}}
				</div>				

			</div>
			<!-- /.box-body -->
		</div>
	</div> --}}
</div>
<div class="form-group">
	<a href="javascript:void(0);" class="attributeAdd btn btn-sm btn-primary"><i class="fa fa-plus"></i>  Add more</a>
</div>
<div class="form-group">
	{{Form::submit('Save',['class'=>'btn btn-karm', 'placeholder'=>'Enter Tags'])}}
</div>

