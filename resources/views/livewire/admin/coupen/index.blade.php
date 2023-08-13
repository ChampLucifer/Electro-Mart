<div>

    <div class="container-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Coupens</h3>
                        <a href="{{ url('admin/coupens/create') }}" class="btn btn-primary">Add Coupen</a>
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
                                <th>Code</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>value</th>
                                <th>start_date</th>
                                <th>end_date</th>
                                <th>limit</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                               @foreach ($coupens as $coupen) 
                             <tr>
                                <td>{{ $coupen->id }}</td>
                                <td>{{ $coupen->code }}</td>
                             <td>{{ $coupen->description }}</td>
                                <td>{{ $coupen->status =='1'?'Hide':'Show' }}</td>
                                <td>{{ $coupen->value }} </td>
                                <td>{{ $coupen->start_date }}</td>
                                <td>{{ $coupen->end_date }}</td>
                                <td>{{  $coupen->limit  }}</td>
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
                          {{ $coupens->links() }}
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    

</div>
