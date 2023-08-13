@extends('admin_layout.comman.main')
@section('title','User Create')
@section('admin-section')
<div class="container-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"> Add User</h5>
                    {{-- <small class="text-muted float-end">Default label</small> --}}
                  </div>
                  <div class="card-body">
                    @if ( session('message') )
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    <form action="{{ url('admin/users') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3 row">
                            <div class="col-6">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" >
                                <span class="text-danger"> @error('name'){{ $message }} @enderror</span>
                            </div>  
                            <div class="mb-3 col-6">
                                <label class="form-label" for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email" >
                                <span class="text-danger"> @error('email'){{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="row mb-3" >
                            <div class=" col-6">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" >
                                <span class="text-danger"> @error('password'){{ $message }} @enderror</span>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="brand" class="form-label">Role</label>
                                <select id="brand" value="{{ old('user_role') }}" name="user_role" class="form-select">
                                    <option value="">Select Role</option>
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>    
                                </select>
                                 <span class="text-danger"> @error('user_role'){{ $message }} @enderror</span>
                            </div>
                        </div> 
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection