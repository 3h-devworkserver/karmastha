<div class="slider-container">
    <div class="left-offer-container col-xs-12 col-md-2 col-sm-2">
        <div class="fixe">
            <a href="">
                <img src="{{asset('front-images/add-banner/side_banner_smartphone_sale.jpg')}}" alt="Special Offer of Dashain" title="Special offer of Dashain Ddhmaaka" class="img-responsive">
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="main-slider-container col-xs-12 col-sm-8 col-md-8">
                @if(!empty($sliders))
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php $i =0; ?>
                        @foreach($sliders as $slider)
                            <li data-target="#carousel-example-generic" data-slide-to="{{$i}}" class="{{($i==0) ? 'active' : ''}}"></li>
                            <?php $i++; ?>
                        @endforeach
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php $i =0; ?>
                        @foreach($sliders as $slider)
                            <div class="item {{($i==0) ? 'active' : ''}}">
                                <img src="{{asset($slider->Slider_image)}}" alt="{{$slider->caption}}">
                                <!-- <div class="carousel-caption">
                                    First Image
                                </div> -->
                            </div>
                        <?php $i++; ?>
                        @endforeach

                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>
                @endif

            </div>
            <!-- end of Main Slider -->

            <div class="right-offer-container right-larg-add-banner col-xs-12 col-sm-4 col-md-4">
                <a href="">
                    
                    <img src="{{asset('front-images/add-banner/Start_Selling_enchanteur.jpg')}}" alt="Special Offer of Dashain" title="Special offer of Dashain Ddhmaaka" class="img-responsive">
                </a>
            </div>
        </div>
    </div>
    <div class="right-offer-container col-xs-12 col-sm-2 col-md-2">
        <div class="fixe">
                <a href="">
                    <img src="{{asset('front-images/add-banner/side_banner_smartphone_sale.jpg')}}" alt="Special Offer of Dashain" title="Special offer of Dashain Ddhmaaka" class="img-responsive">
                </a>    
        </div>
    </div>
</div>