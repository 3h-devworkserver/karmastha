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
					<tr class="noProductImage">
						<td colspan="6">No Image. Please add product image</td>
					</tr>
				</tbody>
				
			</table>
		</div>

      <a class="btn btn-success uploadImageClick"><i class="fa fa-plus"> </i> Add Images</a>
		
	</div>
</div>