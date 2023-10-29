@extends('layout')
@section('title', 'Register')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col col1" data-aos="zoom-in">
            <div class="container">

                @if (session()->has('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="container signin mt-5">
                    <h3 class="fw-bold">Create new account</h3>
                    <p class="pb-3">Please enter your details:</p>
                    <form action="{{ route('registration.post') }}" method="POST" id="registrationForm">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">Full Name:</label>
                            <input type="text" class="form-control narrow-input @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your full name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email:</label>
                            <input type="email" class="form-control narrow-input @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your active email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password:</label>
                            <input type="password" class="form-control narrow-input @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password_confirmation">Confirm Password:</label>
                            <input type="password" class="form-control narrow-input @error('password') is-invalid @enderror" id="password" name="password_confirmation" placeholder="Confirm your password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if($errors->has('g-recaptcha-response'))
                            <div class="g-recaptcha pb-5 captcha-container captcha" data-sitekey="6LeKw8YoAAAAAJFV36rQPlijGksgNmascpiLfN7K"></div>
                        @else
                            <div class="g-recaptcha pb-5 captcha-container" data-sitekey="6LeKw8YoAAAAAJFV36rQPlijGksgNmascpiLfN7K"></div>
                        @endif
                        <button type="submit" class="btn btn-success btn-signin">Sign up</button>
                        <p class="text-center pt-2">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
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
