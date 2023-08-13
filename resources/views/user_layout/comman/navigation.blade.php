<style>
    /* Main navigation styles */
ul.main-nav {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

ul.main-nav li {
  display: inline-block;
}
ul.main-nav li a {
  display: block;
  padding: 10px;
  text-decoration: none;
}

/* Sub-menu styles */
ul.submenu {
  display: none;
  background-color: #fff;
  padding: 10px;
   position: absolute;
    z-index: 9999;

}

ul.submenu li {
  display: block;
}

ul.submenu li a {
  display: inline-block;
}

</style>
<!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                {{-- <ul class="main-nav nav navbar-nav">
                    <li class="active"><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="#">Hot Deals</a></li>
                    <li><a href="{{ url('user/collections') }}">Categories</a></li>
                    <li><a href="{{ url('user/brands') }}">Brands</a></li>
                    <li><a href="#">Smartphones</a></li>
                    <li><a href="#">Cameras</a></li>
                    <li><a href="#">Accessories</a></li>
                </ul> --}}



                <ul class="main-nav nav navbar-nav">
                    <li class="active"><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('user/shop') }}">E-Mart</a></li>
                    <li><a class="parent_cat" href="javascript:void(0)">Categories</a>
                    <ul style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2)" class="submenu">
                        @foreach ($global_cats as $global_cat)
                          <li><a href="{{ url('user/collections/'.$global_cat->slug) }}"><p>{{ $global_cat->name }}</p></a></li>
                        @endforeach
                      </ul>
                    </li>
                    {{-- <li><a href="{{ url('user/brands') }}">Brands</a>
                      <ul style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2)" class="submenu">
                        @foreach ($global_brands as $global_brand)
                          <li><a href="{{ url('user/collections/'.$global_brand->slug) }}"><p>{{ $global_cat->name }}</p></a></li>
                        @endforeach
                      </ul>
                    </li> --}}
                    {{-- <li><a href="#">Smartphones</a></li>
                    <li><a href="#">Cameras</a></li>
                    <li><a href="#">Accessories</a></li> --}}
                </ul>
                
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->