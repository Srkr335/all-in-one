@extends('admin.admin_dashboard')
@section('admin')

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="jquery-3.7.1.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">


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
                    <a href="#" class="list-group-item list-group-item-action bg-light">Logout</a>
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
                    <form method="post" action="{{ route('admin.profile.store') }}"  enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="exampleFormControlInput1">UserName</label>
                            <input type="text" value="{{  $profileData->username }}"   name="username" class="form-control" id="username" >
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="text" value="{{  $profileData->name }}"   name="name" class="form-control" id="name" >
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email"   value="{{ $profileData->email }}"  name="email" class="form-control" id="exampleFormControlInput1" >
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlInput1">Phone</label>
                            <input type="text" value="{{  $profileData->phone }}"   name="phone" class="form-control" id="phone" >
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlInput1">Address</label>
                            <input type="text" value="{{  $profileData->address }}"   name="address" class="form-control" id="address" >
                        </div>



                        
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Photo</label>
                            <input type="file"    name="photo" class="form-control" id="image" >
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlInput1"> </label>

                            <img  id="showImage" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/No_Image.jpg') }}" alt="profile" class="img-fluid rounded-circle mb-0" style="width: 80px; height: 90px;">

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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>

<script type="text/javascript">

$(document).ready(function(){
   $('#image').change(function(e){
    var reader = new FileReader();
    reader.onload =function(e){
        $('#showImage').attr('src',e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
   }) ;
});

<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>


</script>
</body>
</html>


@endsection