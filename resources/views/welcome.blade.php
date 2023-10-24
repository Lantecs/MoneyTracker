@extends('layout')
@section('title', "Home Page")
@section('content')
@include('include.header')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <h4> Access when you are login</h4>
                        <hr>
                        <h5>Username:
                            @auth
                            {{auth()->user()->name}}
                            @endauth
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

