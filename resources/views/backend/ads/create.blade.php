@extends('backend.layouts.app')

@section ('title', 'Ads Management')

@section('page-header')
<h1>
	Create Ad
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Ads Management 
	</li>
	<li class="active">
		Add New 
	</li>
</ol>
@endsection

@section('content')
{{Form::open(['url'=>'admin/ads','files'=>'true'])}}
<div class="row">
	<div class="col-md-12">
		<div class="box box-orange">
			<div class="box-header">
				<!-- <h3 class="box-title">Create Page</h3> -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">

				<div class="form-group">
					<label class="control-label">Slider Ad (dim: 341*479) <em class="asterisk">*</em></label>
					<br>
					<span class="btn btn-sm btn-karm btn-file">
					<i class="fa fa-folder-open"></i>Upload image
						<input id='logo' type="file" name="logo" class="form-control logo" accept="image/*" required="required">
					</span>
					<br><br>
					<img class="img-center" width="341" height="479" id="logo_preview" src="#" alt="logo preview">
					<div class="form-wrap">
						<label for="first_url">Slider Ad Url</label>
						<input type="text" name="first_url" class="form-control" placeholder="http://www.example.com">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">First Ad ( dim: 298*390)<em class="asterisk">*</em></label>
					<br>
					<span class="btn btn-sm btn-karm btn-file">
					<i class="fa fa-folder-open"></i>Upload image
						<input id='logo1' type="file" name="logo1" class="form-control logo" accept="image/*" required="required">
					</span>
					<br><br>
					<img class="img-center" width="298" height="390" id="logo_preview1" src="#" alt="logo preview">
					<div class="form-wrap">
						<label for="second_url">First Ad Url</label>
						<input type="text" name="second_url" class="form-control" placeholder="http://www.example.com">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Second Ad (dim: 400*189)<em class="asterisk">*</em></label>
					<br>
					<span class="btn btn-sm btn-karm btn-file">
					<i class="fa fa-folder-open"></i>Upload image
						<input id='logo2' type="file" name="logo2" class="form-control logo" accept="image/*" required="required">
					</span>
					<br><br>
					<img class="img-center" width="400" height="189" id="logo_preview2" src="#" alt="logo preview">
					<div class="form-wrap">
						<label for="third_url">Second Ad Url</label>
						<input type="text" name="third_url" class="form-control" placeholder="http://www.example.com">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Third Ad (dim: 400*189)<em class="asterisk">*</em></label>
					<br>
					<span class="btn btn-sm btn-karm btn-file">
					<i class="fa fa-folder-open"></i>Upload image
						<input id='logo3' type="file" name="logo3" class="form-control logo" accept="image/*" required="required">
					</span>
					<br><br>
					<img class="img-center" width="400" height="189" id="logo_preview3" src="#" alt="logo preview">
					<div class="form-wrap">
						<label for="fourth_url">Third Ad Url</label>
						<input type="text" name="fourth_url" class="form-control" placeholder="http://www.example.com">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Fourth Ad (dim: 503*390)<em class="asterisk">*</em></label>
					<br>
					<span class="btn btn-sm btn-karm btn-file">
					<i class="fa fa-folder-open"></i>Upload image
						<input id='logo4' type="file" name="logo4" class="form-control logo" accept="image/*" required="required">
					</span>
					<br><br>
					<img class="img-center" width="503" height="390" id="logo_preview4" src="#" alt="logo preview">
					<div class="form-wrap">
						<label for="fifth_url">Fourth Ad Url</label>
						<input type="text" name="fifth_url" class="form-control" placeholder="http://www.example.com">
					</div>
				</div>
		

			</div>
			<!-- /.box-body -->
		</div>
		<div class="form-group">	
			{{Form::submit('Add',['class'=>'btn btn-karm'])}}
		</div>
	</div>
</div>
{{Form::close()}}


@endsection
