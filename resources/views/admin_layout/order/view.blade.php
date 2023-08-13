@extends('admin_layout.comman.main')
@section('title')
{{ $order->name }}
@endsection
@section('admin-section')
<style>
    .card {
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
</style>
<div class="section pt-5">
    <div class="container">
      
        <div class="row">
            <div class="col-lg-12">

                <div class="card shadow">
                    <div class="card-header ">
                        @if (session('message'))
                        <div class="alert alert-success">{{session('message') }}</div>
                    @endif
                        <div class="row">
                            <div class="col-lg-5">
                                <h3><b>My Order Details</b></h3>
                            </div>
                            <div class="col-lg-7 text-right">
                                {{-- <button class="btn btn-warning text-right">Back</button> --}}
                                <a target="_blank" href="{{ url('admin/invoice/'.$order->id) }}" class="btn btn-primary text-right">View Invoice</a>
                                <a href="{{ url('admin/invoice/generate/'.$order->id) }}" class="btn btn-warning text-right">Download Invoice</a>
                            <a href="{{ url('admin/invoice/mail/'.$order->id) }}" class="btn btn-danger">Send Invoice</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-5 bg-white">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5><b>Order Details</b></h5><hr>
                                <h6>Order ID: {{ $order->id }}</h6>
                                <h6>Tracking ID: {{ $order->tracking_no }}</h6>
                                <h6>Order Created Date: {{ $order->created_at->format('d-m-Y') }}</h6>
                                <h6>Payment Mode: {{ $order->payment_mode }}</h6>
                                <h6>Order Status: <span class="text-uppercase text-warning"> {{ $order->status_message }} </span></h6>
                            </div>
                            <div class="col-lg-6">
                                <h5><b>User Details</b></h5><hr>
                                <h6>Full Name: {{ $order->first_name." ".$order->last_name }}</h6>
                                <h6>Email: {{ $order->email }}</h6>
                                <h6>Phone: {{ $order->phone }}</h6>
                                <h6>Address: {{ $order->address }}</h6>
                                <h6>Pincode: {{ $order->pincode }}</h6>
                            </div>
                        </div>
                        
                        <div class="row" style="padding:10px">
                            <div class="col">
                                <h4 class="text-center"><b>Order Items</b></h4><hr>

                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Item ID</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->order_items as $order_item)
                                            <tr>
                                                <td>{{$order_item->id}}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if ( $order_item->product->productImages->count()>0 )
                                                            <img  style="width: 100px;height:100px" class="product-image"src="{{ asset( $order_item->product->productImages[0]->image ) }}" alt="{{ $order_item->product->name  }}">
                                                        @endif
                                                    </div>
                                                </td>
                                                <td><a href="{{ url('user/collection/'.$order_item->product->category->slug.'/'.$order_item->product->slug) }}">
                                                    <span>{{  $order_item->product->name }}
                                                        @if ($order_item->product_color )
                                                            <span style="font-weight:bold;color:{{ $order_item->product_color->color->name }}">({{ $order_item->product_color->color->name  }})</span>
                                                        @endif
                                                    </span>
                                                </a></td>
                                                <td>{{ $order_item->price }}</td>
                                                <td>{{ $order_item->quantity }}</td>
                                                <td>{{ $order_item->price*$order_item->quantity}}</td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="card card-body">
                                <form method="POST" action="{{ url('admin/order/'.$order->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <h4>Update Order Status</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="status" class="pb-3">Update</label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="">Select Status</option>
                                                <option value="In Progress" {{ Request::get('status') == "In Progress" ? 'selected' : '' }}>In Progress</option>
                                                <option value="completed" {{ Request::get('status') == "completed" ? 'selected' : '' }}>Completed</option>
                                                <option value="pending" {{ Request::get('status') == "pending" ? 'selected' : '' }}>Pending</option>
                                                <option value="canceled" {{ Request::get('status') == "canceled" ? 'selected' : '' }}>Canceled</option>
                                                <option value="out-for-delivery" {{ Request::get('status') == "out-for-delivery" ? 'selected' : '' }}>Out For Delivery</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <h4>Order Status: {{ $order->status_message }}</h4>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <button class="btn btn-danger" type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        

                    </div>
                </div>
                

            </div>
        </div>
    </div>
   
</div>

@endsection