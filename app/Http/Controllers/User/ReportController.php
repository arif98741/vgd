<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function allUnionMonthlyReport()
    {
        return view('backend.admin.reports.monthly-report');
    }

    public function allUnionReport()
    {
        return view('backend.admin.reports.all-union-report');
    }

    public function allBeneficiaryVgdReport()
    {
        return view('backend.admin.reports.all-beneficiary-vgd-report');
    }

    public function allPayMonthlyVgdReport()
    {
        return view('backend.admin.reports.all-pay-monthly-report');
    }


}
