@extends('layouts.auth')


@section('title','Login')

@section('content')

    
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{ asset('asset.login1/images/img-01.png') }}" alt="IMG">
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <span class="login100-form-title">
                    Login
                </span>
               

                <div class="wrap-input100 validate-input" for="login" :value="__('Email/Name/Phone')">
                    <input class="input100" type="text" id="login" class="block mt-1 w-full"  name="login" :value="old('login')" required autofocus autocomplete="username"  placeholder="Name/Email/Phone"/>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="#" aria-hidden="true"></i>
                    </span>
                </div>

    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <div class="wrap-input100 validate-input"for="password" :value="__('Password')">
						<input class="input100"  id="password" type="password" name="password"  placeholder="Enter Your Password" required autocomplete="current-password">
                        <input-error :messages="$errors->get('password')" class="mt-2">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>



 <!-- Remember Me -->
 <div class="block mt-4">
    <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
    </label>
</div>



                
<div class="flex items-center justify-end mt-4">
    @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
        </a>
    @endif

    <div class="container-login100-form-btn">
        <button type="submit" class="login100-form-btn">
            {{ __('Login') }}
        </button>
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

                <div class="text-center p-t-16">
                    <a class="txt2" href="{{ route('register') }}">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>




                <div class="  btn-sm text-center p-t-1">
            {{-- <a class="txt1"    href="{{ route('forgot.password') }}"> --}}

                        Forgot Password
                    </a>
                </div>


            </form>
        </div>
    </div>
</div>
    
@endsection




@section('scripts')



	<script src="{{ asset('asset.login1/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('asset.login1/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('asset.login1/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('asset.login1/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('asset.login1/vendor/tilt/tilt.jquery.min.js') }}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('asset.login1/js/main.js') }}"></script>

    
@endsection