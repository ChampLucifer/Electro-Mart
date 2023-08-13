@extends('user_layout.comman.main')
@section('title','Categories')
@section('main-section')


<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-lg-4">
                <div class="card mx-2 mb-4" style="width: 400px">
                    <img class="card-img-top mx-auto d-block" src="{{ asset($category->image) }}" alt="{{ $category->name }}" style="width: 50%; height: 50%">
                    <div class="card-body">
                        <h4 class="card-title">{{ $category->name }}</h4>
                        <a href="{{ url('user/collections/'.$category->slug) }}" class="mx-auto d-block text-center btn btn-primary">View Category</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection
