<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
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


Route::get('/pay-online', [HomeController::class,'payOnline']);
Route::get('/send-money', [WalletController::class,'sendMoney']);
Route::get('/request-money', [WalletController::class,'requestMoney']);
Route::get('/pay-bills', [WalletController::class,'payBills']);

    Route::prefix('wallet')->group(function(){
        Route::get('',[WalletController::class,'wallet']);
        Route::get('manage-funds',[WalletController::class,'manageFunds']);
        Route::get('bank-linking',[WalletController::class, 'bankLinkView']);
        Route::get('generate-card',[WalletController::class, 'generateCard']);
        Route::post('bank-linking/link',[WalletController::class, 'bankLink']);
        Route::put('manage-funds/withdraw',[WalletController::class, 'withdrawMoney']);
        Route::put('manage-funds/deposit',[WalletController::class, 'depositMoney']);
        Route::delete('virtual/delete-card/{id}',[WalletController::class, 'deleteVirtualCard']);
    });
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    

    Route::middleware('auth')->group(function () {
});

Route::get('/', [HomeController::class,'index']);
Route::get('/contact-us', [HomeController::class,'contact']);
Route::get('/about-us', [HomeController::class,'about']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

});

Route::middleware('can:is_admin')->prefix('/admin')->group (function () {

    Route::get('', [HomeController::class,'admin']);
    Route::get('/users', [UserController::class,'user']);
    Route::post('/users', [UserController::class,'store'])->name('users');;
    Route::get('/users/create', [UserController::class, 'create']);
    Route::get('/users/{id}/edit', [UserController::class, 'edit']);
    Route::patch('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}/', [UserController::class, 'delete']);
    Route::get('/vendors', [UserController::class,'vendor']);
   
});

require __DIR__.'/auth.php';
