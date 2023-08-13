@extends('admin_layout.comman.main')
@section('title','Brand Edit')
@section('admin-section')
<div class="container-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"> Edit Brand</h5>
                    {{-- <small class="text-muted float-end">Default label</small> --}}
                  </div>
                  <div class="card-body">
                    <form action="{{ url('admin/brand/'.$brand->id) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <div class="mb-3 row">
                            <div class="col-6">
                                <label class="form-label" for="name">brand Name</label>
                                <input type="text" value="{{ $brand->name }}" name="brand_name" class="form-control" id="name" >
                                <span class="text-danger"> @error('brand_name'){{ $message }} @enderror</span>
                            </div>  
                            <div class="mb-3 col-6">
                                <label class="form-label" for="slug">brand Slug</label>
                                <input type="text" value="{{ $brand->slug }}"  name="brand_slug" class="form-control" id="slug" >
                                <span class="text-danger"> @error('brand_slug'){{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="row mb-3" >
                             <div class=" col-6">
                                <div class="form-check form-switch mt-4">
                                    <label class="form-check-label" for="status"><h5>Status</h5></label>
                                    <input class="form-check-input" name="brand_status" type="checkbox" id="status" {{ $brand->status =='1'?'checked':'' }} >
                                </div>    
                            </div>
                        </div>   
                        <div class="mb-3 row">
                            <div class="col-6">
                                <label for="category" class="form-label">category</label>
                                <select id="category" value="{{ $brand->category_id }}" name="product_category" class="form-select">
                                    <option value="">Select Category</option>
                                    @foreach ( $categories as $category )
                                        <option value="{{ $category->id }}" {{ $category->id == $brand->category_id ?'selected':'' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                               <span class="text-danger"> @error('product_category'){{ $message }} @enderror</span>
                            </div>


                            <div class=" col-6">
                                <label for="formFile" class="form-label">Brand Image</label>
                                <input class="form-control" name="brand_image" type="file" id="formFile">
                                 <img class="mt-4" style="border:1px solid #1e1e1e;width:70p;height:70px" src="{{ asset( $brand->image)  }}">
                                <span class="text-danger"> @error('brand_image'){{ $message }} @enderror</span>
                            </div>
                        </div>  
                         <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection