<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
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


Route::middleware('auth')->group(function () {
    Route::prefix('wallet')->group(function(){
        Route::get('',[WalletController::class,'wallet']);
        Route::get('manage-funds',[WalletController::class,'manageFunds']);
        Route::get('bank-linking',[WalletController::class, 'bankLinkView']);
        Route::get('generate-card',[WalletController::class, 'generateCard']);
        Route::post('bank-linking/link',[WalletController::class, 'bankLink']);
        Route::put('manage-funds/withdraw',[WalletController::class, 'withdrawMoney']);
        Route::put('manage-funds/deposit',[WalletController::class, 'depositMoney']);
        Route::delete('virtual/delete-card/{id}',[WalletController::class, 'deleteVirtualCard']);
        Route::get('/filter',[TransactionController::class, 'transactionFilter'])->name('filter');
        Route::get('/filtered-transactions',[TransactionController::class,'filteredTransactionsView'])->name('filteredTransactions');
    });
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/pay-online', [HomeController::class,'payOnline']);
    Route::get('/send-money', [WalletController::class,'sendMoneyView']);

    Route::post('/send-money/send-money-request', [WalletController::class,'sendMoney']);
    Route::get('/request-money', [WalletController::class,'requestMoneyView']);
    Route::post('/request-money/send-request-money', [WalletController::class,'requestMoney']);
    Route::get('/pay-bills', [WalletController::class,'payBills']);
    Route::get('/money-requests', [WalletController::class,'requestsView']);
    Route::get('/money-requests/{id}/{status}', [WalletController::class,'resolveMoneyRequest']);
    Route::get('/money-requests/request-status', [WalletController::class,'requestStatusView']);
    

});

Route::get('/', [HomeController::class,'index']);
Route::get('/contact-us', [HomeController::class,'contact']);
Route::post('/contact', [HomeController::class,'storeContact']);
Route::get('/about-us', [HomeController::class,'about']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

});

Route::middleware('can:is_admin')->prefix('/admin')->group (function () {

    Route::get('', [HomeController::class,'admin']);
    Route::get('/users', [AdminController::class,'user'])->name('users');
    Route::post('/vendor/create', [AdminController::class,'store']);
    Route::get('/users/{id}/create', [AdminController::class, 'create']);
    Route::get('/users/{id}/edit', [AdminController::class, 'edit']);
    Route::patch('/users/{id}', [AdminController::class, 'update']);
    Route::delete('/users/{id}/', [AdminController::class, 'delete']);
    Route::get('/vendors', [AdminController::class,'vendor'])->name('vendors');
    Route::get('/transactions', [AdminController::class,'transactions_all']);
    Route::post('/search/user', [AdminController::class,'search_user'])->name('search');
    Route::post('/search/transaction', [AdminController::class,'search_transaction']);
    Route::get('/user/{id}/transactions', [AdminController::class, 'transactions']);
   
});

require __DIR__.'/auth.php';
