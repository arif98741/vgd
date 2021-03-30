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
        Route::get('add-vgd-beneficiary', 'BeneficiaryController@addBeneficiary');
        Route::get('view-vgd-beneficiary', 'ViewController@viewbeneficiary');
        Route::get('pay-vgd-beneficiary', 'payController@paybeneficiary');
        Route::get('all-union-monthly-report', 'reportController@allUnionMonthlyReport');
        Route::get('all-union-vgd-report', 'reportController@allUnionReport');
        Route::get('all-pay-monthly-vgd-report', 'reportController@allPayMonthlyVgdReport');
        Route::get('all-beneficiary-vgd-report', 'reportController@allBeneficiaryVgdReport');
        Route::get('upload-beneficiary-vgd', 'UploadController@uploadBeneficiary');
        Route::get('stock-beneficiary-vgd', 'StockController@StockVgd');

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

Route::get('/do-logout',function(){
    Auth::logout();
    return redirect('login');
});

Route::get('/',function(){
    return view('public.home');
});

/** public routes end */


