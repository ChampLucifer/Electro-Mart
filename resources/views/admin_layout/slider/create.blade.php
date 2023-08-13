@extends('admin_layout.comman.main')
@section('title','Slider Create')
@section('admin-section')
<div class="container-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"> Add Slider</h5>
                  </div>
                  <div class="card-body">
                    <form action="{{ url('admin/slider') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3 row">
                            <div class="col-6">
                                <label class="form-label" for="title">slider title</label>
                                <input type="text" value="{{ old('slider_title') }}" name="slider_title" class="form-control" id="title" >
                                <span class="text-danger"> @error('slider_title'){{ $message }} @enderror</span>
                            </div>  
                        </div>
                        <div class="mb-3">
                            <label for="descripttion" class="form-label">slider Description</label>
                            <textarea class="form-control" name="slider_description" id="descripttion" rows="3">{{ old('slider_description') }}</textarea>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6">
                                <label for="category" class="form-label">category</label>
                                <select id="category"value="{{ old('product_category') }}" name="product_category" class="form-select">
                                    <option value="">Select Category</option>
                                    @foreach ( $categories as $category )
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                               <span class="text-danger"> @error('product_category'){{ $message }} @enderror</span>
                            </div>  
                            <div class="mb-3 col-6">
                                <label for="brand" class="form-label">brand</label>
                                <select id="brand" value="{{ old('product_brand') }}" name="product_brand" class="form-select">
                                    <option value="">Select Brand</option>
                                    @foreach ( $brands as $brand )
                                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                 <span class="text-danger"> @error('product_brand'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="row mb-3" >
                            <div class=" col-6">
                                <label for="formFile" class="form-label">slider Image</label>
                                <input class="form-control" name="slider_image" type="file" id="formFile">
                                <span class="text-danger"> @error('slider_image'){{ $message }} @enderror</span>
                            </div>
                            <div class=" col-6">
                                <div class="form-check form-switch mt-4">
                                    <label class="form-check-label" for="status"><h5>Status</h5></label>
                                    <input class="form-check-input"  name="slider_status" type="checkbox" id="status" >
                                </div>    
                            </div>
                        </div>   
                      <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection