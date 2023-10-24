@extends('layout')
@section('title', 'Register')
@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col col1">
            <div class="container signin">
                <h3 class="fw-bold">Create new account</h3>
                <p class="pb-3">Please enter your details:</p>
                <form>
                <div class="mb-3">
                        <label for="InputFullName" class="form-label">Full Name:</label>
                        <input type="email" placeholder="Enter your full name" class="form-control narrow-input" id="InputFullName" aria-describedby="fullname">
                    </div>
                    <div class="mb-3">
                        <label for="InputEmail2" class="form-label">Email:</label>
                        <input type="email" placeholder="Enter your active email" class="form-control narrow-input" id="InputEmail2" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="InputPassword2" class="form-label">Password:</label>
                        <input type="password" placeholder="Enter your password" class="form-control narrow-input" id="InputPassword2">
                    </div>
                    <div class="mb-3">
                        <label for="VerifyPassword" class="form-label">Verify Password:</label>
                        <input type="password" placeholder="Verify your password" class="form-control narrow-input" id="VerifyPassword">
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
