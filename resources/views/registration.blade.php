@extends('layout')
@section('title', 'Register')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col col1">
            <div class="container signin mt-5">
                @if ($errors->any())
                    <div class="col-12">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <h3 class="fw-bold">Create new account</h3>
                <p class="pb-3">Please enter your details:</p>
                <form action="{{ route('registration.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="name">Full Name:</label>
                        <input type="text" class="form-control narrow-input" id="name" name="name" placeholder="Enter your full name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email:</label>
                        <input type="email" class="form-control narrow-input" id="email" name="email" placeholder="Enter your active email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password:</label>
                        <input type="password" class="form-control narrow-input @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password_confirmation">Verify Password:</label>
                        <input type="password" class="form-control narrow-input" id="password" name="password_confirmation" placeholder="Verify your password" required>
                    </div>
                    <button type="submit" class="btn btn-success btn-signin">Sign up</button>
                    <p class="text-center pt-2">Already have an account? <a href="#">Sign in</a></p>
                </form>
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
