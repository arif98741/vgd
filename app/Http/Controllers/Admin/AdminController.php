<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Union;
use Auth;

class AdminController extends Controller
{
    public function index()
    {

        $currentUserId = Auth::user()->id;
        $currentUnionId = Auth::user()->union_id;
        $unionName = Union::find($currentUnionId);

        /* //January Month Report
         $janTotal = Stock::where('user_id', $currentUserId)->where('month', 'january')->sum('amount');
         $janPay = Distribution::where('union_id', $currentUnionId)->where('month', 'january')->where('status', 1)->count();
         $janDue = $janTotal - $janPay;
         */

        return view('backend.admin.dashboard');

    }

}
