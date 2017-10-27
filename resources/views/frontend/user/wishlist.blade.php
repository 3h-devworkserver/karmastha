@extends('frontend.user.layouts.frontend-app')

@section ('title', 'Wishlist')
{{-- @include('frontend.includes.banner') --}}

{{-- @include('frontend.includes.advertisement') --}}
@section('content')
    
    <div class="col-sm-8 col-md-8">
        @include('includes.partials.messages')

        <div class="userdash-right">
           	<div class="container">

		        @if (session()->has('success_message'))
		            <div class="alert alert-success">
		                {{ session()->get('success_message') }}
		            </div>
		        @endif

		        @if (session()->has('error_message'))
		            <div class="alert alert-danger">
		                {{ session()->get('error_message') }}
		            </div>
		        @endif

		        @if (count($wishlists) > 0)

		            <table class="table wishlist-table">
		                <thead>
		                    <tr>
		                        <th class="table-image"></th>
		                        <th>Product Name</th>

		                        <th>Price</th>
		                        <th class="column-spacer"></th>
		                        <th></th>
		                    </tr>
		                </thead>

		                <tbody>
		                    @foreach ($wishlists as $key => $wish )
		                    <?php 

		                        $item = DB::table('products')
		                        ->join('product_price','products.id','=','product_price.product_id')
		                        ->select('products.name','product_price.price','product_price.special_price','products.id')
		                        ->where('products.id',$wish->product_id)
		                        ->first();

		                    ?>
		                    <tr>
		                        <td class="table-image">
		                            <a href="#"><img src="{{ asset('/images/product/'.$item->id.'/thumbnail/'. getThumbImage($item->id) ) }}" alt="product" class="img-responsive cart-image"></a></td>
		                        <td><a href="#">{{ $item->name }}</a></td>

		                        @if(empty($item->special_price))
		                        	<td><span class="price">NPR {{ $item->price }}</span></td>
		                        @else
		                        	<td><span class="old">NPR{{ $item->price }}</span>  <span class="price">NPR {{ $item->special_price }}</span></td>
		                        @endif
		                        {{-- <td>${{ $item->special_price }}</td> --}}
		                        <td class=""></td>
		                        <td>
		                            <form action="{{ url('wishlist/destroy', [$item->id]) }}" method="POST" class="side-by-side">
		                                {!! csrf_field() !!}
		                                <input type="hidden" name="_method" value="DELETE">
		                                <input type="submit" class="btn btn-danger btn-sm" value="Remove">
		                            </form>

		                        </td>
		                    </tr>
		                    @endforeach

		                </tbody>
		            </table>

		            <div class="spacer"></div>

					<div class="button-group">
			            {{-- <a href="{{ URL::to('/')}}" class="btn btn-primary btn-lg">Continue Shopping</a> &nbsp; --}}

			            <div style="float:right">
			                <form action="{{ url('/emptyWishlist') }}" method="POST">
			                    {!! csrf_field() !!}
			                    <input type="hidden" name="_method" value="DELETE">
			                    <input type="submit" class="btn btn-danger btn-lg" value="Empty Wishlist">
			                </form>
			            </div>
					</div>

		        @else

		            <h3>You have no items in your Wishlist</h3>
		            <a href="{{ URL::to('/')}}" class="btn btn-primary btn-lg">Continue Shopping</a>

		        @endif

		        <div class="spacer"></div>

		    </div> <!-- end container -->
        </div>
    
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="maui-row-right mt15">
            @include('frontend.user.includes.noticeboard')
            @include('frontend.user.includes.supplier')
        </div>
    </div>

@endsection
