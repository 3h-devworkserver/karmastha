<!-- Start Featured product -->
    <div class="msp-container">
        <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="title">Featured Products</h3>
                    </div>
                    <div class="col-md-3">
                        <!-- Controls -->
                        <div class="controls pull-right hidden-xs">
                            <a class="left fa fa-chevron-left" href="#carousel-example-hot" data-slide="prev"></a>
                            <a class="right fa fa-chevron-right " href="#carousel-example-hot" data-slide="next"></a>
                        </div>
                    </div>
                </div>
                <div id="carousel-example-hot" class="carousel slide hidden-xs" data-ride="carousel" data-interval="false">
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
                                                <a href="">
                                                    {{-- <p class="any-offer">50% Discount</p> --}}
                                                    <img src="{{asset('images/product/'.$product->id.'/small/'.$product->productListImage[0]->image)}}" alt="{{$product->name}}" /></a>
                                            </div>
                                            <div class="info">
                                            
                                                    <div class="price col-md-7">
                                                        <h5><a href="product_detail.html">{{$product->name}}</a></h5>
                                                    </div>
                                                    <div class="price col-md-4 no-padd">
                                                        <h5 class="price-text-color">
                                                              $199.99</h5>
                                                    </div>
                                                </div>
                                                <div class="separator clear-left">
                                                    <a class="btn-add" href="cart.html" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                    <a class="btn-add" href="product_list.html" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
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