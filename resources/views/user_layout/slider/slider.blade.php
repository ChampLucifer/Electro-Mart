<!-- SLIDER SECTION -->
<?php 
// echo"<pre>";print_r($sliders);die;
?>
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- SLIDER CONTENT -->
            @forelse ($sliders as $slider)
            <div class="col-md-4 col-xs-6">
                <a href="{{ url('user/collections/'. ($slider->category ? $slider->category->slug : '')) }}">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{ asset($slider->image) }}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>{{ $slider->title }}</h3>
                            {{-- <a href="{{ url('user/collection/'.$slider->category->slug) }}" class="cta-btn">{{ $slider->description }}<i class="fa fa-arrow-circle-right"></i></a> --}}
                            <a href="{{ url('user/collections/'. ($slider->category ? $slider->category->slug : '')) }}" class="cta-btn">{{ $slider->description }}<i class="fa fa-arrow-circle-right"></i></a>

                        </div>
                    </div>
                 </a>
            </div>
            @empty
                
            @endforelse
            
            <!-- SLIDER CONTENT END -->

            
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

<!-- SLIDER SECTION END-->