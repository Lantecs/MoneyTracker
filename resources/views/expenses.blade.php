@extends('layout')
@section('title', 'Budget')
@section('content')

    <div class="main-container d-flex">
        @include('include/sidebar')
        <div class="content">

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

            <div class="pt-5 modal fade" id="editExpensesModal" tabindex="1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Expenses</h5>
                            <button type="button" style="background-color: transparent; border: none;" class="close"
                                data-dismiss="modal" aria-label="Close">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>

                        <div class="modal-body" id="expensesEditForm">

                            <!-- Modal Content -->

                        </div>
                    </div>
                </div>
            </div>



            <div class="dashboard-content">
                <h2 class="ps-5 text-budget">Expenses</h2>
                <div class="container-fluid outside">
                    <div class="box">
                        <div class="align">

                            <div class="row pt-2">
                                <div class="col text-center"> <label for="category" class="spanSize">Category</label></div>
                                <div class="col text-center pe-5"> <label for="type" class="spanSize ps-5">Type</label>
                                </div>
                                <div class="col text-center"> <label for="amount" class="spanSize ps-5">Amount</label>
                                </div>
                                <div class="col text-center pe-5"> <label for="date" class="spanSize ps-5">Date</label>
                                </div>
                                <hr class="HrTopBox">
                            </div>
                            <form id="expensesAddForm" action="">
                                <div class="row rowSize">
                                    <div class="col justify-content-center">
                                        <select id="category" class="form-select inputCategory" name="category">
                                            <option value="" disabled selected>-- Select an Option --</option>
                                            <option value="Education">Education</option>
                                            <option value="Entertainment">Entertainment</option>
                                            <option value="Food">Food</option>
                                            <option value="Health">Health</option>
                                            <option value="Miscellaneous">Miscellaneous</option>
                                            <option value="Shopping">Shopping</option>
                                            <option value="Transportation">Transportation</option>
                                            <option value="Utilities">Utilities</option>
                                        </select>
                                        <span class="validation-error-color" id="category_error">
                                            {{ $errors->first('category') }}
                                        </span>
                                    </div>
                                    <div class="col justify-content-center">
                                        <input type="text" name="type" class="form-control">
                                        <span class="validation-error-color" id="type_error" role="alert">
                                            {{ $errors->first('type') }}
                                        </span>
                                    </div>
                                    <div class="col">
                                        <input id="amount" type="text" name="amount" style="text-indent: 10px;"
                                            class="form-control inpamount">
                                        <span class="validation-error-color" id="amount_error">
                                            {{ $errors->first('amount') }}
                                        </span>
                                    </div>
                                    <div class="col">
                                        <input id="picker" type="text" name="date" class="form-control inpdate">
                                        <span class="validation-error-color" id="date_error">
                                            {{ $errors->first('date') }}
                                        </span>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <button type="button"
                                        style="background: #8CEF84; border-radius: 8px; border: none; width: 150px"
                                        onclick="addExpenses()" class="add">Add</button>

                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid outside pt-3">
                <div class="boxbelow">
                    <div class="align">
                        <div class="box2 pt-3">
                            <h2>History</h2>
                            <div class="row row1 pt-4">
                                <div class="col colum1 text-center">
                                    <h4>Category</h4>
                                </div>
                                <div class="col colum2 text-center">
                                    <h4 class="grey">Budget Type</h4>
                                </div>
                                <div class="col colum3 text-center">
                                    <h4 class="">Amount</h4>
                                </div>
                                <div class="col colum4 text-center">
                                    <h4 class="grey">Date</h4>
                                </div>
                                <div class="col"></div>
                            </div>

                            <div class="container scrollbar">

                                <!-- container of loaded budgets of user -->

                                <div class="pt-5 d-flex justify-content-center align-items-center">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <b class="ms-2">Loading Data...</b>
                                </div>


                            </div>


                        </div>
                        <div class="row rowbotborder"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

<script>
    loadUserExpenses();

    function saveEditExpenses(expensesId) {
        const form = document.getElementById('expensesSaveForm');
        const formData = new FormData(form);

        fetch(`/expensessave/${expensesId}`, {
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
                        successMessage.textContent = 'Data changes succfully save.';
                    }

                    $('#sucessModal').modal({
                        backdrop: false,
                        show: true
                    });

                    $('#editExpensesModal').modal('hide');

                    loadUserExpenses();
                    setTimeout(() => {
                        $('#sucessModal').modal('hide');
                    }, 2000);
                }

            })
            .catch(error => {
                console.error('Validation Errors:', error.errors);
            });
    }

    function deleteExpenses(expensesIdDelete) {
        const expensesId = expensesIdDelete.dataset.expensesId;

        fetch(`http://moneytracker.test/expensesdelete/${expensesId}`, {
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
                loadUserExpenses();
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    function addExpenses() {
        const form = document.getElementById('expensesAddForm');
        const formData = new FormData(form);

        clearErrors();
        setTimeout(() => {
            clearErrors();
        }, 5000);

        fetch(`/expensesadd`, {
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
                loadUserExpenses();
            })
    }


    function openExpensesModal(expensesId) {

        fetch(`/edit-user-expenses/${expensesId}`, {
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

                if (data.expenses) {
                    const editExpenses = data.expenses;


                    document.getElementById('expensesEditForm').innerHTML = `

                    <form id="expensesSaveForm">
                        <label for="budget_type" class="">Budget type:</label><br>
                        <input type="text" style="        background-color: transparent;
                          border: 1px solid black;"
                            class="form-control inputSize"
                            name="edited_type" value="${editExpenses.type}">

                    <br>

                        <label for="category" class="">Category:</label><br>
                        <select value="${editExpenses.category}" id="category" style="        background-color: transparent;
                             border: 1px solid black;"
                            class="form-select inputCategory"
                            name="edited_category">
                            <option value="${editExpenses.category}" selected hidden>${editExpenses.category}</option>
                            <option value="Education">Education</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="Food">Food</option>
                            <option value="Health">Health</option>
                            <option value="Miscellaneous">Miscellaneous</option>
                            <option value="Shopping">Shopping</option>
                            <option value="Transportation">Transportation</option>
                            <option value="Utilities">Utilities</option>
                        </select>


                    <br>
                    <label for="budget_type" class="">Amount:</label><br>
                    <div class="input-group amount">
                        <input style="background-color: transparent;
                        border: 1px solid black;" id="amount" type="text" class="form-control inpamount ps-4"
                            name="edited_amount" value="${editExpenses.amount}">
                    </div>

                    <br>


                        <label for="date" class="">Date:</label><br>
                        <div class="input-group date">
                            <input data-provide="datepicker" style="background-color: transparent;
                                border: 1px solid black;"
                                value="${moment(editExpenses.date).format('DD-MM-YYYY')}" type="text"
                                class="form-control inpdate datepicker" readonly name="edited_date" id="datepicker" />
                        </div>



                    <br>

                    <button style="background-color: #8CEF84; border: 1px solid #69A544;"
        type="button" class="btn float-end but_save"
        onclick="saveEditExpenses(${editExpenses.expenses_id})">Save
</button>


                    <button type="button" style=" margin-right: 10px;       background-color: transparent;
                             border: 1px solid #69A544;" class="btn pt-2 float-end pe-3"
                        data-dismiss="modal">Cancel</button>
</form>

        `;


                    $('#editExpensesModal').modal('show');


                } else {

                    console.error('Budget data not found');
                }
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }


    function loadUserExpenses() {
        fetch('/get-user-expenses', {
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

                data.userExpenses.forEach(expenses => {
                    const row = document.createElement('div');
                    row.classList.add('row', 'pt-3', 'pb-2');
                    row.innerHTML = `

                            <h4 class="col text-center">${expenses.category}</h4>
                            <h4 class="col grey text-center text-break">${ucfirst(expenses.type)}</h4>
                            <h4 class="col text-center text-break">&#8369;${expenses.amount}</h4>
                            <h4 class="col grey text-end">${moment(expenses.date).format('DD-MM-YYYY')}</h4>
                            <div class="col text-center justify-content-center d-flex">
                                <div class="dropdown pt-1">
                                    <button style="color: #80AC64; border:1px solid #80AC64; background: #F1F1F1;"
                                        class="btn dropdown-toggle butdrop d-flex float-end" type="button"
                                        id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"></button>

                                    <div style="background:#ECFAE2;border: 1px solid black;border-radius: 10px;"
                                        class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <button style="border-bottom: 1px solid black; text-align: center;"
                                            class="dropdown-item" id="butEdit" type="button"
                                            onclick="openExpensesModal(${expenses.expenses_id})">Edit
                                        </button>
                                        <button class="dropdown-item" style="text-align: center; name="delete"
                                            data-expenses-id="${expenses.expenses_id}"
                                            onclick="deleteExpenses(this)">Delete</button>
                                    </div>
                                </div>
                            </div>
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
        if (typeof str === 'undefined' || str === null) {
            return ''; // or handle the case accordingly
        }
        return str.charAt(0).toUpperCase() + str.slice(1);
    }
</script>

<style>
    .rowSize {
        height: 55px;
    }

    .HrTopBox {
        background: #757575;
        border: 1px solid rgb(49, 49, 49);
        height: 2px;
    }

    .spanSize {
        font-size: 25;
    }

    .main-container {
        font-family: 'inter';
    }

    .colheight {
        height: 175px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #8CEF84;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .inpamount {
        background: url("https://img.icons8.com/material-outlined/24/peso-symbol.png") no-repeat left;
        background-size: 20px;
    }

    .inpdate {
        padding-left: -10px;
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
        color: #c00000;
        font-size: 12px;
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

    .dropdown {
        padding-left: 20px;
        justify-content: center;

    }

    :-webkit-scrollbar-track {
        background: #f1f1f1;
    }


    .scrollbar {
        height: 350px;

        &::-webkit-scrollbar {
            background-color: transparent;
            width: 10px;
        }

        &::-webkit-scrollbar-thumb {
            background-color: transparent;
        }

        max-height: 390px;
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

    .invis {
        color: #F8FFF3;
        background: #F8FFF3;
    }



    .rowbotborder {
        border-top: 1px solid grey;
    }

    .box2 .row {
        border-bottom: 1px solid grey;
    }

    .boxbelow {
        width: 1100px;
        height: 500px;
        background: #F8FFF3;
        border: 1px solid #757575;
        box-shadow: 0 2px 1px rgba(117, 117, 117, 0.3);
        border-radius: 10px;
    }

    .grey {
        color: #757575;
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
        width: 1000px;
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
