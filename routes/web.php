<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('vgd-beneficiaries', 'HomeController@vgdBeneficiaries');
Route::get('vgd-beneficiaries-view/{id}', 'HomeController@vgdBeneficiariesView');


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
        Route::get('uddokta-list', 'AdminController@uddoktaList');
        Route::match(['get', 'post'], 'uddokta/edit/{id}', 'AdminController@editUddokta');


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
        Route::get('reports/not-distributed', 'ReportController@notDistributed');


        Route::get('/all-envelope-report', 'EnvelopeController@EnvelopeView');
        Route::get('/envelope-print/{id}', 'EnvelopeController@EnvelopePrint');
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

        Route::get('stock', 'StockController@stock');
        Route::get('distribution/{month}', 'PayController@distribution');

        //reports
        Route::get('reports', 'ReportController@reports');
        Route::get('reports/all-months-dropdown', 'ReportController@reportsAllMonthsDropdown');
        Route::get('reports/all-union-wise-beneficiaries-dropdown', 'ReportController@reportsBeneficiariesByUnion');
        Route::get('reports/not-distributed', 'ReportController@notDistributed');
        Route::get('view/notice', 'NoticeController@viewNotice');


    });
/** user routes end */

Auth::routes(['register' => false]);


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


