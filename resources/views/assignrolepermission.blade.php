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
                            <p><b>Permission List : </b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection