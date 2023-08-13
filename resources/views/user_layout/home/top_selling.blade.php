{{-- <!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Top selling</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
                            <li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
                            <li><a data-toggle="tab" href="#tab2">Cameras</a></li>
                            <li><a data-toggle="tab" href="#tab2">Accessories</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<!-- Products tab & slick -->
<div class="col-md-12">
    <div class="row">
        <div class="products-tabs">
            <!-- tab -->
            <div id="tab2" class="tab-pane fade in active">
                <div class="products-slick" data-nav="#slick-nav-2">
                    <!-- product -->
                         
                    @if ( $top_sellings )
                                    
                    <!-- product -->
                    @foreach ( $top_sellings as $top_selling )
                    <div class="product">
                       <div class="product-img">
                           @if ( $top_selling->productImages->count()>0 )
                               <img src="{{ asset( $top_selling->productImages[0]->image ) }}" alt="{{ $top_selling->name }}">
                           @endif
                           <div class="product-label">
                               <span class="sale">-30%</span>
                               <span class="new">NEW</span>
                           </div>
                       </div>
                       <div class="product-body">
                           <p class="product-category">{{ $top_selling->category->name }}</p>
                           <h3 class="product-name"><a href="{{ url('user/collection/'.$top_selling->category->slug.'/'.$top_selling->slug) }}">{{ $top_selling->name }}</a></h3>
                           <a href="{{ url('user/collection/'.$top_selling->category->slug.'/'.$top_selling->slug) }}"><h4 class="product-price">${{ $top_selling->selling_price }} <del class="product-old-price">${{ $top_selling->orignal_price }}</del></h4></a>
                           <div class="product-rating">
                               <i class="fa fa-star"></i>
                               <i class="fa fa-star"></i>
                               <i class="fa fa-star"></i>
                               <i class="fa fa-star"></i>
                               <i class="fa fa-star"></i>
                           </div>
                           <div class="product-btns">
                               <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                               <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                           </div>
                       </div>
                       <div class="add-to-cart">
                           @if ( $top_selling->quantity > 0 )
                               <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                           @else
                               <a  href="javascript:void(0)" class="btn btn-primary" ><i class="fa fa-shopping-cart"></i> Out Of Stock</a>
                           @endif
                       </div>
                   </div>
                    @endforeach
                    
                   <!-- /product -->

                   @endif

                 
                </div>
                <div id="slick-nav-2" class="products-slick-nav"></div>
            </div>
            <!-- /tab -->
        </div>
    </div>
</div>
<!-- /Products tab & slick --> --}}