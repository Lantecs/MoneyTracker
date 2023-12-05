
@extends('layout')
@section('title', __('login'))

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col col1" data-aos="zoom-in">
            <div class="container consign">
                    <div class="alert alert-danger">Session Expired</div>
                <div class="container signin">
                    <h3 class="fw-bold">Welcome!</h3>
                    <p class="pb-3">Please enter your details:</p>
                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <input type="email" placeholder="Enter your email" class="form-control narrow-input @error('email') is-invalid @enderror" name="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password:</label>
                            <input type="password" placeholder="*********" class="form-control narrow-input @error('password') is-invalid @enderror" name="password">
                            <a href="{{ route('forget.password') }}" class="float-end pb-4">Forgot password</a>
                        </div>

                        @if($errors->has('g-recaptcha-response'))
                            <div class="g-recaptcha pb-5 captcha-container captcha" data-sitekey="6LeKw8YoAAAAAJFV36rQPlijGksgNmascpiLfN7K"></div>
                        @else
                            <div class="g-recaptcha pb-5 captcha-container" data-sitekey="6LeKw8YoAAAAAJFV36rQPlijGksgNmascpiLfN7K"></div>
                        @endif
                        <button type="submit" class="btn btn-success btn-signin">Sign in</button>
                        <p class="text-center pt-2">Don't have an account? <a href="{{ route('registration') }}">Sign up</a></p>
                    </form>
                </div>
            </div>
        </div>
        <div class="col col2">
            <div class="container col2container">
                <img src="{{ asset('images/piclogo.png') }}" />
            </div>
        </div>
    </div>
</div>
@endsection
