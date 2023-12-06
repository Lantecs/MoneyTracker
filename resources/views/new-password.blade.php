@extends('layout')
@section('title', 'Reset Password')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col col1" data-aos="fade-in">>
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

                <h3 class="fw-bold">Reset Account Password!</h3>
                <p class="pb-3">Please enter new password</p>
                <form action="{{ route('reset.password.post') }}" method="POST">
                    @csrf
                    <input type="text" name="token" hidden value="{{$token}}">
                    <div class="mb-3">
                        <label class="form-label" for="email">Email:</label>
                        <input type="email" class="form-control narrow-input" id="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password:</label>
                        <input type="password" class="form-control narrow-input @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password_confirmation">Confirm Password:</label>
                        <input type="password" class="form-control narrow-input" id="password" name="password_confirmation" placeholder="Confirm your password" required>
                    </div>
                    <button type="submit" class="btn btn-success btn-resetpassword">Reset Password</button>
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
