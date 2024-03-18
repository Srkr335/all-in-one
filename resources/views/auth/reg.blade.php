@extends('layouts.register')


@section('title','Registration')

@section('content')


<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <h2 class="title">Registration Form</h2>
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- <label for="name">Name</label> --}}
                                <input id="name" class="input--style-4 form-control" type="text" placeholder="Name" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- <label for="username">Username</label> --}}
                                <input id="username" class="input--style-4 form-control" type="text" placeholder="Username" name="username" :value="old('username')" required autofocus autocomplete="username" />
                                <input-error :messages="$errors->get('username')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- <label for="email">Email</label> --}}
                                <input id="email" class="input--style-4 form-control" type="email" placeholder="Email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                                <input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- <label for="phone">Phone Number</label> --}}
                                <input id="phone" class="input--style-4 form-control" type="text" placeholder="Phone" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                                <input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <label for="photo">Photo</label>
                        <input id="photo" class="input--style-4 form-control" type="file" placeholder="Photo" name="photo" :value="old('photo')" required autofocus autocomplete="photo" />
                        <input-error :messages="$errors->get('photo')" class="mt-2" />
                    </div> --}}

                    <div class="form-group">
                        {{-- <label for="password">Password</label> --}}
                        <input id="password" class="input--style-4 form-control" type="password" placeholder="Password" name="password" :value="old('password')" required autocomplete="new-password" />
                        <input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        {{-- <label for="confirmpassword">Confirm Password</label> --}}
                        <input id="confirmpassword" class="input--style-4 form-control" type="password" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password" />
                        <input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="p-t-15">
                        <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                    </div>
                    <div class="text-center p-t-16">
                        <a class="txt2" href="{{ route('login') }}">
                            Sign In
                          
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection


@section('scripts')

 <!-- Jquery JS-->
 <script src="{{ asset('asset.reg/vendor/jquery/jquery.min.js') }}"></script>
 <!-- Vendor JS-->
 <script src="{{ asset('asset.reg/vendor/select2/select2.min.js') }}"></script>
 <script src="{{ asset('asset.reg/vendor/datepicker/moment.min.js') }}"></script>
 <script src="{{ asset('asset.reg/vendor/datepicker/daterangepicker.js') }}"></script>

 <!-- Main JS-->
 <script src="{{ asset('asset.reg/js/global.js') }}"></script>




    
@endsection