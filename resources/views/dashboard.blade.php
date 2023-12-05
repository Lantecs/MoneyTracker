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
                <div class="container-fluid d-flex botcontainer ">
                    <div class="ps-3">
                        <div class="container-income align-items-center drowShadow ">

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
                    <div class="container ps-4 ">
                        <div class="container income-history drowShadow">
                            <div class="container-lg income-align ">
                                <div class="pt-4 pb-2">
                                    <h3 class="fw-bold">History</h3>
                                </div>
                                <div class="container pt-3 pb-2">
                                    <div class="row">
                                        <div class="col text-center">
                                            <h4>Type</h4>
                                        </div>
                                        <div class="col grey text-center">
                                            <h4>Amount</h4>
                                        </div>
                                        <div class="col text-center">
                                            <h4>Date</h4>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                </div>

                                <div class="container scrollbar">
                                    <div class="row">
                                        <div class="col text-center">
                                            <h4>Allowance</h4>
                                        </div>
                                        <div class="col grey text-center">
                                            <h4>P400.00</h4>
                                        </div>
                                        <div class="col text-center">
                                            <h4>22/10/2023</h4>
                                        </div>
                                        <div class="col">
                                            <div class="dropdown d-flex justify-content-center pt-2">
                                                <button
                                                    style="color: #80AC64; border:1px solid #80AC64; background: #F1F1F1;"
                                                    class="btn dropdown-toggle butdrop d-flex float-end" type="button"
                                                    id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false"></button>

                                                <div style="background:#ECFAE2;border: 1px solid black;border-radius: 10px;"
                                                    class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                    <button style="border-bottom: 1px solid black; text-align: center;"
                                                        class="dropdown-item" id="butEdit" type="button"
                                                        onclick="openEditModal(${budget.budget_id})">Edit
                                                    </button>
                                                    <button class="dropdown-item" style="text-align: center; name="delete"
                                                        data-budget-id="${budget.budget_id}"
                                                        onclick="deleteBudget(this)">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col text-center">
                                            <h4>Allowance</h4>
                                        </div>
                                        <div class="col grey text-center">
                                            <h4>P400.00</h4>
                                        </div>
                                        <div class="col text-center">
                                            <h4>22/10/2023</h4>
                                        </div>
                                        <div class="col">
                                            <div class="dropdown d-flex justify-content-center pt-2">
                                                <button
                                                    style="color: #80AC64; border:1px solid #80AC64; background: #F1F1F1;"
                                                    class="btn dropdown-toggle butdrop d-flex float-end" type="button"
                                                    id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false"></button>

                                                <div style="background:#ECFAE2;border: 1px solid black;border-radius: 10px;"
                                                    class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                    <button style="border-bottom: 1px solid black; text-align: center;"
                                                        class="dropdown-item" id="butEdit" type="button"
                                                        onclick="openEditModal(${budget.budget_id})">Edit
                                                    </button>
                                                    <button class="dropdown-item" style="text-align: center; name="delete"
                                                        data-budget-id="${budget.budget_id}"
                                                        onclick="deleteBudget(this)">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col text-center">
                                            <h4>Allowance</h4>
                                        </div>
                                        <div class="col grey text-center">
                                            <h4>P400.00</h4>
                                        </div>
                                        <div class="col text-center">
                                            <h4>22/10/2023</h4>
                                        </div>
                                        <div class="col">
                                            <div class="dropdown d-flex justify-content-center pt-2">
                                                <button
                                                    style="color: #80AC64; border:1px solid #80AC64; background: #F1F1F1;"
                                                    class="btn dropdown-toggle butdrop d-flex float-end" type="button"
                                                    id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false"></button>

                                                <div style="background:#ECFAE2;border: 1px solid black;border-radius: 10px;"
                                                    class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                    <button style="border-bottom: 1px solid black; text-align: center;"
                                                        class="dropdown-item" id="butEdit" type="button"
                                                        onclick="openEditModal(${budget.budget_id})">Edit
                                                    </button>
                                                    <button class="dropdown-item" style="text-align: center; name="delete"
                                                        data-budget-id="${budget.budget_id}"
                                                        onclick="deleteBudget(this)">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col text-center">
                                            <h4>Allowance</h4>
                                        </div>
                                        <div class="col grey text-center">
                                            <h4>P400.00</h4>
                                        </div>
                                        <div class="col text-center">
                                            <h4>22/10/2023</h4>
                                        </div>
                                        <div class="col">
                                            <div class="dropdown d-flex justify-content-center pt-2">
                                                <button
                                                    style="color: #80AC64; border:1px solid #80AC64; background: #F1F1F1;"
                                                    class="btn dropdown-toggle butdrop d-flex float-end" type="button"
                                                    id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false"></button>

                                                <div style="background:#ECFAE2;border: 1px solid black;border-radius: 10px;"
                                                    class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                    <button style="border-bottom: 1px solid black; text-align: center;"
                                                        class="dropdown-item" id="butEdit" type="button"
                                                        onclick="openEditModal(${budget.budget_id})">Edit
                                                    </button>
                                                    <button class="dropdown-item" style="text-align: center; name="delete"
                                                        data-budget-id="${budget.budget_id}"
                                                        onclick="deleteBudget(this)">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>





    <style>
        :-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #8CEF84;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }


        .scrollbar {
            border-top: 1px solid #DCD4D4;
            border-bottom: 1px solid #DCD4D4;
            height: 180px;

            &::-webkit-scrollbar {
                background-color: transparent;
                width: 10px;
            }

            &::-webkit-scrollbar-thumb {
                background-color: transparent;
            }

            max-height: 220px;
            overflow-y: scroll;
        }

        .scrollbar:hover {
            &::-webkit-scrollbar-thumb {
                background-color: #D6EEC6;
            }

            &::-webkit-scrollbar-thumb:hover {
                background: #8CEF84;

            }

        }

        .grey {
            color: #757575;
        }

        .income-align {
            height: 350px;
        }

        .income-history {
            background: #F8FFF3;
            border: 1px solid #757575;
            width: 800px;
            height: 350px;
            border-radius: 10px;
        }

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
