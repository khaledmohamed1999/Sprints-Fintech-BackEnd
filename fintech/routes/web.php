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
Route::get('/', [HomeController::class,'index']);
Route::get('/contact-us', [HomeController::class,'contact']);
Route::get('/about-us', [HomeController::class,'about']);
Route::get('/pay-online', [HomeController::class,'payOnline']);
Route::get('/wallet',[WalletController::class,'wallet']);
Route::get('/wallet/manage-funds',[WalletController::class,'manageFunds']);
Route::get('/send-money', [WalletController::class,'sendMoney']);
Route::get('/request-money', [WalletController::class,'requestMoney']);
Route::get('/pay-bills', [WalletController::class,'payBills']);
Route::get('/admin', [HomeController::class,'admin']);
Route::get('/bank-linking',[UserController::class, 'bankLinkView']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
