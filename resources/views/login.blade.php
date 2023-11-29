@extends('layout')
@section('title', 'MoneyTracker')
@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col col1 d-flex" data-aos="zoom-in">
                <div class="consign">
                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif


                    <h3 class="fw-bold">Welcome!</h3>
                    <p class="pb-3">Please enter your details:</p>
                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="form-container pb-5">
                            <label class="form-label">Email:</label>
                            <input type="text" placeholder="Enter your email"
                                class="form-control narrow-input @error('email') is-invalid @enderror" name="email">
                            <span class="validation-error-color" id="date_error">
                                {{ $errors->first('email') }}
                            </span>


                            <br>

                            <label class="form-label">Password:</label>
                            <input type="password" placeholder="*********"
                                class="form-control narrow-input @error('password') is-invalid @enderror" name="password">
                            <span class="validation-error-color" id="date_error">
                                {{ $errors->first('password') }}
                            </span>
                        </div>

                        <div class="float-end pb-2">
                            <a href="{{ route('forget.password') }}">Forgot password</a>
                        </div>

                        @if ($errors->has('g-recaptcha-response'))
                            <div class="g-recaptcha pb-5 captcha-container captcha"
                                data-sitekey="6LeKw8YoAAAAAJFV36rQPlijGksgNmascpiLfN7K"></div>
                        @else
                            <div class="g-recaptcha pb-5 captcha-container"
                                data-sitekey="6LeKw8YoAAAAAJFV36rQPlijGksgNmascpiLfN7K"></div>
                        @endif

                        <button type="submit" style="background: #ADEF84; border: 1px solid #90C271; width: 300px"
                            class="btn btn-signin">Sign in</button>
                        <p class="text-center pt-2">Don't have an account? <a href="{{ route('registration') }}">Sign
                                up</a></p>
                    </form>

                </div>
            </div>
            <div class="col col2 d-flex">

                <img src="{{ asset('images/piclogo.png') }}" class="imgcon" alt="Logo" />

            </div>
        </div>
    </div>







@endsection

<style>
    .validation-error-color {
        color: #c00000;
        font-size: 12px;
    }

    .captcha iframe {
        border: .5px solid red;
        box-shadow: 0 0 5px 0 red;
    }

    .form-container {
        height: 180px;
    }

    .btn-signin {
        border: 1px solid #90C271;
    }

    .consign {
        padding-top: 100px;
        height: 100px;
        width: 300px;
    }


    .col1 {
        height: 100vh;
        justify-content: center;

    }

    .col2 {
        height: 100vh;

        background: #FEE19D;
        justify-content: center;
        align-content: center;
        align-items: center;
    }

    .imgcon {
        height: 500px;
    }
</style>
