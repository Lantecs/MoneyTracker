@extends('layout')
@section('title', 'Budget')
@section('content')

    <!-- Main container -->
    <div class="main-container d-flex">
        <!-- Include sidebar -->
        @include('include/sidebar')

        <div class="content">
            <!-- Success Modal -->
            <div class="modal fade pt-5" id="sucessModal" tabindex="-1">
                <!-- Modal dialog -->
                <div class="modal-dialog">
                    <div class="container successCon text-center d-flex justify-content-center align-item-center">
                        <!-- Alert for success message -->
                        <div class="alert alert-success" id="successMessage" role="alert"></div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="pt-5 modal fade" id="editModal" tabindex="1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Budget</h5>
                            <!-- Close button -->
                            <button type="button" style="background-color: transparent; border: none;" class="close"
                                data-dismiss="modal" aria-label="Close">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>

                        <div class="modal-body" id="editForm">
                            <!-- Modal Content -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <h2 class="ps-5 text-budget">Budget</h2>

                <!-- Budget Plan Form -->
                <div class="container-fluid outside">
                    <div class="box">
                        <div class="align">
                            <div class="container">
                                <h2 class="pt-3 text-budget-plan">Budget Plan</h2>
                                <hr class="hr-line">
                                <h2 class="text-budget-plan">Input budget for a specific Date:</h2>
                            </div>

                            <!-- Budget Plan Form -->
                            <div class="container">
                                <form id="budgetAddForm" class="needs-validation" novalidate>
                                    <!-- Form fields for budget input -->
                                    <div class="row">
                                        <!-- First column -->
                                        <div class="col colheight">
                                            <!-- Category dropdown -->
                                            <label for="category" class="labelColor">Category:</label><br>
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
                                            <span class="validation-error-color" id="category_error" data-aos="fade-in">
                                                {{ $errors->first('category') }}
                                            </span>

                                            <br>

                                            <!-- Budget type input -->
                                            <label for="budget_type" class="labelColor pb-1">Budget type:</label><br>
                                            <input type="text" class="form-control inputSize" name="budget_type"
                                                required>
                                            <span class="validation-error-color" id="budget_type_error" role="alert">
                                                {{ $errors->first('budget_type') }}
                                            </span>
                                        </div>

                                        <!-- Spacer column -->
                                        <div class="col-lg-2"></div>

                                        <!-- Second column -->
                                        <div class="col colheight">
                                            <!-- Amount input -->
                                            <label for="budget_type" class="labelColor">Amount:</label><br>
                                            <div class="input-group amount">
                                                <input id="amount" type="text" style="text-indent: 10px;"
                                                    class="form-control inpamount" name="amount">
                                            </div>
                                            <span class="validation-error-color" id="amount_error">
                                                {{ $errors->first('amount') }}
                                            </span>
                                            <br>

                                            <!-- Date input -->
                                            <label for="budget_type" class="labelColor pt-1">Date:</label><br>
                                            <div class="input-group date">
                                                <input id="picker" type="text" class="form-control inpdate" readonly
                                                    name="date">
                                            </div>
                                            <span class="validation-error-color" id="date_error">
                                                {{ $errors->first('date') }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Add button -->
                                    <div class="row justify-content-center pb-2">
                                        <button type="button"
                                            style="background: #8CEF84; border-radius: 8px; border: none; width: 300px"
                                            onclick="addBudget()" class="add">Add</button>
                                    </div>

                                    <!-- Error messages -->
                                    <div id="errorMessages" class="alert alert-danger" style="display:none;">
                                        <ul id="errorList"></ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Budget Display -->
                <div class="container-fluid outside pt-3">
                    <div class="boxbelow">
                        <div class="align">
                            <div class="box2 text-center pt-3">
                                <div class="row row1 pt-4">
                                    <!-- Column headers -->
                                    <div class="col colum1">
                                        <h4>Category</h4>
                                    </div>
                                    <div class="col colum2">
                                        <h4 class="grey">Budget Type</h4>
                                    </div>
                                    <div class="col colum3">
                                        <h4 class="amountalign">Amount</h4>
                                    </div>
                                    <div class="col colum4">
                                        <h4 class="grey datealign">Date</h4>
                                    </div>
                                    <div class="col"></div>
                                </div>

                                <div class="container scrollbar">
                                    <!-- Loading message -->
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
    </div>
@endsection


<script>
    loadUserBudgets();

    function saveEditedBudget(budgetId) {
        const form = document.getElementById('budgetSaveForm');
        const formData = new FormData(form);

        

        fetch(`/budgetsave/${budgetId}`, {
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


                    console.log('Data changes successfully save.');

                    const successMessage = document.getElementById('successMessage');
                    if (successMessage) {
                        successMessage.textContent = 'Data changes successfully save.';
                    }

                    $('#sucessModal').modal({
                        backdrop: false,
                        show: true
                    });

                    $('#editModal').modal('hide');

                    loadUserBudgets();
                    setTimeout(() => {
                        $('#sucessModal').modal('hide');
                    }, 2000);
                }

            })
            .catch(error => {
                console.error('Validation Errors:', error.errors);
            });
    }

    async function addBudget() {
        const form = document.getElementById('budgetAddForm');
        const formData = new FormData(form);

        clearErrors();
        setTimeout(() => {
            clearErrors();
        }, 5000);

        try {
            const response = await fetch('/budgetadd', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: 'application/json',
                },
            });

            const data = await response.json();
            console.log('Response Data:', data);

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
            loadUserBudgets();
        } catch (error) {
            console.error('An error occurred:', error);
        }
    }


    function clearErrors() {

        document.getElementById('errorList').innerHTML = '';


        document.getElementById('errorMessages').style.display = 'none';


        const inputFields = document.querySelectorAll('.is-invalid');
        inputFields.forEach(field => {
            field.classList.remove('is-invalid');
        });


        const errorFields = ['budget_type', 'category', 'amount', 'date'];
        errorFields.forEach(field => {
            const errorSpan = document.getElementById(`${field}_error`);
            if (errorSpan) {
                errorSpan.textContent = '';
            }
        });
    }

    function openEditModal(budgetId) {

        fetch(`/edit-user-budget/${budgetId}`, {
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

                if (data.budget) {
                    const editBudget = data.budget;


                    document.getElementById('editForm').innerHTML = `
                    <form id="budgetSaveForm">

                                <label for="budget_type" class="">Budget type:</label><br>
                                <input type="text" style="        background-color: transparent;
                                  border: 1px solid black;"
                                    class="form-control inputSize"
                                    name="edited_budget_type" value="${editBudget.budget_type}">



                            <br>


                                <label for="category" class="">Category:</label><br>
                                <select value="${editBudget.category}" id="category" style="        background-color: transparent;
                                     border: 1px solid black;"
                                    class="form-select inputCategory"
                                    name="edited_category">
                                    <option value="${editBudget.category}" selected hidden>${editBudget.category}</option>
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
                                    name="edited_amount" value="${editBudget.amount}">
                            </div>

                            <br>




                                <label for="date" class="">Date:</label><br>
                                <div class="input-group date">
                                    <input data-provide="datepicker" style="background-color: transparent;
                                        border: 1px solid black;"
                                        value="${moment(editBudget.date).format('DD-MM-YYYY')}" type="text"
                                        class="form-control inpdate datepicker" readonly name="edited_date" id="datepicker" />
                                </div>



                            <br>

                            <button style="        background-color: #8CEF84;
                                     border: 1px solid #69A544;" type="button" class="btn float-end but_save"
                                onclick="saveEditedBudget(${editBudget.budget_id})">Save
                            </button>

                            <button type="button" style=" margin-right: 10px;       background-color: transparent;
                                     border: 1px solid #69A544;" class="btn pt-2 float-end pe-3"
                                data-dismiss="modal">Cancel</button>

                        </form>
                `;


                    $('#editModal').modal('show');


                } else {

                    console.error('Budget data not found');
                }
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }


    function deleteBudget(budgetIdDelete) {
        const budgetId = budgetIdDelete.dataset.budgetId;

        fetch(`http://moneytracker.test/budgetdelete/${budgetId}`, {
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
                loadUserBudgets();
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    function loadUserBudgets() {
        fetch('http://moneytracker.test/get-user-budgets', {
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


                data.userBudgets.forEach(budget => {
                    const row = document.createElement('div');
                    row.classList.add('row', 'row1', 'pt-4');
                    row.innerHTML = `
                    <div class="col colum2">
                        <h4 class="grey">${budget.category}</h4>
                    </div>
                    <div class="col colum1 text-break">
                        <h4>${ucfirst(budget.budget_type)}</h4>
                    </div>
                    <div class="col colum3">
                        <h4 class="pl-5 text-break">&#8369;${budget.amount}</h4>
                    </div>
                    <div class="col colum4 d-flex">
                        <h4 class="grey">${moment(budget.date).format('DD-MM-YYYY')}</h4>
                    </div>
                    <div class="col colum5 text-center justify-content-center d-flex">
                    <div class="dropdown pt-1">
                            <button style="color: #80AC64; border:1px solid #80AC64; background: #F1F1F1;"
                            class="btn dropdown-toggle butdrop d-flex float-end" type="button" id="dropdownMenu2"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>

                            <div style="background:#ECFAE2;border: 1px solid black;border-radius: 10px;"
                            class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button style="border-bottom: 1px solid black; text-align: center;"
                            class="dropdown-item" id="butEdit" type="button" onclick="openEditModal(${budget.budget_id})">Edit
                                </button>
                            <button class="dropdown-item" style="text-align: center; name="delete" data-budget-id="${budget.budget_id}" onclick="deleteBudget(this)">Delete</button>

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

    function ucfirst(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }
</script>




<style>
    .dashboard-content {
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

    .amountalign {
        padding-right: 30px;
    }

    .datealign {
        padding-right: 105px;
    }

    .dropdown {
        padding-left: 20px;
        justify-content: center;

    }

    :-webkit-scrollbar-track {
        background: #f1f1f1;
    }


    .scrollbar {
        height: 220px;

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
        height: 330px;
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
