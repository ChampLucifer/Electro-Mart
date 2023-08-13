<div class="container-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Colors</h3>
                    <a href="{{ url('admin/color/create') }}" class="btn btn-primary">Add Color</a>
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
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                           @foreach ($colors as $color) 
                         <tr>
                            <td>{{ $color->id }}</td>
                            <td>{{ $color->name }}</td>
                            <td>{{ $color->status =='1'?'Hide':'Show' }}</td>
                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="{{ url('admin/color/edit/'.$color->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                  <a class="dropdown-item" href="{{ url('admin/color/delete/'.$color->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          @endforeach 
                        </tbody>
                      </table>
                      {{ $colors->links() }}
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>