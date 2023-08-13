@extends('admin_layout.comman.main')
@section('title','Users')
@section('admin-section')
<div class="container-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Users</h3>
                    <a href="{{ url('admin/users/create') }}" class="btn btn-primary">Add User</a>
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
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                           @foreach ($users as $user) 
                         <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email}}</td>
                            <td>
                                @if ( $user->user_role=="0" )
                                 <label class="badge btn-primary">User</label>
                                @elseif( $user->user_role=="1"  )
                                <label class="badge btn-warning">Admin</label>
                                @else
                                <label class="badge btn-primary">None</label>
                                @endif
                            </td>
                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="{{ url('admin/users/edit/'.$user->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                  <a class="dropdown-item"  onclick="return confirm('Are you sure you want to delete this user?');" href="{{ url('admin/users/delete/'.$user->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          @endforeach 
                        </tbody>
                      </table>
                      {{ $users->links() }}
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection