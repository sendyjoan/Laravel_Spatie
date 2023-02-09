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
                                        <button type="button" class="btn btn-secondary btn-sm" disabled>{{$role_permission->name}}</button>
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
                                    <button type="submit" class="btn btn-secondary btn-sm">Button</button>
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