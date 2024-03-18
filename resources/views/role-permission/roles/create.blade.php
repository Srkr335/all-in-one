@extends('layouts.app-web')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Role</h4>
                </div>
                <div class="card-body">
                <form action="{{ url('roles') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Role Name</label>
                    <input type="text" name="name" class="form-control"/>

                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">save</button>
                    <a href="{{ url('roles') }}" class="btn btn-danger float-end">Back</a>

                </div>
                </form>


</div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@endsection
