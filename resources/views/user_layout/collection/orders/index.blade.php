@extends('user_layout.comman.main')
@section('title','Checkout')

@section('main-section')

<div class="section">
    
    <div class="container py-5">
    
        <h1 class="mb-4">Your Orders</h1>
    
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Order ID</th>
              <th scope="col">Tracking No</th>
              <th scope="col">Full Name</th>
              <th scope="col">Payment Mode</th>
              <th scope="col">Order Date</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
         @foreach ($orders as $order)
         <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->tracking_no }}</td>
            <td>{{ $order->first_name." ".$order->last_name }}</td>
            <td>{{ $order->payment_mode }}</td>
            <td>{{ $order->created_at->format('d-m-y') }}</td>
            <td>{{ $order->status_message }}</td>
            <td><a href="{{ url('user/orders/'.$order->id) }}" class="btn btn-warning">View</a></td>
            
           </tr>
         @endforeach

           
          </tbody>
        </table>
        <div>{{ $orders->links() }}</div>
        
    
      </div>
    

</div>

@endsection