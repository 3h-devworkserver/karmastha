@extends('frontend.user.layouts.frontend-app')

@section ('title', 'Favorites List')
{{-- @include('frontend.includes.banner') --}}

{{-- @include('frontend.includes.advertisement') --}}
@section('content')
    
    <div class="col-sm-12 col-md-12 Fullcontent-wrap">
        @include('includes.partials.messages')

        <div class="userdash-right">
			
	        @if (session()->has('success_message'))
	        	<div class="row">
		            <div class="col-sm-12">
			            <div class="alert alert-success">
			                {{ session()->get('success_message') }}
			            </div>
		            </div>
	        	</div>
	        @endif

	        @if (session()->has('error_message'))
	        	<div class="row">
		            <div class="col-sm-12">
			            <div class="alert alert-danger">
			                {{ session()->get('error_message') }}
			            </div>
			        </div>
		        </div>
	        @endif

		        @if (count($wishlists) > 0)

		        <table id="wishlist-table" class="table table-bordered table-striped table-hover" width="100%">
					<thead class="hide">
						<tr>
							<th>aaa</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>

	            
		            <div class="spacer"></div>

					<div class="button-group">
			            {{-- <a href="{{ URL::to('/')}}" class="btn btn-primary btn-lg">Continue Shopping</a> &nbsp; --}}

			            {{-- <div style="float:right">
			                <form action="{{ url('/emptyWishlist') }}" method="POST">
			                    {!! csrf_field() !!}
			                    <input type="hidden" name="_method" value="DELETE">
			                    <input type="submit" class="btn btn-danger btn-lg" value="Empty Wishlist">
			                </form>
			            </div> --}}
					</div>

		        @else
			        <div is="null" class="list-module-listempty">
	                    <div is="null" class="list-module-listempty_title">
	                        <i is="null" type="notice" class="fa fa-exclamation-circle list-module-listempty_titleicon" aria-hidden="true"></i><!-- react-text: 344 -->No Product added in Favorites.
	                        <!-- /react-text -->
	                    </div>
	                </div>

		            {{-- <h3>You have no items in your Wishlist</h3> --}}

		        @endif

		        <div class="spacer"></div>

        </div>
    
    </div>
    {{-- <div class="col-sm-4 col-md-4">
        <div class="maui-row-right mt15">
            @include('frontend.user.includes.noticeboard')
            @include('frontend.user.includes.supplier')
        </div>
    </div> --}}

@endsection
