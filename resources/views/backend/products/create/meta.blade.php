<div class="box box-orange">
	<div class="box-header with-border">
		<h3 class="box-title">Meta Information</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
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
	<!-- /.box-body -->
</div>