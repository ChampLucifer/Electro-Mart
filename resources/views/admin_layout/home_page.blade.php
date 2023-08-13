@extends('admin_layout.comman.main')
@section('title','Home ')
@section('admin-section')
  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      {{-- SECTION 1 --}}
      <div class="row">
        <div class="col-lg-8 mb-4 order-0">
          <div class="card">
            <div class="d-flex align-items-end row">
              <div class="col-sm-7">
                <div class="card-body">
                  <h5 class="card-title text-primary">Congratulations John! 🎉</h5>
                  <p class="mb-4">
                    You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                    your profile.
                  </p>

                  <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                </div>
              </div>
              <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
                  <img
                    src="../assets/img/illustrations/man-with-laptop-light.png"
                    height="140"
                    alt="View Badge User"
                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                    data-app-light-img="illustrations/man-with-laptop-light.png"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> 
      {{-- /SECTION 1 --}}

      {{-- SECTION 2 --}}
      <div class="row">
        <div class="col-lg-3">
          <div class="card card-body alert alert-danger">
              <h5>Total Orders</h5>
              <h6>{{ $total_orders }}</h6>
              <a href="{{ url('admin/order') }}">View</a>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card card-body alert alert-primary">
              <h5>Today Orders</h5>
              <h6>{{ $today_orders }}</h6>
              <a href="{{ url('admin/order') }}">View</a>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card card-body alert alert-success">
              <h5>This Month Orders</h5>
              <h6>{{ $this_month_orders }}</h6>
              <a href="{{ url('admin/order') }}">View</a>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card card-body alert alert-warning">
              <h5>This Year Orders</h5>
              <h6>{{ $this_year_orders }}</h6>
              <a href="{{ url('admin/order') }}">View</a>
          </div>
        </div>
      </div>
      <hr>
      {{-- /SECTION 2 --}}

       {{-- SECTION 3 --}}
      <div class="row">
        <div class="col-lg-3">
          <div class="card card-body alert alert-danger">
              <h5>Total Products</h5>
              <h6>{{ $total_products }}</h6>
              <a href="{{ url('admin/product') }}">View</a>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card card-body alert alert-primary">
              <h5>Total Brands</h5>
              <h6>{{ $total_brands }}</h6>
              <a href="{{ url('admin/brand') }}">View</a>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card card-body alert alert-success">
              <h5>Today Categories</h5>
              <h6>{{ $total_categories }}</h6>
              <a href="{{ url('admin/category') }}">View</a>
          </div>
        </div>
      </div>
       <hr>
      {{-- /SECTION 3 --}}

      {{-- SECTION 3 --}}
      <div class="row">
        <div class="col-lg-3">
          <div class="card card-body alert alert-danger">
              <h5>All Users</h5>
              <h6>{{ $total_all_users }}</h6>
              <a href="{{ url('admin/users') }}">View</a>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card card-body alert alert-primary">
              <h5>Admin</h5>
              <h6>{{ $total_admin }}</h6>
              <a href="{{ url('admin/users') }}">View</a>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card card-body alert alert-success">
              <h5>Users</h5>
              <h6>{{ $total_user }}</h6>
              <a href="{{ url('admin/users') }}">View</a>
          </div>
        </div>
      </div>
       <hr>
      {{-- /SECTION 3 --}}

    </div>
  </div>  
            <!-- / Content -->
@endsection