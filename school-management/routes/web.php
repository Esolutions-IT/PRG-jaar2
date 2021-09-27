<?php

use App\Http\Controllers\GebruikerController;
use App\Http\Controllers\MollieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
    return view('welcome');
});

Route::get('/home',[StudentController::class, 'index']);
Route::get('/edit/{id}',[StudentController::class, 'edit']);
Route::get('/show/{id}',[StudentController::class, 'show']);
Route::get('/create',[StudentController::class, 'create']);
Route::post('/store',[StudentController::class, 'store']);
Route::post('/update/{id}',[StudentController::class, 'update']);

Route::get('/student/studiegeld',[StudentController::class, 'studiegeld']);

Route::get('/student/invoice/{invoice_id}',[StudentController::class, 'pdf_invoice']);

Route::get('/student/pdf/{id}',[StudentController::class, 'pdf']);
Route::get('/test', function () {
    return view('test');
});

Route::get('/mollie-payment',[MollieController::class, 'preparePayment'])->name('mollie.payment');
Route::get('/payment-success',[MollieController::class, 'paymentSuccess'])->name('payment.success');

Route::get('/users',[GebruikerController::class, 'index']);
Route::get('/users/edit/{id}',[GebruikerController::class, 'edit']);

Route::post('/users/edit',[StudentController::class, 'edit_data']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
