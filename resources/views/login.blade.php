@extends('layout')
@section('title', 'Login')
@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col1" data-aos="zoom-in">
            <div class="container consign">
                @if (session()->has('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

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
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="float-end">
                            <a href="{{ route('forget.password') }}">Forgot password</a>
                            </div>
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
        <div class="col-md-6 col2">
            <div class="container col2container">
                <img src="{{ asset('images/piclogo.png') }}" class="img-fluid" alt="Logo" />
            </div>
        </div>
    </div>
</div>







@endsection
