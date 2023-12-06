@extends('layout')
@section('title', 'Summary')
@section('content')


    <div class="main-container d-flex">
        @include('include/sidebar')
        <div class="content">

            <div class="dashboard-content px-3 pt-4">
                <h3 class="fw-bold">Summary</h3>
                <div class="container-fluid d-flex ps-4 topcontainer ">
                    <div class="ps-5">
                        <div class="barCon drowShadow">
                            <div class="container d-flex">
                                <h5 class="fw-bold pt-4 pb-4 ps-1">Expense Tracking</h5>
                                <span class="pt-5 ps-5 fs-12 textSize"> <i class="bi bi-circle-fill dotGreen"></i>
                                    Income</span>
                                <span class="pt-5 ps-1 fs-12 textSize"> <i class="bi bi-circle-fill dotOrange"></i>
                                    Spending</span>
                            </div>
                            <div class="pt-2 ps-3">
                                <div class=" chartCon">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-5">
                        <div class="imageCon drowShadow">
                            <img src="{{ asset('images/piclogo.png') }}" class="imgcon" alt="Logo" />
                        </div>
                    </div>
                </div>

                <div class="container-fluid pt-3 bot-container">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="px-2">
                            <div class="rec drowShadow">
                                <div class="container pt-3 ps-3 d-flex align-items-center">
                                    <i class="fas fa-graduation-cap iconColor"></i>
                                    <span class="fs-5 ps-1">Education</span>
                                </div>
                                <span class="fs-5 ps-4">Total Expenses:</span>
                                <div class="container educCon d-flex align-items-center justify-content-center">

                                </div>
                            </div>
                        </div>

                        <div class="px-3">
                            <div class="rec drowShadow">
                                <div class="container pt-3 ps-3 d-flex align-items-center">
                                    <i class="fas fa-chess iconColor"></i>
                                    <span class="fs-5 ps-1">Entertainment</span>
                                </div>
                                <span class="fs-5 ps-4">Total Expenses:</span>
                                <div class="container entCon d-flex align-items-center justify-content-center">

                                </div>
                            </div>
                        </div>

                        <div class="px-3">
                            <div class="rec drowShadow">
                                <div class="container pt-3 ps-3 d-flex align-items-center">
                                    <i class="fas fa-drumstick-bite iconColor"></i>
                                    <span class="fs-5 ps-1">Food</span>
                                </div>
                                <span class="fs-5 ps-4">Total Expenses:</span>
                                <div class="container foodCon d-flex align-items-center justify-content-center">

                                </div>
                            </div>
                        </div>

                        <div class="px-3">
                            <div class="rec drowShadow">
                                <div class="container pt-3 ps-3 d-flex align-items-center">
                                    <i class="fas fa-medkit iconColor"></i>
                                    <span class="fs-5 ps-1">Health</span>
                                </div>
                                <span class="fs-5 ps-4">Total Expenses:</span>
                                <div class="container healthCon d-flex align-items-center justify-content-center">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex pt-3 justify-content-center align-items-center">
                        <div class="px-2">
                            <div class="rec drowShadow">
                                <div class="container pt-3 ps-3 d-flex align-items-center">
                                    <i class="far fa-lightbulb iconColor"></i>
                                    <span class="fs-5 ps-1">Utilities</span>
                                </div>
                                <span class="fs-5 ps-4">Total Expenses:</span>
                                <div class="container utilCon d-flex align-items-center justify-content-center">

                                </div>
                            </div>
                        </div>

                        <div class="px-3">
                            <div class="rec drowShadow">
                                <div class="container pt-3 ps-3 d-flex align-items-center">
                                    <i class="fas fa-cart-arrow-down iconColor"></i>
                                    <span class="fs-5 ps-1">Shopping</span>
                                </div>
                                <span class="fs-5 ps-4">Total Expenses:</span>
                                <div class="container shopCon d-flex align-items-center justify-content-center">

                                </div>
                            </div>
                        </div>

                        <div class="px-3">
                            <div class="rec drowShadow">
                                <div class="container pt-3 ps-3 d-flex align-items-center">
                                    <i class="fas fa-bus-alt iconColor"></i>
                                    <span class="fs-5 ps-1">Transportation</span>
                                </div>
                                <span class="fs-5 ps-4">Total Expenses:</span>
                                <div class="container transCon d-flex align-items-center justify-content-center">

                                </div>
                            </div>
                        </div>

                        <div class="px-3">
                            <div class="rec drowShadow">
                                <div class="container pt-3 ps-3 d-flex align-items-center">
                                    <i class="fas fa-ellipsis-h iconColor"></i>
                                    <span class="fs-5 ps-1">Miscellaneous</span>
                                </div>
                                <span class="fs-5 ps-4">Total Expenses:</span>
                                <div class="container miscCon d-flex align-items-center justify-content-center">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>


        <script>
            function barChart(mondayIncome, tuesdayIncome, wednesdayIncome, thurdsayIncome, fridayIncome,
                saturdayIncome, sundayIncome, mondayExpenses, tuesdayExpenses, wednesdayExpenses, thurdsayExpenses,
                fridayExpenses, saturdayExpenses, sundayExpenses) {
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                        datasets: [{
                                label: 'Income',
                                data: [mondayIncome, tuesdayIncome, wednesdayIncome, thurdsayIncome, fridayIncome,
                                    saturdayIncome, sundayIncome
                                ],
                                backgroundColor: '#70D380',
                                borderColor: '#70D380',
                                borderWidth: 1
                            },
                            {
                                label: 'Spending',
                                data: [mondayExpenses, tuesdayExpenses, wednesdayExpenses, thurdsayExpenses,
                                    fridayExpenses, saturdayExpenses, sundayExpenses
                                ],
                                backgroundColor: '#FEE19D',
                                borderColor: '#FEE19D',
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        plugins: {
                            legend: false // Hide legend
                        },
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                }
                            },
                            y: {
                                beginAtZero: true,
                                grid: {
                                    display: false,

                                }
                            },


                        }
                    }
                });
            }
        </script>




    @endsection

    <script>
        educExpenses();
        heathExpenses();
        foodExpenses();
        entExpenses();
        miscExpenses();
        shopExpenses();
        transExpenses();
        utilExpenses();

        fetch('/barchart', {
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
                // Use the 'data' received from the server directly
                barChart(
                    data.mondayIncome, data.tuesdayIncome, data.wednesdayIncome, data.thurdsayIncome,
                    data.fridayIncome, data.saturdayIncome, data.sundayIncome,
                    data.mondayExpenses, data.tuesdayExpenses, data.wednesdayExpenses, data.thurdsayExpenses,
                    data.fridayExpenses, data.saturdayExpenses, data.sundayExpenses
                );
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });



        function utilExpenses() {
            fetch('/utilexpenses', {
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
                    document.querySelector('.utilCon').innerHTML =
                        `<h3 class="fw-bold">&#8369;${data.util}</h3>`;
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }

        function transExpenses() {
            fetch('/transexpenses', {
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
                    document.querySelector('.transCon').innerHTML =
                        `<h3 class="fw-bold">&#8369;${data.trans}</h3>`;
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }

        function shopExpenses() {
            fetch('/shopexpenses', {
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
                    document.querySelector('.shopCon').innerHTML =
                        `<h3 class="fw-bold">&#8369;${data.shop}</h3>`;
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }

        function miscExpenses() {
            fetch('/miscexpenses', {
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
                    document.querySelector('.miscCon').innerHTML =
                        `<h3 class="fw-bold">&#8369;${data.misc}</h3>`;
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }

        function heathExpenses() {
            fetch('/healthexpenses', {
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
                    document.querySelector('.healthCon').innerHTML =
                        `<h3 class="fw-bold">&#8369;${data.health}</h3>`;
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }

        function foodExpenses() {
            fetch('/foodexpenses', {
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
                    document.querySelector('.foodCon').innerHTML =
                        `<h3 class="fw-bold">&#8369;${data.food}</h3>`;
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }

        function entExpenses() {
            fetch('/entexpenses', {
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
                    document.querySelector('.entCon').innerHTML =
                        `<h3 class="fw-bold">&#8369;${data.ent}</h3>`;
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }

        function educExpenses() {
            fetch('/educexpenses', {
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
                    document.querySelector('.educCon').innerHTML =
                        `<h3 class="fw-bold">&#8369;${data.educ}</h3>`;
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }
    </script>

    <style>
        .iconColor {
            color: #F9CAAE;
        }

        .rec {
            background: #F1F1F1;
            width: 250px;
            height: 130px;
            border: 1px solid #757575;
            border-radius: 10px;
        }

        .bot-container {
            height: 320px;
        }

        .drowShadow {
            box-shadow: 0 2px 1px rgba(117, 117, 117, 0.5);
        }

        .imagecon {
            height: 350px;
            width: 400px;
            border-radius: 10px;
            border: 1px solid #757575;
            overflow: hidden;
        }

        .imagecon img {
            width: 400px;
            height: 415px;
            margin: -35px -50px -50px -0px;
        }

        .dotOrange {
            color: #FEE19D;
            font-size: 13px;
        }

        .textSize {
            font-size: 13px;
        }

        .dotGreen {
            color: #70D380;
            font-size: 13px;
        }

        .barCon {
            height: 350px;
            width: 500px;
            background: #F1F1F1;
            border-radius: 10px;
            border: 1px solid #B0B0B0;
        }

        .chartCon {
            background: #FFFFFF;
            border-radius: 10px;
            height: 220px;
            width: 460px;
        }

        .topcontainer {
            height: 350px;
        }
    </style>




































    {{-- @if (Auth::check())
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
@endif --}}
