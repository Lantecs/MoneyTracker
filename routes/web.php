<?php

use App\Http\Controllers\Api\BudgetController;
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

    Route::get('/budget', function () {
        return view('budget');
    })->name('budget');

    Route::get('/get-user-budgets', [BudgetController::class, 'getUserBudgets'])->name('get.user.budgets');
    Route::post('/budgetadd', [BudgetController::class, 'budgetAdd'])->name('budget.add');
    Route::delete('/budgetdelete/{id}', [BudgetController::class, 'budgetDelete'])->name('budget.delete');

    Route::get('/budgetedit/{id}', [BudgetController::class, 'budgetEdit'])->name('budget.edit');
});


Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPOST'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get("/forget-password", [ForgetPasswordManager::class, "forgetPassword"])
    ->name("forget.password");

Route::post("/forget-password", [ForgetPasswordManager::class, "forgetPasswordPost"])
    ->name("forget.password.post");

Route::get("/reset-password/{token}", [ForgetPasswordManager::class, "resetPassword"])
    ->name("reset.password");

Route::post("/reset-password", [ForgetPasswordManager::class, "resetPasswordPost"])
    ->name("reset.password.post");

Route::get('/verify/{token}', [AuthManager::class, 'verifyPost'])->name('verify');

