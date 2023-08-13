@extends('admin_layout.comman.main')
@section('title','Color Edit')
@section('admin-section')
<div class="container-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"> Update Color</h5>
                    {{-- <small class="text-muted float-end">Default label</small> --}}
                  </div>
                  <div class="card-body">
                    @if ( session('message') )
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    <form action="{{ url('admin/color/'.$color->id) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('put')
                        <div class="mb-3 row">
                            <div class="col-6">
                                <label class="form-label" for="name">Color Name</label>
                                <input type="text" value= "{{ $color->name }}" name="color_name" class="form-control" id="name" >
                                <span class="text-danger"> @error('color_name'){{ $message }} @enderror</span>
                            </div>  
                            <div class="mb-3 col-6">
                                <label class="form-label" for="slug">Color Code</label>
                                <input type="text" value= "{{ $color->code }}" name="color_code" class="form-control" id="slug" >
                                <span class="text-danger"> @error('color_code'){{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="row mb-3" >
                            <div class=" col-6">
                                <div class="form-check form-switch mt-4">
                                    <label class="form-check-label" for="status"><h5>Status</h5></label>
                                    <input class="form-check-input" name="color_status" type="checkbox" id="status" {{ $color->status =='1'?'checked':'' }} >
                                </div>    
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