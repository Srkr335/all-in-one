@extends('layouts.app-web')

@section('content')

@include('role-permission.nav-link')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card mt-3">
                <div class="card-header">
                    <h4>ROLES</h4>
                    <a href="{{ url('roles/create') }}" class="btn btn-primary float-end">Add Permission</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a href="{{ route('givePermissionToRole', ['roleId' => $role->id]) }}" class="btn btn-sm btn-success">Add/Edit Roles & Permission</a>
                                        <a href="{{ url('roles/' . $role->id . '/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('destroy', ['roleId' => $role->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
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

@endsection

@section('scripts')
@endsection
