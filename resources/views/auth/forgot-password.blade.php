@extends('layouts.auth')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class=" ms-auto me-auto">
                <p> Reset Password.</p>
                <form method="POST" action="{{ route('do.password.forgot') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email" class="Password100-form-title p-b-6">Email Address</label>
                        <input id="email" type="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="text-center p-t-15">
                        <button type="submit" class="btn btn-primary btn-sm" style="margin-bottom: 10px">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
