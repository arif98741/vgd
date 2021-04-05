<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/** admin routes start */
Route::namespace('Admin')
    ->middleware(['admin', 'web'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {

        Route::get('dashboard', 'AdminController@index');
        Route::match(['get', 'post'], 'add-vgd-beneficiary', 'BeneficiaryController@addBeneficiary')->name('add-vgd-beneficiary');
        Route::get('view-vgd-beneficiary', 'ViewController@viewbeneficiary');

        Route::get('upload-beneficiary-vgd', 'UploadController@uploadBeneficiary');
        Route::get('stock-beneficiary-vgd', 'StockController@StockVgd');
        Route::get('pay-vgd-beneficiary', 'PayController@paybeneficiary');
        Route::get('all-union-monthly-report', 'ReportController@allUnionMonthlyReport');
        Route::get('all-union-vgd-report', 'ReportController@allUnionReport');
        Route::get('all-pay-monthly-vgd-report', 'ReportController@allPayMonthlyVgdReport');
        Route::get('all-beneficiary-vgd-report', 'ReportController@allBeneficiaryVgdReport');


    });

/** admin routes end */


/** user routes start */
Route::namespace('User')
    ->middleware(['user', 'web'])
    ->prefix('user')
    ->as('user.')
    ->group(function () {
        Route::get('dashboard', 'UserController@index');
    });
/** user routes end */

Auth::routes(['register' => true]);


/** public routes start */
Route::get('/denied', function () {
    print '403. Access denied';
})->name('denied');

Route::get('/do-logout', function () {
    Auth::logout();
    return redirect('login');
});

Route::get('/', function () {
    return view('public.home');
});

/** public routes end */


