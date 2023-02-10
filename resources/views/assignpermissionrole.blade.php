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
                                        <button type="button" class="btn btn-secondary btn-sm" disabled>{{$permission_role->name}}</button>
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
@endsection