@extends('layout')
@section('title', "Dashboard")
@section('content')


<main class="mainfont">
    <div class="row">
        <div class="col-md-2 sidebar">
            <div class="container containerPic"></div>
            <div class="row dbpage">
                <a href="{{ route('dashboard') }}">
                    <i class="bi bi-house-door-fill"></i>
                    <span>Dashboard</span>
                </a>
            </div>
            <div class="row">
                <a href="{{route('expenses')}}">
                    <i class="bi bi-cash-coin"></i>
                    <span>Expenses</span>
                </a>
            </div>
            <div class="row">
                <a href="#">
                    <i class="bi bi-bar-chart-line-fill"></i>
                    <span>Summary</span>
                </a>
            </div>
            <div class="row">
                <a href="#">
                    <i class="bi bi-wallet"></i>
                    <span>Budget</span>
                </a>
            </div>
            <div class="container conSpacing"></div>
            <div class="row row-logout">
                <a href="{{route('logout')}}">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
        <div class="col-md-10">
            <!-- Content for the right column -->
        </div>
    </div>
</main>


<style>
.sidebar {
    font-weight: bolder;
    height: 100vh;
    background-color: #fff2d3;
    border-right: 1px solid #DCD4D4;
}

/* Style for sidebar items (links) */
.sidebar a {
    color: #000000;
    text-decoration: none;
    display: flex;
    padding: 10px;
}

.dbpage{
    background: linear-gradient(to right, rgb(140, 239, 132), rgb(207, 236, 205), #fff2d3);
    border: 1px solid #FEE19D;
}

.row{
    padding-left: 10px;
}

.sidebar a i {
    margin-right: 10px;
    font-size: 1.5rem; /* Adjust the icon size as needed */
}

.sidebar .row:hover {
    background: linear-gradient(to right, rgb(140, 239, 132), rgb(207, 236, 205), #fff2d3);
    border: 1px solid #FEE19D;
}

.row-top{
    padding-top: 120px;
}

.sidebar .containerPic{
    height: 200px;
}

.sidebar .conSpacing{
    height: 300px;
}

</style>





@if (Auth::check())
<script>
    // Get the session lifetime in minutes from Laravel's configuration
    var sessionLifetime = {{ config('session.lifetime') }};

    // Calculate the session lifetime in milliseconds
    var sessionLifetimeMs = sessionLifetime * 6001;

    // Set a timer to reload the page after the session lifetime
    setTimeout(function() {
        window.location.reload();
    }, sessionLifetimeMs);
</script>
@endif


