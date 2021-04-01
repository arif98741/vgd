<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayController extends Controller
{
    public function paybeneficiary() {
        return view('backend.admin.beneficiary.pay');
    }
}
