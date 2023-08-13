@extends('user_layout.comman.main')
@section('title','Brands')
@section('main-section')


<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            @foreach ($brands as $brand)
            {{-- <div class="col-lg-4">
                <div class="card " style=" width: 400px;">
                    <a class="text-center" href="{{ url('user/'.$brand->slug) }}">
                        <div style="width:300px;height: 300px;" class="d-flex justify-content-center align-items-center" >
                            <img class="card-img-top" src="{{ asset($brand->image) }}" alt="{{ $brand->name }}" style="width: 50%; height: 50%; border-radius: 50%; border: 1px solid #1e1e1e;">
                        </div>
                    </a>
                    
                </div> --}}
                <div class="col-md-4 col-xs-6">
                    <a href="{{ url('user/collections/'.$brand->slug) }}">
                        <div style="height: 328px;width:328px" class="shop">
                            <div class="shop-img">
                                <img src="{{ asset($brand->image) }}" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>{{ $brand->name }}</h3>
                                <a href="{{ url('user/collections/'.$brand->slug) }}">
                        <a href="{{  url('user/collections/'.$brand->slug)  }}" class="cta-btn"> Visit <i class="fa fa-arrow-circle-right"></i></a>
                             </div>
                        </div>
                     </a>
                </div>
        
            
            
            @endforeach
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection
