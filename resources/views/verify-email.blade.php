@extends("layout")
@section('content')
@section('title', 'MoneyTracker')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col col1">
                <div class="container forgetpassword-container">

                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="container signin">
                        <p class="pb-3">We will send a link to your email, use that link to verify your email.</p>
                        <form action="{{ route('verify.email.post') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email:</label>
                                <input type="email" placeholder="Enter your email" class="form-control narrow-input @error('email') is-invalid @enderror" name="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                @if (session()->has('success'))
                                    <p>Did not receive the email? <a href="#">Resend</a></p>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-success btn-signin">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col col2">
                <div class="container col2container">
                    <img src="{{ asset('images/piclogo.png') }}" />
                </div>
            </div>
        </div>
    </div>
</main>


@endsection

<style>
    body {
    font-family: 'inter';

}

.narrow-input {
    width: 300px;
}

.btn-signin {
    width: 300px;
    color: black;
    background-color: #ADEF84;
}

.signin {
    align-items: center;
    width: 330px;
}

.col1 {
    display: flex;
    height: 100vh;
    align-items: center;
    justify-items: center;
}

.col2 {
    background-color: #FEE19D;
    height: 100vh;
    display: grid;
    grid-auto-flow: column;
    align-items: center;
    justify-items: center;
}

.col2 img {
    height: 500px;
    width: 500px;
    align-items: center;
    justify-items: center;
}

.col2container {
    display: grid;
    grid-auto-flow: column;
    align-items: center;
    justify-items: center;
}

::-webkit-input-placeholder {
    color: #ABABAB;
    font-style: italic;
}

.captcha iframe {
    border: .5px solid red;
    box-shadow: 0 0 5px 0 red;
}

.forgetpassword-container {
    width: 350px;
}

.consign {
    width: 350px;
}
</style>
