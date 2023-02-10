@extends('layouts.admin')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6 class="text-center">Assign Role Permission Page</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="container-fluid">
                            <p><b>Nama Role :</b> {{ $role->name }}</p>
                            <p><b>Guard Name :</b> {{ $role->guard_name }}</p>
                            <p><b>Created At :</b> {{ $role->created_at }}</p>
                            <p><b>Updated At :</b> {{ $role->updated_at }}</p>
                            <div class="col-6">
                                <p><b>Permission List : </b></p>
                                @if ($role->permissions)
                                    @foreach ($role->permissions as $role_permission)
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$role_permission->id}}" >{{$role_permission->name}}</button>
                                    @endforeach
                                @endif
                            </div>
                            <div class="col-4">
                                <p><b>Add Permission</b></p>
                                <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                                    @csrf
                                    <select name="permission" class="form-select" aria-label="Select Permission">
                                        @foreach ($permissions as $permission)
                                            <option value="{{$permission->name}}">{{$permission->name}}</option>
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
@foreach ($role->permissions as $permis)
<div class="modal fade" id="modal-delete-{{$permis->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
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
                    <h4 class="text-gradient text-danger mt-4">Are you sure to delete this permission?</h4>
                    <h4>{{$permis->name}}</h4>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{route('roles.permissions.revoke', [$role->id, $permis->id])}}" method="post">
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