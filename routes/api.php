<?php

use Illuminate\Support\Facades\Route;


Route::post('sendOtp', 'Api\OtpController@sendOtp');
Route::post('verifyOtp', 'Api\OtpController@verifyOtp');
Route::get('last-distributed/{union_id}', 'Api\DistributionController@lastDistribution');
Route::get('union_distribution/{union_id}', 'Api\DistributionController@distributionUnion');
