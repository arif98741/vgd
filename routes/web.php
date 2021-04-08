<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('admin', function () {
    echo \Illuminate\Support\Facades\Hash::make('123');

    exit;
    return redirect('login');
});

/** admin routes start */
Route::namespace('Admin')
    ->middleware(['admin', 'web'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {

        Route::get('dashboard', 'AdminController@index');

        Route::match(['get', 'post'], 'add-vgd-beneficiary', 'BeneficiaryController@addBeneficiary')->name('add-vgd-beneficiary');
        Route::get('view-vgd-beneficiaries', 'BeneficiaryController@index');
        Route::get('edit-beneficiary/{id}', 'BeneficiaryController@editBeneficiary');
        Route::post('update-beneficiary/{id}', 'BeneficiaryController@updateBeneficiary')->name('update-vgd-beneficiary');

        Route::get('add-vgd-beneficiary', 'BeneficiaryController@index');


        Route::post('beneficiary', 'BeneficiaryController@addBeneficiary');


        Route::get('view-vgd-beneficiary', 'ViewController@viewBeneficiary');
        Route::get('delete/beneficiary/{id}', 'ViewController@DeleteBeneficiary');
        Route::get('edit/beneficiary/{id}', 'ViewController@EditBeneficiary');
        Route::post('update/beneficiary/{id}', 'ViewController@UpdateBeneficiary');

        Route::get('upload-beneficiary-vgd', 'UploadController@uploadBeneficiary');
        Route::post('upload/file', 'UploadController@import');

        Route::get('stock-beneficiary-vgd', 'StockController@StockVgd');
        Route::post('add/stock', 'StockController@addStock');



        Route::get('pay-vgd-beneficiary', 'PayController@payBeneficiary');
        //January distribution
        Route::get('distribution/{month}', 'PayController@distribution');
        Route::get('confirm/disPage/{id}', 'PayController@confirmJanDis');
        Route::post('done/janDis', 'PayController@doneJanDis');

        //February distribution
        Route::get('february/distribution', 'PayController@FebDistribution');
        Route::get('confirm/febDis/{id}', 'PayController@confirmFebDis');
        Route::post('done/febDis', 'PayController@doneFebDis');







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


