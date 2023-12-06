@extends('layout')
@section('title', "Budget")
@section('content')


<div class="main-container d-flex">
    @include('include/sidebar')
    <div class="content">

        <div class="modal fade" id="sucessModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="container successCon text-center d-flex justify-content-center align-item-center">
                    <div class="alert alert-success" role="alert">
                        This is a danger alert—check it out!
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sucessModal">
            Launch demo modal
        </button>


        <input type="text" class="inpamount" value placeholder="Search">


    </div>
</div>

<style>
    .inpamount {
        background: url("https://img.icons8.com/material-outlined/24/peso-symbol.png") no-repeat left;
        background-size: 20px;
    }

    .inpdate {
        padding-left: 10px;
        background: url("https://img.icons8.com/material-rounded/24/tear-off-calendar.png") no-repeat right;
        background-size: 30px;
    }

    .modal .modal-header {
        border-radius: 0;
    }

    .modal-title {
        font-family: 'inter';
        font-weight: 600;

    }

    .modal-body {
        background: #F8FFF3;
        border-top: 1px solid #B0B0B0;
        border-bottom: 1px solid #69A544;
        border-left: 1px solid #69A544;
        border-right: 1px solid #69A544;
    }


    .modal-header {
        background: #FFE09D;
        border: 1px solid #B0B0B0;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
    }


    .validation-error-color {
        color: red;
    }

    .textdate {
        background-color: #ffffff;
        cursor: pointer;
        height: 38px;
    }

    .add {
        background: #8CEF84;
        border-radius: 8px;
        border: none;
    }

    .amountalign {
        padding-right: 30px;
    }

    .datealign {
        padding-right: 110px;
    }

    .dropdown {
        padding-left: 20px;
        justify-content: center;

    }

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

    .rowbotborder {
        border-top: 1px solid grey;
    }

    .box2 .row {
        border-bottom: 1px solid grey;
    }

    .boxbelow {
        width: 1100px;
        height: 330px;
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
        box-shadow: 0 5px 1px rgba(0, 0, 0, 0.5);
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
