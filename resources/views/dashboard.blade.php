@extends('layout')
@section('title', "Dashboard")
@section('content')


<div class="main-container d-flex">
    @include('include/sidebar')
    <div class="content">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container-fluid">
                <div class="d-flex justify-content-between d-md-none d-block">
                    <button class="btn px-1 py-0 open-btn me-2"><i class="fal fa-stream"></i></button>
                    <a class="navbar-brand fs-4" href="#"><span
                            class="bg-dark rounded px-2 py-0 text-white">CL</span></a>

                </div>
                <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fal fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Profile</a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>

        <div class="dashboard-content px-3 pt-4">
            <h2 class="fs-5"> Dashboard</h2>
            @php
            $id = Auth::user()->id;
            @endphp
            <h1>{{ $id }}</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, totam? Sequi alias eveniet ut quas
                ullam delectus et quasi incidunt rem deserunt asperiores reiciendis assumenda doloremque provident,
                dolores aspernatur neque.</p>
        </div>
    </div>
</div>



@if (Auth::check())
<script>
    // Get the session lifetime in minutes from Laravel's configuration
    var sessionLifetime = {{ config('session.lifetime') }};

    // Calculate the session lifetime in milliseconds
    var sessionLifetimeMs = sessionLifetime * 6001;

    // Set a timer to reload the page after the session lifetime
    setTimeout(function () {
        window.location.reload();
    }, sessionLifetimeMs);
</script>
@endif
