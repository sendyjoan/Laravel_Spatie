@extends('layouts.admin')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6 class="text-center">Assign Permission Role Page</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="container-fluid">
                            <p><b>Nama Role :</b> {{ $permission->name }}</p>
                            <p><b>Guard Name :</b> {{ $permission->guard_name }}</p>
                            <p><b>Created At :</b> {{ $permission->created_at }}</p>
                            <p><b>Updated At :</b> {{ $permission->updated_at }}</p>
                            <div class="col-6">
                                <p><b>Role List : </b></p>
                                @if ($permission->roles)
                                    @foreach ($permission->roles as $permission_role)
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$permission_role->id}}" >{{$permission_role->name}}</button>
                                    @endforeach
                                @endif
                            </div>
                            <div class="col-4">
                                <p><b>Add Role</b></p>
                                <form method="POST" action="{{ route('admin.permissions.roles', $permission->id) }}">
                                    @csrf
                                    <select name="role" class="form-select" aria-label="Select Permission">
                                        @foreach ($roles as $role)
                                            <option value="{{$role->name}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    <button type="submit" class="btn btn-secondary btn-sm">Assign</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($permission->roles as $role)
<div class="modal fade" id="modal-delete-{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
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
                    <h4 class="text-gradient text-danger mt-4">Are you sure to delete this role?</h4>
                    <h4>{{$role->name}}</h4>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{route('permissions.roles.remove', [$permission->id, $role->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Ok, Got it</button>
                </form>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection