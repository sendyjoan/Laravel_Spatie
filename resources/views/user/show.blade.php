@extends('layouts.admin')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0 text-center">
            <h6>Detail User</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <div class="container-fluid">
                    <p><b>Name User : </b>{{$user->name}}</p>
                    <p><b>Email User : </b>{{$user->email}}</p>
                    <p><b>Email Verified At : </b>{{$user->email_verified_at}}</p>
                    <p><b>Created At : </b>{{$user->created_at}}</p>
                    <p><b>Updated At : </b>{{$user->updated_at}}</p>
                    <h6>Role of User : </h6> 
                    @if ($user->roles)
                    @foreach ($user->roles as $role)
                        <button type="button" class="btn bg-gradient-danger btn-sm">{{$role->name}}</button>
                    @endforeach
                    @endif
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection