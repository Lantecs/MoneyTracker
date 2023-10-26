@extends('layout')
@section('title', 'Login')
@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col col1" data-aos="zoom-in">
            <div class="container signin">
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
                <h3 class="fw-bold">Welcome!</h3>
                <p class="pb-3">Please enter your details:</p>
                <form action="{{ route('login.post')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" placeholder="Enter your email" class="form-control narrow-input" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password:</label>
                        <input type="password" placeholder="*********" class="form-control narrow-input" name="password">
                        <a href="{{route("forget.password")}}" class="float-end pb-4">Forgot password</a>
                    </div>
                    <div class="g-recaptcha pb-5" data-sitekey="6LeKw8YoAAAAAJFV36rQPlijGksgNmascpiLfN7K"></div>

                    <button type="submit" class="btn btn-success btn-signin">Sign in</button>
                    <p class="text-center pt-2">Don't have an account? <a href="{{route('registration')}}">Sign up</a></p>
                </form>
            </div>
        </div>

        <div class="col col2" >
            <div class="container col2container" data-aos="zoom-in">
                <img  src="{{ asset('images/piclogo.png') }}" />
            </div>
        </div>
    </div>
</div>




@endsection
