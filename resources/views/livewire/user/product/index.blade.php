<div>
<!-- BREADCRUMB -->
{{-- <div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">All Categories</a></li>
                    <li><a href="#">Accessories</a></li>
                    <li class="active">Headphones (227,490 Results)</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div> --}}
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                {{-- ADD CATEGORIES SECTION --}}
               @include('user_layout.collection.product.filter.category_filter')
                {{-- END --}}

                {{-- ADD PRICE SECTION --}}
               @include('user_layout.collection.product.filter.price_filter')
               {{-- END --}}

               {{-- ADD BRANDS SECTION --}}
               @include('user_layout.collection.product.filter.brand_filter')
                {{-- END --}}

                 {{-- ADD TOP_SELLER SECTION --}}
               @include('user_layout.collection.product.filter.top_seller')
               {{-- END --}}
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <label>
                            Sort By:
                            <select class="input-select">
                                <option value="0">Popular</option>
                                <option value="1">Position</option>
                            </select>
                        </label>

                        <label>
                            Show:
                            <select class="input-select">
                                <option value="0">20</option>
                                <option value="1">50</option>
                            </select>
                        </label>
                    </div>
                    <ul class="store-grid">
                        <li class="active"><i class="fa fa-th"></i></li>
                        <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                    </ul>
                </div>
                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    <!-- product -->
                    @forelse ($products as $product)
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                @if ( $product->productImages->count()>0 )
                                    <img src="{{ asset( $product->productImages[0]->image ) }}" alt="{{ $product->name }}">
                                @endif
                                <div class="product-label">
                                    <span class="sale">-30%</span>
                                    <span class="new">NEW</span>
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $category->name }}</p>
                                <h3 class="product-name"><a href="{{ url('user/collection/'.$category->slug.'/'.$product->slug) }}">{{ $product->name }}</a></h3>
                                <a href="{{ url('user/collection/'.$category->slug.'/'.$product->slug) }}"><h4 class="product-price">${{ $product->selling_price }} <del class="product-old-price">${{ $product->orignal_price }}</del></h4></a>
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
                                @if ( $product->quantity > 0 )
                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                @else
                                    <a  href="javascript:void(0)" class="btn btn-primary" ><i class="fa fa-shopping-cart"></i> Out Of Stock</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="col-md-12">
                            <h2>No Products Found For {{ $category->name }}</h2>
                        </div>
                    @endforelse
                    
                    <!-- /product -->

                    

                    <div class="clearfix visible-sm visible-xs"></div>

                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <span class="store-qty">Showing {{ $products->count() }} products</span>
                    <ul class="store-pagination">
                        {{-- <li class="active">  {{ $products->appends( request()->input() )->links() }}</li> --}}
                        
                    </ul>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
</div>