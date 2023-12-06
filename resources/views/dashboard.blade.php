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

            <div id="errorMessages" class="alert alert-danger" style="display:none;">
                <ul id="errorList"></ul>
            </div>

            <div class="modal fade pt-5" id="sucessModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="container successCon text-center d-flex justify-content-center align-item-center">
                        <div class="alert alert-success" id="successMessage" role="alert">

                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-5 modal fade" id="incomeModal" tabindex="1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Income</h5>
                            <button type="button" style="background-color: transparent; border: none;" class="close"
                                data-dismiss="modal" aria-label="Close">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>

                        <div class="modal-body" id="editIncomeContainer">
                            <form id="incomeEditForm">
                                <!-- Modal Content -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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
                                        <span style="font-size: 20px;">Today's Income</span>
                                    </div>

                                    <div class="dailyincomecontainer">
                                        <!--Income Data-->
                                    </div>

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
                                        <span style="font-size: 20px;">Today's Spending</span>
                                    </div>
                                    <div class="dailyspendingcontainer">
                                        <!--Spending Data-->
                                    </div>
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
                                        <span style="font-size: 20px;">Today's Savings</span>
                                    </div>
                                    <div class="dailysavingcontainer">
                                        <!--Spending Data-->
                                    </div>

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
                                    <div class="weeklyincomecontainer">
                                        <!--Spending Data-->
                                    </div>
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
                                    <div class="weeklyspendingcontainer">
                                        <!--Spending Data-->
                                    </div>
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
                                    <div class="weeklysavingcontainer">
                                        <!--Spending Data-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="fw-bold">Income</h3>
                <div class="container-fluid d-flex botcontainer ">
                    <div class="ps-3">
                        <div class="container-income incomeContainer align-items-center drowShadow ">
                            <form autocomplete="off" class="incomeForm" id="incomeForm">
                                <div class="container">
                                    <div style="height: 105px;" class="form-group pt-4">
                                        <label style="font-size: 25px;" for="type">Type:</label>
                                        <div class="ps-4">
                                            <input name="type" type="text" style="width: 320px;" class="form-control">
                                            <span class="validation-error-color" id="type_error" role="alert">
                                                {{ $errors->first('type') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div style="height: 80px;" class="form-group">
                                        <label style="font-size: 25px;" for="amount">Amount:</label>
                                        <div class="ps-4">
                                            <input name="amount" type="text" style="width: 320px; text-indent: 10px;"
                                                class="form-control inpamount">
                                            <span class="validation-error-color" id="amount_error" role="alert">
                                                {{ $errors->first('amount') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div style="height: 100px;" class="form-group">
                                        <label style="font-size: 25px;" for="type">Date:</label>
                                        <div class="ps-4">
                                            <input data-provide="datepicker" name="date"
                                                type="text" id="picker" style="width: 320px;"
                                                class="form-control inpdate picker">
                                            <span class="validation-error-color" id="date_error" role="alert">
                                                {{ $errors->first('date') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <button type="button"
                                            style="background: #8CEF84; border-radius: 8px; border: none; width: 200px"
                                            onclick="addIncome()" class="add">Add</button>
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

                                    <div class="pt-5 d-flex justify-content-center align-items-center">
                                        <div class="spinner-border" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <b class="ms-2">Loading Data...</b>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    loadUserIncomes();
    dailyIncome();
    dailySpending();
    dailySaving();
    weeklyIncome();
    weeklySpending();
    weeklySaving();

    function weeklySaving() {
        fetch('/weeklysaving', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                document.querySelector('.weeklysavingcontainer').innerHTML =
                    `<h2 class="fw-bold">&#8369;${data.weeklySaving}</h2>`;
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    function weeklySpending() {
        fetch('/weeklyspending', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                document.querySelector('.weeklyspendingcontainer').innerHTML =
                    `<h2 class="fw-bold">&#8369;${data.weeklySpending}</h2>`;
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    function weeklyIncome() {
        fetch('/weeklyIncome', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                document.querySelector('.weeklyincomecontainer').innerHTML =
                    `<h2 class="fw-bold">&#8369;${data.weeklyIncome}</h2>`;
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }


    function dailySaving() {
        fetch('/dailysaving', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                document.querySelector('.dailysavingcontainer').innerHTML =
                    `<h2 class="fw-bold">&#8369;${data.todaysSaving}</h2>`;
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    function dailySpending() {
        fetch('/dailyspending', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                document.querySelector('.dailyspendingcontainer').innerHTML =
                    `<h2 class="fw-bold">&#8369;${data.todaysSpending}</h2>`;
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    function dailyIncome() {
        fetch('/dailyincome', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                document.querySelector('.dailyincomecontainer').innerHTML =
                    `<h2 class="fw-bold">&#8369;${data.todaysIncome}</h2>`;
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    function saveEditExpenses(incomeId) {
        console.log('Income ID:', incomeId);
        const form = document.getElementById('incomeEditForm');
        const formData = new FormData(form);

        fetch(`/incomesave/${incomeId}`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: 'application/json',
                },
            })

            .then(response => response.json())
            .then(data => {
                clearErrors();
                console.log(data);

                if (data.errors) {
                    console.error('Validation Errors:', data.errors);


                    Object.keys(data.errors).forEach(field => {
                        console.error(`Field: ${field}, Error: ${data.errors[field][0]}`);
                    });


                    Object.keys(data.errors).forEach(field => {
                        const errorMessages = data.errors[field].join(', ');

                        const errorListItem = document.createElement('li');
                        errorListItem.textContent = `${field}: ${errorMessages}`;
                        document.getElementById('errorList').appendChild(errorListItem);

                        const inputField = document.querySelector(`[name="${field}"]`);
                        inputField.classList.add('is-invalid');
                        inputField.style.border = "1px solid #ff3333";
                        setTimeout(() => {
                            clearErrors();
                            inputField.style.border = "1px solid #000000";
                        }, 5000);

                        const errorSpan = document.getElementById(`${field}_error`);
                        if (errorSpan) {
                            errorSpan.textContent = errorMessages;
                        }
                    });
                } else {

                    console.log('Data changes sully save.');

                    const successMessage = document.getElementById('successMessage');
                    if (successMessage) {
                        successMessage.textContent = 'Data changes successfully save.';
                    }

                    $('#sucessModal').modal({
                        backdrop: false,
                        show: true
                    });

                    $('#incomeModal').modal('hide');

                    loadUserIncomes();
                    dailyIncome();
                    setTimeout(() => {
                        $('#sucessModal').modal('hide');
                    }, 2000);
                }

            })
            .catch(error => {
                console.error('Validation Errors:', error.errors);
            });
    }

    function deleteExpenses(incomeId) {

        fetch(`/incomedelete/${incomeId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data.message);
                loadUserIncomes();
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    function openExpensesModal(incomeId) {

        fetch(`/edit-user-income/${incomeId}`, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {

                if (data.income) {
                    const editIncome = data.income;


                    document.getElementById('incomeEditForm').innerHTML = `


                <label for="budget_type" class="">Budget type:</label><br>
                <input type="text" style="        background-color: transparent;
                  border: 1px solid black;"
                    class="form-control inputSize"
                    name="edited_type" value="${editIncome.type}">

            <br>
            <label for="budget_type" class="">Amount:</label><br>
            <div class="input-group amount">
                <input style="background-color: transparent;
                border: 1px solid black;" id="amount" type="text" class="form-control inpamount ps-4"
                    name="edited_amount" value="${editIncome.amount}">
            </div>

            <br>


                <label for="date" class="">Date:</label><br>
                <div class="input-group date">
                    <input data-provide="datepicker" style="background-color: transparent;
                        border: 1px solid black;"
                        value="${moment(editIncome.date).format('DD-MM-YYYY')}" type="text"
                        class="form-control inpdate datepicker" readonly name="edited_date" id="datepicker" />
                </div>



              <br>

                 <button style="background-color: #8CEF84; border: 1px solid #69A544;"
                    type="button" class="btn float-end but_save"
                    onclick="saveEditExpenses(${editIncome.income_id})">Save
                    </button>


            <button type="button" style=" margin-right: 10px;       background-color: transparent;
                     border: 1px solid #69A544;" class="btn pt-2 float-end pe-3"
                data-dismiss="modal">Cancel</button>


                `;

                    $('#incomeModal').modal('show');


                } else {

                    console.error('Budget data not found');
                }
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    function addIncome() {
        const form = document.getElementById('incomeForm');
        const formData = new FormData(form);

        clearErrors();
        setTimeout(() => {
            clearErrors();
        }, 5000);

        fetch(`/incomeadd`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: 'application/json',
                },
            })

            .then(response => response.json())
            .then(data => {
                clearErrors();
                console.log(data);

                if (data.errors) {
                    console.error('Validation Errors:', data.errors);

                    Object.keys(data.errors).forEach(field => {
                        console.error(`Field: ${field}, Error: ${data.errors[field][0]}`);
                    });

                    Object.keys(data.errors).forEach(field => {
                        const errorMessages = data.errors[field].join(', ');

                        const errorListItem = document.createElement('li');
                        errorListItem.textContent = `${field}: ${errorMessages}`;
                        document.getElementById('errorList').appendChild(errorListItem);

                        const inputField = document.querySelector(`[name="${field}"]`);
                        inputField.classList.add('is-invalid');

                        const errorSpan = document.getElementById(`${field}_error`);
                        if (errorSpan) {
                            errorSpan.textContent = errorMessages;
                        }
                    });
                } else {
                    console.log('Successfully Added!');

                    const successMessage = document.getElementById('successMessage');
                    if (successMessage) {
                        successMessage.textContent = 'Successfully Added!';
                    }

                    $('#sucessModal').modal({
                        backdrop: false,
                        show: true
                    });

                    $('#editModal').modal('hide');

                    setTimeout(() => {
                        $('#sucessModal').modal('hide');
                    }, 2000);
                }
                form.reset();
                loadUserIncomes();
                dailyIncome();
                weeklyIncome();
            })
    }

    function loadUserIncomes() {
        fetch('http://moneytracker.test/get-user-incomes', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {

                document.querySelector('.scrollbar').innerHTML = '';


                data.userIncomes.forEach(incomes => {
                    const row = document.createElement('div');
                    row.innerHTML = `
                    <div class="row">
                                        <div class="col text-center">
                                            <h4>${incomes.type}</h4>
                                        </div>
                                        <div class="col grey text-center">
                                            <h4>&#8369;${incomes.amount}</h4>
                                        </div>
                                        <div class="col text-center">

                                            <h4>${incomes.date}</h4>
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
                                                        onclick="openExpensesModal(${incomes.income_id})">Edit
                                                    </button>
                                                    <button class="dropdown-item" style="text-align: center; " type="button"
                                                        onclick="deleteExpenses(${incomes.income_id})">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                `;

                    document.querySelector('.scrollbar').appendChild(row);
                });
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    function clearErrors() {
        const errorList = document.getElementById('errorList');
        if (errorList) {
            errorList.innerHTML = ''; // Clear previous error messages
        }

        const formElements = document.querySelectorAll('.is-invalid');
        formElements.forEach(element => {
            element.classList.remove('is-invalid'); // Remove 'is-invalid' class
        });

        const validationErrorElements = document.querySelectorAll('.validation-error-color');
        validationErrorElements.forEach(element => {
            element.textContent = ''; // Clear validation error messages
        });
    }

    function ucfirst(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }
</script>

<style>
    .inpamount {
        background: url("https://img.icons8.com/material-outlined/24/peso-symbol.png") no-repeat left;
        background-size: 20px;
    }

    .inpdate {
        padding-left: -10px;
        background: url("https://img.icons8.com/material-rounded/24/tear-off-calendar.png") no-repeat right;
        background-size: 30px;
    }

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
        color: #c00000;
        font-size: 12px;
    }
</style>
