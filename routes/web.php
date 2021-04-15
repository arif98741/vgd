<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('admin', function () {
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


        Route::post('beneficiary', 'BeneficiaryController@addBeneficiary');

        Route::get('delete/beneficiary/{id}', 'ViewController@DeleteBeneficiary');
        Route::get('edit/beneficiary/{id}', 'ViewController@EditBeneficiary');
        Route::post('update/beneficiary/{id}', 'ViewController@UpdateBeneficiary');

        Route::get('upload-beneficiary-vgd', 'UploadController@uploadBeneficiary');
        Route::post('upload/file', 'UploadController@import');

        Route::get('stock-beneficiary-vgd', 'StockController@StockVgd');
        Route::post('add/stock', 'StockController@addStock');
        Route::get('pay-vgd-beneficiary', 'PayController@payBeneficiary');
        Route::get('distribution/{month}', 'PayController@distribution');

        Route::get('reports', 'ReportController@reports');
        Route::get('reports/all-months-dropdown', 'ReportController@reportsAllMonthsDropdown');
        Route::get('reports/all-union-wise-beneficiaries-dropdown', 'ReportController@reportsBeneficiariesByUnion');
    });

/** admin routes end */


/** user routes start */
Route::namespace('User')
    ->middleware(['user', 'web'])
    ->prefix('user')
    ->as('user.')
    ->group(function () {
        Route::get('dashboard', 'UserController@index');
        Route::match(['get', 'post'], 'add-vgd-beneficiary', 'BeneficiaryController@addBeneficiary')->name('add-vgd-beneficiary');
        Route::get('view-vgd-beneficiaries', 'BeneficiaryController@index');
        Route::get('edit-beneficiary/{id}', 'BeneficiaryController@editBeneficiary');
        Route::post('update-beneficiary/{id}', 'BeneficiaryController@updateBeneficiary')->name('update-vgd-beneficiary');

        Route::get('add-vgd-beneficiary', 'BeneficiaryController@index');


        Route::post('beneficiary', 'BeneficiaryController@addBeneficiary');

        Route::get('delete/beneficiary/{id}', 'ViewController@DeleteBeneficiary');
        Route::get('edit/beneficiary/{id}', 'ViewController@EditBeneficiary');
        Route::post('update/beneficiary/{id}', 'ViewController@UpdateBeneficiary');

        Route::get('upload-beneficiary-vgd', 'UploadController@uploadBeneficiary');
        Route::post('upload/file', 'UploadController@import');

        Route::get('pay-vgd-beneficiary', 'PayController@payBeneficiary');
        //January distribution
        Route::get('distribution/{month}', 'PayController@distribution');
        Route::get('confirm/disPage/{id}', 'PayController@confirmJanDis');
        Route::post('done/janDis', 'PayController@doneJanDis');

        Route::get('all-union-monthly-report', 'ReportController@allUnionMonthlyReport');
        Route::get('all-union-vgd-report', 'ReportController@allUnionReport');
        Route::get('all-pay-monthly-vgd-report', 'ReportController@allPayMonthlyVgdReport');
        Route::get('all-beneficiary-vgd-report', 'ReportController@allBeneficiaryVgdReport');
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


