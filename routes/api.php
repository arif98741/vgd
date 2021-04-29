<?php

use Illuminate\Support\Facades\Route;


Route::post('sendOtp', 'Api\OtpController@sendOtp');
Route::post('verifyOtp', 'Api\OtpController@verifyOtp');
