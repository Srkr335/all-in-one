@extends('layouts.app-web')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create User</h4>
                </div>
                <div class="card-body">
                <form action="{{ url('users') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">User Name</label>
                    <input type="text" name="name" class="form-control"/>

                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control"/>

                </div>
                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="text" name="password" class="form-control"/>

                </div>
                <div class="mb-3">
                    <label for="">Role</label>
                    <input type="text" name="role" class="form-control"/>
<select name="roles[]" class="form-control" multiple>
    <option value="">Select Role</option>
    @foreach ($roles as $role)
    <option value="{{ $role }}">{{ $role }}</option>
        
    @endforeach
</select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">save</button>
                    <a href="{{ url('/users') }}" class="btn btn-danger float-end">Back</a>

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
