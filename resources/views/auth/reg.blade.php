
@extends('layouts.auth')


@section('title','Registration')

@section('content')


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{ asset('asset.login1/images/images.jpeg') }}" alt="IMG">
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <span class="login100-form-title">
                    Registration
                </span>



 <div class="form-row">
    <div class="col-md-6">
        <div class="form-group">
            <input id="name" class="input--style-4 form-control" type="text" placeholder="Name" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <input id="username" class="input--style-4 form-control" type="text" placeholder="Username" name="username" :value="old('username')" required autofocus autocomplete="username" />
            <input-error :messages="$errors->get('username')" class="mt-2" />
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-6">
        <div class="form-group">
            <input id="email" class="input--style-4 form-control" type="email" placeholder="Email" name="email" :value="old('email')" required autofocus autocomplete="email" />
            <input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <input id="phone" class="input--style-4 form-control" type="text" placeholder="Phone" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            <input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
    </div>
</div>

<div class="form-group">
    <input id="password" class="input--style-4 form-control" type="password" placeholder="Password" name="password" :value="old('password')" required autocomplete="new-password" />
    <input-error :messages="$errors->get('password')" class="mt-2" />
</div>

<div class="form-group">
    <input id="confirmpassword" class="input--style-4 form-control" type="password" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password" />
    <input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
</div>

<div class="p-t-15">
    <button class="btn btn-primary" type="submit">Submit</button>
</div>
<div class="text-center p-t-16">
    <a class="txt2" href="{{ route('login') }}">
        Already have an Account
        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
    </a>
</div>






<div class="  btn-sm text-center p-t-1">
{{-- <a class="txt1"    href="{{ route('forgot.password') }}"> --}}

        Forgot Password
    </a>
</div>



</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>



{{-- </div>
                <div class="text-center p-t-12">
                    <span class="txt1">
                        Forgot
                    </span>
                    <a class="txt2" href="#">
                        Username / Password?
                    </a>
                </div> --}}

              
    
@endsection




@section('scripts')
<script src="{{ asset('asset.login1/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('asset.login1/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('asset.login1/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('asset.login1/vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('asset.login1/vendor/tilt/tilt.jquery.min.js') }}"></script>
<script>
    $('.js-tilt').tilt({
        scale: 1.1
    });
</script>
<script src="{{ asset('asset.login1/js/main.js') }}"></script>
@endsection
