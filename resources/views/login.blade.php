@extends('layout')
@section('title', 'Login')
@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col col1">
            <div class="container signin">
                <h3 class="fw-bold">Welcome!</h3>
                <p class="pb-3">Please enter your details:</p>
                <form>
                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" placeholder="Enter your email" class="form-control narrow-input" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password:</label>
                        <input type="password" placeholder="*********" class="form-control narrow-input" name="password">
                        <a href="#" class="float-end pb-4">Forgot password</a>
                    </div>
                    <button type="submit" class="btn btn-success btn-signin">Sign in</button>
                    <p class="text-center pt-2">Don't have an account? <a href="#">Sign up</a></p>
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
