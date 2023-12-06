<?php

use App\Http\Controllers\Api\BudgetController;
use App\Http\Controllers\Api\ExpensesController;
use App\Http\Controllers\Api\IncomeController;
use App\Http\Controllers\Api\SummaryController;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ForgetPasswordManager;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/expenses', function () {
        return view('expenses');
    })->name('expenses');

    Route::get('/summary', function () {
        return view('summary');
    })->name('summary');
    // ->middleware('verify_email');

    Route::get('/budget', function () {
        return view('budget');
    })->name('budget');


    Route::get("/educexpenses", [SummaryController::class, "educExpenses"])
        ->name("educ.expenses");
    Route::get("/entexpenses", [SummaryController::class, "entExpenses"])
        ->name("ent.expenses");
    Route::get("/foodexpenses", [SummaryController::class, "foodExpenses"])
        ->name("food.expenses");
    Route::get("/healthexpenses", [SummaryController::class, "healthExpenses"])
        ->name("health.expenses");

    Route::get("/miscexpenses", [SummaryController::class, "miscExpenses"])
        ->name("misc.expenses");
    Route::get("/shopexpenses", [SummaryController::class, "shopExpenses"])
        ->name("shop.expenses");
    Route::get("/transexpenses", [SummaryController::class, "transExpenses"])
        ->name("trans.expenses");
    Route::get("/utilexpenses", [SummaryController::class, "utilExpenses"])
        ->name("util.expenses");
    Route::get("/barchart", [SummaryController::class, "barChart"])
        ->name("bar.chart");


    Route::controller(IncomeController::class)->group(function () {
        Route::get('/get-user-incomes', 'getUserIncomes')->name('get.user.incomes');
        Route::post('/incomeadd', 'incomeAdd')->name('income.add');
        Route::get('/edit-user-income/{id}', 'incomeEdit')->name('get.edit.income');
        Route::delete('/incomedelete/{id}', 'incomeDelete')->name('income.delete');
        Route::post('/incomesave/{id}', 'incomeSave')->name('income.save');
        Route::get('/dailyincome', 'dailyIncome')->name('get.daily.income');
        Route::get('/dailyspending', 'dailySpending')->name('get.daily.spending');
        Route::get('/dailysaving', 'dailySaving')->name('get.daily.saving');
        Route::get('/weeklyIncome', 'weeklyIncome')->name('get.weekly.income');
        Route::get('/weeklyspending', 'weeklySpending')->name('get.weekly.spending');
        Route::get('/weeklysaving', 'weeklySaving')->name('get.weekly.saving');
    });

    Route::controller(ExpensesController::class)->group(function () {
        Route::get('/get-user-expenses', 'getUserExpenses')->name('get.user.expenses');
        Route::post('/expensesadd', 'expensesAdd')->name('expenses.add');
        Route::get('/edit-user-expenses/{id}', 'expensesEdit')->name('get.edit.expenses');
        Route::delete('/expensesdelete/{id}', 'expensesDelete')->name('expenses.delete');
        Route::post('/expensessave/{id}', 'expensesSave')->name('expenses.save');

    });

    Route::controller(BudgetController::class)->group(function () {
        Route::get('/get-user-budgets', 'getUserBudgets')->name('get.user.budgets');
        Route::post('/budgetadd', 'budgetAdd')->name('budget.add');
        Route::get('/edit-user-budget/{id}', 'budgetEdit')->name('get.edit.budget');
        Route::post('/budgetsave/{id}', 'budgetSave')->name('budget.save');
        Route::delete('/budgetdelete/{id}', 'budgetDelete')->name('budget.delete');
        Route::get('/budgetedit/{id}', 'budgetEdit')->name('budget.edit');
    });

});

Route::get('/test_design', function () {
    return view('test_design');
})->name('test.design');

Route::controller(AuthManager::class)->group(function () {

    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginPost')->name('login.post');
    Route::get('/registration', 'registration')->name('registration');
    Route::post('/registration', 'registrationPOST')->name('registration.post');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/verify/{token}', 'verifyPost')->name('verify');

});

Route::controller(ForgetPasswordManager::class)->group(function () {

    Route::get("/forget-password", "forgetPassword")
        ->name("forget.password");

    Route::post("/forget-password", "forgetPasswordPost")
        ->name("forget.password.post");

    Route::get("/reset-password/{token}", "resetPassword")
        ->name("reset.password");

});

Route::post("/reset-password", [ForgetPasswordManager::class, "resetPasswordPost"])
    ->name("reset.password.post");



