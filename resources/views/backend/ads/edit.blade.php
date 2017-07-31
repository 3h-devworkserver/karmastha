@extends('backend.layouts.app')

@section ('title', 'Edit Ads')

@section('page-header')
<h1>
	Edit Ads
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">
		Ads Management
	</li>
</ol>
@endsection

@section('content')

	{{Form::model($setting, ['url'=>'admin/ads', 'method'=>'PATCH', 'files'=> 'true'])}}
	<div class="row">
	<div class="col-md-12">
		<div class="box box-orange">
			<div class="box-header">
			</div>
			<!-- /.box-header -->
			<div class="box-body ads-section">

				<div class="form-group">
				<div class="form-wrap">
					<label class="control-label">Slider Ad (dim: 341*479) <em class="asterisk">*</em></label>
					<br>
					<span class="btn btn-sm btn-karm btn-file">
					<i class="fa fa-folder-open"></i>Change image
						<input id='logo_edit' type="file" name="logo" class="form-control logo" accept="image/*">
					</span>
					<br><br>
					<img class="img-center" width="341" height="479" id="logo_preview_edit" src="{{url($ads->first_image)}}" alt="logo preview">
				</div>
					<div class="form-wrap">
						<label for="first_url">Slider Ad Url</label>
						<input type="text" name="first_url" class="form-control" value="@if( !empty($ads->first_url)) {{ $ads->first_url }} @endif" placeholder="http://www.example.com">
					</div>
				</div>
<div class="form-group">
	<div class="form-wrap">
					<label class="control-label">First Ad ( dim: 298*390)<em class="asterisk">*</em></label>
					<br>
					<span class="btn btn-sm btn-karm btn-file">
					<i class="fa fa-folder-open"></i>Change image
						<input id='logo_edit1' type="file" name="logo1" class="form-control logo" accept="image/*">
					</span>
					<br><br>
					<img class="img-center" width="298" height="390" id="logo_preview_edit1" src="{{url($ads->second_image)}}" alt="logo preview">
				</div>
					<div class="form-wrap">
						<label for="second_url">First Ad Url</label>
						<input type="text" name="second_url" class="form-control" value="@if( !empty($ads->second_url)) {{ $ads->second_url }} @endif" placeholder="http://www.example.com">
					</div>
				</div>
<div class="form-group">
	<div class="form-wrap">
					<label class="control-label">Second Ad (dim: 400*189)<em class="asterisk">*</em></label>
					<br>
					<span class="btn btn-sm btn-karm btn-file">
					<i class="fa fa-folder-open"></i>Change image
						<input id='logo_edit2' type="file" name="logo2" class="form-control logo" accept="image/*">
					</span>
					<br><br>
					<img class="img-center" width="400" height="189" id="logo_preview_edit2" src="{{url($ads->third_image)}}" alt="logo preview">
					</div>
					<div class="form-wrap">
						<label for="third_url">Second Ad Url</label>
						<input type="text" name="third_url" class="form-control" value="@if( !empty($ads->third_url)) {{ $ads->third_url }} @endif" placeholder="http://www.example.com">
					</div>
				</div>
<div class="form-group">
	<div class="form-wrap">
					<label class="control-label">Third Ad (dim: 400*189)<em class="asterisk">*</em></label>
					<br>
					<span class="btn btn-sm btn-karm btn-file">
					<i class="fa fa-folder-open"></i>Change image
						<input id='logo_edit3' type="file" name="logo3" class="form-control logo" accept="image/*">
					</span>
					<br><br>
					<img class="img-center" width="400" height="189" id="logo_preview_edit3" src="{{url($ads->fourth_image)}}" alt="logo preview">
					</div>
					<div class="form-wrap">
						<label for="fourth_url">Third Ad Url</label>
						<input type="text" name="fourth_url" class="form-control" value="@if( !empty($ads->fourth_url)) {{ $ads->fourth_url }} @endif" placeholder="http://www.example.com">
					</div>
				</div>
<div class="form-group">
	<div class="form-wrap">
					<label class="control-label">Fourth Ad (dim: 503*390)<em class="asterisk">*</em></label>
					<br>
					<span class="btn btn-sm btn-karm btn-file">
					<i class="fa fa-folder-open"></i>Change image
						<input id='logo_edit4' type="file" name="logo4" class="form-control logo" accept="image/*">
					</span>
					<br><br>
					<img class="img-center" width="503" height="390" id="logo_preview_edit4" src="{{url($ads->fifth_image)}}" alt="logo preview">
					</div>
					<div class="form-wrap">
						<label for="fifth_url">Fourth Ad Url</label>
						<input type="text" name="fifth_url" class="form-control" value="@if( !empty($ads->fifth_url)) {{ $ads->fifth_url }} @endif" placeholder="http://www.example.com">
					</div>
				</div>
		

			</div>
			<!-- /.box-body -->
		</div>
		<div class="form-group">	
			{{Form::submit('Update',['class'=>'btn btn-karm'])}}
		</div>
	</div>
	{{Form::close()}}


@endsection