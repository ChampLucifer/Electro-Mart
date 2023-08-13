@extends('admin_layout.comman.main')
@section('title','Slider')
@section('admin-section')
<div class="container-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Sliders</h3>
                    <a href="{{ url('admin/slider/create') }}" class="btn btn-primary">Add Slider</a>
                   </div>
                  <div class="card-body">
                      @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                      @endif
                    <div class="table-responsive text-nowrap">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                           @foreach ($sliders as $slider) 
                         <tr>
                            <td>{{ $slider->id }}</td>
                            <td>{{ $slider->title }}</td>
                            <td>{{ $slider->status =='1'?'Hide':'Show' }}</td>
                            <td>
                              <img src="{{ asset( $slider->image) }}" alt="slider-image" title="slider-image" style="width:70px;height:70px" class="rounded-circle">
                            </td>
                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="{{ url('admin/slider/edit/'.$slider->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                  <a class="dropdown-item" href="{{ url('admin/slider/delete/'.$slider->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          @endforeach 
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection