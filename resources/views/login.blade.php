@extends('layout')
@section('title', 'Login')
@section('content')


<div class="container-fluid bg-primary">

    <div class="row">
        <div class="col">
            <div class="container bg-light">
                <h3 class="fw-bold">Welcome!</h3>
                <p>Please enter your details:</p>
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email:</label>
                        <input type="email" class="form-control narrow-input" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password:</label>
                        <input type="password" class="form-control narrow-input" id="exampleInputPassword1">
                        <a href="#">Forgot password</a>
                    </div>
                    <button type="submit" class="btn btn-success">Sign in</button>
                </form>
            </div>
        </div>

        <div class="col bg-success">
            <div class="container">
                2 of 2
            </div>
        </div>
    </div>
</div>



@endsection
