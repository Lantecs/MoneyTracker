@extends('layout')
@section('title', 'Dashboard')
@section('content')


    <div class="main-container d-flex">
        @include('include/sidebar')
        <div class="content">
            {{-- <nav class="navbar navbar-expand-md navbar-light bg-light">
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
        </nav> --}}

            <div class="dashboard-content px-3 pt-4">
                <h3 class="fw-bold">Dashboard</h3>
                <div class="container-fluid topcontainer justify-content-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="px-5">
                            <div style="background: #B4F38D;"
                                class="daily-container d-flex justify-content-center align-items-center drowShadow">
                                <div>
                                    <i class="fa-solid fa-wallet pe-3 walletSize"></i>
                                </div>
                                <div>
                                    <div class="ps-2">
                                        <span style="font-size: 20px;">Daily Income</span>
                                    </div>
                                    <h2 class="fw-bold">&#8369;150.00</h2>
                                </div>
                            </div>
                        </div>

                        <div class="px-5">
                            <div style="background: #FEE19D;"
                                class="daily-container d-flex justify-content-center align-items-center drowShadow">
                                <div>
                                    <i class="fa-solid fa-wallet pe-3 walletSize"></i>
                                </div>
                                <div>
                                    <div class="ps-2">
                                        <span style="font-size: 20px;">Daily Spending</span>
                                    </div>
                                    <h2 class="fw-bold">&#8369;124.00</h2>
                                </div>
                            </div>
                        </div>


                        <div class="px-5">
                            <div style="background: #B4F38D;"
                                class="daily-container d-flex justify-content-center align-items-center drowShadow">
                                <div>
                                    <i class="fa-solid fa-wallet pe-3 walletSize"></i>
                                </div>
                                <div>
                                    <div class="ps-2">
                                        <span style="font-size: 20px;">Daily Savings</span>
                                    </div>
                                    <h2 class="fw-bold">&#8369;24.00</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex pt-4 justify-content-center align-items-center">
                        <div class="px-5">
                            <div style="background: #70D380; color: #FFFFFF;"
                                class="daily-container d-flex justify-content-center align-items-center drowShadow">
                                <div>
                                    <i class="fa-solid fa-wallet pe-3 walletSize"></i>
                                </div>
                                <div>
                                    <div class="ps-2">
                                        <span style="font-size: 20px;">Weekly Income</span>
                                    </div>
                                    <h2 class="fw-bold">&#8369;1050.00</h2>
                                </div>
                            </div>
                        </div>

                        <div class="px-5">
                            <div style="background: #F1BA3A; color: #FFFFFF;"
                                class="daily-container d-flex justify-content-center align-items-center drowShadow">
                                <div>
                                    <i class="fa-solid fa-wallet pe-3 walletSize"></i>
                                </div>
                                <div>
                                    <div class="ps-2">
                                        <span style="font-size: 20px;">Weekly Spending</span>
                                    </div>
                                    <h2 class="fw-bold">&#8369;902.00</h2>
                                </div>
                            </div>
                        </div>


                        <div class="px-5">
                            <div style="background: #70D380; color: #FFFFFF;"
                                class="daily-container d-flex justify-content-center align-items-center drowShadow">
                                <div>
                                    <i class="fa-solid fa-wallet pe-3 walletSize"></i>
                                </div>
                                <div>
                                    <div class="ps-2">
                                        <span style="font-size: 20px;">Weekly Savings</span>
                                    </div>
                                    <h2 class="fw-bold">&#8369; 148.00</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="fw-bold">Income</h3>
                <div class="container-fluid botcontainer bg-success">
                    <div class="ps-3">
                        <div class="container-income align-items-center  ">

                            <form>
                                <div class="container">
                                    <div style="height: 105px;" class="form-group pt-4">
                                        <label style="font-size: 25px;" for="type">Type:</label>
                                        <div class="ps-4">
                                            <input type="text" style="width: 320px;" class="form-control">
                                        </div>
                                    </div>
                                    <div style="height: 80px;" class="form-group ">
                                        <label style="font-size: 25px;" for="type">Amount:</label>
                                        <div class="ps-4">
                                            <input type="text" style="width: 320px;" class="form-control">
                                        </div>
                                    </div>
                                    <div style="height: 100px;" class="form-group">
                                        <label style="font-size: 25px;" for="type">Date:</label>
                                        <div class="ps-4">
                                            <input type="text" style="width: 320px;" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <button type="button"
                                            style="background: #8CEF84; border-radius: 8px; border: none; width: 200px"
                                            onclick="addBudget()" class="add">Add</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>





        <style>
            .container-income {
                background: #F8FFF3;
                border: 1px solid #757575;
                width: 390px;
                height: 350px;
                border-radius: 10px;
            }

            .drowShadow {
                box-shadow: 0 2px 1px rgba(117, 117, 117, 0.5);
            }

            .walletSize {
                font-size: 35px;
                color: #757575;
            }

            .daily-container {
                width: 280px;
                height: 120px;
                border: 1px solid #757575;
                border-radius: 10px;
            }

            .topcontainer {
                height: 280px;
            }

            .botcontainer {
                height: 350px;
            }

            .main-container {
                font-family: 'inter';
            }
        </style>
