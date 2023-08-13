@extends('admin_layout.comman.main')
@section('title','Product Create')
@section('admin-section')
<div class="container-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"> Add Product</h5>
                        {{-- <small class="text-muted float-end">Default label</small> --}}
                    </div>
                  <div class="card-body">
                    <form action="{{ url('admin/product') }}" method="POST" enctype="multipart/form-data" >
                        @csrf

                       {{-- NAV TABS --}}
                        <ul class="nav nav-tabs">

                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#product_detail">Product Details</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#product_price">Product Price </a>
                            </li>   
                             
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#seo_tags">SEO Tags</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#extra_details">Extra Details</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#color">Color</a>
                            </li>

                        </ul>
                        {{-- TABS END --}}

                        {{-- TABS SECTION --}}
                        <div class="tab-content px-0">
                            <div class="tab-pane container active" id="product_detail">
                                <div class="mb-3 row">
                                    <div class="col-6">
                                        <label class="form-label" for="name">Product Name</label>
                                        <input type="text" value="{{ old('product_name') }}" name="product_name" class="form-control" id="name" >
                                        <span class="text-danger"> @error('product_name'){{ $message }} @enderror</span>
                                    </div>  
                                    <div class="mb-3 col-6">
                                        <label class="form-label" for="slug">Product Slug</label>
                                        <input type="text" value="{{ old('product_slug') }}" name="product_slug" class="form-control" id="slug" >
                                        <span class="text-danger"> @error('product_slug'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-6">
                                        <label for="category" class="form-label">category</label>
                                        <select id="category"  name="product_category" class="form-select">
                                            <option value="">Select Category</option>
                                            @foreach ( $categories as $category )
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                       <span class="text-danger"> @error('product_category'){{ $message }} @enderror</span>
                                    </div>  
                                    <div class="mb-3 col-6">
                                        <label for="brand" class="form-label">brand</label>
                                        <select id="brand"  name="product_brand" class="form-select">
                                            <option value="">Select Brand</option>
                                            @foreach ( $brands as $brand )
                                                <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                         <span class="text-danger"> @error('product_brand'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="long_descripttion" class="form-label">Long Description</label>
                                    <textarea class="form-control" value="{{ old('long_descripttion') }}" name="long_descripttion" id="long_descripttion" rows="3"> {{ old('long_descripttion') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="short_descripttion" class="form-label">Short Description</label>
                                    <textarea class="form-control"  value="{{ old('short_descripttion') }}" name="short_descripttion" id="short_descripttion" rows="3">{{ old('short_descripttion') }}</textarea>
                                </div>
                            </div>

                            <div class="tab-pane container fade" id="product_price">
                                <div class="mb-3 row">
                                    <div class="col-4">
                                        <label class="form-label" for="og_price">Product Orignal Price</label>
                                        <input type="number"  value="{{ old('product_og_price') }}" name="product_og_price" class="form-control" id="og_price" >
                                        <span class="text-danger"> @error('product_og_price'){{ $message }} @enderror</span>
                                    </div>  
                                    <div class="mb-3 col-4">
                                        <label class="form-label" for="product_selling_price">Product Selling Price</label>
                                        <input type="number" value="{{ old('product_selling_price') }}" name="product_selling_price" class="form-control" id="product_selling_price" >
                                        <span class="text-danger"> @error('product_selling_price'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label" for="product_quantity">Product Quantity</label>
                                        <input type="number" value="{{ old('product_quantity') }}"  name="product_quantity" class="form-control" id="product_quantity" >
                                        <span class="text-danger"> @error('product_quantity'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="tab-pane container fade" id="seo_tags">
                                <div class="mb-3 row">
                                    <div class="col-6">
                                        <label class="form-label" for="product_meta_title">Meta Title</label>
                                        <input type="text" value="{{ old('product_meta_title') }}"  name="product_meta_title" class="form-control" id="product_meta_title" >
                                        <span class="text-danger"> @error('product_meta_title'){{ $message }} @enderror</span>
                                    </div>  
                                    <div class="mb-3 col-6">
                                        <label class="form-label" for="product_meta_keyword">Meta Keyword</label>
                                        <input type="text"  value="{{ old('product_meta_keyword') }}"  name="product_meta_keyword" class="form-control" id="product_meta_keyword" >
                                        <span class="text-danger"> @error('product_meta_keyword'){{ $message }} @enderror</span>
                                    </div>
                                </div> 
                                <div class="mb-3">
                                    <label for="product_meta_descripttion" class="form-label">Meta Description</label>
                                    <textarea class="form-control" value="{{ old('product_meta_descripttion') }}" name="product_meta_descripttion" id="product_meta_descripttion" rows="3">{{ old('product_meta_descripttion') }}</textarea>
                                </div>
                            </div>

                            <div class="tab-pane container fade" id="extra_details">
                                <div class="mb-3 row">
                                    <div class="col-6">
                                        <div class="form-check form-switch mb-2">
                                            <input  class="form-check-input" name="product_status" type="checkbox" id="status" >
                                            <label class="form-check-label" for="status"><h5>Status</h5></label>
                                        </div>
                                            <span class="text-danger"> @error('product_status'){{ $message }} @enderror</span>
                                    </div>  
                                    <div class="mb-3 col-6">
                                        <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" name ="product_trending" type="checkbox" id="trending" >
                                            <label class="form-check-label" for="trending"><h5>Trending</h5></label>
                                        </div>
                                        <span class="text-danger"> @error('product_trending'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="product_images" class="form-label">Product Images</label>
                                            <input class="form-control" name="product_images[]" type="file" id="product_images" multiple="">
                                            <span class="text-danger"> @error('product_images[]'){{ $message }} @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>

                            <div class="tab-pane container fade" id="color">
                                <div class="mb-3 row">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <div class="row">
                                                    @forelse ($colors as $color)
                                                        <div class="col-md-3 m-3 p-3" style="border: 1px solid ">
                                                            <input class="form-check-input" value="{{ $color->id }}" name="product_colors[{{ $color->id }}]" type="checkbox" id="color_check">
                                                            {{ $color->name }}
                                                            <br>
                                                            Quantity:<input type="number" name="product_color_quantity[{{ $color->id }}]" id="" style="width:70px">
                                                        </div>
                                                    @empty
                                                        <div class="col-md-12">
                                                            <h1>No Colors Available</h1>
                                                        </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>

                        </div>
                        {{-- TABS SECTION END --}}

                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection