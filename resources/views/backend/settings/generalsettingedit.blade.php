@extends('backend.layouts.app')

@section ('title', 'General Settings')

@section('page-header')
<h1>
	General Settings
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		General Settings
	</li>
</ol>
@endsection

@section('content')

	{{Form::model($setting, ['url'=>'admin/settings/general', 'method'=>'PATCH', 'files'=> 'true'])}}
	<div class="row">
		<div class="col-md-6">
			<div class="box">
				<div class="box-header">
				</div>
				<div class="box-body">
					<div class="form-group">
						<label class="control-label">Site Title<em class="asterisk">*</em></label>
						{{Form::text('title',null,['class'=>'form-control', 'placeholder'=>'Enter Site Title'])}}
					</div>

					<div class="form-group">
						<label class="control-label">Tagline</label>
						{{Form::text('tagline',null,['class'=>'form-control', 'placeholder'=>'Enter Site Tagline'])}}
					</div>

					<div class="form-group">
						<label class="control-label">Admin Email<em class="asterisk">*</em></label>
						{{Form::text('email',null,['class'=>'form-control', 'placeholder'=>'Enter Email'])}}
					</div>

					<div class="form-group">
						<label class="control-label">Meta Title<em class="asterisk">*</em></label>
						{{Form::text('meta_title',null,['class'=>'form-control', 'placeholder'=>'Enter Meta Title'])}}
					</div>

					<div class="form-group">
						<label class="control-label">Meta Keyword<em class="asterisk">*</em></label>
						{{Form::textarea('meta_keyword',null,['class'=>'form-control', 'rows'=>'4', 'placeholder'=>'Enter Meta Keyword'])}}
					</div>

					<div class="form-group">
						<label class="control-label">Meta Description<em class="asterisk">*</em></label>
						{{Form::textarea('meta_desc',null,['class'=>'form-control', 'rows'=>'4', 'placeholder'=>'Enter Meta Description'])}}
					</div>

					<div class="form-group">
						<label class="control-label">Miscellaneous JavaScript</label>
						{{Form::textarea('misc_javascript',null,['class'=>'form-control', 'rows'=>'4', 'placeholder'=>'Enter Meta Description'])}}
					</div>
				</div> 
			</div>
		</div><!-- col-md-6 -->

		<div class="col-md-6">
			<div class="box">
				<div class="box-header">
				</div>
				<div class="box-body">
					<div class="form-group">
						<label class="control-label">Facebook</label>
						{{Form::text('facebook',null,['class'=>'form-control', 'placeholder'=>'Enter Facebook link'])}}
							
					</div>

					<div class="form-group">
						<label class="control-label">Twitter</label>
						{{Form::text('twitter',null,['class'=>'form-control', 'placeholder'=>'Enter Twitter link'])}}
					</div>

					<div class="form-group">
						<label class="control-label">Youtube</label>
						{{Form::text('youtube',null,['class'=>'form-control', 'placeholder'=>'Enter Twitter link'])}}
					</div>

					<div class="form-group">
						<label class="control-label">Google Plus</label>
						{{Form::text('google_plus',null,['class'=>'form-control', 'placeholder'=>'Enter Google Plus link'])}}
					</div>

					<div class="form-group">
						<label class="control-label">Pinterest link</label>
						{{Form::text('pinterest',null,['class'=>'form-control', 'placeholder'=>'Enter Pinterest link'])}}
					</div>

					<div class="form-group">
						<label class="control-label">Logo</label>
							<input type="file" name="uploadLogo" id="imgLogo" accept="image/*" class="image-upload" onchange="readLogoURL(this);">
					</div>
					<img class="hide" width="194" height="77" id="previewLogo" src="#" alt="Logo" />
					@if(!empty($setting->logo))
						<div class="" id="img-preview">
							<img class="img-center" width="194" height="77" src="{{url('images/logo/'.$setting->logo)}}"  alt = "image preview" title="image preview">
						</div>
					@endif

					<div class="form-group">
						<label class="control-label">Favicon</label>
						<input type="file" name="uploadFavicon" id="imgFav" accept="image/*" class="image-upload2" onchange="readFaviconURL(this);">
					</div>

					<img class="hide" width="32" height="32" id="previewFavicon" src="#" alt="Favicon"/>
					@if(!empty($setting->favicon))
					<div class="" id="img-preview2">
						<img class="" width="32" height="32" src="{{url('images/logo/favicon/'.$setting->favicon)}}" alt = "image preview" title="image preview">
					</div>
					@endif

					<div class="form-group">
						{{Form::submit('Save Changes',['class'=>'btn btn-primary'])}}
					</div>
				</div>
			</div>


		</div>
	</div>
	{{Form::close()}}


@endsection