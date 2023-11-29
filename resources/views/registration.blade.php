@extends('layout')
@section('title', 'MoneyTracker')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col col1 d-flex" data-aos="zoom-in">


                @if (session()->has('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif



                <div class="consign">
                    <h3 class="fw-bold">Create new account</h3>
                    <p class="pb-3">Please enter your details:</p>
                    <form action="{{ route('registration.post') }}" class="needs-validation" method="POST"
                        id="registrationForm" >
                        @csrf
                        <div class="form-container pb-5">
                            <label class="form-label" for="name">Full Name:</label>
                            <input type="text" class="form-control narrow-input @error('name') is-invalid @enderror"
                                id="name" name="name" placeholder="Enter your full name">
                            <span class="validation-error-color" id="date_error">
                                {{ $errors->first('name') }}
                            </span>

                            <br>

                            <label class="form-label" for="email">Email:</label>
                            <input type="email" class="form-control narrow-input @error('email') is-invalid @enderror"
                                id="email" name="email" placeholder="Enter your active email">
                            <span class="validation-error-color" id="date_error">
                                {{ $errors->first('email') }}
                            </span>

                            <div class="valid-feedback">
                                Looks good!
                            </div>

                            <br>

                            <label class="form-label" for="password">Password:</label>
                            <input type="password" class="form-control narrow-input @error('password') is-invalid @enderror "
                                id="password" name="password" placeholder="Enter your password">
                            <span class="validation-error-color" id="date_error">
                                {{ $errors->first('password') }}
                            </span>

                            <br>

                            <label class="form-label" for="password_confirmation">Confirm Password:</label>
                            <input type="password" class="form-control narrow-input @error('password') is-invalid @enderror"
                                id="password" name="password_confirmation" placeholder="Confirm your password">
                            <span class="validation-error-color" id="date_error">
                                {{ $errors->first('password') }}
                            </span>
                        </div>

                        @if ($errors->has('g-recaptcha-response'))
                            <div class="g-recaptcha pb-3 captcha-container captcha"
                                data-sitekey="6LeKw8YoAAAAAJFV36rQPlijGksgNmascpiLfN7K"></div>
                        @else
                            <div class="g-recaptcha pb-3 captcha-container"
                                data-sitekey="6LeKw8YoAAAAAJFV36rQPlijGksgNmascpiLfN7K"></div>
                        @endif

                        <button type="submit" class="btn"
                            style="background: #ADEF84; border: 1px solid #90C271; width: 300px">Sign up</button>
                        <p class="text-center pt-2">Already have an account? <a href="{{ route('login') }}">Sign in</a>
                        </p>
                    </form>
                </div>
            </div>


            <div class="col col2 d-flex">

                <img src="{{ asset('images/piclogo.png') }}" class="imgcon" alt="Logo" />

            </div>
        </div>
    </div>







@endsection

<script>

</script>

<style>
    .validation-error-color {
        color: #c00000;
        font-size: 13px;
    }

    .captcha iframe {
        border: .5px solid red;
        box-shadow: 0 0 5px 0 red;
    }

    .form-container {
        height: 380px;
    }

    .btn-signin {
        border: 1px solid #90C271;
    }

    .consign {
        padding-top: 50px;
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
