<?php

use App\Http\Controllers\Auth\AuthenticatedController;
use App\Http\Controllers\Backend\DashboardandminController;
use App\Http\Controllers\Backend\DepositController;
use App\Http\Controllers\Backend\WithdrawController as BackendWithdrawController;
use App\Http\Controllers\Frontend\DespositController;
use App\Http\Controllers\Frontend\EarningController;
use App\Http\Controllers\Frontend\HistoryController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\WithdrawController;
use Illuminate\Foundation\Http\Events\MyEvent;
use Illuminate\Support\Facades\Route;







Route::middleware('Auth')->group(function () {
    Route::get('login', function () {
        return view('Frontend.login');
    });
    Route::get('signup', [AuthenticatedController::class, 'singup_get'])->name('singup_get');
});


Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('update_index', [IndexController::class, 'update_index'])->name("update_index");




Route::get('about', function () {
    return view('Frontend.about');
});
Route::get('faq', function () {
    return view('Frontend.faq');
});
Route::get('rules', function () {
    return view('Frontend.rules');
});
Route::get('affiliates', function () {
    return view('Frontend.affiliates');
});
Route::get('support', function () {
    return view('Frontend.contact');
});


Route::middleware('CheckAuthCustomer')->group(function () {


    Route::get('dashboard', [IndexController::class, 'dashboard'])->name('dashboard');


    Route::get('dashboard/referallinks', function () {
        return view('Frontend.referallinks');
    });
    Route::get('dashboard/edit_account', function () {
        return view('Frontend.profile');
    });
    Route::controller(DespositController::class)->group(function(){

        Route::post('dashboard/deposit/checkout',  'depositcheckout')->name('deposit.checkout');

        Route::get('dashboard/deposit/checkouts', 'go_deposit_check')->name('go_deposit_check');
        Route::post('dashboard/deposit/send', 'deposit_send')->name('deposit_send');
        Route::get('dashboard/deposit_history', 'deposit_history')->name('deposit_history');
        Route::get('dashboard/deposit_list', 'deposit_list')->name('deposit_list');


        Route::get('dashboard/deposit', 'deposit')->name('deposits');


    });
    Route::controller(WithdrawController::class)->group(function(){

        Route::get('dashboard/withdraw', 'withdraw')->name('withdraw');
        Route::post('dashboard/withdraw/send', 'withdraw_send')->name('withdraw_send');
        Route::get('dashboard/withdraw_history', 'withdraw_history')->name('withdraw_history');
        Route::post('dashboard/withdraw_checkout_sent', 'withdraw_checkout_sent')->name('withdraw_checkout_sent');
        Route::get('dashboard/withdraw_confirm', 'withdraw_confirm')->name('withdraw_confirm');


    });
    Route::controller(HistoryController::class)->group(function(){
        Route::get('dashboard/earnings', 'earning_history')->name('earning_history');
    });


});


Route::get('/test-broadcast', function() {
    event(new MyEvent('hello'));
    return 'send';
});









//Backend
Route::middleware('CheckAuthAdmin')->group(function () {
    Route::controller(DashboardandminController::class)->group(function(){
        Route::get('admin/dashboard', 'dashboard')->name('admin.dashboard');
    });

    Route::controller(DepositController::class)->group(function(){
        Route::get('admin/deposit', 'deposit')->name('deposit');
        Route::get('admin/deposit/approved{id}', 'approved')->name('approved');
        Route::get('admin/deposit/delete_deposit{id}', 'delete_deposit')->name('delete_deposit');
    });
   Route::controller(BackendWithdrawController::class)->group(function(){
        Route::get('admin/withdraw', 'withdraw_admin')->name('withdraw_admin');
        Route::get('admin/withdraw/approved{id}', 'approved_withdraw')->name('approved_withdraw');
        Route::get('admin/withdraw/delete{id}', 'delete_withdraw')->name('delete_withdraw');
   });

});


Route::controller(AuthenticatedController::class)->group(function () {
    Route::post('logout', 'logout')->name("logout");
    Route::post('login_auth', 'login')->name("login_auth");
    Route::post('signup_auth', 'signup')->name("signup_auth");
    Route::post('edit_account', 'edit_account')->name("edit_account");

});
