<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Product Images</h3>
	</div><!-- /.box-header -->
	<!-- /.box-header -->
	<div class="box-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover">
				<tr>
					<th>Image</th>
					<th>Order</th>
					<th>Base Image</th>
					<th>Small Image</th>
					<th>Thumbnail</th>
					<th>Action</th>
				</tr>
				<?php /* ?>
				<tbody>
				<tr>
					<td><img src="{{asset('images/category/1mkaq-02.jpg')}}" height="50" width="50"></td>
					<td>1</td>
					<td>{{Form::checkbox('base_img[]')}}</td>
					<td>{{Form::checkbox('small_img[]')}}</td>
					<td>{{Form::checkbox('thumbnail_img[]')}}</td>
					<td>Delete</td>
				</tr>
				</tbody>
				<?php */ ?>

				<tbody class="selectedFiles">
					@if(count($product->galleryswithOrder) !=0)
						@foreach($product->galleryswithOrder as $image)
						<tr>
							<td><img src="{{asset('images/product/'.$product->id.'/thumbnail/'.$image->image)}}" height="50" width="50"></td><td><input type="number" name="image_order_edit[]" value="{{$image->image_order}}" min='0' step='1'></td>
							<td><input name="base_img_edit[]" type="checkbox" value="{{$image->id}}" @if($image->base_image == 1) checked @endif></td>
							<td><input name="small_img_edit[]" type="checkbox" value="{{$image->id}}" @if($image->small_image == 1) checked @endif> </td>
							<td><input name="thumbnail_img_edit[]" type="checkbox" value="{{$image->id}}" @if($image->thumbnail == 1) checked @endif></td>
							<td><a class="btn btn-sm btn-danger fa fa-trash deleteProductImg" href="javascript:void(0);" data-id="{{$image->id}}" ></a> <i class="delSpin fa fa-spinner fa-spin display-none"></i></td>
						</tr>
						<?php /* ?>		
						<tr>
							<td><img src="{{asset('images/category/1mkaq-02.jpg')}}" height="50" width="50"></td>
							<td>1</td>
							<td>{{Form::checkbox('base_img[]')}}</td>
							<td>{{Form::checkbox('small_img[]')}}</td>
							<td>{{Form::checkbox('thumbnail_img[]')}}</td>
							<td>Delete</td>
						</tr>
						<?php */ ?>
						@endforeach
					@else
					<tr class="noProductImage">
						<td colspan="6">No Image. Please add product image</td>
					</tr>
					@endif
				</tbody>
				
			</table>
		</div>

		<a class="btn btn-success uploadImageClick"><i class="fa fa-plus"> </i> Add Images</a>
		
	</div>
</div>