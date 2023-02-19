@extends('layouts.admin')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Users table</h6>
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#add-user-modal">Add User</button>
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
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Full Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jabatan Fungsional</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Joined Date</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$user->name}}</h6>
                          <p class="text-xs text-secondary mb-0">{{$user->email}}</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">Manager</p>
                      <p class="text-xs text-secondary mb-0">Organization</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      @foreach ($user->roles as $role)
                        <span class="badge badge-sm bg-gradient-success">{{$role->name}}</span>
                      @endforeach
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{$user->created_at}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <a href="{{ route('users.show', $user->id)}}">
                        <button type="button" class="btn bg-gradient-success btn-sm"><i class="ni ni-pin-3"></i></button>
                      </a>
                        <button type="button" class="btn bg-gradient-info btn-sm" ><i class="ni ni-settings"></i></button>
                        <button type="button" class="btn bg-gradient-danger btn-sm" ><i class="ni ni-basket"></i></button>
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
@endsection