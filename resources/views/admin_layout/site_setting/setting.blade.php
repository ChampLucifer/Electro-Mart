@extends('admin_layout.comman.main')
@section('title','Setting')
@section('admin-section')
<div class="container-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Settings</h5>
                        {{-- <small class="text-muted float-end">Default label</small> --}}
                    </div>
                  <div class="card-body">
                    <form action="{{ url('admin/settings') }}" method="POST" enctype="multipart/form-data" >
                        @csrf

                       {{-- NAV TABS --}}
                        <ul class="nav nav-tabs">

                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#website_details">Website Details</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#contact_details">Contact Details</a>
                            </li>   
                             
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#social_links">Social Links</a>
                            </li>

                         </ul>
                        {{-- TABS END --}}

                        {{-- TABS SECTION --}}
                        <div class="tab-content px-0">
                            <div class="tab-pane container active" id="website_details">
                                <div class="mb-3 row">
                                    <div class="col-6">
                                        <label class="form-label" for="name">Website Name</label>
                                        <input type="text" value="{{ $setting->website_name }}" name="website_name" class="form-control" id="name" >
                                        <span class="text-danger"> @error('website_name'){{ $message }} @enderror</span>
                                    </div>  
                                    <div class="mb-3 col-6">
                                        <label class="form-label" for="url">Website Url</label>
                                        <input type="text" value="{{ $setting->website_url }}" name="website_url" class="form-control" id="url" >
                                        <span class="text-danger"> @error('website_url'){{ $message }} @enderror</span>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-6">
                                        <label class="form-label" for="title">Page Title</label>
                                        <input type="text" value="{{ $setting->page_title }}" name="page_title" class="form-control" id="title" >
                                        <span class="text-danger"> @error('page_title'){{ $message }} @enderror</span>
                                    </div>  
                                    <div class="mb-3 col-6">
                                        <label class="form-label" for="keyword">Meta Keyword</label>
                                        <input type="text" value="{{ $setting->meta_keyword }}" name="meta_keyword" class="form-control" id="keyword" >
                                        <span class="text-danger"> @error('meta_keyword'){{ $message }} @enderror</span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="meta_description" class="form-label">Meta Description</label>
                                    <textarea class="form-control" value="{{ $setting->meta_description }}" name="meta_description" id="meta_description" rows="3"> {{ $setting->meta_description }}</textarea>
                                </div>
                            </div>

                            <div class="tab-pane container fade" id="contact_details">
                                <div class="mb-3 row">
                                    <div class="col-6">
                                        <label class="form-label" for="phone1">Phone 1</label>
                                        <input type="number"  value="{{ $setting->phone1 }}" name="phone1" class="form-control" id="phone1" >
                                        <span class="text-danger"> @error('phone1'){{ $message }} @enderror</span>
                                    </div>  
                                    <div class="mb-3 col-6">
                                        <label class="form-label" for="phone2">Phone 2</label>
                                        <input type="number" value="{{ $setting->phone2 }}" name="phone2" class="form-control" id="phone2" >
                                        <span class="text-danger"> @error('phone2'){{ $message }} @enderror</span>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label" for="email1">Email 1</label>
                                        <input type="email"  value="{{ $setting->email}}" name="email1" class="form-control" id="email1" >
                                        <span class="text-danger"> @error('email1'){{ $message }} @enderror</span>
                                    </div>  
                                    <div class="mb-3 col-6">
                                        <label class="form-label" for="email2">Email 2</label>
                                        <input type="email" value="{{ $setting->email2 }}" name="email2" class="form-control" id="email2" >
                                        <span class="text-danger"> @error('email2'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea class="form-control" value="{{ $setting->address }}" name="address" id="address" rows="3">{{ $setting->address }}</textarea>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="tab-pane container fade" id="social_links">
                                <div class="mb-3 row">
                                    <div class="col-6">
                                        <label class="form-label" for="instagram">Instagram</label>
                                        <input type="text" value="{{ $setting->instagram }}"  name="instagram" class="form-control" id="instagram" >
                                        <span class="text-danger"> @error('instagram'){{ $message }} @enderror</span>
                                    </div>  
                                    <div class="mb-3 col-6">
                                        <label class="form-label" for="whatsapp">Whatsapp</label>
                                        <input type="text"  value="{{ $setting->whatsapp }}"  name="whatsapp" class="form-control" id="whatsapp" >
                                        <span class="text-danger"> @error('whatsapp'){{ $message }} @enderror</span>
                                    </div>
                                </div> 
                               
                                <div class="mb-3 row">
                                    <div class="col-6">
                                        <label class="form-label" for="facebook">Facebook</label>
                                        <input type="text" value="{{ $setting->facebook }}"  name="facebook" class="form-control" id="facebook" >
                                        <span class="text-danger"> @error('facebook'){{ $message }} @enderror</span>
                                    </div>  
                                    <div class="mb-3 col-6">
                                        <label class="form-label" for="twitter">twitter</label>
                                        <input type="text"  value="{{ $setting->twitter }}"  name="twitter" class="form-control" id="twitter" >
                                        <span class="text-danger"> @error('twitter'){{ $message }} @enderror</span>
                                    </div>
                                </div> 

                            </div>

                           <button type="submit" class="btn btn-primary">Submit</button>

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