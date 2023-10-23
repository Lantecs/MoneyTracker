@extends('layout')
@section('title', 'Login')
@section('content')

<div class="container d-flex justify-content-center">
    <div class="container">
        <div class="container">
            <h3 class="fw-bold">Welcome!</h3>
            <p>Please enter your details:</p>
        </div>
        <div class="container">
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email:</label>
                    <input type="email" class="form-control narrow-input" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password:</label>
                    <input type="password" class="form-control narrow-input" id="exampleInputPassword1">
                    <p>Forgot password</p>
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
            </form>
        </div>
    </div>
</div>

@endsection
