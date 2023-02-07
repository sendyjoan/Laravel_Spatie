@extends('layouts.admin')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Permission table</h6>
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#add-permission-modal">Add Permission</button>
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
                  @foreach ($permissions as $permission)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $permission->name }}</h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{ $permission->guard_name }}</span>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="badge badge-sm bg-gradient-success">Active</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{ $permission->created_at }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{ $permission->updated_at }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <button type="button" class="btn bg-gradient-success btn-sm"><i class="ni ni-pin-3"></i></button>
                      <button type="button" class="btn bg-gradient-info btn-sm"><i class="ni ni-settings"></i></button>
                      <button type="button" class="btn bg-gradient-danger btn-sm"><i class="ni ni-basket"></i></button>
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
  <div class="modal fade" id="add-permission-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Permission Form</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route('permissions.store') }}">
            @csrf
            <div class="form-group">
              <label for="Role Name">Permission Name</label>
              <input type="text" class="form-control" id="RoleName" placeholder="Create Product" name="name">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn bg-gradient-primary">Add Permission</button>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection