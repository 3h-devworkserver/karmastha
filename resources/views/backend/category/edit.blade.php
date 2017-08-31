@extends('backend.layouts.app')

@section ('title', 'Edit Category')

@section('page-header')
 <h1>
   Category Management
    <!-- <small>Lists of Pages</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Category</a></li>
    <li class="active">
      Edit Category
  </li>
  </ol>
@endsection

@section('content')

<div class="categorybanner-extra display-none">
	<div class="categorybanner">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Banner Image</h3>
				<div class="box-tools pull-right">
					<a href="javascript:void(0);" class="bannerRemove btn btn-sm btn-danger"><i class="fa fa-trash"></i> Remove</a>
				</div><!-- /.box-tools -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="form-group">
					<label class="control-label">Title<em class="asterisk">*</em></label>
					{{Form::text('banner_title[]',null,['class'=>'form-control', 'placeholder'=>'Banner Title'])}}
				</div>
				<div class="form-group">
					<label class="control-label">Description</label>
					{{Form::text('banner_desc[]',null,['class'=>'form-control', 'placeholder'=>'Banner Description'])}}
				</div>
				<div class="form-group">
					<label class="control-label">URL</label>
					{{Form::text('banner_url[]',null,['class'=>'form-control', 'placeholder'=>'Banner URL'])}}
				</div>
				<div class="form-group">
					<label class="control-label">Position</label>
					{{Form::select('banner_position[]', ['top' =>'Top', 'middle'=>'Middle'], null,['class'=>'form-control'])}}
				</div>
				<div class="form-group">
					<label class="control-label">Ordering</label>
					{{Form::number('banner_order[]',null,['class'=>'form-control', 'placeholder'=>'Banner Order', 'min'=>'0', 'step'=>'1'])}}
				</div>
				<div class="form-group">
					<label class="control-label">Image<em class="asterisk">*</em></label>
					<input type="file" name="uploadBanner[]" accept="image/*" class="image-upload2 imgBanner" onchange="readImageURL(this);">
					<div class="show-img-bg display-none" alt="Image Preview"></div>
				</div>
				
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</div>

{{ Form::model($item, array('url' => "admin/category/edit/{$item->id}", 'id'=>'categoryForm', 'role'=>'form', 'files'=>'true')) }}
  <div class="row">
    <div class="col-md-9"> 

		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Edit Category</h3>
				<a href="{{ url('admin/category')}}" class="btn btn-warning btn-sm pull-right">Go Back</a>
			</div><!-- /.box-header -->
			<div class="box-body">
					<div class="form-group">
						<label for="title" class="control-label">Title<em class="asterisk">*</em></label>
							{!! Form::text('title',null,array('class'=>'form-control', 'placeholder'=>'Enter Title')) !!}
					</div>
		            <?php /*  ?>
		            <div class="form-group">
		                <label for="label" class="col-lg-2 control-label">Label</label>
		                <div class="col-lg-10">
		                  {{ Form::text('label',null,array('class'=>'form-control', 'required'))}}
		                </div>
		            </div>
		            <?php */ ?>
		            <div class="form-group">
		            	<label for="url" class="control-label">URL</label>
		            	<div class="input-group">
						  <span class="input-group-addon">{{url('/').'/category'.'/'}}</span>
		            		{{ Form::text('url',null,array('class'=>'form-control', 'placeholder'=>'Enter URL'))}}
						</div>
		            </div>

		            <div class="form-group">
		            	<label for="url" class="control-label">Description</label>
		            		{!! Form::textarea('description',null,['class'=>'form-control', 'placeholder'=>'Enter Description'])!!}
		            </div>
		            
			</div><!-- /.box-body -->
		</div><!-- /.box -->

		<div class="box collapsed-box">
			<div class="box-header with-border">
				<h3 class="box-title">SEO Settings</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
				</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
			<!-- /.box-header -->
			<div class="box-body">
				<div id="seo-block">
					<div class="form-group">
						<label class="control-label">Meta Title</label>
						{{Form::text('meta_title',null,['class'=>'form-control', 'placeholder'=>'Enter Meta Title'])}}
					</div>

					<div class="form-group">
						<label class="control-label">Meta Keyword</label>
						{!!Form::textarea('meta_keyword',null,['class'=>'form-control', 'rows'=>'4', 'placeholder'=>'Enter Meta Keyword'])!!}
					</div>

					<div class="form-group">
						<label class="control-label">Meta Description</label>
						{!!Form::textarea('meta_desc',null,['class'=>'form-control',  'rows'=>'4', 'placeholder'=>'Enter Meta Description'])!!}
					</div>
				</div>
			</div>
		</div>
		
		<div class="categorybanner-block">
			@foreach($item->topBanners as $banner)
				<div class="categorybanner">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Banner Image</h3>
							<div class="box-tools pull-right">
								<a href="javascript:void(0);" class="bannerRemove btn btn-sm btn-danger"><i class="fa fa-trash"></i> Remove</a>
							</div><!-- /.box-tools -->
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="form-group">
								<label class="control-label">Title<em class="asterisk">*</em></label>
								{{Form::text('banner_title[]',$banner->banner_title,['class'=>'form-control', 'placeholder'=>'Banner Title'])}}
							</div>
							<div class="form-group">
								<label class="control-label">Description</label>
								{{Form::text('banner_desc[]',$banner->banner_desc,['class'=>'form-control', 'placeholder'=>'Banner Description'])}}
							</div>
							<div class="form-group">
								<label class="control-label">URL</label>
								{{Form::text('banner_url[]',$banner->banner_url,['class'=>'form-control', 'placeholder'=>'Banner URL'])}}
							</div>
							<div class="form-group">
								<label class="control-label">Position</label>
								{{Form::select('banner_position[]', ['top' =>'Top', 'middle'=>'Middle'], $banner->banner_position,['class'=>'form-control'])}}
							</div>
							<div class="form-group">
								<label class="control-label">Ordering</label>
								{{Form::number('banner_order[]',$banner->banner_order,['class'=>'form-control', 'placeholder'=>'Banner Order', 'min'=>'0', 'step'=>'1'])}}
							</div>
							<div class="form-group">
								<label class="control-label">Image<em class="asterisk">*</em></label>
								<input type="file" name="uploadBanner[]" accept="image/*" class="image-upload2 imgBanner  ignore" onchange="readImageURL(this);">
								<div class="show-img-bg display-none" alt="Image Preview"></div>
								@if(!empty($banner->banner_image))
									<div style="background-image:url({{url('images/category/banner/'.$banner->banner_image)}})" alt = "image preview" title="image preview" class="show-img-bg image-preview">
									</div>	
								@endif
							</div>
							
						</div>
						<!-- /.box-body -->
					</div>
				</div>
			@endforeach
			@foreach($item->middleBanners as $banner)
				<div class="categorybanner">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Banner Image</h3>
							<div class="box-tools pull-right">
								<a href="javascript:void(0);" class="bannerRemove btn btn-sm btn-danger"><i class="fa fa-trash"></i> Remove</a>
							</div><!-- /.box-tools -->
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="form-group">
								<label class="control-label">Title<em class="asterisk">*</em></label>
								{{Form::text('banner_title[]',$banner->banner_title,['class'=>'form-control', 'placeholder'=>'Banner Title'])}}
							</div>
							<div class="form-group">
								<label class="control-label">Description</label>
								{{Form::text('banner_desc[]',$banner->banner_desc,['class'=>'form-control', 'placeholder'=>'Banner Description'])}}
							</div>
							<div class="form-group">
								<label class="control-label">URL</label>
								{{Form::text('banner_url[]',$banner->banner_url,['class'=>'form-control', 'placeholder'=>'Banner URL'])}}
							</div>
							<div class="form-group">
								<label class="control-label">Position</label>
								{{Form::select('banner_position[]', ['top' =>'Top', 'middle'=>'Middle'], $banner->banner_position,['class'=>'form-control'])}}
							</div>
							<div class="form-group">
								<label class="control-label">Ordering</label>
								{{Form::number('banner_order[]',$banner->banner_order,['class'=>'form-control', 'placeholder'=>'Banner Order', 'min'=>'0', 'step'=>'1'])}}
							</div>
							<div class="form-group">
								<label class="control-label">Image</label>
								<input type="file" name="uploadBanner[]" accept="image/*" class="image-upload2 imgBanner" onchange="readImageURL(this);">
								<div class="show-img-bg display-none" alt="Image Preview"></div>
								@if(!empty($banner->banner_image))
									<div style="background-image:url({{url('images/category/banner/'.$banner->banner_image)}})" alt = "image preview" title="image preview" class="show-img-bg image-preview">
									</div>	
								@endif
							</div>
							
						</div>
						<!-- /.box-body -->
					</div>
				</div>
			@endforeach
		</div>
		<div class="form-group">
			<a href="javascript:void(0);" class="bannerAdd btn btn-sm btn-success"><i class="fa fa-plus"></i>  Add Banner Image</a>
		</div>

    </div>

    <div class="col-md-3">
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Status<em class="asterisk">*</em></h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
			<div class="box-body">
				{{Form::select('status',['0' => 'Inactive', '1'=>'Active'],null,['class'=>'form-control'])}}
			</div><!-- /.box-body -->
		</div><!-- /.box -->

		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Category Type<em class="asterisk">*</em></h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
			<div class="box-body">
				{{Form::select('cat_type',['more' => 'More', 'top'=>'Top'],null,['class'=>'form-control'])}}
			</div><!-- /.box-body -->
		</div><!-- /.box -->
		
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Homepage Display<em class="asterisk">*</em></h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
			<div class="box-body">
				{{Form::select('homepage_display',['0' => 'No', '1'=>'Yes'],null,['class'=>'form-control'])}}
			</div><!-- /.box-body -->
		</div><!-- /.box -->

		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Featured Image</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="form-group">
					<span class="btn btn-karm btn-file btn-sm">
						<i class="fa fa-folder-open"></i>Upload Featured Image
						<input type="file" name="upload" class="form-control" onchange="readURL(this,'#preview');" accept="image/*">
					</span>
					@if(!empty($item->feat_img))
					<div id="feat-img-preview" >
						<div style="background-image:url({{url('images/category/'.$item->feat_img)}})" alt = "image preview" title="image preview" class="show-img-bg">
						</div>
					</div>
					<br>
					@endif
					<div id="preview" class="show-img-bg display-none" alt="Image Preview"></div>
				</div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->

		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Second Image</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="form-group">
					<span class="btn btn-karm btn-file btn-sm">
						<i class="fa fa-folder-open"></i>Upload Featured Image
						<input type="file" name="upload2" class="form-control" onchange="readURL(this,'#preview2', '#feat-img-preview2');" accept="image/*">
					</span>
					@if(!empty($item->second_img))
					<div id="feat-img-preview2" >
						<div style="background-image:url({{url('images/category/second/'.$item->second_img)}})" alt = "image preview" title="image preview" class="show-img-bg">
						</div>
					</div>
					@endif
					<div id="preview2" class="show-img-bg display-none" alt="Image Preview"></div>
				</div>
				<div class="form-group">
						<label class="control-label">URL</label>
						<div class="input-group">
						  	<span class="input-group-addon">{{url('/').'/'}}</span>
							{{Form::text('img_url',null,['class'=>'form-control', 'placeholder'=>'Enter URL'])}}
						</div>
					</div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->

	   <div class="form-group">	
		   	{{Form::submit('Save',['class'=>'btn btn-karm btn-sm'])}}
	   </div>
	</div>
  </div>
{{ Form::close()}}
@include('backend.includes.tinymce')


@stop