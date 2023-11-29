@extends('layout')
@section('content')
@section('title', 'MoneyTracker')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col col1 d-flex">
                <div class="consign">

                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif


                    <p class="pb-3">We will send a link to your email, use that link to reset the password.</p>
                    <form action="{{ route('forget.password.post') }}" method="POST">
                        @csrf
                        <div class="form-container pb-5">
                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <input type="email" placeholder="Enter your email"
                                class="form-control narrow-input @error('email') is-invalid @enderror" name="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if (session()->has('success'))
                                <p>Did not receive the email? <a href="#">Resend</a></p>
                            @endif
                        </div>

                        <button type="submit" style="background: #ADEF84; border: 1px solid #90C271; width: 350px"  class="btn">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col col2 d-flex">

                <img src="{{ asset('images/piclogo.png') }}" class="imgcon" alt="Logo" />

            </div>
        </div>
    </div>
</main>


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
    padding-top: 250px;
    height: 100px;
    width: 350px;
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
