<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function StockVgd () {
        return view('backend.admin.beneficiary.stock');
    }
}
