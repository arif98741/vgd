<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class reportController extends Controller
{
    public function allUnionMonthlyReport () {
        return view('backend.admin.reports.monthly-report');
    }

    public function allUnionReport () {
        return view('backend.admin.reports.all-union-report');
    }

    public function allBeneficiaryVgdReport () {
        return view('backend.admin.reports.all-beneficiary-vgd-report');
    }





}
