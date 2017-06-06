<!-- Start Featured product -->
    <div class="msp-container">
        <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="title">{{$title}}</h3>
                    </div>
                    <div class="col-md-3">
                        <!-- Controls -->
                        <?php $rand = str_random(5); ?>
                        <div class="controls pull-right hidden-xs">
                            <a class="left fa fa-chevron-left" href="#carousel-example-{{$rand}}" data-slide="prev"></a>
                            <a class="right fa fa-chevron-right " href="#carousel-example-{{$rand}}" data-slide="next"></a>
                        </div>
                    </div>
                </div>
                <div id="carousel-example-{{$rand}}" class="carousel slide hidden-xs" data-ride="carousel" data-interval="false">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                    <?php $i =0; ?>
                        @foreach($products as $product)
                            @if($i == 0 || $i == 4)
                            <div class="item @if($i == 0) active @endif">
                                <div class="row"> 
                            @endif
                                    <div class="col-sm-3">
                                        <div class="col-item">
                                            <div class="photo">
                                                <a href="{{url('product/'.$product->slug)}}">
                                                    {{-- <p class="any-offer">50% Discount</p> --}}
                                                    <img src="{{asset('images/product/'.$product->id.'/small/'.$product->productListImage[0]->image)}}" alt="{{$product->name}}" /></a>
                                            </div>
                                            
                                            <div class="info">
                                                    <div class="price col-md-7">
                                                        <h5><a href="{{url('product/'.$product->slug)}}">{{$product->name}}</a></h5>
                                                    </div>
                                                    <div class="price col-md-4 no-padd">
                                                        <h5 class="price-text-color">
                                                              @if(!empty($product->productPrice->special_price)) NPR {{$product->productPrice->special_price}} @else NPR {{$product->productPrice->price}} @endif

                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="separator clear-left">
                                                    <a class="btn-add" href="cart.html" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                    <a class="btn-add" target="_blank" href="{{url('product/'.$product->slug)}}" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                                </div>
                                                <div class="clearfix">
                                          
                                            </div>
                                        </div>
                                    </div>
                            @if($i == 3 || $i == (count($products)-1))
                                </div>
                            </div>
                            @endif
                            <?php $i++; ?>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>
    <!-- End Featured product -->