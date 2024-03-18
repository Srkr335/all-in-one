@extends('admin.admin_dashboard')
@section('admin')

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="jquery-3.7.1.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Change Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet"  type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css”>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar">
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Settings</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <!-- Main Content -->
            <div class="card">
                <div class="card-header">
                    <h4>Admin Profile</h4>
                </div>
                <div class="card-body">
                    <img src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/No_Image.jpg') }}" alt="profile" class="img-fluid rounded-circle mb-0" style="width: 80px; height: 90px;">
                    <h5 class="card-title">{{ $profileData->name }}</h5>
                    <p class="card-text">Phone:{{ $profileData->phone }}</p>
                    <p class="card-text">Address:{{ $profileData->address }}</p>

                    <p class="card-text">Email:{{ $profileData->email }}</p>
                    
                    <!-- Basic Form -->
                    <form method="post" action="{{ route('admin.update.password') }}">
                        @csrf

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Old Password</label>
                            <input type="password"    name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" >
                            @error('old_password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">New Password</label>
                            <input type="password"    name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" >
                            @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Confirm New Password</label>
                            <input type="password"    name="new_password_confirmation" class="form-control " id="new_password_confirmation" >
                            
                        </div>


                        

                        <button type="submit" class="btn btn-primary">Save Chnges</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>








</body>
</html>


@endsection