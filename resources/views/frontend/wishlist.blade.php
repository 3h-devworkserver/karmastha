@extends('frontend.layouts.app')

@section('content')

{{-- @include('frontend.includes.banner') --}}

{{-- @include('frontend.includes.advertisement') --}}

    <div class="container">
        <p><a href="{{ url('/') }}">Home</a> / Wishlist</p>
        {{-- <h1>Your Wishlist</h1> --}}

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

            <table class="table">
                <thead>
                    <tr>
                        <th class="table-image"></th>
                        <th>Product</th>

                        <th>Price</th>
                        <th>Special Price</th>
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

                        <td>${{ $item->price }}</td>
                        <td>${{ $item->special_price }}</td>
                        <td class=""></td>
                        <td>
                            <form action="{{ url('wishlist/destroy', [$item->id]) }}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn btn-danger btn-sm" value="Remove">
                            </form>

                            <form action="{{ url('switchToCart', [$item->id]) }}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="submit" class="btn btn-success btn-sm" value="To Cart">
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="spacer"></div>

            <a href="{{ URL::to('/')}}" class="btn btn-primary btn-lg">Continue Shopping</a> &nbsp;

            <div style="float:right">
                <form action="{{ url('/emptyWishlist') }}" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger btn-lg" value="Empty Wishlist">
                </form>
            </div>

        @else

            <h3>You have no items in your Wishlist</h3>
            <a href="{{ URL::to('/')}}" class="btn btn-primary btn-lg">Continue Shopping</a>

        @endif

        <div class="spacer"></div>

    </div> <!-- end container -->

@endsection
