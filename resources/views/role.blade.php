@extends('layouts.admin')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Role table</h6>
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#add-role-modal">Add Role</button>
            <button type="button" class="btn btn-outline-success">Import From CSV</button>
            <button type="button" class="btn btn-outline-success">Import From Excel</button>
            <button type="button" class="btn btn-outline-danger">Export To Excel</button>
            <button type="button" class="btn btn-outline-danger">Export To CSV</button>
            <button type="button" class="btn btn-outline-danger">Export To PDF</button>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Permission Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Guard Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edited Date</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ($roles as $role)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $role->name }}</h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{ $role->guard_name }}</span>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="badge badge-sm bg-gradient-success">Online</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{ $role->created_at }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{ $role->updated_at }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <button type="button" class="btn bg-gradient-success btn-sm" data-bs-toggle="modal" data-bs-target="#show-role-modal-{{$role->id}}"><i class="ni ni-pin-3"></i></button>
                      <button type="button" class="btn bg-gradient-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit-role-modal-{{$role->id}}"><i class="ni ni-settings"></i></button>
                      <button type="button" class="btn bg-gradient-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-role-modal-{{$role->id}}"><i class="ni ni-basket"></i></button>
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
  <!-- Modal -->
<div class="modal fade" id="add-role-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Role Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('roles.store') }}">
          @csrf
          <div class="form-group">
            <label for="Role Name">Role Name</label>
            <input type="text" class="form-control" id="RoleName" placeholder="Administrator" name="name">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-gradient-primary">Add Role</button>
      </form>
      </div>
    </div>
  </div>
</div>
@foreach ($roles as $rolecrud)
<div class="modal fade" id="show-role-modal-{{$rolecrud->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Show Role Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 class="text-center">{{ $rolecrud->name}}</h6>
        <p>Guard Name : {{$rolecrud->guard_name}}</p>
        <p>Created At : {{$rolecrud->created_at}}</p>
        <p>Updated At : {{$rolecrud->updated_at}}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="edit-role-modal-{{$rolecrud->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Role Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('roles.update', $rolecrud->id ) }}">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="Role Name">Role Name</label>
            <input type="text" class="form-control" id="RoleName" placeholder="Administrator" name="name" value="{{$rolecrud->name}}">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-gradient-primary">Edit Role</button>
      </form>
      </div>
    </div>
  </div>
</div>    
  <div class="modal fade" id="delete-role-modal-{{$rolecrud->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="py-3 text-center">
            <i class="ni ni-bell-55 ni-3x"></i>
            <h4 class="text-gradient text-danger mt-4">You should read this!</h4>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>
        <div class="modal-footer">
          <form action="{{ route('roles.destroy', $rolecrud->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn bg-gradient-danger btn-white">Ok, I'm sure!</button>
            <button type="button" class="btn bg-gradient-primary text-white ml-auto" data-bs-dismiss="modal">Close</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endsection