<div class="row">
	@foreach($products as $product)
      	<div class="col-md-3 col-sm-12">
        	<div class="item">
        		@include('frontend.includes.productgroup.singleproduct')
        	</div>
      	</div>
    @endforeach
</div>
