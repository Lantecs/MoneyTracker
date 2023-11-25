@extends('layout')
@section('title', "Budget")
@section('content')


<div class="main-container d-flex">
    @include('include/sidebar')
    <div class="content">

        <div class="dashboard-content pt-2">
            <h2 class="pl-5 pb-1 text-budget">Budget</h2>
            <div class="container-fluid outside">
                <div class="box">
                    <div class="align">
                        <div class="container">
                            <h2 class="pt-3 text-budget-plan">Budget Plan</h2>
                            <hr class="hr-line">
                            <h2 class="text-budget-plan">Input budget for a specific Date:</h2>
                        </div>
                        <div class="container">
                            <form action="" class="">
                                <div class="row">
                                    <div class="col">
                                        <label for="budget_type" class="labelColor pb-1">Budget type:</label><br>
                                        <input type="text" class="form-control inputSize"> <br>
                                        <label for="budget_type" class="labelColor pb-1">Category:</label><br>
                                        <select id="category" class="form-control inputCategory" name="category">
                                            <option value="Education">Education</option>
                                            <option value="Entertainment">Entertainment</option>
                                            <option value="Food">Food</option>
                                            <option value="Health">Health</option>
                                            <option value="Miscellaneous">Miscellaneous</option>
                                            <option value="Shopping">Shopping</option>
                                            <option value="Transportation">Transportation</option>
                                            <option value="Utilities">Utilities</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2"></div>
                                    <div class="col col2-budget">
                                        <label for="budget_type" class="labelColor pb-1">Amount:</label><br>
                                        <div class="input-group amount">
                                            <div class="input-group-append peso">
                                                <span class="input-group-text">&#8369;</span>
                                            </div>
                                            <input type="text" class="form-control" />
                                        </div>
                                        <label for="budget_type" class="labelColor pt-4 pb-1">Date:</label><br>
                                        <div class="input-group date" id="picker">
                                            <input type="text" class="form-control" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row bg-dark"></div>
                                <div class="row justify-content-end pt-2">
                                    <button type="submit" class="btn add">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid outside pt-3">
            <div class="boxbelow">
                <div class="align">
                    <div class="box2 text-center pt-3">
                        <div class="row row1 pt-4">
                            <div class="col colum1">
                                <h4>Budget Type</h4>
                            </div>
                            <div class="col colum2">
                                <h4 class="grey">Category</h4>
                            </div>
                            <div class="col colum3">
                                <h4>Amount</h4>
                            </div>
                            <div class="col colum4">
                                <h4 class="grey pr-5">Date</h4>
                            </div>
                            <div>
                                <button class="btn invis"></button>
                            </div>
                        </div>
                        <div class="container scrollbar">
                            <div class="row row1 pt-4">
                                <div class="col colum1">
                                    <h4>Lunch</h4>
                                </div>
                                <div class="col colum2">
                                    <h4 class="grey">Food</h4>
                                </div>
                                <div class="col colum3">
                                    <h4 class="pl-5">P210.00</h4>
                                </div>
                                <div class="col colum4">
                                    <h4 class="grey pl-4">13-11-2023</h4>
                                </div>
                                <div class="dropdown pr-3">
                                    <button style="color: #80AC64;border:1px solid #80AC64;background: #F1F1F1;"
                                        class="btn dropdown-toggle butdrop" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>

                                    <div style="background:#ECFAE2;border: 1px solid black;border-radius: 10px;"
                                        class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <button style="border-bottom: 1px solid black; text-align: center;"
                                            class="dropdown-item" type="button">Edit</button>
                                        <button style="text-align: center;" class="dropdown-item"
                                            type="button">Delete</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Repeat similar rows as needed -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<style>
    .scrollbar {
        height: 220px;
        max-height: 220px;
        overflow-y: scroll;
    }

    .grey {
        color: #757575;
    }

    .invis {
        color: #F8FFF3;
        background: #F8FFF3;
    }

    .add-scrollbar {
        height: 220px;
        max-height: 220px;
        overflow: hidden;
    }

    .box2 .row {
        border-bottom: 1px solid grey;
    }

    .boxbelow {
        width: 1100px;
        height: 310px;
        max-height: 310px;
        background: #F8FFF3;
        border: 1px solid #757575;
        box-shadow: 0 2px 1px rgba(117, 117, 117, 0.3);
        border-radius: 10px;
    }

    .grey {
        color: #757575;
    }


    body {
        font-family: 'inter';

    }

    .add {
        background-color: #8CEF84;
    }

    .text-budget {
        font-size: 40;
        font-weight: bold;
    }

    .text-budget-plan {
        font-size: 25;
        font-weight: bold;
    }

    .outside {
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .box {
        width: 1100px;
        background: #F8FFF3;
        border: 1px solid #757575;
        box-shadow: 0 2px 1px rgba(117, 117, 117, 0.3);
        border-radius: 10px;
    }

    .align {
        width: 900px;
        margin: auto;
    }

    .labelColor {
        color: #757575;
    }



    .input-group-text i.fas.fa-calendar:hover {
        cursor: pointer;
    }

    @media (max-width: 768px) {

        .box,
        .align {
            max-width: 90%;
        }
    }
</style>