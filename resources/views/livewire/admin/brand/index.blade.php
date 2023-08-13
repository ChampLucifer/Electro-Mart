<div class="container-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Brands</h3>
                    <a href="{{ url('admin/brand/create') }}" class="btn btn-primary">Add Brand</a>
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
                            <th>Category</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                           @foreach ($brands as $brand) 
                         <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->name }}</td>
                            @if ( $brand->category)
                               <td>{{ $brand->category->name }}</td>
                            @else
                                <td>No Category</td>    
                            @endif
                            <td>{{ $brand->status =='1'?'Hide':'Show' }}</td>
                            <td>
                              <img src="{{ asset( $brand->image) }}" alt="{{ $brand->name }}" title="{{ $brand->name }}" style="width:70px;height:70px" class="rounded-circle">
                            </td>
                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="{{ url('admin/brand/edit/'.$brand->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                  <a class="dropdown-item" href="{{ url('admin/brand/delete/'.$brand->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          @endforeach 
                        </tbody>
                      </table>
                      {{ $brands->links() }}
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
