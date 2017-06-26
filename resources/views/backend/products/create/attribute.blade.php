<div class="attribute-block">
	<div class="attribute">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Attribute</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="form-group">
					<label class="control-label">Select Type<em class="asterisk">*</em></label>
					{{Form::select('attr_type[]', ['dropdown'=>'Dropdown'], null, ['class' => 'form-control inputType'])}}
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
					{{Form::textarea('value_textarea[]',null,['class'=>'form-control tinymce', 'placeholder'=>'Attribute Value'])}}
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

				<?php /* ?>
				<div class="row">
					<div class="col-md-2">
						<label class="control-label ">Select Type</label>
					</div>
					<div class="col-md-3">
						{{Form::select('type', ['textfield'=>'Text Field', 'textarea'=>'Text Area', 'dropdown'=>'Dropdown', 'radio'=>'Radio Button'], null, ['class' => 'form-control inputType'])}}
					</div>
					<div class="col-md-3">
						{{Form::text('name',null,['class'=>'form-control ', 'placeholder'=>' Attribute Name'])}}
					</div>
					<div class="col-md-4 textfield inputfield">
						{{Form::text('value',null,['class'=>'form-control ', 'placeholder'=>' Attribute Value'])}}
					</div>
					<div class="col-md-12 textarea inputfield display-none">
						{{Form::textarea('value',null,['class'=>'form-control ', 'placeholder'=>' Attribute Value'])}}
					</div>
				</div>
				<?php */ ?>

			</div>
			<!-- /.box-body -->
		</div>
	</div>
</div>
		<div class="form-group">
			<a href="javascript:void(0);" class="attributeAdd btn btn-sm btn-primary"><i class="fa fa-plus"></i>  Add more</a>
		</div>

		<div class="form-group">
			{{Form::submit('Save',['class'=>'btn btn-karm', 'placeholder'=>'Enter Tags'])}}
		</div>