<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LifePlan\AdminController;
use App\Http\Controllers\LifePlan\LifePlanController;
use App\Http\Controllers\LifePlan\StaffController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [LifePlanController::class, 'index'])->name('home');
Route::get('/print/{id}', [LifePlanController::class, 'printCustomer'])->name('print-customer');



Route::get('/customer-create', [LifePlanController::class, 'create'])->name('customer');
Route::post('/customer-store', [LifePlanController::class, 'store'])->name('create-customer');


Route::prefix('/admin')->group(function() {
    Route::get('/create', [AdminController::class, 'create'])->name('customer-admin');
    Route::post('/store', [AdminController::class, 'store'])->name('store-customer');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit-admin');
    Route::post('/update/{id}', [AdminController::class, 'update'])->name('update-customer');
    Route::delete('/delete/{id}', [AdminController::class, 'destroy'])->name('delete-customer');
    Route::get('/print/{id}', [AdminController::class, 'print'])->name('print-admin');
});

Route::prefix('/staff')->group(function() {
    Route::get('/edit/{id}', [StaffController::class, 'edit'])->name('edit-staff');
    Route::post('/update/{id}', [StaffController::class, 'update'])->name('update-customer-staff');
    Route::get('/print/{id}', [StaffController::class, 'print'])->name('print-staff');
});

?>
