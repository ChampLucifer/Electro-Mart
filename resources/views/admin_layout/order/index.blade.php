@extends('admin_layout.comman.main')
@section('title','Orders')
@section('admin-section')
<div class="container-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Orders</h3>
                    </div>
                  <div class="card-body">
                      @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                      @endif
                      <form action="" method="GET">
                        <div class="row">
                          <div class="col-lg-3">
                              <label for="date">Filter By Date</label>
                              <input  id="date"class="form-control"type="date" name="date" value="{{ Request::get('date')?? date('Y-m-d') }}" id="">
                          </div>
                          <div class="col-lg-3">
                              <label for="status">Filter By Status</label>
                              <select class="form-control" name="status" id="status">
                                <option value="">Select Status</option>
                                <option value="In Progress" {{ Request::get('status') =="In Progress" ?'selected':''}}>In Progress</option>
                                <option value="completed" {{ Request::get('status') =="completed" ?'selected':''}}>Completed</option>
                                <option value="pending" {{ Request::get('status') =="pending" ?'selected':''}}>Pending</option>
                                <option value="canceled" {{ Request::get('status') =="canceled" ?'selected':''}}>Canceled</option>
                                <option value="out-for-delivery" {{ Request::get('status') =="out-for-delivery" ?'selected':''}}>Out For Delivery</option>
                              </select>
                          </div>
                          <div class="col-lg-6">
                              <br>
                              <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                          </div>
                      </form>
                      <hr>
                    <div class="table-responsive text-nowrap">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Tracking No</th>
                            <th>Name</th>
                            <th>Payment Mode</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                           @foreach ($orders as $order) 
                         <tr>
                            <td>{{ $order->tracking_no }}</td>
                           <td>{{ $order->first_name." ".$order->last_name }}</td>
                            <td>{{ $order->payment_mode}}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->status_message }}</td>
                            <td><a href="{{ url('admin/order/'.$order->id) }}" class="btn btn-warning">View</a></td>
                            {{-- <td>
                              <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="{{ url('admin/brand/edit/'.$brand->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                  <a class="dropdown-item" href="{{ url('admin/brand/delete/'.$brand->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                              </div>
                            </td> --}}
                          </tr>
                          @endforeach 
                        </tbody>
                      </table>
                      {{ $orders->links() }}
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection