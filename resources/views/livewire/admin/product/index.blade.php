<div class="container-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Products</h3>
                    <a href="{{ url('admin/product/create') }}" class="btn btn-primary">Add Product</a>
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
                            <th>Category</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                           @forelse ($products as $product) 
                         <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->selling_price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->status =='1'?'Hide':'Show' }}</td>
                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="{{ url('admin/product/edit/'.$product->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                  <a class="dropdown-item" href="{{ url('admin/product/delete/'.$product->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          @empty
                                <tr>
                                  <td colspan="7">No Product Available</td>
                                </tr>                             
                          {{-- @endempty --}}
                          @endforelse
                        </tbody>
                      </table>
                      {{ $products->links() }}
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>