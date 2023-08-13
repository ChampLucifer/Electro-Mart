@extends('admin_layout.comman.main')
@section('title','Category Create')
@section('admin-section')
<div class="container-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"> Add Category</h5>
                    {{-- <small class="text-muted float-end">Default label</small> --}}
                  </div>
                  <div class="card-body">
                    <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3 row">
                            <div class="col-6">
                                <label class="form-label" for="name">Category Name</label>
                                <input type="text" name="category_name" class="form-control" id="name" >
                                <span class="text-danger"> @error('category_name'){{ $message }} @enderror</span>
                            </div>  
                            <div class="mb-3 col-6">
                                <label class="form-label" for="slug">Category Slug</label>
                                <input type="text" name="category_slug" class="form-control" id="slug" >
                                <span class="text-danger"> @error('category_slug'){{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="descripttion" class="form-label">Category Description</label>
                            <textarea class="form-control" name="category_description" id="descripttion" rows="3"></textarea>
                        </div>
                        <div class="row mb-3" >
                            <div class=" col-6">
                                <label for="formFile" class="form-label">Category Image</label>
                                <input class="form-control" name="category_image" type="file" id="formFile">
                                <span class="text-danger"> @error('category_image'){{ $message }} @enderror</span>
                            </div>
                            <div class=" col-6">
                                <div class="form-check form-switch mt-4">
                                    <label class="form-check-label" for="status"><h5>Status</h5></label>
                                    <input class="form-check-input" name="category_status" type="checkbox" id="status" >
                                </div>    
                            </div>
                        </div>   
                         {{--SEO INPUT  --}}
                         <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"> SEO Tags</h5>
                            {{-- <small class="text-muted float-end">Default label</small> --}}
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6">
                                <label class="form-label" for="title">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" id="title" >
                                <span class="text-danger"> @error('meta_title'){{ $message }} @enderror</span>
                             </div>  
                            <div class="mb-3 col-6">
                                <label class="form-label" for="keyword">Meta Keyword</label>
                                <input type="text" name="meta_keyword" class="form-control" id="keyword" >
                                <span class="text-danger"> @error('meta_keyword'){{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="meta_descripttion" class="form-label">Meta Description</label>
                            <textarea class="form-control" name="meta_description" id="meta_descripttion" rows="3"></textarea>
                        </div>
                         {{-- ENDS --}}
                      <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection